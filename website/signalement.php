<?php session_start(); ?>
<?php include('menu.php');
if (isset($_SESSION['email'])) {
    header('content-type: text/html; charset=UTF-8');
    ?>
    <section class="container-fluid content-section text-center" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id='rest'>
                <div class='col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1'>
                    <br><br><br><br><br>
                    <?php include('headerprofil.php');?>
                    <h1>Signalement de l'utilisateur...</h1>
                    	<input type="hidden" id="pseudo" name="pseudo" value="'.stripslashes($pseudo).'" tabindex="1" />
				
				<div class="input-group col-lg-12 contact-form">
					<label class="col-lg-4 col-md-4 col-sm-4 col-xs-4" for="pseudo">Nom</label><input class="col-lg-8 col-md-8 col-sm-8 col-xs-8" type="text" id="pseudo" name="pseudo" value="Je suis..." tabindex="1" /><br>
				</div>
				<div class="input-group col-lg-12 contact-form">
					<label class="col-lg-4 col-md-4 col-sm-4 col-xs-4" for="pseudo">Nom</label><input class="col-lg-8 col-md-8 col-sm-8 col-xs-8" type="text" id="pseudo" name="pseudo" value="Je signale l'utilisateur..." tabindex="1" /><br>
				</div>
					<label class="col-lg-4">Mon message</label>
				<textarea rows="8" cols="50" class="col-lg-8" type="text" for="message" id="message" name="message">Je signale... car</textarea><br><br>
				<input class="col-lg-4 col-lg-offset-8 col-md-4 col-md-offset-8 col-sm-6 col-sm-offset-6 col-xs-6 right" type="submit" name="envoi" value="Envoyer le formulaire" /><br/><br/><br/><br/></div>
		</form>
					</div>
		<div class="col-lg-4 col-md-4 hidden-sm hidden-xs" id="droite">
		</div>
                </div>
            </div>
    </section>
    <?php
} else {
    ?>
    <br><br><br><br><br>
    <section class="container content-section text-center">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="message">Pour acc&eacute;der &agrave; cette page, vous devez &ecirc;tre
                    connect&eacute;.<br/>
                    <a href="connexion.php">Se connecter</a></div>
            </div>
        </div>
    </section>
    <?php
}
?>
<?php include('footer.php'); ?>