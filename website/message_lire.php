<?php session_start();?>
<?php include('header.php'); include('config.php');?>
<section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-12 col-ls-12 col-xs-12">
    <br><br><br><br><br>
<?php
//On verifie si lutilisateur est connecte
if(isset($_SESSION['email'])){
	include('headerprofil.php');
//On verifie que lidentifiant de la discution est defini
if(isset($_GET['id']))
{
$id = intval($_GET['id']);
//On recupere le titre et les narateurs de la discution
$req1 = mysql_query('SELECT title, user1, user2 from pm where id="'.$id.'" and id2="1"');
$dn1 = mysql_fetch_array($req1);
//On verifie que la discution existe
if(mysql_num_rows($req1)==1)
{
//On verifie que lutilisateur a le droit dafficher les messages
if($dn1['user1']==$_SESSION['userid'] or $dn1['user2']==$_SESSION['userid'])
{
//La discution sera placee dans les messages lus
if($dn1['user1']==$_SESSION['userid'])
{
	mysql_query('update pm set user1read="yes" where id="'.$id.'" and id2="1"');
	$user_partic = 2;
}
else
{
	mysql_query('update pm set user2read="yes" where id="'.$id.'" and id2="1"');
	$user_partic = 1;
}
//On recupere la liste des messages
$req2 = mysql_query('SELECT pm.timestamp, pm.message, profil.id as userid, profil.pseudo, profil.avatar from pm, profil where pm.id="'.$id.'" AND profil.id=pm.user1 ORDER BY pm.id2');
//On verifie si lutilisateur a valide le formulaire de reponse
if(isset($_POST['message']) and $_POST['message']!='')
{
	$message = $_POST['message'];
	//On enleve lechappement si get_magic_quotes_gpc est active
	if(get_magic_quotes_gpc())
	{
		$message = stripslashes($message);
	}
	//On echape le message pour pouvoir le mettre dans une requette SQL
	$message = mysql_real_escape_string(nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
	//On envoi la reponse et le statut de la discution passe a non-lu pour lautre utilisateur
	if(mysql_query('INSERT into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "'.(intval(mysql_num_rows($req2))+1).'", "", "'.$_SESSION['userid'].'", "", "'.$message.'", "'.time().'", "", "")') and mysql_query('UPDATE pm set user'.$user_partic.'read="yes" where id="'.$id.'" and id2="1"'))
	{
?>
<div class="message">Votre message a bien &eacute;t&eacute; envoy&eacute;.<br />
<a href="read_pm.php?id=<?php echo $id; ?>">Retour &agrave; la discussion</a></div>
<?php
	}
	else
	{
?>
<div class="message">Une erreur c'est produite lors de l'envoi du message.<br />
<a href="read_pm.php?id=<?php echo $id; ?>">Retour &agrave; la discussion</a></div>
<?php
	}
}
else
{
//On affiche la liste des messages
?>
<div class="row">
	<div class="col-lg-2 col-ms-2 col-sm-2 col-xs-12">
	</div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		Utilisateur
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		Date d'envoi
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		Message
	</div>
	<div class="col-lg-2 col-ms-2 col-sm-2 col-xs-12">
	</div>
</div>
<br>
<?php
while($dn2 = mysql_fetch_array($req2))
{
?>
<div class="row">
	<div class="col-lg-2 col-ms-2 col-sm-2 col-xs-12">
	</div>
    <div class="col-lg-2 col-ms-2 col-sm-2 col-xs-12">
		<?php
			if($dn2['avatar']!='')
			{
				echo '<img src="http://localhost/leon/website/photos/'.htmlentities($dn2['avatar']).'" alt="Image Perso" style="max-width:100px;max-height:100px;" />';
			}
		?>
		<br><a target="_blank" href="http://localhost/leon/website/profil/<?php echo $dn2['pseudo']?>-<?php echo $dn2['userid']?>"><?php echo $dn2['pseudo']; ?></a>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<?php echo date('d/m/Y', $dn2['timestamp']); ?><br><?php echo date('H:i:s', $dn2['timestamp']); ?>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<?php echo $dn2['message']; ?>
	</div>
	<div class="col-lg-2 col-ms-2 col-sm-2 col-xs-12">
	</div>
</div>
<?php
}
//On affiche le formulaire de reponse
?>
<h2>R&eacute;pondre</h2>
<div class="center">
    <form action="read_pm.php?id=<?php echo $id; ?>" method="post">
    	<label for="message" class="center">Message</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" value="Envoyer" />
    </form>
</div>
</div>
<?php
}
}
else
{
	echo '<div class="message">Vous n\'avez pas le droit d\'acc&eacute;der &agrave; cette page.</div>';
}
}
else
{
	echo '<div class="message">Ce message n\'existe pas.</div>';
}
}
else
{
	echo '<div class="message">L\'identifiant du message n\'est pas d&eacute;fini.</div>';
}
}
else
{
	echo '<div class="message">Vous devez &ecirc;tre connect&eacute; pour acc&eacute;der &agrave; cette page.</div>';
}
?>
</div></div></section>
<?php include('footer.php');?>