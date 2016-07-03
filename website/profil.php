<?php session_start(); ?>

<?php include('comment.php'); ?>
<?php
header('content-type: text/html; charset=UTF-8');
$id = $_GET["id"];
$idpageuser = $_GET["id"];
$mysql = "SELECT * FROM profil WHERE id='$id' LIMIT 1";
$req = mysql_query($mysql) or die(mysql_error() . " ERROR");
$data = mysql_fetch_assoc($req);
if (isset($data['url'])) {
    if ($data['url'] != $_GET['url']) {
        header("Location: /leon/website/profil/" . $data["url"] . "-" . $data["id"]);
    }
} else {
    header("Location: /leon/test/404.php");
}
?>
    <section id="rest" class="container-fluid content-section text-center">
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2'>
                    <div class="col-lg-3 col-md-5 col-sm-12 col-xs-12">
                        <?php switch ($data['avatar']) {
                            case '' :
                                echo '<img src="http://localhost/leon/website/img/avatar.png">';
                                break;
                            default :
                                echo '<img src="http://localhost/leon/website/photos/' . $data['avatar'] . '" height="250" width="250">';
                                break;
                        }
                        ?>
                        <img src="http://localhost/leon/website/img/verified.png" alt="Compte vérifié" height="343"
                             width="250" class="verified">
                    </div>
                    <div class="col-lg-6"><h2 id="hello" class="text-left">Bonjour, je
                            m'appelle <?php echo $data['pseudo']; ?> !</h2>
                        <p id="adresse" class="text-left"><?php echo $data['city']; ?>, Ile-de-France, France | Membre
                            depuis le <?php echo $data['date_inscription']; ?></p>
                        <p class="text-left"><a href="http://localhost/leon/website/signalement.php" class="linkmodal">Signaler ce profil</a> | <a href="http://localhost/leon/website/contactprofil.php" class="linkmodal">Contacter</a>
                        </p>
                        <p id="h5" class="text-left">Mes Annonces (2)</p>
                        <div class="row">
                            <div class="col-lg-12">
                                <!--                                <div class="col-lg-offset-1 col-lg-offset-3">-->
                                <!--                                    <img class="med-event-img" src="" height="158" alt="">-->
                                <!--                                    <div class="med-squared-title"></div>-->
                                <!--                                </div>-->
                                <div class="col-lg-6">
                                    <div class="item"><img
                                            src="http://localhost/leon/website/photos/960ba8d78d074a140514ad3db6471c95.png"
                                            alt="">
                                        <div class="overlay"><a
                                                href="#">Modifier
                                                l'annonce <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="squared-title"><a target="_blank"
                                                                  href="#">Titre de la soirée</a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="item"><img
                                            src="http://localhost/leon/website/photos/960ba8d78d074a140514ad3db6471c95.png"
                                            alt="">
                                        <div class="overlay"><a
                                                href="#">Modifier
                                                l'annonce <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="squared-title"><a target="_blank"
                                                                  href="#">Titre de la soirée</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p id="h5" class="text-left">Evènements passés (23)</p>
                        <div class="row">
                            <div class="col-lg-12">
                                <!--                                <div class="col-lg-offset-1 col-lg-offset-3">-->
                                <!--                                    <img class="med-event-img" src="" height="158" alt="">-->
                                <!--                                    <div class="med-squared-title"></div>-->
                                <!--                                </div>-->
                                <div class="col-lg-6">
                                    <div class="item"><img
                                            src="http://localhost/leon/website/photos/960ba8d78d074a140514ad3db6471c95.png"
                                            alt="">
                                        <div class="overlay"><a
                                                href="#">Modifier
                                                l'annonce <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="squared-title"><a target="_blank"
                                                                  href="#">Titre de la soirée</a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="item"><img
                                            src="http://localhost/leon/website/photos/960ba8d78d074a140514ad3db6471c95.png"
                                            alt="">
                                        <div class="overlay"><a
                                                href="#">Modifier
                                                l'annonce <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="squared-title"><a target="_blank"
                                                                  href="#">Titre de la soirée</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p id="h5" class="text-left">&Agrave; propos de <?php echo $data['pseudo']; ?></p>
                        <p class="text-left" id="adresse"><?php echo $data['description']; ?></p>
                    </div>
                    <div class="col-lg-3">
                        <img src="http://localhost/leon/website/img/PS.png" alt="Controller Gaming" id="controller"
                             width="100%">
                    </div>
                </div>
                <div id="opacitysquare-news-2" class="col-lg-12 col-md-12 col-xs-12">
                    <div class='col-lg-6 col-md-12 col-sm-12 col-xs-12 col-lg-offset-4'>
                        <div class="col-lg-7 text-left">
                            <h2>Ce que pensent les utilisateurs de <?php echo $data['pseudo']; ?> :</h2>
                            <p>7 commentaires /  ☆☆☆☆☆</p>
                        </div>
                    </div>
                </div>
                <div id="rest" class="col-lg-12 col-md-12 col-xs-12">
                    <div class='col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-5' id="profil-comments">
                        <div class="col-lg-7 text-left">
                            <div class="col-lg-4 text-center">
                                <img src="http://localhost/leon/website/img/avatar-comments.png" alt="">
                                <h3><?php echo $data['pseudo']; ?></h3>
                            </div>
                            <div class="col-lg-8">
                                <p><?php echo $data['description']; ?></p>
                                <p>☆☆☆☆☆</p>
                                <p>Participant &bull; Posté le XX/XX/2016</p>
                            </div>
                        </div>
                        <div class="col-lg-12" id="comment-circuit"></div>
                    </div>
                </div>


            </div>
        </div>
    </section>
