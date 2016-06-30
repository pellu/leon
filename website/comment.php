<?php include('menu.php');?>
<br><br><br><br><br>
<?php
if(isset($_SESSION['email'])){
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<div class="container">
  <div class="row">
    <div class="col-xs-4 col-xs-offset-4">
<?php
$reqaa = $mysql->prepare("SELECT * FROM comments");
$reqaa->execute() or die(print_r($req->errorInfo())); 
if(isset($_POST['pseudo'])){
  $pseudo_comments= $_SESSION["userid"];
}else{$pseudo_comments=$_SESSION["userid"];}
if(isset($_POST['profil'])){
  $profil_comments=$_POST['profil'];
}else{$profil_comments='';}
if(isset($_POST['comments'])){
  $comments=$_POST['comments'];
}else{$comments="";}
$date_comments=date("d-m-Y");
$heure_comments=date("H:i");
if(!isset($_POST['submit']))
{
  if(empty($comments)) 
    {
    echo ''; 
    }
// Aucun champ n'est vide, on peut enregistrer dans la table 
else      
    {
    $stmt = $mysql->prepare("INSERT INTO comments(id_comments, date_comments, heure_comments, pseudo_comments, profil_comments, comments) VALUES ('','$date_comments','$heure_comments', '$pseudo_comments','$profil_comments','$comments')");
    $stmt->bindParam(':pseudo_comments', $pseudo_comments);
    $stmt->bindParam(':profil_comments', $profil_comments);
    $stmt->bindParam(':comments', $comments);
    $stmt->execute();
    $comments='';
    }
}
    else{
      echo '';
    }
?>
<?php }?>
    </div>
  </div>
</div>