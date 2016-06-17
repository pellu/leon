<?php
session_start();
//Test s'il y a une session avec un nom
if(!isset($_COOKIE['admin']) ){
 //accès refusé si pas 'admin'
header('Location: http://letsplayce.com');  
}

//connexion
require_once('../config.php');

//date pour le fichier
$date = date("d-m-Y");

//header to give the order to the browser
header('Content-Type: text/csv');
header("Content-Disposition: attachment; filename=".$date."-mails-letsplayce.csv"); // Téléchargement du fichier avec date

//select table to export the data
$select_table=mysql_query('SELECT * from newsletter');
$rows = mysql_fetch_assoc($select_table);

if ($rows)
{
getcsv(array_keys($rows));
}
while($rows)
{
getcsv($rows);
$rows = mysql_fetch_assoc($select_table);
}

// get total number of fields present in the database
function getcsv($no_of_field_names)
{
$separate = '';


// do the action for all field names as field name
foreach ($no_of_field_names as $field_name)
{
if (preg_match('/\\r|\\n|"/', $field_name))
{
$field_name = '' . str_replace('', $field_name) . '';
}
echo $separate . $field_name;

//sepearte with the comma
$separate = ';';
}

//make new row and line
echo "\r\n";
}
?>