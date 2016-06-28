<?php
if(isset($_SESSION['email'])){
  	unset($_SESSION['email'], $_SESSION['userid']);
  	echo"Vous serez déconnecté à la fermeture de votre navigateur";
	header('Refresh:5;url:http://localhost/leon/website/connexion.php');
}else{header("Location:index.php");}?>