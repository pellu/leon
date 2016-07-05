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
            <br>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 col-lg-offset-2">

                        <?php switch ($data['avatar']) {
                            case '' :
                                echo '<img class="img-responsive img-center" src="http://localhost/leon/website/img/avatar.png">';
                                break;
                            default :
                                echo '<img class="img-responsive img-center" src="http://localhost/leon/website/photos/' . $data['avatar'] . '" >';
                                break;
                        }
                        ?>
                        <img class="img-responsive img-center" src="http://localhost/leon/website/img/verified.png" alt="Compte vérifié"
                             class="verified">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12"><h2 id="hello" class="text-left">Bonjour, je
                            m'appelle <?php echo $data['pseudo']; ?> !</h2>
                        <p id="adresse" class="text-left"><a style="color:white;" target="_blank"
                                                               href="https://www.google.fr/maps/place/<?php echo $data['city']; ?>"><?php echo $data['city']; ?></a>, Ile-de-France, France | Membre
                            depuis le <?php echo $data['date_inscription']; ?></p>

                            <?php if (isset($_SESSION['email'])) {?>
                                <p class="text-left"><a href="http://localhost/leon/website/signalement.php?id=<?php echo $data['id'];?>" class="linkmodal">Signaler ce profil</a> | <a href="http://localhost/leon/website/contactprofil.php?id=<?php echo $data['id'];?>" class="linkmodal">Contacter</a>
                                </p>
                            <?php }else{?>
                                <p class="event-city text-left" id="news-contacter">Contacter (il faut être conecté)</a>
                                </p>
                            <?php }?>

                        <?php
                            //Les annonces du profil
                            $sqla = "SELECT COUNT(pseudo_news) AS total FROM news WHERE pseudo_news=$id";
                            $resultz = mysql_query($sqla);
                            $rowz = mysql_fetch_row($resultz);
                            $resu = $rowz[0];
                            $nombre = $resu;
                            ?>
                            <p id="h5" class="text-left">Mes annonces (<?php echo $nombre?>)</p>
                            <br>
                            <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php
                            $resnews = mysql_query("SELECT * FROM news WHERE pseudo_news=$id ORDER BY datedejeu DESC LIMIT $nombre");
                            while ($resultnews = mysql_fetch_array($resnews)) {
                                ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="item"><img src="http://localhost/leon/website/photos/<?php echo $resultnews['photo']; ?>" alt="">
                                <div class="overlay">
                                    <?php if (isset($_SESSION['email'])) {?>
                                    <?php if($_SESSION['userid'] == $data['id']){?>
                                        <a href="http://localhost/leon/website/modifierannonce.php?id=<?php echo $resultnews['id_news']; ?>">Modifier l'annonce <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <?php }else{?>
                                        <a href="http://localhost/leon/website/news/<?php echo $resultnews['url_news']; ?>-<?php echo $resultnews['id_news']; ?>">Voir l'annonce <i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <?php }}else{?>
                                        <a href="http://localhost/leon/website/news/<?php echo $resultnews['url_news']; ?>-<?php echo $resultnews['id_news']; ?>">Voir l'annonce <i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <?php }?>
                                </div>
                                </div>
                                <div class="squared-title"><a target="_blank" href="http://localhost/leon/website/news/<?php echo $resultnews['url_news']; ?>-<?php echo $resultnews['id_news']; ?>"><?php echo $resultnews['titre_news']; ?></a>
                                </div>
                                </div>
                                <?php
                            }
                            ?>
                            </div>
                            </div>

                            <?php if (isset($_SESSION['email'])) {
                                if ($_SESSION['userid'] != $idpageuser) {
                                    ?>

                                    <section class="container content-section text-center">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
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

                        <p id="h5" class="text-left">&Agrave; propos de <?php echo $data['pseudo']; ?></p>
                        <p class="text-left" id="adresse"><?php echo $data['description']; ?></p>
                    </div>
                    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs>
                        <img src="http://localhost/leon/website/img/circuits-droite.png" alt="Circuits" id="controller"
                             width="100%">
                    </div>
                </div>
                <div id="opacitysquare-news-2" class="col-lg-12 col-md-12 col-xs-12">
                    <div class='col-lg-6 col-md-12 col-sm-12 col-xs-12 col-lg-offset-4'>
                        <div class="col-lg-7 text-left">
                            <h2>Ce que pensent les utilisateurs de <?php echo $data['pseudo']; ?> :</h2>
                <?php
                //Calcul du nombre de lignes de commentaires pour le profil actuel
                $sqla = "SELECT COUNT(profil_comments) AS total FROM comments WHERE profil_comments=$id";
                $resultz = mysql_query($sqla);
                $rowz = mysql_fetch_row($resultz);
                $resu = $rowz[0];
                $nombre = $resu;

                switch ($nombre) {
                    case '0' :
                        echo '<p>Pas encore de commentaires ';
                        break;
                    case '1' :
                        echo '<p>'.$nombre . ' commentaire ';
                        break;
                    default :
                        echo '<p>'.$nombre . ' commentaires ';
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
                        echo ' / <span class="rating"><span value="' . $nombreoiles . '">☆</span>☆☆☆☆</span>';
                        break;
                    case '2' :
                        echo ' / <span class="rating"><span value="' . $nombreoiles . '">☆☆</span>☆☆☆</span>';
                        break;
                    case '3' :
                        echo ' / <span class="rating"><span value="' . $nombreoiles . '">☆☆☆</span>☆☆</span>';
                        break;
                    case '4' :
                        echo ' / <span class="rating"><span value="' . $nombreoiles . '">☆☆☆☆</span>☆</span>';
                        break;
                    default :
                        echo ' / <span class="rating"><span value="' . $nombreoiles . '">☆☆☆☆☆</span></span>';
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
                ?></p>
                        </div>
                    </div>
                </div>
                <div id="rest" class="col-lg-12 col-md-12 col-xs-12">
                <br>
                    <div class='col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-5' id="profil-comments">
                        <div class="col-lg-7 text-left">
                            <div class="col-lg-4 text-center">
                                <?php switch ($result['avatar']) {
                                    case '' :
                                        echo '<img src="http://localhost/leon/website/img/avatar.png">';
                                        break;
                                    default :
                                        echo '<img src="http://localhost/leon/website/photos/' . $result['avatar'] . '">';
                                        break;
                                }
                                ?>
                                <h3><a style="color:white;" target="_blank" href="http://localhost/leon/website/profil/<?php echo $result['url']; ?>-<?php echo $result['pseudo_comments']; ?>"><?php echo $result['pseudo']; ?></a></h3>
                            </div>
                            <div class="col-lg-8">
                                <p><?php echo $result['comments']; ?></p>
                                <p> 
                                <?php
                                    //Affichage du nombre d'étoiles pour chaque commentaires
                                    switch ($result['etoiles']) {
                                        case '' :
                                            echo '<span class="rating"><span value="' . $result['etoiles'] . '"></span>☆☆☆☆☆</span>';
                                            break;
                                        case '1' :
                                            echo '<span class="rating"><span value="' . $result['etoiles'] . '">☆</span>☆☆☆☆</span>';
                                            break;
                                        case '2' :
                                            echo '<span class="rating"><span value="' . $result['etoiles'] . '">☆☆</span>☆☆☆</span>';
                                            break;
                                        case '3' :
                                            echo '<span class="rating"><span value="' . $result['etoiles'] . '">☆☆☆</span>☆☆</span>';
                                            break;
                                        case '4' :
                                            echo '<span class="rating"><span value="' . $result['etoiles'] . '">☆☆☆☆</span>☆</span>';
                                            break;
                                        default :
                                            echo '<span class="rating"><span value="' . $result['etoiles'] . '">☆☆☆☆☆</span></span>';
                                            break;
                                    }
                                    ?>
                                </p>
                                <p>Participant &bull; Posté le <?php echo $result['date_comments']; ?> &agrave; <?php echo $result['heure_comments']; ?></p>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-lg-12" id="comment-circuit"></div>
                    </div>
                </div>


            </div>
        </div>
    </section>
                    <?php
                    }
                    ?>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>