<?php
if(isset($_SESSION['email'])){
	session_start();//Oups je suis connecté, alors je fait quoi ?
	session_destroy($_COOKIE["user"]);
	setcookie('user', '', -1);
	$_SESSION=array();//vide le tableau $_SESSION par écrasement
	session_destroy();//détruit la session
	//On le deconecte en supprimant simplement les sessions email et userid
	unset($_SESSION['email'], $_SESSION['userid']);
	header('http://localhost/leon/website/');//redirige vers index.php
	exit();//inutile ici mais ça fait beau
}else{header("Location:index.php");}?>