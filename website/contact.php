<?php session_start();?>
<?php include('menu.php');?>
<section class="container-fluid content-section text-center">
  <div class="row">
    <div id="rest" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <br><br><br><br><br>
		<div class="col-lg-4 col-md-4 hidden-sm hidden-xs" id="gauche">
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	<h1 id="h4">Nous contacter</h1>
<br/>
<?php
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
if(isset($_SESSION['email'])){
$id_profil=$_SESSION["userid"];
$sql = "SELECT * FROM profil WHERE id=$id_profil";
$resultsql = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
$resultsql = mysql_fetch_array($resultsql);
$pseudo   = (isset($_POST['pseudo']))  ? Rec($_POST['pseudo'])  : $resultsql['pseudo'];
$email    = (isset($_POST['email']))   ? Rec($_POST['email'])   : $_SESSION['email'];
}else{
$pseudo   = (isset($_POST['pseudo']))  ? Rec($_POST['pseudo'])  : '';
$email    = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
}
$objet    = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
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
			echo '<p style="text-align:center; color:black;">'.$message_envoye.'</p>';
		}
		else
		{
			echo '<p style="text-align:center; color:red;">'.$message_non_envoye.'</p>';
		};
	}
	else
	{
		// une des 3 variables (ou plus) est vide ...
		echo '<p style="text-align:center; color:red;">'.$message_formulaire_invalide.'</p>';
		$err_formulaire = true;
	};
}; // fin du if (!isset($_POST['envoi']))
if (($err_formulaire) || (!isset($_POST['envoi'])))
{
	// afficher le formulaire
	echo '
		<form method="post" action="'.$form_action.'">';?>
			<?php if(isset($_SESSION['email'])){
				echo'
				<input type="hidden" id="pseudo" name="pseudo" value="'.stripslashes($pseudo).'" tabindex="1" />
				<input type="hidden" id="email" name="email" value="'.stripslashes($email).'" tabindex="2" />
				';?><?php }else{
				echo'<div class="input-group col-lg-12">
				<label class="col-lg-4 col-md-4 col-sm-4 col-xs-4" for="pseudo">Nom :</label><input class="col-lg-8 col-md-8 col-sm-8 col-xs-8" type="text" id="pseudo" name="pseudo" value="'.stripslashes($pseudo).'" tabindex="1" /><br>
				<label class="col-lg-4 col-md-4 col-sm-4 col-xs-4" for="email">Email :</label><input class="col-lg-8 col-md-8 col-sm-8 col-xs-8" type="text" id="email" name="email" value="'.stripslashes($email).'" tabindex="2" /><br></div>
				';
				}echo'<div class="input-group col-lg-12">
				<label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Objet:</label>
	      			<select class="col-lg-8 col-md-8 col-sm-8 col-xs-8" name="objet">
	        			<option style="color: #000;" value="Contact support technique">Contact support technique</option>
				        <option style="color: #000;" value="Dénonciation de profil">Dénonciation de profil</option>
				        <option style="color: #000;" value="Rapport de mauvaise rencontres">Rapport de mauvaise rencontres</option>
				        <option style="color: #000;" value="J\'ai trouvé un bug sur le site">J\'ai trouvé un bug sur le site</option>
				    </select>
				<br><br>
				<label class="col-lg-4">Mon message:</label>
				<textarea rows="8" cols="50" class="col-lg-8" type="text" for="message" id="message" name="message">'.stripslashes($message).'</textarea><br><br>
				<input class="col-lg-4 col-lg-offset-8 col-md-4 col-md-offset-8 col-sm-6 col-sm-offset-6 col-xs-6 right" type="submit" name="envoi" value="Envoyer le formulaire" /><br/><br/><br/><br/></div>
		</form>
					</div>
		<div class="col-lg-4 col-md-4 hidden-sm hidden-xs" id="droite">
		</div>
	';
}
?>
</div></div></section>

<?php include('footer.php');?>
<style> label {
		font-family: Lato;
		font-size: 16px;
		font-weight: bold;
		text-align: right;
	}
</style>
