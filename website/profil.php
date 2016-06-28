<?php session_start();?>
<?php
header( 'content-type: text/html; charset=ISO-8859-1' );
include("config.php");
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
    <?php
        $req = $mysql->prepare("SELECT * FROM comments");
        $req->execute() or die(print_r($req->errorInfo())); 

        if(isset($_POST['pseudo'])){
          $pseudo_comments= $_POST['pseudo'];
        }else{$pseudo_comments="";}
        if(isset($_POST['profil'])){
          $profil_comments=$_POST['profil'];
        }else{$profil_comments="";}
        if(isset($_POST['comments'])){
          $comments=$_POST['comments'];
        }else{$comments="";}
        $date_comments=date("Y-m-d");

        if(!isset($_POST['submit']))
        {
          if(empty($comments)) 
            {
            echo 'Aucun champs doit &ecirc;tre vide'; 
            }

        // Aucun champ n'est vide, on peut enregistrer dans la table 
        else      
            {
            $stmt = $mysql->prepare("INSERT INTO comments(id_comments, date_comments, pseudo_comments, profil_comments, comments) VALUES ('','$date_comments', '$pseudo_comments','$profil_comments','$comments','$url_comments')");
            $stmt->bindParam(':pseudo_comments', $pseudo_comments);
            $stmt->bindParam(':profil_comments', $profil_comments);
            $stmt->bindParam(':comments', $comments);
            $stmt->execute();
            header('location:http://localhost/leon/admin/commentaires.php');
            }
        }
            else{
              echo '';
            }
        ?>
            <form method="post" action="">
        <?php //Affichage du pseudo / id de l'utilisateur 
          if ($result->num_rows > 0) {
            echo "<label>Pseudo: <select name='pseudo'>";
            while($row = $result->fetch_assoc()) {
              echo '<option value=' . $row["id"].'>' . $row["pseudo"]. ' - '.$row["id"]. '</option>';
              }
              echo "</select></label>";
          } else {
            echo "Pas de profil dans la base<br />";
        }
         //Affichage du pseudo / id de l'utilisateur 
          if ($test->num_rows > 0) {
            echo "<label>Sur le profil: <select name='profil'>";
            while($row = $test->fetch_assoc()) {
              echo '<option value=' . $row["id"].'>' . $row["pseudo"]. ' - '.$row["id"]. '</option>';
              }
              echo "</select></label>";
          } else {
            echo "Pas de profil dans la base<br />";
        }
        $conn->close();?>
              <label>Commentaire: <textarea name="contenu"/><?php echo $comments ?></textarea></label><br/>
              <input type="submit" value="ENVOYER"/>
    </form>

<?php }else{ echo "pas co"; ?>
    <?php } ?>
<br><br>
    <?php include('footer.php');?>