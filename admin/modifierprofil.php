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
                $req = $mysql->prepare('SELECT * FROM profil WHERE id='.$id.' LIMIT 1');
                $req->execute(array($_GET['id']));

                while ($donnees = $req->fetch())
                {?>
                <?php
                    if(isset($_POST['description'])){
                        $description=$_POST['description'];
                        }else{$description= $donnees['description'];}
                    if (isset($_POST['submit'])){
                        $date = date("Y-m-d");
                        $id = $_GET["id"];

                        $modif = $mysql->prepare("UPDATE profil SET description='$description', date='$date' WHERE id='".$id."'");
                        $modif->execute(array(
                            'description' => $description,
                            'date' => $date
                        ));
                        echo 'Modification effective';
                        header('Refresh:1;');

                    }else{echo'';}
                ?>
                    <p><img src="http://localhost/leon/website/photos/<?php echo $donnees['avatar'];?>"></p>
                    <h2>Pseudo : <?php echo $donnees['pseudo'];?></h2>
                    <h3>Profil inscrit le : <?php echo $donnees['date_inscription']; ?></h3>
                    <p>Description : <?php echo $donnees['description']; ?></p>
                    <form method="post" action="">
                        <label>Description: <textarea name="description"/><?php echo $description ?></textarea></label><br/>
                        <input type="submit" name="submit" value="Modifier le profil"/>
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