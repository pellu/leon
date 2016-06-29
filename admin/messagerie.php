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
<h2><center>Liste des messages</center></h2><br>
<?php
if(isset($_POST['delete'])){
  $mysql->query("DROP TABLE `pm`");
  $mysql->query("CREATE TABLE `pm` (
  `id` bigint(20) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `user1` bigint(20) NOT NULL,
  `user2` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `user1read` varchar(3) NOT NULL,
  `user2read` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
}
?>
<center><form action="" method="post">
<input class="buttonsauvegarde btn suppression" type="submit" name="delete" value="Supprimer tout les messages" onclick="return confirm('Êtes-vous sur de vouloir supprimer toute la base en cours ?');">
</form><br><br></center>


<table align="center" style="width:900px;" bgcolor="#FFFFFF">
<tr style="color:white;">
<th bgcolor="#3498db">Id</th>
<th bgcolor="#3498db">Id2</th>
<th bgcolor="#3498db">Title</th>
<th bgcolor="#3498db">User1</th>
<th bgcolor="#3498db">User2</th>
<th bgcolor="#3498db">Message</th>
<th bgcolor="#3498db">Date</th>
</tr>
<?php

$resnews=mysql_query("SELECT * FROM pm ORDER BY id DESC");
while($result=mysql_fetch_array($resnews))
{
 ?>
    <tr>
    <td bgcolor="#CCCCCC"><?php echo $result['id']; ?></td>
    <td bgcolor="#CCCCCC"><?php echo $result['id2']; ?></td>
    <td bgcolor="#CCCCCC"><?php echo $result['title']; ?></td>
    <td bgcolor="#CCCCCC"><?php echo $result['user1']; ?></td>
    <td bgcolor="#CCCCCC"><?php echo $result['user2']; ?></td>
    <td bgcolor="#CCCCCC"><?php echo $result['message']; ?></td>
    <td bgcolor="#CCCCCC"><?php echo date('d/m/Y', $result['timestamp']); ?>&nbsp;<?php echo date('H:i:s', $result['timestamp']); ?></td>
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