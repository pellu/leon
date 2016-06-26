<?php
//Tester s'il y a un cookie admin
if(isset($_COOKIE['admin']) ){
//Si Oui ont affiche la page
$title="Administration - HOME";
require_once('config.php');
$date = date("d-m-Y");
$heure = date("H:i:s");
?>
<?php
header( 'content-type: text/html; charset=ISO-8859-1' );
include('header.php');
?>
    <section class="container text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <?php
                $id_news=$_GET["id"];
                $req = $mysql->prepare('SELECT c.* , p.* FROM news c, comments p WHERE c.pseudo_news=p.id AND id_news="'.$id_news.'" ORDER BY c.id_news DESC LIMIT 1');
                $req->execute(array($_GET['id']));

                while ($donnees = $req->fetch())
                {?>
                <?php
                    if(isset($_POST['contenu_news'])){
                        $contenu_news=$_POST['contenu_news'];
                        }else{$contenu_news= $donnees['contenu_news'];}
                    if (isset($_POST['submit'])){
                        $date = date("Y-m-d");
                        $id_news = $_GET["id"];

                        $modif = $mysql->prepare("UPDATE news SET contenu_news='$contenu_news', date_news='$date' WHERE id_news='".$id_news."'");
                        $modif->execute(array(
                            'contenu_news' => $contenu_news,
                            'date' => $date
                        ));
                        echo 'Modification effective';
                        header('Refresh:1;');

                    }else{echo'';}
                ?>
                    <h2>Pseudo : <a target="_blank" href="http://localhost/leon/website/commentaires/<?php echo $donnees['url']; ?>-<?php echo $donnees['id']; ?>"/><?php echo $donnees['pseudo'];?></a></h2>
                    <h3>news inscrit le : <?php echo $donnees['date_news']; ?></h3>
                    <p>contenu : <?php echo $contenu_news; ?></p>
                    <form method="post" action="">
                        <label>contenu: <textarea name="contenu_news"/><?php echo $contenu_news; ?></textarea></label><br/>
                        <input type="submit" name="submit" value="Modifier le news"/>
                    </form>
                <?php
                }$req->closeCursor();
                ?>
            </div>
        </div>
    </section>
</html>
</body>
<?php
}else{
    header("Location:index.php");
}
?>