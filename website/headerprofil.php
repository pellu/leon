<?php
$nb_new_pm = mysql_fetch_array(mysql_query('SELECT count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<a href="http://localhost/leon/website/profil/url-<?php echo $_SESSION['userid'] ?>"?><button class="btn btn-default" type="submit">Visualiser mon profil</button></a>
<a href="ajouterannonce.php"?><button class="btn btn-default" type="submit">Annonces</button></a>
<a href="modifiermonprofil.php"?><button class="btn btn-default" type="submit">Modifier mon profil</button></a>
<a href="message_liste.php"?><button class="btn btn-default" type="submit">Ma messagerie <?php echo '('.$nb_new_pm. ')' ?></button></a>
<a href="deconnexion.php"?><button class="btn btn-default" type="submit">Se déconnecter</button></a>
<br/><br/>