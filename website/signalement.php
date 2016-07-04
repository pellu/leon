<?php session_start(); ?>
<?php include('menu.php');
if (isset($_SESSION['email'])) {
    header('content-type: text/html; charset=UTF-8');

// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
$destinataire = 'contact@letsplayce.com';
// copie ? (envoie une copie au visiteur)
$copie = 'oui';
// Action du formulaire (si votre page a des paramètres dans l'URL)
// si cette page est index.php?page=contact alors mettez index.php?page=contact
// sinon, laissez vide
$form_action = '';
// Messages de confirmation du mail
$message_envoye = 'Votre message nous est bien parvenu !<br/> Nous prenons en compte votre demande.';
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";
// Message d'erreur du formulaire
$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";
/*
    ********************************************************************************************
    FIN DE LA CONFIGURATION
    ********************************************************************************************
*/
 
/*
 * cette fonction sert à nettoyer et enregistrer un texte
 */
function Rec($text)
{
    $text = htmlspecialchars(trim($text), ENT_QUOTES);
    if (1 === get_magic_quotes_gpc())
    {
        $text = stripslashes($text);
    }
 
    $text = nl2br($text);
    return $text;
};

/*
 * Cette fonction sert à vérifier la syntaxe d'un email
 */
function IsEmail($email)
{
    $value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
    return (($value === 0) || ($value === false)) ? false : true;
}

// formulaire envoyé, on récupère tous les champs.

//Pour l'USER qui signale
$id_profil=$_SESSION["userid"];
$sql = "SELECT * FROM profil WHERE id=$id_profil";
$resultsql = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
$resultsql = mysql_fetch_array($resultsql);
$signaluser=$resultsqlb['pseudo'];
//Pour l'USER signalé
$idpour = $_GET['id'];
$sqlb = "SELECT * FROM profil WHERE id=$idpour";
$resultsqlb = mysql_query($sqlb) or die('Erreur SQL !<br />' . $sqlb . '<br />' . mysql_error());
$resultsqlb = mysql_fetch_array($resultsqlb);
?>
    <section id="rest" class="container-fluid content-section text-center" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id='rest'>
                <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12' id="formulaire">
                    <form action="" method="post">
                        <?php include('headerprofil.php'); ?>
                        <h1 class="text-center">Signalement de l'utilisateur <?php echo $resultsqlb['pseudo']; ?></h1>
<?php
$pseudo   = (isset($_POST['pseudo']))  ? Rec($_POST['pseudo'])  : $resultsql['pseudo'];
$email    = (isset($_POST['email']))   ? Rec($_POST['email'])   : $_SESSION['email'];
$objet    = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : 'Je signal l\'utilisateur '.$resultsqlb['pseudo'];
$message  = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
// On va vérifier les variables et l'email ...
$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
$err_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin

if (isset($_POST['envoi']))
{
    if (($pseudo != '') && ($email != '') && ($objet != '') && ($message != ''))
    {
            $message=htmlentities($message,ENT_QUOTES,'UTF-8');
            // les 4 variables sont remplies, on génère puis envoie le mail
            $headers  = 'Ma demande: '.$objet.' '. "\r\n" . 'Informations : '.$pseudo.' / '.$email.'' . "\r\n" . 
            'Mon message : ' .$message. '' . "\r\n";
            
        //$headers .= 'Reply-To: '.$email. "\r\n" ;
        //$headers .= 'X-Mailer:PHP/'.phpversion();

        // envoyer une copie au visiteur ?
        if ($copie == 'non')
        {
            $cible = $destinataire.','.$email;
        }
        else
        {
            $cible = $destinataire;
        };
 
        // Envoi du mail
        if (mail($cible, $objet, $headers))
        {
            echo '<p style="text-align:center;">'.$message_envoye.'</p>';
        }
        else
        {
            echo '<p style="text-align:center;">'.$message_non_envoye.'</p>';
        };
    }
    else
    {
        // une des 3 variables (ou plus) est vide ...
        echo '<p style="text-align:center;">'.$message_formulaire_invalide.'</p>';
        $err_formulaire = true;
    };
}; // fin du if (!isset($_POST['envoi']))
if (($err_formulaire) || (!isset($_POST['envoi'])))
{
    // afficher le formulaire
    echo '
        <form method="post" action="'.$form_action.'">
                        <input type="hidden" id="pseudo" name="pseudo" value="'.stripslashes($pseudo).'" tabindex="1"/>
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right"><h2><label for="pseudo">Celui de la personne concernée</label>
                                </h2></div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left"><input
                                    class="col-lg-8 col-md-8 col-sm-8 col-xs-8" type="text" id="pseudo" name="pseudo"
                                    value="'.stripslashes($objet).'" tabindex="1" disabled="disabled"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right"><h2><label>Mon message</label>
                                </h2></div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left"><textarea rows="8" cols="50" class="col-lg-8" type="text" for="message" id="message" name="message" placeholder="Je signal l\'utilisateur car...">'.stripslashes($message).'</textarea>
                            </div>
                        </div>
                    <input type="submit" name="envoi" value="Envoyer" />
                </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    ';
?>
    <?php
}
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