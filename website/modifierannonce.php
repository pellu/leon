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

                    <h1>Je modifie mon annonce</h1>
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
                            echo 'Modification effective';
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
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><h2><label
                                        for="pseudo">Pseudo de l'hébergeur : </label>
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
                                        for="pseudo">Description actuelle de l'évènement : </label>
                                </h2></div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                <h2><?php echo $contenu_news; ?></h2>
                            </div>
                        </div>
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><h2><label
                                            for="pseudo">Nouvelle description de l'évènement : </label>
                                    </h2></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left"><textarea
                                        name="contenu_news"/><?php echo $contenu_news; ?></textarea>
                                </div>
                            </div>
                            <input type="submit" name="submit" value="Modifier l'annonce"/>
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
                        <a href="connexion.php">Se connecter</a></div>
            </div></div>
        </div>
    </section>
    <?php
}
?>
<?php include('footer.php'); ?>