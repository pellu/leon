<?php session_start();
if(isset($_SESSION['email'])){
	include('config.php');
	$sql = "DELETE FROM `news` WHERE `id_news`='".$_GET["id"]."'";
	  $count = $mysql->exec($sql);
	  $mysql = null;
	header('Location: http://localhost/leon/website/mesannonces.php');
}else{
    header("Location:index.php");
}
?>