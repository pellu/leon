<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set("memory_limit","120M");
 
$filename = "export_leon_".date('Y-m-d_H-i').".csv";
$schema_insert = "";
$meta = array();
$csv_terminated = "\n";
$csv_separator = ",";
$csv_enclosed = '"';
$csv_escaped = "\\";
 
require_once('../config.php');
$req = $mysql->prepare("SELECT * FROM newsletter");
$req->execute() or die(print_r($req->errorInfo()));
 
for($i = 0; $i < 11; $i++) {
    $meta[] = $req->getColumnMeta($i);
}
foreach($meta as $cle => $valeur) {
    $l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,  stripslashes($meta[$cle]['name'])) . $csv_enclosed;
    $schema_insert .= $l;
    $schema_insert .= $csv_separator;
}
$out = trim(substr($schema_insert, 0, -1));
$out .= $csv_terminated;
 
$req->setFetchMode(PDO::FETCH_ASSOC);
foreach($req as $row) {
    $out .= $row['id'].',"'.$row['date'].'","'.$row['heure'].'","'.$row['email'].'"'.$csv_terminated;
}
 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($out));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=$filename");
echo $out;
exit;
 
?>
