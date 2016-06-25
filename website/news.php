<?php
header( 'content-type: text/html; charset=ISO-8859-1' );
include("config.php");
?>
<?php include('header.php');?>
               

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
				<h3>News &eacute;crite le : <?php echo $donnees['date_news']; ?></h3>
				<p>Contenu : <?php echo $donnees['contenu_news']; ?></p>
                 <?php
                }$req->closeCursor();
                ?>
            </div>
        </div>
    </section>
<br><br>
    <?php include('footer.php');?>