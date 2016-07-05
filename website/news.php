<?php session_start(); ?>
<?php include('menu.php'); ?>
<?php
header('content-type: text/html; charset=UTF-8');
?>
    <section id="about" class="container-fluid content-section text-center">
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id="rest">
                <div class='col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2'>
                    <?php
                    $id_news = $_GET["id"];
                    $req = $mysql->prepare('SELECT c.* , p.* FROM news c, profil p WHERE c.pseudo_news=p.id AND id_news="' . $id_news . '" ORDER BY c.id_news DESC LIMIT 1');
                    $req->execute(array($_GET['id']));

                    while ($donnees = $req->fetch()) {
                    ?><br/><br/><br/><br/>
                    <div class="row">
                        <p>
                            <?php switch ($donnees['avatar']) {
                                case '' :
                                    echo '<div class="col-lg-1"><a href="http://localhost/website/profil/'.$donnees["pseudo"]. '-' .$donnees["id"].'"><img class="img-circle event-user-avatar" src="http://localhost/leon/website/img/avatar.png"></a></div>';
                                    break;
                                default :
                                    echo '<div class="col-lg-1"><a href="http://localhost/website/profil/'.$donnees["pseudo"]. '-' .$donnees["id"].'"><img class="img-circle event-user-avatar" src="http://localhost/leon/website/photos/' . $donnees['avatar'] . '"></a></div>';
                                    break;
                            }
                            ?>
                        </p>
                        <div class="col-lg-11">
                            <p class="event-title text-left"><?php echo $donnees['titre_news']; ?>
                                / <?php echo $donnees['heuredejeu']; ?></p>
                            <p class="event-pseudo text-left"><a href="http://localhost/website/profil/<?php echo $donnees['pseudo']; ?>-<?php echo $donnees['id']; ?>"><?php echo $donnees['pseudo']; ?></a></p>
                            <p class="event-city text-left"><a target="_blank"
                                                               href="https://www.google.fr/maps/place/<?php echo $donnees['ville_news']; ?>"><?php echo $donnees['ville_news']; ?></a>,
                                Ile-de-France, France / 
                                <?php
                                    $sqlb = "SELECT AVG(etoiles) AS moyenne FROM comments WHERE profil_comments='".$donnees['id']."'";
                                    $reqetoiles = mysql_query($sqlb) or die('Erreur SQL !br>' . $sqlb . '<br>' . mysql_error());
                                    $rowetoiles = mysql_fetch_row($reqetoiles);
                                    $resuetoiles = round($rowetoiles[0]);
                                    $nombreoiles = $resuetoiles;

                                    switch ($nombreoiles) {
                                        case '' :
                                            echo '';
                                            break;
                                        case '1' :
                                            echo '<span class="rating"><span value="' . $nombreoiles . '">☆</span>☆☆☆☆</span>';
                                            break;
                                        case '2' :
                                            echo '<span class="rating"><span value="' . $nombreoiles . '">☆☆</span>☆☆☆</span>';
                                            break;
                                        case '3' :
                                            echo '<span class="rating"><span value="' . $nombreoiles . '">☆☆☆</span>☆☆</span>';
                                            break;
                                        case '4' :
                                            echo '<span class="rating"><span class="rating" value="' . $nombreoiles . '">☆☆☆☆</span>☆</span>';
                                            break;
                                        default :
                                            echo '<span class="rating"><span value="' . $nombreoiles . '">☆☆☆☆☆</span></span>';
                                            break;
                                    }

                                    $sqla = "SELECT COUNT(profil_comments) AS total FROM comments WHERE profil_comments='".$donnees['id']."'";
                                    $resultz = mysql_query($sqla);
                                    $rowz = mysql_fetch_row($resultz);
                                    $resu = $rowz[0];
                                    $nombre = $resu;

                                    switch ($nombre) {
                                        case '0' :
                                            echo ' (Pas encore de commentaires)';
                                            break;
                                        case '1' :
                                            echo ' ('.$nombre . ' commentaire)';
                                            break;
                                        default :
                                            echo ' ('.$nombre . ' commentaires)';
                                    }
                                ?>
                            </p>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <img class="event-photo img-responsive"
                             src="http://localhost/leon/website/photos/<?php echo $donnees['photo']; ?>">
                    </div>
                    <div class="col-lg-4">
                        <p class="event-att-number">
                        <?php
                            $placesquireste=$donnees['placesrestantes_news'];

                                switch ($placesquireste) {
                                    case '0' :
                                        echo 'Plus de places !';
                                        break;
                                    case '1' :
                                        echo 'Plus que '.$placesquireste. ' place !';
                                        break;
                                    default :
                                        echo 'Plus que '.$placesquireste. ' places !';
                                    }
                            ?>
                            </p>
                        <div class="event-date-price"><p
                                class="event-price"><?php echo $donnees['prix']; ?> &euro;</p>
                            <p class="event-date"><?php echo $donnees['datedejeu']; ?></p>
                        </div>
                        <div class="event-info">
                            <div class="col-lg-12 event-section">
                                <div class="col-lg-6 text-left"><p>Arrivée</p></div>
                                <div class="col-lg-6 text-right"><p>Joueurs</p></div>
                                <div class="col-lg-6 text-left"><p
                                        class="data"><?php echo $donnees['heuredejeu']; ?></p>
                                </div>
                                <div class="col-lg-6 text-right"><p class="data">1 Joueur</p><br/><br/></div>
                                <div class="col-lg-8 text-left"><p><?php echo $donnees['prix']; ?> &euro; x 1
                                        joueur</p></div>
                                <div class="col-lg-4 text-right"><p>= <?php echo $donnees['prix']; ?> &euro;</p>
                                </div>
                            </div>
                            <div class="col-lg-12 event-section">
                                <div class="col-lg-8 text-left"><p>Total <i class="fa fa-question-circle"
                                                                            aria-hidden="true"></i></p></div>
                                <div class="col-lg-4 text-right"><p><?php echo $donnees['prix']; ?> &euro;</p></div>
                            </div>

                        </div>
                        <?php if (isset($_SESSION['email'])) {
                                if ($_SESSION['userid'] != $donnees['id']) {
                                    //Savoir si l'utilisateur a déjà participé ou pas à l'évent
                                        $reqgetid="SELECT * FROM participation WHERE id_participation='" . $id_news . "'";
                                        $requsergetid = mysql_query($reqgetid) or die('Erreur SQL !<br />'.$reqgetid.'<br />'.mysql_error());
                                        $donneesgetid=mysql_fetch_assoc($requsergetid);

                                    if($_SESSION['userid'] != $donneesgetid['id_user_participation']){?>
                                        <div class="event-reserver"><a href="http://localhost/leon/website/jeparticipe.php?id=<?php echo $id_news; ?>">Réserver</a>
                                        </div>
                                    <?php }else{ ?>
                                         <div class="event-reserver">Vous participez déjà / <a href="http://localhost/leon/website/supprimerparticipation.php?id=<?php echo $id_news; ?>">Ne plus participer</a></div>
                                <?php }}else{ ?>
                                    <div class="event-reserver">C'est votre annonce / <a href="http://localhost/leon/website/modifierannonce.php?id=<?php echo $id_news; ?>">Modifier l'annonce</a></div>
                            <?php }}else{ ?>
                                <div class="event-reserver"><a href="http://localhost/leon/website/connexion.php">Connexion/Inscription</a>
                                </div>
                        <?php } ?>
                    </div>
                    <div id="inline-img">
                        <div class="col-lg-8">
                            <div class="news-playcers"><p
                                    class="playcers-nb"><?php echo $donnees['nb_participants']; ?></p>
                                <p class="playcers">Playcers</p></div>
                            <div class="news-games"><p class="type"><?php echo $donnees['typedejeu']; ?></p></div>
                            <div class="news-game"><p class="type"><?php echo $donnees['jeu']; ?></p></div>
                            <div class="news-shield"><p class="type"><?php echo $donnees['typedesoiree']; ?></p></div>
                        </div>
                        <div class="col-lg-4">
                            <div class="event-points"><p>La participation à l’évènement  vous rapporte</p>
                                <h4>50 points</h4></div>
                            <div class="event-share col-lg-12"><p>Partager cette annonce</p>
                                <div class="col-lg-4 text-left">
                                    <?php 
                                    $adresse = 'http://localhost/leon/website/news/'.$donnees['url_news'].'-'.$donnees['id_news'];
                                    $phrase = 'Annonce: '.$donnees['titre_news']. ' de '.$donnees['pseudo'].' ! Annonce disponible sur';
                                    ?>
                                <a href="http://www.facebook.com"><a href="https://www.facebook.com/share.php?u=<?php echo $adresse;?>&title=<?php echo $phrase;?>" target="_blank">Facebook</a></div>
                                <div class="col-lg-4 text-Center"><a href="https://twitter.com/home?status=<?php echo $phrase;?>+<?php echo $adresse;?>+%23Playce+via @LetsPlayce" data-size="large" target="_blank">Twitter</a></div>
                                <div class="col-lg-4 text-right"><a href="https://plus.google.com/share?url=<?php echo $adresse;?>">Google +</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="opacitysquare-news" class="col-lg-12 col-md-12 col-xs-12">
                    <div class='col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2'>
                        <div class="col-lg-8 text-left">
                            <h2>&Agrave; propos de cette annonce</h2>
                            <p><?php echo substr($donnees['contenu_news'], 0, 800); ?></p>
                            <p>Plus d’infos en MP possibles après réservation.</p>
                        </div>
                    </div>
                </div>
                <div id="opacitysquare-news-2" class="col-lg-12 col-md-12 col-xs-12">
                    <div class='col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2'>
                        <div class="col-lg-7 text-left">
                        <?php if (isset($_SESSION['email'])) {?>
                            <?php if($_SESSION['userid'] == $donnees['id']){?>
                                <h2>C'est vous l'hébergeur</h2>
                            <?php }else{?>
                                <h2>Votre hébergeur</h2>
                            <?php }}else{?>
                                <h2>Votre hébergeur</h2>
                            <?php }?>
                            <div class="row">
                                <p>
                                    <?php switch ($donnees['avatar']) {
                                        case '' :
                                            echo '<div class="col-lg-2"><a href="http://localhost/website/profil/'.$donnees["pseudo"]. '-' .$donnees["id"].'"><img class="img-circle event-user-avatar" src="http://localhost/leon/website/img/avatar.png"></a></div>';
                                            break;
                                        default :
                                            echo '<div class="col-lg-2"><a href="http://localhost/website/profil/'.$donnees["pseudo"]. '-' .$donnees["id"].'"><img class="img-circle event-user-avatar" src="http://localhost/leon/website/photos/' . $donnees['avatar'] . '"></a></div>';
                                            break;
                                    }
                                    ?>
                                </p>
                                <div class="col-lg-10">
                                    <p class="event-pseudo text-left" id="event-pseudo-2"><a href="http://localhost/website/profil/<?php echo $donnees['pseudo']; ?>-<?php echo $donnees['id']; ?>"><?php echo $donnees['pseudo']; ?></a></p>
                                    <p class="event-city text-left"><a target="_blank"
                                                                       href="https://www.google.fr/maps/place/<?php echo $donnees['ville_news']; ?>"><?php echo $donnees['ville_news']; ?></a>,
                                        Ile-de-France, France / </p>
                                    <p class="event-city text-left">Membre depuis le <?php echo $donnees['date_inscription']; ?>
                                    </p><br/>
                                    <p class="event-city text-left"><?php echo $donnees['description']; ?>
                                    </p>
                                    <?php if (isset($_SESSION['email'])) {?>
                                    <p class="event-city text-left" id="news-contacter"><a href="http://localhost/leon/website/contactprofil.php?id=<?php echo $donnees['id'];?>">Contacter</a>
                                    </p>
                                    <?php }else{?>
                                    <p class="event-city text-left" id="news-contacter">Contacter (il faut être conecté)</a>
                                    </p>
                                    <?php }?>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-5">
                            <a target="_blank" href="https://www.google.fr/maps/place/<?php echo $donnees['ville_news']; ?>"><img id="city-map" class="img-responsive" src="http://localhost/leon/website/img/maps/<?php echo $donnees['ville_news']; ?>.png" alt="<?php echo $donnees['ville_news']; ?>"></a>
                        </div>
                    </div>
                </div>
                <?php
                }
                $req->closeCursor();
                ?>
            </div>
        </div>
        </div>
    </section>
<?php include('footer.php'); ?>