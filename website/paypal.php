<?php session_start(); ?>
<?php include('header.php');?>
<?php
if(isset($_SESSION['email']))
{?>
<style>.img-responsive {
    margin: 0 auto;
}</style>
	<a href="merci.php"><img class="img-responsive center-block" src="img/paypal.png"></a>
<?php }else{?>
<br><br><br><br><br>
<section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="message">Pour acc&eacute;der &agrave; cette page, vous devez &ecirc;tre connect&eacute;.<br />
<a href="connexion.php">Se connecter</a></div>
</div></div></section>
<?php }?>
</body>
</html>