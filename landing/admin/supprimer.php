<?php
if(isset($_COOKIE['admin']) ){
	include('../config.php');
	$id = $_GET["id"];
	$sql = "DELETE FROM `profil` WHERE id='".$id."'";
	  $count = $mysql->exec($sql);
	  $mysql = null;
header("Location:profil.php");
}else{
    header("Location:index.php");
}
?>