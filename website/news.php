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
                        ?><br/><br/><br/><br/><br/><br/>
                        <div class="row">
                        <p>
                            <?php switch ($donnees['avatar']) {
                                case '' :
                                    echo '<div class="col-lg-1"><img class="img-circle event-user-avatar" src="http://localhost/leon/website/img/avatar.png"></div>';
                                    break;
                                default :
                                    echo '<div class="col-lg-1"><img class="img-circle event-user-avatar" src="http://localhost/leon/website/photos/' . $donnees['avatar'] . '"></div>';
                                    break;
                            }
                            ?>
                        </p>
                        <!--                        <h3>Evenement &eacute;crite le : --><?php //echo $donnees['date_news']; ?><!--</h3>-->
                        <div class="col-lg-11">
                            <p class="event-title text-left"><?php echo $donnees['titre_news']; ?>
                                / <?php echo $donnees['heuredejeu']; ?></p>
                            <p class="event-pseudo text-left"><?php echo $donnees['pseudo']; ?></p>
                            <p class="event-city text-left"><a target="_blank"
                                                               href="https://www.google.fr/maps/place/<?php echo $donnees['ville_news']; ?>"><?php echo $donnees['ville_news']; ?></a>,
                                Ile-de-France, France / ☆☆☆☆☆ (14 commentaires)
                            </p>
                        </div>

                        </div>
                        <div class="col-lg-8">
                            <img class="event-photo"
                                 src="http://localhost/leon/website/photos/<?php echo $donnees['photo']; ?>">
                        </div>
                        <div class="col-lg-4">
                            <p class="event-att-number"><i class="fa fa-user" aria-hidden="true"></i><i
                                    class="fa fa-user"
                                    aria-hidden="true"></i><i
                                    class="fa fa-user" aria-hidden="true"></i> Plus
                                que <?php echo $donnees['nb_participants']; ?> places !</p>
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

                                    <div class="col-lg-8 text-left"><p>Frais de Service <i class="fa fa-question-circle"
                                                                                           aria-hidden="true"></i></p>
                                    </div>
                                    <div class="col-lg-4 text-right"><p>0,50 &euro;</p></div>
                                </div>
                                <div class="col-lg-12 event-section">
                                    <div class="col-lg-8 text-left"><p>Total <i class="fa fa-question-circle"
                                                                                aria-hidden="true"></i></p></div>
                                    <div class="col-lg-4 text-right"><p><?php echo $donnees['prix']; ?> &euro;</p></div>
                                </div>

                            </div>
                            <?php if (isset($_SESSION['email'])) {?>
                            <div class="event-reserver"><a href="http://localhost/leon/website/paypal.php">Réserver</a></div>
                            <?php }else{?>
                                <div class="event-reserver"><a href="http://localhost/leon/website/connexion.php">Connexion/Inscription</a></div>
                            <?php }?>
                        </div>

                        <!--                        <p>--><?php //echo $donnees['adresse_news']; ?><!--</p>-->
                        <p><?php echo $donnees['nb_participants']; ?> Playcers</p>
                        <p><?php echo $donnees['typedejeu']; ?></p>
                        <p><?php echo $donnees['jeu']; ?></p>
                        <p><?php echo $donnees['typedesoiree']; ?></p>
                        <p class="event-att-number"><i class="fa fa-user" aria-hidden="true"></i><i class="fa fa-user"
                                                                                                    aria-hidden="true"></i><i
                                class="fa fa-user" aria-hidden="true"></i> Plus
                            que <?php echo $donnees['nb_participants']; ?> places !</p>
                        <p><?php echo $donnees['datedejeu']; ?></p>
                        <p></p>
                        <p>Contenu : <?php echo $donnees['contenu_news']; ?></p>
                        <?php
                    }
                    $req->closeCursor();
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>