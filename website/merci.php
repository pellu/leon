<?php session_start(); ?>
<?php include('menu.php'); ?>
<?php
if(isset($_SESSION['email']))
{?>
<br><br><br><br><br><br><br><br>
You win!
<a href="http://localhost/leon/website/mesannonces.php">Votre participation a bien été prise en compte !</a>
<?php }else{?>
<br><br><br><br><br>
<section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="message">Pour acc&eacute;der &agrave; cette page, vous devez &ecirc;tre connect&eacute;.<br />
<a href="connexion.php">Se connecter</a></div>
</div></div></section>
<?php }?>
<?php include('footer.php'); ?>