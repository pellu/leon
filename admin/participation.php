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
<?php header( 'content-type: text/html; charset=ISO-8859-1' );
include('header.php');?>
<h2><center>Liste des participation</center></h2><br>
<?php
if(isset($_POST['delete'])){
  $mysql->query("DROP TABLE `participation`");
  $mysql->query("CREATE TABLE participation (id_participation int(11) NOT NULL AUTO_INCREMENT, id_news_participation text NOT NULL, id_user_participation text NOT NULL, date_participation text NOT NULL, heure_participation text NOT NULL, PRIMARY KEY (id_participation));");
}
?>
<center><form action="" method="post">
<input class="buttonsauvegarde btn suppression" type="submit" name="delete" value="Supprimer toutes les participation" onclick="return confirm('Êtes-vous sur de vouloir supprimer toute la base en cours ?');">
</form><br><br></center>


<table align="center" style="width:900px;" bgcolor="#FFFFFF">
<tr style="color:white;">
<th bgcolor="#3498db">N&deg;</th>
<th bgcolor="#3498db">Inscrit</th>
<th bgcolor="#3498db">Annonce</th>
<th bgcolor="#3498db">Date</th>
<th bgcolor="#3498db">Heure</th>
</tr>
<?php

$resparticipation=mysql_query("SELECT c.* , p.* FROM participation c, profil p WHERE c.id_user_participation=p.id ORDER BY c.id_participation DESC");
while($resultpart=mysql_fetch_array($resparticipation))
{
 ?>
    <tr>
    <td bgcolor="#CCCCCC"><?php echo $resultpart['id_participation']; ?></td>
    <td bgcolor="#CCCCCC"><a target="_blank" href="http://localhost/leon/website/profil/<?php echo $resultpart['url']; ?>-<?php echo $resultpart['id']; ?>"><?php echo $resultpart['pseudo']; ?></td>
    <td bgcolor="#CCCCCC"><a target="_blank" href="http://localhost/leon/website/news/news-<?php echo $resultpart['id_news_participation']; ?>"><?php echo $resultpart['id_news_participation']; ?></td>
    <td bgcolor="#CCCCCC"><?php echo $resultpart['date_participation']; ?></td>
    <td bgcolor="#CCCCCC"><?php echo $resultpart['heure_participation']; ?></td>
    </tr>
    <?php
}
?>
</table>
</body>
</html>
<?php
}else{
    header("Location:index.php");
}
?>