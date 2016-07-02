<?php session_start();
if(isset($_SESSION['email'])){
	include('config.php');
	$sql = "DELETE FROM `profil` WHERE `id`='".$_SESSION['userid']."'";
	  $count = $mysql->exec($sql);
	  $mysql = null;
	session_destroy();
	header('Location: http://localhost/leon/website/connexion.php');
}else{
    header("Location:index.php");
}
?>