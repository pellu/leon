<?php
if(isset($_COOKIE['admin'])){
	session_start();//Oups je suis connecté, alors je fait quoi ?
	session_destroy($_COOKIE["admin"]);
	setcookie('admin', '', -1);
	$_SESSION=array();//vide le tableau $_SESSION par écrasement
	session_destroy();//détruit la session

	header('location:../admin/index.php');//redirige vers index.php
	exit();//inutile ici mais ça fait beau
}else{header("Location:index.php");}?>