<?php session_start(); ?>
<?php include('menu.php'); ?>
    <section id="rest" class="container-fluid content-section text-center">
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12' id="formulaire">
                    <br><br><br><br><br>
                    <?php
                    //On verifie si lutilisateur est connecte
                    if (isset($_SESSION['email'])){
                    include('headerprofil.php');
                    //On verifie que lidentifiant de la discution est defini
                    if (isset($_GET['id']))
                    {
                    $id = intval($_GET['id']);
                    //On recupere le titre et les narateurs de la discution
                    $req1 = mysql_query('SELECT title, user1, user2 from pm where id="' . $id . '" and id2="1"');
                    $dn1 = mysql_fetch_array($req1);
                    //On verifie que la discution existe
                    if (mysql_num_rows($req1) == 1)
                    {
                    //On verifie que lutilisateur a le droit dafficher les messages
                    if ($dn1['user1'] == $_SESSION['userid'] or $dn1['user2'] == $_SESSION['userid'])
                    {
                    //La discution sera placee dans les messages lus
                    if ($dn1['user1'] == $_SESSION['userid']) {
                        mysql_query('update pm set user1read="yes" where id="' . $id . '" and id2="1"');
                        $user_partic = 2;
                    } else {
                        mysql_query('update pm set user2read="yes" where id="' . $id . '" and id2="1"');
                        $user_partic = 1;
                    }
                    //On recupere la liste des messages
                    $req2 = mysql_query('SELECT pm.timestamp, pm.message, profil.id as userid, profil.pseudo, profil.avatar from pm, profil where pm.id="' . $id . '" AND profil.id=pm.user1 ORDER BY pm.id2');
                    //On verifie si lutilisateur a valide le formulaire de reponse
                    if (isset($_POST['message']) and $_POST['message'] != '')
                    {
                        $message = $_POST['message'];
                        //On enleve lechappement si get_magic_quotes_gpc est active
                        if (get_magic_quotes_gpc()) {
                            $message = stripslashes($message);
                        }
                        //On echape le message pour pouvoir le mettre dans une requette SQL
                        $message = mysql_real_escape_string(nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
                        //On envoi la reponse et le statut de la discution passe a non-lu pour lautre utilisateur
                        if (mysql_query('INSERT into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("' . $id . '", "' . (intval(mysql_num_rows($req2)) + 1) . '", "", "' . $_SESSION['userid'] . '", "", "' . $message . '", "' . time() . '", "", "")') and mysql_query('UPDATE pm set user' . $user_partic . 'read="yes" where id="' . $id . '" and id2="1"')) {
                            ?>
                            <div class="message"><p>Votre message a bien &eacute;t&eacute; envoy&eacute;.</p><br/>
                                <a href="message_lire.php?id=<?php echo $id; ?>"><p>Retour &agrave; la discussion</p>
                                </a></div>
                            <?php
                        } else {
                            ?>
                            <div class="message"><p>Une erreur c'est produite lors de l'envoi du message.</p><br/>
                                <a href="message_lire.php?id=<?php echo $id; ?>"><p>Retour &agrave; la discussion</p>
                                </a></div>
                            <?php
                        }
                    }
                    else
                    {
                    //On affiche la liste des messages
                    ?>
                    <div class="row">
                        <div class="col-lg-12 col-ms-12 col-sm-12 col-xs-12">
                            <h1><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></h1><br/>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                            <h2>Utilisateur</h2>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                            <h2>Date d'envoi</h2>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 text-left">
                            <h2>Message</h2>
                        </div>
                    </div>
                    <br>
                    <?php
                    while ($dn2 = mysql_fetch_array($req2)) {
                        ?>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                <?php
                                switch ($dn2['avatar']) {
                                    case '' :
                                        echo '<img src="http://localhost/leon/website/img/avatar.png" class="img-circle" style="max-width:100px;max-height:100px;"" alt="Image Perso">';
                                        break;
                                    default :
                                        echo '<img src="http://localhost/leon/website/photos/' . htmlentities($dn2['avatar']) . '" class="img-circle" style="max-width:100px;max-height:100px;"" alt="Image Perso">';
                                        break;
                                }
                                ?>
                                <br><a target="_blank"
                                       href="http://localhost/leon/website/profil/<?php echo $dn2['pseudo'] ?>-<?php echo $dn2['userid'] ?>"><?php echo $dn2['pseudo']; ?></a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                <p><?php echo date('d/m/Y', $dn2['timestamp']); ?>
                                    <br/>&agrave; <?php echo date('H:i:s', $dn2['timestamp']); ?></p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 text-left">
                                <p><?php echo $dn2['message']; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                    //On affiche le formulaire de reponse
                    ?><br/><br/><br/><br/>
                    <h2>R&eacute;pondre</h2>
                    <div class="center">
                        <form method="post" action="message_lire.php?id=<?php echo $id; ?>">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right"><h2><label for="message"
                                                                                                       class="center">Message</label>
                                    </h2></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left"><textarea cols="40" rows="5"
                                                                                                     name="message"
                                                                                                     id="message"></textarea>
                                </div>
                            </div>
                            <input type="submit" value="Envoyer"/>
                        </form>
                    </div>


                </div>
                <?php
                }
                }
                else {
                    echo '<div class="message"><p>Vous n\'avez pas le droit d\'acc&eacute;der &agrave; cette page.</p></div>';
                }
                }
                else {
                    echo '<div class="message"><p>Ce message n\'existe pas.</p></div>';
                }
                }
                else {
                    echo '<div class="message"><p></p>L\'identifiant du message n\'est pas d&eacute;fini.</p></div>';
                }
                } else {
                    ?>
                    <br><br><br><br><br>
                    <section id="rest" class="container-fluid content-section text-center">
                        <div class="row">
                            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12'
                                     id="formulaire">
                                    <div class="message"><h1>Vous devez &ecirc;tre connect&eacute;(e).<br>pour
                                            visualiser ce contenu</h1><br/>
                                        <a href="connexion.php">Se connecter</a></div>
                                    <br><br><br>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                }
                ?>
            </div>
        </div>
        </div></section>
<?php include('footer.php'); ?>