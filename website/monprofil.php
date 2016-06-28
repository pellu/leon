<?php session_start();?>
<?php include('header.php');include('config.php');?>
<section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-12 col-ls-12 col-xs-12">
    <br><br><br><br><br>
<?php

//On verifie si lutilisateur est connecte
if(isset($_SESSION['email']))
{
	echo $_SESSION['email'];
	//On verifie si le formulaire a ete envoye
	if(isset($_POST['pseudo'], $_POST['pass'], $_POST['passverif'], $_POST['email'], $_POST['avatar']))
	{
		//On enleve lechappement si get_magic_quotes_gpc est active
		if(get_magic_quotes_gpc())
		{
			$_POST['pseudo'] = stripslashes($_POST['pseudo']);
			$_POST['pass'] = stripslashes($_POST['pass']);
			$_POST['passverif'] = stripslashes($_POST['passverif']);
			$_POST['email'] = stripslashes($_POST['email']);
			$_POST['avatar'] = stripslashes($_POST['avatar']);
		}
		//On verifie si le mot de passe et celui de la verification sont identiques
		if($_POST['pass']==$_POST['passverif'])
		{
			//On verifie si le mot de passe a 6 caracteres ou plus
			if(strlen($_POST['pass'])>=6)
			{
				//On verifie si lemail est valide
				if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
				{
					//On echape les variables pour pouvoir les mettre dans une requette SQL
					$pseudo = mysql_real_escape_string($_POST['pseudo']);
					$pass = mysql_real_escape_string(sha1($_POST['passverif']));
					$email = mysql_real_escape_string($_POST['email']);
					$avatar = mysql_real_escape_string($_POST['avatar']);
					//On verifie sil ny a pas deja un utilisateur inscrit avec le pseudo choisis
					$dn = mysql_fetch_array(mysql_query('SELECT count(*) AS nb FROM profil WHERE email="'.$email.'"'));
					//On verifie si le pseudo a ete modifie pour un autre et que celui-ci n'est pas deja utilise
					if($dn['nb']==0 or $_POST['pseudo']==$_SESSION['email'])
					{
						//On modifie les informations de lutilisateur avec les nouvelles
						if(mysql_query('UPDATE profil SET pseudo="'.$pseudo.'", pass="'.$pass.'", email="'.$email.'", avatar="'.$avatar.'" where id="'.mysql_real_escape_string($_SESSION['userid']).'"'))
						{
							//Si ca a fonctionne, on naffiche pas le formulaire
							$form = false;
							//On supprime les sessions pseudo et userid au cas ou il aurait modifie son pseudo
							unset($_SESSION['pseudo'], $_SESSION['userid']);
?>
<div class="message">Vos informations ont bien &eacute;t&eacute; modifif&eacute;e. Vous devez vous reconnecter.<br />
<a href="connexion.php">Se connecter</a></div>
<?php
						}
						else
						{
							//Sinon on dit quil y a eu une erreur
							$form = true;
							$message = 'Une erreur est survenue lors des modifications.';
						}
					}
					else
					{
						//Sinon, on dit que le pseudo voulu est deja pris
						$form = true;
						$message = 'Un autre utilisateur utilise d&eacute;j&agrave; le nom d\'utilisateur que vous d&eacute;sirez utiliser.';
					}
				}
				else
				{
					//Sinon, on dit que lemail nest pas valide
					$form = true;
					$message = 'L\'email que vous avez entr&eacute; n\'est pas valide.';
				}
			}
			else
			{
				//Sinon, on dit que le mot de passe nest pas assez long
				$form = true;
				$message = 'Le mot de passe que vous avez entr&eacute; contien moins de 6 caract&egrave;res.';
			}
		}
		else
		{
			//Sinon, on dit que les mots de passes ne sont pas identiques
			$form = true;
			$message = 'Les mot de passe que vous avez entr&eacute; ne sont pas identiques.';
		}
	}
	else
	{
		$form = true;
	}
	if($form)
	{
		//On affiche un message sil y a lieu
		if(isset($message))
		{
			echo '<strong>'.$message.'</strong>';
		}
		//Si le formulaire a deja ete envoye on recupere les donnes que lutilisateur avait deja insere
		if(isset($_POST['pseudo'],$_POST['pass'],$_POST['email']))
		{
			$pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, 'UTF-8');
			if($_POST['pass']==$_POST['passverif'])
			{
				$pass = htmlentities($_POST['pass'], ENT_QUOTES, 'UTF-8');
			}
			else
			{
				$pass = '';
			}
			$email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
			$avatar = htmlentities($_POST['avatar'], ENT_QUOTES, 'UTF-8');
		}
		else
		{
			//Sinon, on affiche les donnes a partir de la base de donnee
			$dnn = mysql_fetch_array(mysql_query('SELECT pseudo,pass,email,avatar FROM profil WHERE pseudo="'.$_SESSION['email'].'"'));
			$pseudo = htmlentities($dnn['pseudo'], ENT_QUOTES, 'UTF-8');
			$pass = htmlentities($dnn['pass'], ENT_QUOTES, 'UTF-8');
			$email = htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8');
			$avatar = htmlentities($dnn['avatar'], ENT_QUOTES, 'UTF-8');
		}
		//On affiche le formulaire
?>
<div class="content">
    <form action="" method="post">
        Vous pouvez modifier vos informations:<br />
        <div class="center">
            <label for="pseudo">Nom d'utilisateur</label><input type="text" name="pseudo" id="pseudo" value="<?php echo $pseudo; ?>" /><br />
            <label for="pass">Mot de passe<span class="small">(6 caract&egrave;res min.)</span></label><input type="password" name="pass" id="pass" value="<?php echo $pass; ?>" /><br />
            <label for="passverif">Mot de passe<span class="small">(v&eacute;rification)</span></label><input type="password" name="passverif" id="passverif" value="<?php echo $pass; ?>" /><br />
            <label for="email">Email</label><input type="text" name="email" id="email" value="<?php echo $email; ?>" /><br />
            <label for="avatar">Image perso<span class="small">(facultatif)</span></label><input type="text" name="avatar" id="avatar" value="<?php echo $avatar; ?>" /><br />
            <input type="submit" value="Envoyer" />
        </div>
    </form>
</div>

<a href="deconnexion.php">Je me déconnecte</a> (Vous serez déconnecté à la fermeture de votre navigateur)

<?php
	}
}
else
{
?>
<div class="message">Pour acc&eacute;der &agrave; cette page, vous devez &ecirc;tre connect&eacute;.<br />
<a href="connexion.php">Se connecter</a></div>
<?php
}
?>
</div></div></section>
<?php include('footer.php');?>