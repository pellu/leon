<?php session_start();?>
<?php include('menu.php');?>
<?php
header( 'content-type: text/html; charset=ISO-8859-1' );
?>
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <?php
                $id_news=$_GET["id"];
                $req = $mysql->prepare('SELECT c.* , p.* FROM news c, profil p WHERE c.pseudo_news=p.id AND id_news="'.$id_news.'" ORDER BY c.id_news DESC LIMIT 1');
                $req->execute(array($_GET['id']));

                while ($donnees = $req->fetch())
                {?>
				<h2>Cr&eacute;ateur de la news: <a target="_blank" href="http://localhost/leon/website/profil/<?php echo $donnees['url']; ?>-<?php echo $donnees['id']; ?>"/><?php echo $donnees['pseudo'];?></a></h2>
                <p><img src="http://localhost/leon/website/photos/<?php echo $donnees['avatar']; ?>"></p>
				<h3>News &eacute;crite le : <?php echo $donnees['date_news']; ?></h3>
                <p><?php echo $donnees['titre_news']; ?></p>
                <p>&agrave; <a target="_blank" href="https://www.google.fr/maps/place/<?php echo $donnees['ville_news']; ?>"><?php echo $donnees['ville_news']; ?></a></p>
                <p><?php echo $donnees['adresse_news']; ?></p>
                <p><?php echo $donnees['prix']; ?></p>
                <img src="http://localhost/leon/website/photos/<?php echo $donnees['photo']; ?>">
                <p><?php echo $donnees['typedesoiree']; ?></p>
                <p><?php echo $donnees['jeu']; ?></p>
                <p><?php echo $donnees['typedejeu']; ?></p>
                <p><?php echo $donnees['nb_participants']; ?></p>
                <p><?php echo $donnees['datedejeu']; ?></p>
                <p><?php echo $donnees['heuredejeu']; ?></p>
				<p>Contenu : <?php echo $donnees['contenu_news']; ?></p>
                 <?php
                }$req->closeCursor();
                ?>
            </div>
        </div>
    </section>
<br><br>
    <?php include('footer.php');?>