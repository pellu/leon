<?php session_start(); ?>
<?php include('menu.php');
if (isset($_SESSION['email'])) {
    header('content-type: text/html; charset=UTF-8');
    ?>
    <section id="rest" class="container-fluid content-section text-center">
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12' id="formulaire">
                    <?php include('headerprofil.php'); ?>
                    <form action="" method="post">
                        <h1>Je contacte l'utilisateur...</h1>
                        <input type="hidden" id="pseudo" name="pseudo" value="'.stripslashes($pseudo).'" tabindex="1"/>

                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right"><h2><label for="pseudo">Mon
                                        pseudo</label>
                                </h2></div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left"><input
                                    class="col-lg-8 col-md-8 col-sm-8 col-xs-8" type="text" id="pseudo" name="pseudo"
                                    value="Je suis..." tabindex="1"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right"><h2><label for="pseudo">Celui de
                                        la personne concernée</label>
                                </h2></div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left"><input
                                    class="col-lg-8 col-md-8 col-sm-8 col-xs-8" type="text" id="pseudo" name="pseudo"
                                    value="Je contacte l'utilisateur..." tabindex="1"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right"><h2><label>Mon message</label>
                                </h2></div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
                                <textarea rows="8" cols="50" class="col-lg-8" type="text" for="message" id="message" name="message" placeholder="Je vous contactes car ..."></textarea>
                            </div>
                        </div>
                        <input type="submit" name="envoi" value="Envoyer le formulaire"/>
                    </form>
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