<?php session_start();?>
<?php include('menu.php');?>
<br><br><br><br><br><br><br>
<?php
if (!empty($_SERVER['HTTP_REFERER'])) {
  echo '<p><a href="'.$_SERVER['HTTP_REFERER'].'">Retour page pr&eacutec&eacutedente</a></p>';
}
?>
404
<?php include('footer.php');?>