<?php session_start();?>
<?php include('menu.php');
?>
    <section id="rest" class="container-fluid content-section text-center">
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12' id="formulaire">
                    <br><br><br><br><br>
<?php
//On verifie que lutilisateur est connecte
if(isset($_SESSION['email']))
{
    include('headerprofil.php');
//On affiche la liste des messages de l'utilisateur sous la forme dun tableau
//Deux requettes sont executees, une pour recuperer les messages non-lus et une pour les messages lus
$req1 = mysql_query('SELECT m1.id, m1.title, m1.timestamp, count(m2.id) as reps, profil.id as userid, profil.pseudo from pm as m1, pm as m2,profil where ((m1.user1="'.$_SESSION['userid'].'" and m1.user1read="no" and profil.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="no" and profil.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
$req2 = mysql_query('SELECT m1.id, m1.title, m1.timestamp, count(m2.id) as reps, profil.id as userid, profil.pseudo from pm as m1, pm as m2,profil where ((m1.user1="'.$_SESSION['userid'].'" AND m1.user1read="yes" AND profil.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="yes" and profil.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
?>
    <h1>Messagerie</h1>
<!-- <a href="message_ecrire.php" class="link_new_pm">Nouveau message priv&eacute;</a><br />-->
<h2>Messages non-lus(<?php echo intval(mysql_num_rows($req1)); ?>):</h2>
    <div class="col-lg-12">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 title-cell"><p><strong>Objet du message</strong></p></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p><strong>Nb. réponses</strong></p></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p><strong>Participant</strong></p></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p><strong>Date d'envoi</strong></p></div>
    </div>
<?php
//On affiche la liste des messages non-lus
while($dn1 = mysql_fetch_array($req1))
{
?>
    <div class="col-lg-12">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p><a href="message_lire.php?id=<?php echo $dn1['id']; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a></p></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p><?php echo $dn1['reps']-1; ?></p></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p><a target="_blank" href="http://localhost/leon/website/profil/<?php echo $dn1['pseudo']?>-<?php echo $dn1['userid']?>"><?php echo $dn1['pseudo']; ?></a></p></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p><?php echo date('d/m/Y' ,$dn2['timestamp']); ?> &agrave; <?php echo date('H:i:s' ,$dn2['timestamp']); ?></p></div>
    </div>
<?php
}
//Sil na aucun message non-lu, on le dit
if(intval(mysql_num_rows($req1))==0)
{
?>
    <p><strong>Vous n'avez aucun message non-lu.</strong></p><br><br><br>
<?php
}
?>
<br />
<h2>Messages lus(<?php echo intval(mysql_num_rows($req2)); ?>):</h2>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 title-cell"><p><strong>Objet du message</strong></p></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p><strong>Nb. réponses</strong></p></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p><strong>Participant</strong></p></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p><strong>Date d'envoi</strong></p></div>
    </div>
<?php
//On affiche la liste des messages lus
while($dn2 = mysql_fetch_array($req2))
{
?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p><a href="message_lire.php?id=<?php echo $dn2['id']; ?>"><?php echo htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8'); ?></a></p></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p><?php echo $dn2['reps']-1; ?></p></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p><a target="_blank" href="http://localhost/leon/website/profil/url-<?php echo $dn2['userid']?>"><?php echo $dn2['pseudo']; ?></a></p></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p><?php echo date('d/m/Y' ,$dn2['timestamp']); ?> &agrave; <?php echo date('H:i:s' ,$dn2['timestamp']); ?></p></div>
    </div><br><br><br>
<?php
}
//Sil na aucun message lu, on le dit
if(intval(mysql_num_rows($req2))==0)
{
?>
	<tr>
    	<td colspan="4" class="center">Vous n'avez aucun message lu.</td><br><br><br>
    </tr>
<?php
}
?>
</table>

<?php
}else{?>
    <br><br><br><br><br>
    <section id="rest" class="container-fluid content-section text-center">
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12' id="formulaire">
                    <div class="message"><h1>Vous devez &ecirc;tre connect&eacute;(e).<br>pour visualiser ce contenu</h1><br/>
                        <a href="connexion.php">Se connecter</a></div><br><br><br>
                </div></div>
        </div>
    </section>
<?php
}
?>
</div></div></div></section>
<?php include('footer.php');?>