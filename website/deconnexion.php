<?php
if(isset($_SESSION['email'])){
  	unset($_SESSION['email'], $_SESSION['userid']);
  	echo"Vous serez déconnecté à la fermeture de votre navigateur";
	header('Location:http://localhost/leon/website/connexion.php');
}else{header("Location:index.php");}?>