<?php if (isset($_SESSION['email'])) {
    if ($_SESSION['userid'] != $idpageuser) {
        ?>

        <section class="container content-section text-center">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form method="POST" action="">
                        <input type="hidden" name="pseudo" value="<?php echo $profil_comments ?>">
                        <input type="hidden" name="profil" value="<?php echo $id ?>">
                        <label>Commentaire: <textarea name="comments"/><?php echo $comments ?></textarea></label><br/>
                        <label>Note:
                            <div class="rating">
                                <input name="etoiles" type="checkbox" id="e5" value="5"><label for="e5">☆</label>
                                <input name="etoiles" type="checkbox" id="e4" value="4"><label for="e4">☆</label>
                                <input name="etoiles" type="checkbox" id="e3" value="3"><label for="e3">☆</label>
                                <input name="etoiles" type="checkbox" id="e2" value="2"><label for="e2">☆</label>
                                <input name="etoiles" type="checkbox" id="e1" value="1"><label for="e1">☆</label>
                            </div>
                        </label>
                        <input type="submit" value="ENVOYER"/>
                    </form>
                </div>
            </div>
        </section>
    <?php } else {
    } ?>
<?php } else { ?>
<?php } ?>
    <section class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Ce que pensent les utilisateurs de <?php echo $data['pseudo']; ?></h2>
                <?php
                //Calcul du nombre de lignes de commentaires pour le profil actuel
                $sqla = "SELECT COUNT(profil_comments) AS total FROM comments WHERE profil_comments=$id";
                $resultz = mysql_query($sqla);
                $rowz = mysql_fetch_row($resultz);
                $resu = $rowz[0];
                $nombre = $resu;

                switch ($nombre) {
                    case '0' :
                        echo 'Pas encore de commentaires ';
                        break;
                    case '1' :
                        echo $nombre . ' commentaire ';
                        break;
                    default :
                        echo $nombre . ' commentaires ';
                }

                $sqlb = "SELECT AVG(etoiles) AS moyenne FROM comments WHERE profil_comments=$id";
                $reqetoiles = mysql_query($sqlb) or die('Erreur SQL !br>' . $sqlb . '<br>' . mysql_error());
                $rowetoiles = mysql_fetch_row($reqetoiles);
                $resuetoiles = round($rowetoiles[0]);
                $nombreoiles = $resuetoiles;

                switch ($nombreoiles) {
                    case '' :
                        echo '';
                        break;
                    case '1' :
                        echo '<div class="rating"><span value="' . $nombreoiles . '">☆</span>☆☆☆☆</div>';
                        break;
                    case '2' :
                        echo '<div class="rating"><span value="' . $nombreoiles . '">☆☆</span>☆☆☆</div>';
                        break;
                    case '3' :
                        echo '<div class="rating"><span value="' . $nombreoiles . '">☆☆☆</span>☆☆</div>';
                        break;
                    case '4' :
                        echo '<div class="rating"><span value="' . $nombreoiles . '">☆☆☆☆</span>☆</div>';
                        break;
                    default :
                        echo '<div class="rating"><span value="' . $nombreoiles . '">☆☆☆☆☆</span></div>';
                        break;
                }


                $addition = '0';

                while ($dataetoiles = mysql_fetch_array($reqetoiles)) {
                    echo round($dataetoiles['moyenne']);
                }

                ?>

                <?php
                //Requete d'affichage des commentaires en fonction du profil
                $resnews = mysql_query("SELECT c.* , p.* FROM comments c, profil p WHERE c.profil_comments='" . $id . "' LIMIT $nombre");
                while ($result = mysql_fetch_array($resnews))
                {
                ?>

                <p style="color:black;">Post&eacute; par <a target="_blank"
                                                            href="http://localhost/leon/website/profil/<?php echo $result['url']; ?>-<?php echo $result['pseudo_comments']; ?>"><?php echo $result['pseudo']; ?></a>
                    le <?php echo $result['date_comments']; ?> &agrave; <?php echo $result['heure_comments']; ?></p>
                <?php switch ($result['avatar']) {
                    case '' :
                        echo '<img src="http://localhost/leon/website/img/avatar.png">';
                        break;
                    default :
                        echo '<img src="http://localhost/leon/website/photos/' . $result['avatar'] . '">';
                        break;
                }
                ?>

                <p style="color:black;"><?php echo $result['comments']; ?>
                    <?php
                    //Affichage du nombre d'étoiles pour chaque commentaires
                    switch ($result['etoiles']) {
                        case '' :
                            echo '<div class="rating"><span value="' . $result['etoiles'] . '"></span>☆☆☆☆☆</div>';
                            break;
                        case '1' :
                            echo '<div class="rating"><span value="' . $result['etoiles'] . '">☆</span>☆☆☆☆</div>';
                            break;
                        case '2' :
                            echo '<div class="rating"><span value="' . $result['etoiles'] . '">☆☆</span>☆☆☆</div>';
                            break;
                        case '3' :
                            echo '<div class="rating"><span value="' . $result['etoiles'] . '">☆☆☆</span>☆☆</div>';
                            break;
                        case '4' :
                            echo '<div class="rating"><span value="' . $result['etoiles'] . '">☆☆☆☆</span>☆</div>';
                            break;
                        default :
                            echo '<div class="rating"><span value="' . $result['etoiles'] . '">☆☆☆☆☆</span></div>';
                            break;
                    }
                    ?>

                    <?php
                    }
                    ?>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>