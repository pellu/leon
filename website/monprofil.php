<?php session_start();?>
<?php include('menu.php');?>
<section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-12 col-ls-12 col-xs-12">
    <br><br><br><br><br>
<?php if(isset($_SESSION['email'])){?>
<?php
	include('headerprofil.php');
	$email=$_SESSION["email"];
	$sqluser="SELECT * FROM profil WHERE email='".$email."'";
	$requser = mysql_query($sqluser) or die('Erreur SQL !<br />'.$sqluser.'<br />'.mysql_error());
	$datauser=mysql_fetch_assoc($requser);
    echo 'Bonjour, ' .$datauser['pseudo']. '';
}else{?>
<br><br><br><br><br>
<section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="message">Pour acc&eacute;der &agrave; cette page, vous devez &ecirc;tre connect&eacute;.<br />
<a href="connexion.php">Se connecter</a></div>
</div></div></section>
<?php
}
?>
</div></div></section>
<?php include('footer.php');?>