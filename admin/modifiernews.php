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
                $id=$_GET["id"];
                $req = $mysql->prepare('SELECT * FROM news WHERE id='.$id.' LIMIT 1');
                $req->execute(array($_GET['id']));

                while ($donnees = $req->fetch())
                {?>
                <?php
                    if(isset($_POST['contenu'])){
                        $contenu=$_POST['contenu'];
                        }else{$contenu= $donnees['contenu'];}
                    if (isset($_POST['submit'])){
                        $date = date("Y-m-d");
                        $id = $_GET["id"];

                        $modif = $mysql->prepare("UPDATE news SET contenu='$contenu', date='$date' WHERE id='".$id."'");
                        $modif->execute(array(
                            'contenu' => $contenu,
                            'date' => $date
                        ));
                        echo 'Modification effective';
                        header('Refresh:1;');

                    }else{echo'';}
                ?>
                    <h2>Pseudo : <?php echo $donnees['pseudo'];?></h2>
                    <h3>news inscrit le : <?php echo $donnees['date']; ?></h3>
                    <p>contenu : <?php echo $donnees['contenu']; ?></p>
                    <form method="post" action="">
                        <label>contenu: <textarea name="contenu"/><?php echo $contenu ?></textarea></label><br/>
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