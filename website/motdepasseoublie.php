<?php session_start(); ?>
<?php include('menu.php'); ?>
    <section id="rest" class="container-fluid content-section text-center">
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12' id="formulaire">
                    <br><br><br><br><br><br>
                    <?php
                    if (isset($_POST['email'])) {
                        $email = $_POST['email'];
                    } else {
                        $email = "";
                    }

                    if (isset($_POST['envoi']) AND ($_POST['email'])) {
                        echo '<h1 class="text-center">Merci de votre confiance</h1>
<p>Vous recevrez bient&ocirc;t un mail avec un lien pour votre nouveau mot de passe</p><br><br><br><br><br>';
                    } else {
                        // afficher le formulaire
                        echo '
		<form method="post" action="">
		<h1 class="text-center">Mot de passe oublié ?</h1>
            <p class="text-center">Veuillez renseigner l\'adresse mail associée à votre compte</p><br/>
				
				<div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5 text-right"><h2><label for="email">Email</label>
                        </h2></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7 text-left"><input type="text" id="email" name="email" value="' . stripslashes($email) . '" tabindex="2" />
                    </div>
                </div>				
				<input type="submit" name="envoi" value="Envoyer" />
		</form>
	';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>