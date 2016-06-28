<?php session_start();?>
<?php include('comment.php');?>
<?php
header( 'content-type: text/html; charset=ISO-8859-1' );
$id=$_GET["id"];
$mysql = "SELECT * FROM profil WHERE id='$id' LIMIT 1";
$req = mysql_query($mysql) or die( mysql_error()." ERROR");
$data = mysql_fetch_assoc($req);
if(isset($data['url'])) {
  if($data['url'] !=$_GET['url']){
    header("Location: /leon/website/profil/".$data["url"]."-".$data["id"]);
  }
}
 else{
  header("Location: /leon/test/404.php");
}
?>
<?php include('header.php');?>
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
            <br><br><br><br><br>
                <p><img src="http://localhost/leon/website/photos/<?php echo $data['avatar'];?>"></p>
        <h2>Pseudo : <?php echo $data['pseudo'];?></h2>
        <h3>Utilisateur inscrit le : <?php echo $data['date_inscription']; ?></h3>
        <p>Description : <?php echo $data['description']; ?></p>
            </div>
        </div>
    </section>
<?php if(isset($_SESSION['email'])){ ?>
<section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <form method="POST" action="">
        <input type="hidden" name="pseudo" value="<?php echo $profil_comments?>">
        <input type="hidden" name="profil" value="<?php echo $id?>">
        <label>Commentaire: <textarea name="comments"/><?php echo $comments ?></textarea></label><br/>
        <input type="submit" value="ENVOYER"/>
      </form>
    </div>
  </div>
</section>
<?php }else{ ?>
    <?php } ?>
<section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
<h2>Liste des commentaires</h2>
<?php
//Calcul du nombre de lignes de commentaires pour le profil actuel
$sqla = "SELECT COUNT(profil_comments) AS total FROM comments WHERE profil_comments=$id";
$resultz = mysql_query($sqla);
$rowz = mysql_fetch_row($resultz);
$resu = $rowz[0];
$nombre=$resu;
  //Requete d'affichage des commentaires en fonction du profil
  $resnews=mysql_query("SELECT c.* , p.* FROM comments c, profil p WHERE c.profil_comments='".$id."' LIMIT $nombre");
while($result=mysql_fetch_array($resnews))
{
 ?>

 <p style="color:black;">Post&eacute; par <a target="_blank" href="http://localhost/leon/website/profil/<?php echo $result['url']; ?>-<?php echo $result['pseudo_comments']; ?>"><?php echo $result['pseudo_comments']; ?></a> le <?php echo $result['date_comments'];?> &agrave; <?php echo $result['heure_comments'];?></p>
    <p style="color:black;"><?php echo $result['comments']; ?></p>

<?php
}
?>
</div></div></section>
<?php include('footer.php');?>