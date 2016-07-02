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
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id="">
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
                             width="250">
                    </div>
                    <div class="col-lg-6"><h2 id="hello" class="text-left">Bonjour, je
                            m'appelle <?php echo $data['pseudo']; ?> !</h2>
                        <p id="adresse" class="text-left"><?php echo $data['city']; ?>, Ile-de-France, France | Membre depuis le <?php echo $data['date_inscription']; ?></p>
                        <p class="text-left"><a href="#" class="linkmodal">Signaler ce profil</a> | <a href="#" class="linkmodal">Contacter</a></p>
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
                                                l'annonce <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
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
                                                l'annonce <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
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
                                                l'annonce <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
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
                                                l'annonce <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                                    </div>
                                    <div class="squared-title"><a target="_blank"
                                                                  href="#">Titre de la soirée</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <img src="http://localhost/leon/website/img/PS.png" alt="Controller Gaming" id="controller" width="100%">
                    </div>
                    <p class="text-left">Description : <?php echo $data['description']; ?></p>

                </div>
            </div>
        </div>
    </section>

    <style>

        /* Affichage des étoiles */
        p, p a {
            color: #aaa;
            text-decoration: none;
        }

        p a:hover,
        p a:focus {
            text-decoration: underline;
        }

        p + p {
            color: #bbb;
            margin-top: 2em;
        }

        .detail {
            position: absolute;
            text-align: right;
            right: 5px;
            bottom: 5px;
            width: 50%;
        }

        .rating a[href*="intent"] {
            display: inline-block;
            margin-top: 0.4em;
        }

        /*
         * Rating styles
         */
        .rating {
            width: 226px;
            margin: 0 auto 1em;
            font-size: 45px;
            overflow: hidden;
        }

        .rating a {
            color: #aaa;
        }

        .rating input {
            float: right;
            opacity: 0;
            position: absolute;
        }

        .rating a,
        .rating label {
            float: right;
            color: #aaa;
            text-decoration: none;
            -webkit-transition: color .4s;
            -moz-transition: color .4s;
            -o-transition: color .4s;
            transition: color .4s;
        }

        .rating label:hover ~ label,
        .rating input:focus ~ label,
        .rating label:hover,
        .rating a:hover,
        .rating a:hover ~ a,
        .rating a:focus,
        .rating a:focus ~ a {
            color: orange;
            cursor: pointer;
        }

        .rating2 {
            direction: rtl;
        }

        .rating2 a {
            float: none
        }

        .rating span {
            color: orange;
        }
    </style>

<?php if (isset($_SESSION['email'])) {
    if ($_SESSION['userid'] != $idpageuser) {
        ?>

        <section class="container content-sec)tion text-center">
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