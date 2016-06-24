<?php
if(isset($_COOKIE['admin']) ){
	include('config.php');
	$id = $_GET["id"];
	$sql = "DELETE FROM `news` WHERE id='".$id."'";
	  $count = $mysql->exec($sql);
	  $mysql = null;
header("Location:news.php");
}else{
    header("Location:index.php");
}
?>