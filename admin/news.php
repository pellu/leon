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
<h2><center>Liste des news</center></h2><br>
<?php
if(isset($_POST['delete'])){
  $mysql->query("DROP TABLE `news`");
  $mysql->query("CREATE TABLE news (id_news int(11) NOT NULL AUTO_INCREMENT, pseudo_news text NOT NULL, titre_news text NOT NULL, contenu_news text NOT NULL, url_news text NOT NULL, date_news text NOT NULL, PRIMARY KEY (id_news));");
}
?>
<center><form action="" method="post">
<input class="buttonsauvegarde btn suppression" type="submit" name="delete" value="Supprimer toutes les news" onclick="return confirm('Êtes-vous sur de vouloir supprimer toute la base en cours ?');">
</form><br><br></center>


<table align="center" style="width:900px;" bgcolor="#FFFFFF">
<tr style="color:white;">
<th bgcolor="#3498db">N&deg;</th>
<th bgcolor="#3498db">News de</th>
<th bgcolor="#3498db">Titre</th>
<th bgcolor="#3498db">Contenu</th>
<th bgcolor="#3498db">Date</th>
<th bgcolor="#3498db">URL</th>
<th bgcolor="#3498db">Modifier</th>
</tr>
<?php

$resnews=mysql_query("SELECT c.* , p.* FROM news c, profil p WHERE c.pseudo_news=p.id ORDER BY c.id_news DESC");
while($result=mysql_fetch_array($resnews))
{
 ?>
    <tr>
    <td bgcolor="#CCCCCC"><?php echo $result['id_news']; ?></td>
    <td bgcolor="#CCCCCC"><a target="_blank" href="http://localhost/leon/website/profil/<?php echo $result['url']; ?>-<?php echo $result['id']; ?>"><?php echo $result['pseudo']; ?></td>
    <td bgcolor="#CCCCCC"><?php echo $result['titre_news']; ?></td>
    <td bgcolor="#CCCCCC"><?php echo $result['contenu_news']; ?></td>
    <td bgcolor="#CCCCCC"><?php echo $result['date_news']; ?></td>
    <td bgcolor="#CCCCCC"><a target="_blank" href="http://localhost/leon/website/news/<?php echo $result['url_news']; ?>-<?php echo $result['id_news']; ?>"><?php echo $result['url_news']; ?>-<?php echo $result['id_news']; ?></a></td>
    <td bgcolor="#CCCCCC"><a href="http://localhost/leon/admin/modifiernews.php?id=<?php echo $result['id_news']; ?>">Modifier</a> / <a onclick="return confirm('&Ecirc;tes-vous sur de vouloir supprimer la news ?');" href="http://localhost/leon/admin/supprimernews.php?id=<?php echo $result['id_news']; ?>">Supprimer</a></td>
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