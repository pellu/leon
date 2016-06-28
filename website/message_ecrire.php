<?php session_start();?>
<?php
include('header.php');
include('config.php');
?>
<section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-12 col-ls-12 col-xs-12">
    <br><br><br><br><br>
<?php
//On verifie si lutilisateur est connecte
if(isset($_SESSION['email']))
{
$form = true;
$otitle = '';
$orecip = '';
$omessage = '';
//On verifie si le formulaire a ete valide
if(isset($_POST['title'], $_POST['recip'], $_POST['message']))
{
	$otitle = $_POST['title'];
	$orecip = $_POST['recip'];
	$omessage = $_POST['message'];
	//On enleve lechappement si get_magic_quotes_gpc est active
	if(get_magic_quotes_gpc())
	{
		$otitle = stripslashes($otitle);
		$orecip = stripslashes($orecip);
		$omessage = stripslashes($omessage);
	}
	//On verifie si tout les champs ont ete remplis
	if($_POST['title']!='' and $_POST['recip']!='' and $_POST['message']!='')
	{
		//On echappe les variables pour les utiliser dans une requette SQL
		$title = mysql_real_escape_string($otitle);
		$recip = mysql_real_escape_string($orecip);
		$message = mysql_real_escape_string(nl2br(htmlentities($omessage, ENT_QUOTES, 'UTF-8')));
		//On verifie que le destinataire existe
		$dn1 = mysql_fetch_array(mysql_query('SELECT count(id) as recip, id as recipid, (select count(*) from pm) as npm from profil where pseudo="'.$recip.'"'));
		if($dn1['recip']==1)
		{
			//On verifie que le destinataire nest pas lutilisateur meme
			if($dn1['recipid']!=$_SESSION['userid'])
			{
				$id = $dn1['npm']+1;
				//On envoi le message
				if(mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "1", "'.$title.'", "'.$_SESSION['userid'].'", "'.$dn1['recipid'].'", "'.$message.'", "'.time().'", "yes", "no")'))
				{
	?>
	<div class="message">Le message a bien &eacute;t&eacute; envoy&eacute;.<br />
	<a href="message_liste.php">Liste de mes messages priv&eacute;s</a></div>
	<?php
					$form = false;
				}
				else
				{
					//Sinon, on dit quune erreur sest produite
					$error = 'Une erreur c\'est produite lors de l\'envoi du message.';
				}
			}
			else
			{
				//Sinon, on dit quil ne peut pas envoyer un message a lui meme
				$error = 'Vous ne pouvez pas envoyer un message &agrave; vous m&ecirc;me.';
			}
		}
		else
		{
			//Sinon, on dit que le destinataire nexiste pas
			$error = 'Le destinataire de votre message n\'existe pas.';
		}
	}
	else
	{
		//Sinon on dit quun champ nest pas rempli
		$error = 'Un des champs n\'est pas rempli.';
	}
}
elseif(isset($_GET['recip']))
{
	//On recupere le nom dutilisateur si disponible
	$orecip = $_GET['recip'];
}
if($form)
{
//On affiche lerreur sil ya lieu
if(isset($error))
{
	echo '<div class="message">'.$error.'</div>';
}
//On affiche le formulaire
?>
<div class="content">
	<h1>Nouveau message priv&eacute;</h1>
    <form action="message_ecrire.php" method="post">
		Veuillez remplir ce formulaire pour envoyer le MP.<br />
        <label for="title">Titre</label><input type="text" value="<?php echo htmlentities($otitle, ENT_QUOTES, 'UTF-8'); ?>" id="title" name="title" /><br />
        <label for="recip">Destinataire<span class="small">(Nom d'utilisateur)</span></label><input type="text" value="<?php echo htmlentities($orecip, ENT_QUOTES, 'UTF-8'); ?>" id="recip" name="recip" /><br />
        <label for="message">Message</label><textarea cols="40" rows="5" id="message" name="message"><?php echo htmlentities($omessage, ENT_QUOTES, 'UTF-8'); ?></textarea><br />
        <input type="submit" value="Envoyer" />
    </form>
</div>
<?php
}
}
else
{
	echo '<div class="message">Vous devez &ecirc;tre connect&eacute; pour acc&eacute;der &agrave; cette page.</div>';
}
?>
</div></div></section>
<?php include('footer.php');?>