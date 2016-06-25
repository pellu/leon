<?php
session_start();
$title="Administration";
?>
<?php
//Tester s'il y a un cookie admin
if(isset($_COOKIE['admin']) ){
//Si Oui ont affiche la page
$title="Administration - HOME";
require_once('config.php');
$date = date("d-m-Y");
$heure = date("H:i:s");
?>
<?php header( 'content-type: text/html; charset=UTF-8' );
include('header.php');?>
<h2><center>Liste des profils</center></h2><br>
<?php
if(isset($_POST['delete'])){
  $mysql->query("DROP TABLE `profil`");
  $mysql->query("CREATE TABLE profil (id int(11) NOT NULL AUTO_INCREMENT, pseudo text NOT NULL, description text NOT NULL, url text NOT NULL, date text NOT NULL, PRIMARY KEY (id));");
}
?>
<center><form action="" method="post">
<input class="buttonsauvegarde btn suppression" type="submit" name="delete" value="Supprimer tout les profils" onclick="return confirm('Êtes-vous sur de vouloir supprimer toute la base en cours ?');">
</form><br><br></center>
<?php
$reponse = $mysql->query('SELECT * FROM profil ORDER BY id DESC');
echo '<table align="center" style="width:900px;" bgcolor="#FFFFFF">'."\n";
// première ligne
echo '<tr style="color:white;">';
echo '<td bgcolor="#3498db"><b>N&deg;</b></td>';
echo '<td bgcolor="#3498db"><b>Pseudo</b></td>';
echo '<td bgcolor="#3498db" width="300px"><b>Description</b></td>';
echo '<td bgcolor="#3498db"><b>URL</b></td>';
echo '<td bgcolor="#3498db"><b>Date</b></td>';
echo '<td bgcolor="#3498db"><b>Action</b></td>';
echo '</tr>'."\n";
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
echo '<tr>';
echo '<td bgcolor="#CCCCCC">'.$donnees['id'].'</td>';
echo '<td bgcolor="#CCCCCC">'.$donnees['pseudo'].'</td>';
echo '<td bgcolor="#CCCCCC">'.$donnees['description'].'</td>';
echo '<td bgcolor="#CCCCCC"><a target="_blank" href="http://localhost/leon/website/profil/'.$donnees['url'].'-'.$donnees['id'].'">'.$donnees['url'].'-'.$donnees['id'].'</a></td>';
echo '<td bgcolor="#CCCCCC">'.$donnees['date_inscription'].'</td>';
echo '<td bgcolor="#CCCCCC">';?><a href="modifierprofil.php?id=<?php echo $donnees['id'];?>">Modifier</a> / <a onclick="return confirm('&Ecirc;tes-vous sur de vouloir supprimer l\'utilisateur');" href="http://localhost/leon/admin/supprimerprofil.php?id=<?php echo $donnees['id'];?>">Supprimer</a>
<?php echo '</td>';
echo '</tr>'."\n";
}
$reponse->closeCursor(); // Termine le traitement de la requête
?>
</body>
</html>
<?php
}else{
    header("Location:index.php");
}
?>