<?php
//Tester s'il y a un cookie admin
if(isset($_COOKIE['admin']) ){
  include('header.php');
//Si Oui ont affiche la page
$title="Administration - HOME";
require_once('../config.php');
$date = date("d-m-Y");
$heure = date("H:i:s");
?>
<?php header( 'content-type: text/html; charset=UTF-8' );
?>
<h2><center>Liste des 10 derniers inscrits</center></h2><br>
<?php
if(isset($_POST['delete'])){
  $mysql->query("DROP TABLE `newsletter`");
  $mysql->query("CREATE TABLE newsletter (id int(11) NOT NULL AUTO_INCREMENT, date text NOT NULL, heure time NOT NULL, email text NOT NULL, PRIMARY KEY (id));");
}
?>
<center><form action="" method="post">
<a class="buttonsauvegarde btn" href="telechargement.php">Télécharger les mails</a>
<input class="buttonsauvegarde btn suppression" type="submit" name="delete" value="Supprimer la base en cours" onclick="return confirm('Êtes-vous sur de vouloir supprimer toute la base en cours ?');">
</form><br><br></center>
<?php
// On récupère tout le contenu de la table jeux_video
$reponse = $mysql->query('SELECT * FROM newsletter ORDER BY id DESC');
echo '<table align="center" style="width:600px;" bgcolor="#FFFFFF">'."\n";
// première ligne
echo '<tr style="color:white;">';
echo '<td bgcolor="#3498db"><b>N°</b></td>';
echo '<td bgcolor="#3498db"><b>Date</b></td>';
echo '<td bgcolor="#3498db"><b>Heure</b></td>';
echo '<td bgcolor="#3498db"><b>Email</b></td>';
echo '</tr>'."\n";
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
echo '<tr>';
echo '<td bgcolor="#CCCCCC">'.$donnees['id'].'</td>';
echo '<td bgcolor="#CCCCCC">'.$donnees['date'].'</td>';
echo '<td bgcolor="#CCCCCC">'.$donnees['heure'].'</td>';
echo '<td bgcolor="#CCCCCC">'.$donnees['email'].'</td>';
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