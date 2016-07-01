<?php session_start();?>
<?php include('menu.php');?>
<section class="container-fluid content-section text-center">
  <div class="row">
        <div id="rest" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <br><br><br><br><br>
<?php if(isset($_SESSION['email'])){?>

<?php
	$email=$_SESSION["email"];
	$sqluser="SELECT * FROM profil WHERE email='".$email."'";
	$requser = mysql_query($sqluser) or die('Erreur SQL !<br />'.$sqluser.'<br />'.mysql_error());
	$datauser=mysql_fetch_assoc($requser);
    echo '<div id="hellomonprofil">';?>
    <?php switch ($dataprofil['avatar']) {
      case '' :
      echo '<img height="250" width="250" src="http://localhost/leon/website/img/avatar.png">';
      break;
      default :
      echo '<img height="250" width="250" src="http://localhost/leon/website/photos/' .$datauser['avatar']. '">';
      break;
       }
      ?>
<?php echo'<p>Bonjour ' .$datauser['pseudo']. '!<br/>
Que voulez-vous faire ?</p>

</div>';
    include('headerprofil.php');
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
    <style>#rest {min-height:750px;}</style>
<!--<style>footer {position: fixed; bottom:0}</style>-->
<?php include('footer.php');?>