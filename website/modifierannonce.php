<?php session_start(); ?>
<?php include('menu.php');
if (isset($_SESSION['email'])) {
    header('content-type: text/html; charset=UTF-8');
    if (!isset($_GET["id"])) {
        header("Location:http://localhost/leon/website/mesannonces.php");
    }
    ?>
    <section id="rest" class="container-fluid content-section text-center">
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12' id="formulaire">
                    <br><br><br><br><br>
                    <?php include('headerprofil.php'); ?>

                    <h1>Modifier mon annonce</h1>
                    <?php
                    $id_news = $_GET["id"];
                    $req = $mysql->prepare('SELECT c.* , p.* FROM news c, profil p WHERE c.pseudo_news=p.id AND id_news="' . $id_news . '" ORDER BY c.id_news DESC LIMIT 1');
                    $req->execute(array($_GET['id']));
                    while ($donnees = $req->fetch()) {
                        ?>
                        <?php
                        if (isset($_POST['contenu_news'])) {
                            $contenu_news = $_POST['contenu_news'];
                        } else {
                            $contenu_news = $donnees['contenu_news'];
                        }
                        if (isset($_POST['submit'])) {
                            $date = date("d-m-Y");
                            $id_news = $_GET["id"];

                            $modif = $mysql->prepare("UPDATE news SET contenu_news='$contenu_news', date_news='$date' WHERE id_news='" . $id_news . "'");
                            $modif->execute(array(
                                'contenu_news' => $contenu_news,
                                'date' => $date
                            ));
                            echo '<h2>Modification effective</h2>';
                        } else {
                            echo '';
                        }
                        ?><br>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><h2><label
                                        for="pseudo">Titre de l'annonce :</label>
                                </h2></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                <h2><?php echo $donnees['titre_news']; ?></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><h2><label>Pseudo de l'hébergeur : </label>
                                </h2></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                <h2><?php echo $donnees['pseudo']; ?></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><h2><label
                                        for="pseudo">Evènement créé le : </label>
                                </h2></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                <h2><?php echo $donnees['date_news']; ?></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><h2><label
                                        for="pseudo">Evènement prévu le :</label>
                                </h2></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                <h2><?php echo $donnees['datedejeu']; ?> &agrave <?php echo $donnees['heuredejeu']; ?></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><h2><label
                                        for="pseudo">Vous avez prévu de recevoir :</label>
                                </h2></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                <h2><?php echo  $donnees['nb_participants']; ?> personnes</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><h2><label
                                        for="pseudo">Type de soirée / Type de jeu / Jeu :</label>
                                </h2></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                <h2><?php echo  $donnees['typedesoiree']; ?> / <?php echo  $donnees['typedejeu']; ?> / <?php echo  $donnees['jeu']; ?></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><h2><label
                                        for="pseudo">Autorisation de fumer :</label>
                                </h2></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                <h2><?php echo  $donnees['fumeur']; ?></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><h2><label
                                        for="pseudo">Présence d'animaux :</label>
                                </h2></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                <h2><?php echo  $donnees['animaux']; ?></h2>
                            </div>
                        </div>
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><h2><label
                                            for="pseudo">Description de l'évènement : </label>
                                    </h2></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left"><textarea
                                        name="contenu_news"/><?php echo $contenu_news; ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><h2><label
                                            for="pseudo">Photo<a href="#" data-toggle="tooltip" data-placement="top"
                                                                 title="Photo 1200x1200px maximum">*</a> de l'évènement : </label>
                                    </h2></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left"><div class="file-input" style="margin-left:0; max-width: 163px;">Choisissez votre image
                                        <input name="photo" type="file" id="fichier_a_uploader" accept="image/*"
                                               onchange="loadFile(event)"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><h2><label>Aperçu de la Photo</label>
                                    </h2></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left"><img id="output" href="" title="Votre image"/>
                                    <style>#output{height: 105px;width: 167px;}</style>
                                    <script>
                                        var loadFile = function(event) {
                                            var reader = new FileReader();
                                            reader.onload = function(){
                                                var output = document.getElementById('output');
                                                output.src = reader.result;
                                            };
                                            reader.readAsDataURL(event.target.files[0]);
                                        };
                                    </script>
                                </div>
                            </div>
                            <input type="submit" name="submit" value="Modifier"/>
                            <a onclick="return confirm('&Ecirc;tes-vous sur de vouloir supprimer cette annonce ? Vous ne pourrez plus jamais retrouver cette annonce !');"
                               href="http://localhost/leon/website/supprimernews.php?id=<?php echo $id_news; ?>">Je souhaite supprimer mon
                                annonce</a><br><br><br>
                        </form>
                        <?php
                    }
                    $req->closeCursor();
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
} else {
    ?>
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
<?php include('footer.php'); ?>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

