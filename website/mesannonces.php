<?php session_start(); ?>
<?php include('menu.php');
if (isset($_SESSION['email'])) {
    header('content-type: text/html; charset=ISO-8859-1');
    ?>
    <section class="container-fluid content-section text-center">
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id='rest'>
                <div class='col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2'>
                    <br><br><br><br><br>
                    <?php include('headerprofil.php');
                    /* Remplace caractères accentués d'une chaine */
                    function remove_accent($str)
                    {
                        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
                        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
                        return str_replace($a, $b, $str);
                    }

                    /* Générateur de Slug (Friendly Url) : convertit un titre en une URL conviviale.*/
                    function Slug($str)
                    {
                        return mb_strtolower(preg_replace(array('/[^a-zA-Z0-9 \'-]/', '/[ -\']+/', '/^-|-$/'),
                            array('', '-', ''), remove_accent($str)));
                    }

                    ?>
                    <div class='row'>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 events-bg-black">
                            <h2 id="h4">Je participe &agrave; (2)</h2><br>
                        </div>
                        <div
                            class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 events-bg-black">
                            <h2 id="h4">Mes annonces (4)</h2>
                            <a href="http://localhost/leon/website/mesannonces.php">J'actualise mes annonces</a><br><br>
                            <?php
                            $id_annonce = $_SESSION["userid"];

                            $sql = "SELECT * FROM profil WHERE id=$id_annonce";
                            $resultsql = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
                            $resultsql = mysql_fetch_array($resultsql);

                            $sqla = "SELECT COUNT(pseudo_news) AS total FROM news WHERE pseudo_news=$id_annonce";
                            $resultz = mysql_query($sqla);
                            $rowz = mysql_fetch_row($resultz);
                            $resu = $rowz[0];
                            $nombre = $resu;
                            $resnews = mysql_query("SELECT * FROM news WHERE pseudo_news=$id_annonce ORDER BY datedejeu DESC LIMIT $nombre");
                            while ($resultnews = mysql_fetch_array($resnews)) {
                                ?>
                                <?php echo $resultnews['datedejeu']; ?><br>
                                <a target="_blank"
                                   href="http://localhost/leon/website/news/<?php echo $resultnews['url_news']; ?>-<?php echo $resultnews['id_news']; ?>"><?php echo $resultnews['titre_news']; ?></a>
                                <br>
                                <a href="http://localhost/leon/website/modifierannonce.php?id=<?php echo $resultnews['id_news']; ?>">Je
                                    modifier mon annonce</a><br><br>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                        $req = $mysql->prepare("SELECT * FROM news");
                        $req->execute() or die(print_r($req->errorInfo()));

                        // SCRIPT ENVOI PHOTO
                        define('TARGET', '../website/photos/');    // Repertoire cible
                        define('MAX_SIZE', 100000);    // Taille max en octets du fichier
                        define('WIDTH_MAX', 800);    // Largeur max de l'image en pixels
                        define('HEIGHT_MAX', 800);    // Hauteur max de l'image en pixels

                        // Tableaux de donnees
                        $tabExt = array('jpg', 'gif', 'png', 'jpeg');    // Extensions autorisees
                        $infosImg = array();

                        // Variables
                        $extension = '';
                        $message = '';
                        $nomImage = '';

                        /************************************************************
                         * Creation du repertoire cible si inexistant
                         *************************************************************/
                        if (!is_dir(TARGET)) {
                            if (!mkdir(TARGET, 0755)) {
                                exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
                            }
                        }

                        if (!empty($_POST)) {
                            // On verifie si le champ est rempli
                            if (!empty($_FILES['photo']['name'])) {
                                // Recuperation de l'extension du fichier
                                $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

                                // On verifie l'extension du fichier
                                if (in_array(strtolower($extension), $tabExt)) {
                                    // On recupere les dimensions du fichier
                                    $infosImg = getimagesize($_FILES['photo']['tmp_name']);

                                    // On verifie le type de l'image
                                    if ($infosImg[2] >= 1 && $infosImg[2] <= 14) {
                                        // On verifie les dimensions et taille de l'image
                                        if (($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['photo']['tmp_name']) <= MAX_SIZE)) {
                                            // Parcours du tableau d'erreurs
                                            if (isset($_FILES['photo']['error'])
                                                && UPLOAD_ERR_OK === $_FILES['photo']['error']
                                            ) {
                                                // On renomme le fichier
                                                $nomImage = md5(uniqid()) . '.' . $extension;

                                                // Si c'est OK, on teste l'upload
                                                if (move_uploaded_file($_FILES['photo']['tmp_name'], TARGET . $nomImage)) {
                                                    $message = 'Upload réussi !';
                                                } else {
                                                    // Sinon on affiche une erreur systeme
                                                    $message = 'Problème lors de l\'upload !';
                                                }
                                            } else {
                                                $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                                            }
                                        } else {
                                            // Sinon erreur sur les dimensions et taille de l'image
                                            $message = 'Erreur dans les dimensions de l\'image !';
                                        }
                                    } else {
                                        // Sinon erreur sur le type de l'image
                                        $message = 'Le fichier à uploader n\'est pas une image !';
                                    }
                                } else {
                                    // Sinon on affiche une erreur pour l'extension
                                    $message = 'L\'extension du fichier est incorrecte !';
                                }
                            } else {
                                // Sinon on affiche une erreur pour le champ vide
                                $message = 'Veuillez remplir le formulaire svp !';
                            }
                        }

                        if (isset($_POST['pseudo'])) {
                            $pseudo_news = $_POST['pseudo'];
                        } else {
                            $pseudo_news = $_SESSION["userid"];
                        }
                        if (isset($_POST['ville_news'])) {
                            $ville_news = $_POST['ville_news'];
                        } else {
                            $ville_news = $resultsql['city'];
                        }
                        if (isset($_POST['adresse_news'])) {
                            $adresse_news = $_POST['adresse_news'];
                        } else {
                            $adresse_news = $resultsql['adresse'];
                        }
                        if (isset($_POST['titre_news'])) {
                            $titre_news = $_POST['titre_news'];
                        } else {
                            $titre_news = "";
                        }
                        if (isset($_POST['prix'])) {
                            $prix = $_POST['prix'];
                        } else {
                            $prix = "";
                        }
                        if (isset($nomImage)) {
                            $photo = $nomImage;
                        } else {
                            $photo = "";
                        }
                        if (isset($_POST['typedesoiree'])) {
                            $typedesoiree = $_POST['typedesoiree'];
                        } else {
                            $typedesoiree = "";
                        }
                        if (isset($_POST['jeu'])) {
                            $jeu = $_POST['jeu'];
                        } else {
                            $jeu = "";
                        }
                        if (isset($_POST['typedejeu'])) {
                            $typedejeu = $_POST['typedejeu'];
                        } else {
                            $typedejeu = "";
                        }
                        if (isset($_POST['nb_participants'])) {
                            $nb_participants = $_POST['nb_participants'];
                        } else {
                            $nb_participants = "";
                        }
                        if (isset($_POST['fumeur'])) {
                            $fumeur = $_POST['fumeur'];
                        } else {
                            $fumeur = "";
                        }
                        if (isset($_POST['animaux'])) {
                            $animaux = $_POST['animaux'];
                        } else {
                            $animaux = "";
                        }
                        if (isset($_POST['contenu_news'])) {
                            $contenu_news = $_POST['contenu_news'];
                        } else {
                            $contenu_news = "";
                        }
                        if (isset($_POST['datedejeu'])) {
                            $datedejeu = $_POST['datedejeu'];
                        } else {
                            $datedejeu = date("d-m-Y");
                        }
                        if (isset($_POST['heuredejeu'])) {
                            $heuredejeu = $_POST['heuredejeu'];
                        } else {
                            $heuredejeu = date("H:i");
                        }
                        if (isset($_POST['url_news'])) {
                            $url_news = Slug($titre_news);
                        } else {
                            $url_news = "";
                        }
                        $date_news = date("d-m-Y");
                        $champspasremplis = "<br><br>";

                        if (isset($_POST['submit'])) {
                            if (empty($ville_news) OR empty($titre_news) OR empty($adresse_news) OR empty($prix) OR empty($typedesoiree) OR empty($jeu) OR empty($typedejeu) OR empty($nb_participants) OR empty($contenu_news) OR empty($nb_participants) OR empty($datedejeu) OR empty($heuredejeu) OR empty($_POST['choix'])) {
                                $champspasremplis = 'Tous les champs doivent &ecirc;tre remplis<br><br>';
                            } else {
                                $stmt = $mysql->prepare("INSERT INTO news(id_news, date_news, pseudo_news, titre_news, ville_news, adresse_news, fumeur, animaux, prix, photo, typedesoiree, typedejeu, jeu, nb_participants, contenu_news, datedejeu, heuredejeu, url_news) VALUES ('','$date_news', '$pseudo_news','$titre_news','$ville_news','$adresse_news','$fumeur','$animaux','$prix','$photo','$typedesoiree','$typedejeu','$jeu','$nb_participants','$contenu_news','$datedejeu','$heuredejeu','$url_news')");
                                $stmt->bindParam(':pseudo_news', $pseudo_news);
                                $stmt->bindParam(':ville_news', $ville_news);
                                $stmt->bindParam(':adresse_news', $adresse_news);
                                $stmt->bindParam(':titre_news', $titre_news);
                                $stmt->bindParam(':fumeur', $fumeur);
                                $stmt->bindParam(':animaux', $animaux);
                                $stmt->bindParam(':prix', $prix);
                                $stmt->bindParam(':photo', $photo);
                                $stmt->bindParam(':typedesoiree', $typedesoiree);
                                $stmt->bindParam(':jeu', $jeu);
                                $stmt->bindParam(':typedejeu', $typedejeu);
                                $stmt->bindParam(':nb_participants', $nb_participants);
                                $stmt->bindParam(':contenu_news', $contenu_news);
                                $stmt->bindParam(':date_news', $date_news);
                                $stmt->bindParam(':datedejeu', $datedejeu);
                                $stmt->bindParam(':heuredejeu', $heuredejeu);
                                $stmt->execute();
                                $titre_news = '';
                                $typedejeu = '';
                                $adresse_news = '';
                                $contenu_news = '';
                                $titre_news = '';
                                $datedejeu = '';
                                $heuredejeu = '';
                                $champspasremplis = 'L\'anonce est bien envoy&eacute;e<br><br>';
                            }
                        }
                        ?>
                        <div
                            class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 events-bg-black">
                            <h2 id="h4">Ajouter une annonce</h2>
                            <?php echo $champspasremplis; ?>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="pseudo" value="<?php echo $id_annonce ?>"/>
                                <input type="hidden" name="ville_news" value="<?php echo $ville_news ?>"/>
                                <input type="hidden" name="adresse_news" value="<?php echo $adresse_news ?>"/>
                                <fieldset>
                                    <label>Votre ville</label>
                                    <div class="input"><a href="http://localhost/leon/website/modifiermonprofil.php"
                                                          data-toggle="tooltip" data-placement="top"
                                                          title="Cliquez pour modifier"
                                                          class="info-address"><?php echo $ville_news ?></a></div>
                                </fieldset>
                                <fieldset>
                                    <label>Votre adresse</label>
                                    <div class="input"><a href="http://localhost/leon/website/modifiermonprofil.php"
                                                          data-toggle="tooltip" data-placement="top"
                                                          title="Cliquez pour modifier"
                                                          class="info-address"><?php echo $adresse_news ?></a></div>
                                </fieldset>
                                <fieldset>
                                    <label>Titre</label><input type="text" name="titre_news"
                                                               value="<?php echo $titre_news ?>"/>
                                </fieldset>
                                <fieldset>
                                    <label>Prix</label>
                                    <select name="prix">
                                        <option value="" disabled selected>Choisir</option>
                                        <option value="5">5 &euro;</option>
                                        <option value="10">10 &euro;</option>
                                        <option value="15">15 &euro;</option>
                                        <option value="20">20 &euro;</option>
                                        <option value="25">25 &euro;</option>
                                        <option value="30">30 &euro;</option>
                                    </select>
                                </fieldset>
                                <fieldset>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>"/>
                                    <label>Photo <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Photo carr&eacute;e">*</a></label>

                                    <div class="file-input">Choisissez votre image
                                        <input name="photo" type="file" id="fichier_a_uploader"/>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <label>Type de soir&eacute;e</label>
                                    <select name="typedesoiree">
                                        <option value="" disabled selected>Choisir</option>
                                        <option value="Casual">Casual</option>
                                        <option value="Tournoi">Tournoi</option>
                                        <option value="Formation">Formation</option>
                                    </select>
                                </fieldset>
                                <fieldset>
                                    <label>Type de jeu</label>
                                    <select name="typedejeu" id="gameType">
                                        <option value="" disabled selected>Choisir</option>
                                        <option data-val="console" value="Consoles">Consoles</option>
                                        <option data-val="carte" value="Cartes">Cartes</option>
                                        <option data-val="plateau" value="Jeux de plateau">Jeux de plateau</option>
                                    </select>
                                </fieldset>
                                <fieldset>
                                    <label>Jeu</label>
                                    <select name="jeu" id="gamePlay">
                                    </select>
                                </fieldset>
                                <fieldset>
                                    <label>Nombre de participants</label>
                                    <select name="nb_participants">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </fieldset>
                                <fieldset>
                                    <label>Animaux</label>
                                    <select name="animaux">
                                        <option value="" disabled selected>Choisir</option>
                                        <option value="oui">Oui</option>
                                        <option value="non">Non</option>
                                    </select>
                                </fieldset>
                                <fieldset>
                                    <label>Fumeur</label>
                                    <select name="fumeur">
                                        <option value="" disabled selected>Choisir</option>
                                        <option value="oui">Oui</option>
                                        <option value="non">Non</option>
                                    </select>
                                </fieldset>
                                <fieldset>
                                    <label>Description</label><input type="text" name="contenu_news"
                                                                     value="<?php echo $contenu_news ?>"/>
                                </fieldset>
                                <fieldset>
                                    <label>Date de la soir&eacute;e</label><input type="date" name="datedejeu"
                                                                                  value="<?php echo $datedejeu ?>"/>
                                </fieldset>
                                <fieldset>
                                    <label>Heure de la soir&eacute;e</label><input type="time" name="heuredejeu"
                                                                                   value="<?php echo $heuredejeu ?>"/>
                                </fieldset>
                                <fieldset>
                                    <input type="hidden" name="url_news" value="<?php echo $url_news ?>"/>
                                    <div class="checkbox"><input type="checkbox"  name="choix[]" value="1"></div> <a target="_blank"
                                                                                        href="conditions.php" class="info-address">J'accepte
                                        les conditions g&eacute;n&eacute;rales d'utilisation</a>
                                </fieldset>

                                <input type="submit" name="submit" value="ENVOYER"/>
                            </form>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <?php
} else {
    ?>
    <br><br><br><br><br>
    <section class="container content-section text-center">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="message">Pour acc&eacute;der &agrave; cette page, vous devez &ecirc;tre
                    connect&eacute;.<br/>
                    <a href="connexion.php">Se connecter</a></div>
            </div>
        </div>
    </section>
    <?php
}
?>
<?php include('footer.php'); ?>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
