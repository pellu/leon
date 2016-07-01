<?php session_start();?>
<?php include('menu.php');?>
<br><br><br><br><br><br><br><br>
<?php
if(isset($_POST['email'])){
  $email=$_POST['email'];
}else{$email="";}

if (isset($_POST['envoi']) AND ($_POST['email'])){
	echo 'Vous recevrez un mail avec un lien';
}
else{
	// afficher le formulaire
	echo '
		<form method="post" action="">
				<div class="input-group col-lg-12 contact-form">
				<label class="col-lg-4 col-md-4 col-sm-4 col-xs-4" for="email">Email</label><input class="col-lg-8 col-md-8 col-sm-8 col-xs-8" type="text" id="email" name="email" value="'.stripslashes($email).'" tabindex="2" /><br></div>
				<div class="input-group col-lg-12 contact-form">
				<input class="col-lg-4 col-lg-offset-8 col-md-4 col-md-offset-8 col-sm-6 col-sm-offset-6 col-xs-6 right" type="submit" name="envoi" value="Envoyer le formulaire" /><br/><br/><br/><br/></div>
		</form>
					</div>
		<div class="col-lg-4 col-md-4 hidden-sm hidden-xs" id="droite">
		</div>
	';
}
?>
<?php include('footer.php');?>