<?php session_start();?>
<?php include('header.php');include('config.php');?>
<section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-12 col-ls-12 col-xs-12">
    <br><br><br><br><br>
<?php if(isset($_SESSION['email'])){?>
<?php 
	include('headerprofil.php');
	//Affichage du pseudo de l'user
	echo'Bonjour, ' .$_SESSION['email']. '<br><br>';

}else{?>
	<a href="deconnexion.php">Je me déconnecte</a> (Vous serez déconnecté à la fermeture de votre navigateur)
<div class="message">Pour acc&eacute;der &agrave; cette page, vous devez &ecirc;tre connect&eacute;.<br />
<a href="connexion.php">Se connecter</a></div>
<?php
}
?>
</div></div></section>
<?php include('footer.php');?>