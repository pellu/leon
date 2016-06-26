<?php
if(isset($_COOKIE['admin']) ){
  header( 'content-type: text/html; charset=ISO-8859-1' );
include('header.php');
include('config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM profil";
$result = $conn->query($sql);
$test = $conn->query($sql);
?>
<div class="container">
  <div class="row">
    <div class="col-xs-4 col-xs-offset-4">
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
    </div>
  </div>
</div>

</body>
</html>
<?php
}else{
    header("Location:index.php");
}
?>