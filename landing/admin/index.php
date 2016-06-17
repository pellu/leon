<?php
session_start();
$title="Administration";
?>
<?php
//Tester s'il y a un cookie admin
if(isset($_COOKIE['admin']) ){
//Si Oui ont affiche la page
$title="Administration - HOME";
require_once('../config.php');
$date = date("d-m-Y");
$heure = date("H:i:s");
?>
<?php header( 'content-type: text/html; charset=UTF-8' ); ?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<style type="text/css" href="../css/style.css"></style>
<style type="text/css" href="../css/bootstrap.min.css"></style>
<head>
  <title>LEON - ADMIN</title>
</head>
<body>
<header>
<center><h1>LEON - ADMIN</h1>
<hr>
</center>
</header>
<h2><center>Liste des 10 derniers inscrits</center></h2><br>
<?php
if(isset($_POST['delete'])){
  $mysql->query("DROP TABLE `newsletter`");
  $mysql->query("CREATE TABLE newsletter (id int(11) NOT NULL AUTO_INCREMENT, date text NOT NULL, heure time NOT NULL, email text NOT NULL, PRIMARY KEY (id));");
}
?>
<center><form action="" method="post">
<a class="buttonsauvegarde btn" href="telechargement.php">Télécharger les mails</a>
<input class="buttonsauvegarde btn suppression" type="submit" name="delete" value="Supprimer la base en cours" onclick="return confirm('Êtes-vous sur de vouloir supprimer toute la base en cours ?');">
</form><br><br></center>
<?php
// On récupère tout le contenu de la table jeux_video
$reponse = $mysql->query('SELECT * FROM newsletter');
echo '<table align="center" style="width:600px;" bgcolor="#FFFFFF">'."\n";
// première ligne
echo '<tr style="color:white;">';
echo '<td bgcolor="#3498db"><b>N°</b></td>';
echo '<td bgcolor="#3498db"><b>Date</b></td>';
echo '<td bgcolor="#3498db"><b>Heure</b></td>';
echo '<td bgcolor="#3498db"><b>Email</b></td>';
echo '</tr>'."\n";
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
echo '<tr>';
echo '<td bgcolor="#CCCCCC">'.$donnees['id'].'</td>';
echo '<td bgcolor="#CCCCCC">'.$donnees['date'].'</td>';
echo '<td bgcolor="#CCCCCC">'.$donnees['heure'].'</td>';
echo '<td bgcolor="#CCCCCC">'.$donnees['email'].'</td>';
echo '</tr>'."\n";
}
$reponse->closeCursor(); // Termine le traitement de la requête
?>
</body>
</html>
<?php
}else{
//Si Non ont affiche le formulaire
?>
<?php
$message="";
if(isset($_POST['submit']))
{
  $email=htmlspecialchars($_POST['email']);
  $pass=sha1(htmlspecialchars($_POST['pass']));
  require_once('../config.php');
  $requete=$mysql->prepare('SELECT * FROM users WHERE email = :email AND pass = :pass');
  $requete->execute(array(':email'=>$email,':pass'=>$pass));
  if($requete->rowCount()==1)
  {
    $donnee=$requete->fetch(PDO::FETCH_ASSOC);
    $_SESSION=$donnee;
      $lifetime=600;
      session_set_cookie_params($lifetime);
      $timestamp = time() + 365*24*3600;
    $hashed_password = sha1($_SESSION['nom']);
    setcookie("admin",sha1($_SESSION['nom']), $timestamp);
    header('Refresh:0;');
    $message="Connexion ok";
  }
  else
  {
    $message="Email ou mot de passe invalide";
  }
}
require_once("connexion.php");
?>
<style type="text/css">
  div.centre
{
  width: 200px;
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
<div class="text-center centre" style="padding:50px 0">
  <div class="logo">Connexion</div>
  <div class="login-form-1">
    <?php echo'<form id="login-form" class="text-left" class="formconnect" action="'.$_SERVER['PHP_SELF'].'" method="post">
      <div class="login-form-main-message"></div>
      <div class="main-login-form">
        <div class="login-group">
          <div class="form-group">
            <label for="lg_username" class="sr-only">Email du compte</label>
            <input type="email" class="form-control" id="lg_username" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="lg_password" class="sr-only">Mot de passe</label>
            <input type="password" class="form-control" id="lg_password" name="pass" placeholder="Mot de passe">
          </div>
        </div>
        <button type="submit" value="Connexion" name="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
      </div>
    </form>';?>
  </div>
</div>
</body>
</html>
  <?php 
}