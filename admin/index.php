<?php
//Tester s'il y a un cookie admin
if(isset($_COOKIE['admin']) ){
  include('header.php');
//Si Oui ont affiche la page
$title="Administration - HOME";
require_once('config.php');
$date = date("d-m-Y");
$heure = date("H:i:s");
?>
<?php header( 'content-type: text/html; charset=UTF-8' );
?>
<h2><center>Bienvenue dans l'admin petit paon</center></h2><br>
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
  require_once('config.php');
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