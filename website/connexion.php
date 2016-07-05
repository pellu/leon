<?php session_start(); ?>
<?php include('menu.php');
require('steamauth/steamauth.php');
?>
<?php
//Si lutilisateur est connecte, on le deconecte
if (isset($_SESSION['email'])) {
    header("Location:monprofil.php");
    ?>


    <?php
} else {
    $oemail = '';
    //On verifie si le formulaire a ete envoye
    if (isset($_POST['email'], $_POST['pass'])) {
        //On echappe les variables pour pouvoir les mettre dans des requetes SQL
        if (get_magic_quotes_gpc()) {
            $oemail = stripslashes($_POST['email']);
            $email = mysql_real_escape_string(stripslashes($_POST['email']));
            $pass = stripslashes($_POST['pass']);
        } else {
            $email = mysql_real_escape_string($_POST['email']);
            $pass = sha1($_POST['pass']);
        }
        //On recupere le mot de passe de lutilisateur
        $req = mysql_query('SELECT pass,id from profil where email="' . $email . '"');
        $dn = mysql_fetch_array($req);
        //On le compare a celui quil a entre et on verifie si le membre existe
        if ($dn['pass'] == $pass and mysql_num_rows($req) > 0) {
            //Si le mot de passe es bon, on ne vas pas afficher le formulaire
            $form = false;
            //On enregistre son email dans la session email et son identifiant dans la session userid
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['userid'] = $dn['id'];
            header("location:monprofil.php");
            ?>
            <?php
        } else {
            //Sinon, on indique que la combinaison nest pas bonne
            $form = true;
            $message = 'La combinaison que vous avez entr&eacute; n\'est pas bonne.';
        }
    } else {
        $form = true;
    }
    if ($form) {
        //On affiche un message sil y a lieu
        if (isset($message)) {
            echo '<div class="message">' . $message . '</div>';
        }
        //On affiche le formulaire
        ?>
        <section id="rest" class="container-fluid content-section text-center">
        <div class="row">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12' id="formulaire">
        <form action="" method="post">
            <h1 class="text-center">Se connecter</h1>
            <p class="text-center">Veuillez entrer vos identifiants pour vous connecter:</p><br/>
            <div class="center">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5 text-right"><h2><label for="email">Email</label>
                        </h2></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7 text-left"><input type="text"
                                                                                      name="email"
                                                                                      id="email"
                                                                                      value="<?php echo htmlentities($oemail, ENT_QUOTES, 'UTF-8'); ?>"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5 text-right"><h2><label for="pass">Mot
                                de passe</label></h2></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7 text-left"><input type="password"
                                                                                      name="pass"
                                                                                      id="pass"/></div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 col-lg-offset-4">

                    </div>
                </div>
                <input type="submit" value="Connexion"/>
        </form>

        <?php
    }
}
?>  <a href="motdepasseoublie.php">J'ai oubli&eacute; mon mot de passe</a><br/>
    <a href="inscription.php">Je souhaite m'inscrire avec un mail</a>
<?php
if (!isset($_SESSION['steamid'])) {
    echo "<div style='margin: 10px auto; text-align: center;'><p>Vous pouvez vous connecter via steam</p>";
    loginbutton();
    echo "</div>";
} else {
    header("Location:http://localhost/leon/website/inscriptionsteam.php");
} ?>
    </div>
    </div>
    </div>
    </section>

<?php include('footer.php'); ?>