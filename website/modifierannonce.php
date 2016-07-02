<?php session_start();?>
<?php include('menu.php');
if(isset($_SESSION['email'])){
header( 'content-type: text/html; charset=ISO-8859-1' );
if(!isset($_GET["id"])){
    header("Location:http://localhost/leon/website/mesannonces.php");
}
?>
<section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <br><br><br><br><br>
<?php include('headerprofil.php');?>
</div></div></section>
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
            <h3>Je modifie mon annonce</h3>
               <?php
                $id_news=$_GET["id"];
                $req = $mysql->prepare('SELECT c.* , p.* FROM news c, profil p WHERE c.pseudo_news=p.id AND id_news="'.$id_news.'" ORDER BY c.id_news DESC LIMIT 1');
                $req->execute(array($_GET['id']));

                while ($donnees = $req->fetch())
                {?>
                <?php
                    if(isset($_POST['contenu_news'])){
                        $contenu_news=$_POST['contenu_news'];
                        }else{$contenu_news= $donnees['contenu_news'];}
                    if (isset($_POST['submit'])){
                        $date = date("d-m-Y");
                        $id_news = $_GET["id"];

                        $modif = $mysql->prepare("UPDATE news SET contenu_news='$contenu_news', date_news='$date' WHERE id_news='".$id_news."'");
                        $modif->execute(array(
                            'contenu_news' => $contenu_news,
                            'date' => $date
                        ));
                        echo 'Modification effective';

                    }else{echo'';}
                ?><br>
                    Titre: <?php echo $donnees['titre_news']; ?><br>
                    <h2>Pseudo : <a target="_blank" href="http://localhost/leon/website/profil/<?php echo $donnees['url']; ?>-<?php echo $donnees['id']; ?>"/><?php echo $donnees['pseudo'];?></a></h2>
                    <h3>Annonce du : <?php echo $donnees['date_news']; ?></h3>
                    contenu : <?php echo $contenu_news; ?>
                    <form method="post" action="">
                        <label>contenu: <textarea name="contenu_news"/><?php echo $contenu_news; ?></textarea></label><br/>
                        <input type="submit" name="submit" value="Modifier l'annonce"/>
                    </form>
                <?php
                }$req->closeCursor();
                ?>
            </div>
        </div>
    </section>
<br><br>
<a onclick="return confirm('&Ecirc;tes-vous sur de vouloir supprimer cette annonce ? Vous ne pourrez plus jamais retrouver cette annonce !');" href="http://localhost/leon/website/supprimernews.php?id=<?php echo $id_news; ?>">Je souhaite supprimer mon annonce</a>
<?php
}else{?>
<br><br><br><br><br>
<section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="message">Pour acc&eacute;der &agrave; cette page, vous devez &ecirc;tre connect&eacute;.<br />
<a href="connexion.php">Se connecter</a></div>
</div></div></section>
<?php
}
?>
<?php include('footer.php');?>