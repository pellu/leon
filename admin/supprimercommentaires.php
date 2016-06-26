<?php
if(isset($_COOKIE['admin']) ){
	include('config.php');
	$id = $_GET["id"];
	$sql = "DELETE FROM `comments` WHERE id_comments='".$id."'";
	  $count = $mysql->exec($sql);
	  $mysql = null;
header("Location:commentaires.php");
}else{
    header("Location:index.php");
}
?>