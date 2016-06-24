<form action="" method="post">
<input type="hidden">
voiture<input type="text" name="voiture"><br>
Prix <input type="text" name="prix"><br>
Etat<select name="etat">
  <option value="">Tous</option>
  <option value="neuf">neuf</option>
  <option value="occasion">occasion</option>
</select>
<input type="submit">
</form>
<?php
//Connection à la base de données
require_once("config.php");
 
$fields = array('voiture', 'prix', 'etat') ; // Champs <form>/BdD
$mysql = 'SELECT agents.id, agents.voiture, agents.prix, agents.etat FROM agents WHERE 1 = 1' ; 
foreach ( $fields as $field ) { 
    if ( isset($_POST[$field]) && $_POST[$field] !== '' ) { // Ignore les champs vides 
        $mysql .= " AND $field = '{$_POST[$field]}'" ; 
    } 
} 
$mysql .=";"; 
$result = mysql_query($mysql) or die('Erreur SQL !<br />'.$mysql.'<br />'.mysql_error());

echo "<div align='center' class='Titre'>Résultat de la recherche</div>
  <table width='720' border='0' align='center' cellpadding='10' cellspacing='1'>
  <tr valign='top'>
      <th>voiture</th>
    <th >Prix</th>
  <th >Etat</th>
  </tr>";

  while($temp=mysql_fetch_assoc($result)){
  $query2 = "SELECT * FROM agents WHERE agents.id='".$temp['id']."'";
  $result2 = @mysql_query ($query2) or die (mysql_error());
 
  while($temp2=mysql_fetch_assoc($result2)){
echo "<tr valign='top' class='TDDonnees' onmouseover=\"setPointer('over', this, '#FFFFFF', '', '', '')\" onmouseout=\"setPointer('out', this, '#f5f5f5', '', '', '')\">
    <td >".$temp2['voiture']."</td>
    <td >".$temp2['prix']."</td>
   <td >".$temp2['etat']."</td>
  </tr>";
    }
  }
 
  echo "</table>";

?>