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
<h2><center>Liste des commentaires</center></h2><br>
<?php
if(isset($_POST['delete'])){
  $mysql->query("DROP TABLE `comments`");
  $mysql->query("CREATE TABLE comments (id_comments int(11) NOT NULL AUTO_INCREMENT, date_comments text NOT NULL, pseudo_comments text NOT NULL, profil_comments text NOT NULL, comments text NOT NULL, PRIMARY KEY (id_comments));");
}
?>
<center><form action="" method="post">
<input class="buttonsauvegarde btn suppression" type="submit" name="delete" value="Supprimer tout les commentaires" onclick="return confirm('Êtes-vous sur de vouloir supprimer toute la base en cours ?');">
</form><br><br></center>

<table align="center" style="width:900px;" bgcolor="#FFFFFF">
<tr style="color:white;">
<td bgcolor="#3498db"><b>N&deg;</b></td>
<td bgcolor="#3498db"><b>Date</b></td>
<td bgcolor="#3498db"><b>Pseudo</b></td>
<td bgcolor="#3498db"><b>Sur le profil</b></td>
<td bgcolor="#3498db"><b>Commentaires</b></td>
<td bgcolor="#3498db"><b>Action</b></td>
</tr>
<?php

$resnews=mysql_query("SELECT c.* , p.* FROM comments c, profil p WHERE c.pseudo_comments=p.id ORDER BY c.id_comments DESC");
while($result=mysql_fetch_array($resnews))
{
 ?>
    <tr>
    <td bgcolor="#CCCCCC"><?php echo $result['id_comments']; ?></td>
    <td bgcolor="#CCCCCC"><?php echo $result['date_comments']; ?></td>
    <td bgcolor="#CCCCCC"><a target="_blank" href="http://localhost/leon/website/profil/<?php echo $result['url']; ?>-<?php echo $result['id']; ?>"><?php echo $result['pseudo']; ?></td>
    <td bgcolor="#CCCCCC"><a target="_blank" href="http://localhost/leon/website/profil/url-<?php echo $result['profil_comments']; ?>"><?php echo $result['profil_comments']; ?></td>
    <td bgcolor="#CCCCCC"><?php echo $result['comments']; ?></td>
    <td bgcolor="#CCCCCC"><a href="http://localhost/leon/admin/modifiercommentaires.php?id=<?php echo $result['id_comments']; ?>">Modifier</a> / <a onclick="return confirm('&Ecirc;tes-vous sur de vouloir supprimer le commentaire ?');" href="http://localhost/leon/admin/supprimecommentaires.php?id=<?php echo $result['id_comments']; ?>">Supprimer</a></td>
    </tr>
    <?php
}
?>
</body>
</html>
<?php
}else{
    header("Location:index.php");
}
?>