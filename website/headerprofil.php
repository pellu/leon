<?php
$nb_new_pm = mysql_fetch_array(mysql_query('SELECT count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<a href="http://localhost/leon/website/profil/url-<?php echo $_SESSION['userid'] ?>"?><button class="btn btn-default" type="submit">Visualiser mon profil</button></a>
<a href="mesannonces.php"?><button class="btn btn-default bouton-headerprofile" type="submit">Mes annonces</button></a>
<a href="modifiermonprofil.php"?><button class="btn btn-default bouton-headerprofile" type="submit">Modifier mes informations</button></a>
<a href="message_liste.php"?><button class="btn btn-default bouton-headerprofile" type="submit">Ma messagerie <?php echo '('.$nb_new_pm. ')' ?></button></a>
<a href="deconnexion.php"?><button class="btn btn-default bouton-headerprofile" type="submit">Se d&eacute;connecter</button></a>
<br/><br/>