<?php session_start();?>
<?php include('menu.php');?>
<br><br><br><br><br><br><br>
<?php
if (!empty($_SERVER['HTTP_REFERER'])) {
  echo '<p><a href="'.$_SERVER['HTTP_REFERER'].'">Retour page pr&eacutec&eacutedente</a></p>';
}
?>
<center>Le page que vous avez chargé n'existe plus, vous allez être redirigé vers la page d'accueil</center>
<?php
	header("Refresh: 5; URL=/leon/website/index.php");
?>
<?php include('footer.php');?>