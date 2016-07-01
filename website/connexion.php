<?php session_start();?>
<?php include('menu.php');
require ('steamauth/steamauth.php');
?><br><br><br><br><br><br><br><br>
<?php
//Si lutilisateur est connecte, on le deconecte
if(isset($_SESSION['email']))
{
  header("Location:monprofil.php");
?>
<?php
}
else
{
  $oemail = '';
  //On verifie si le formulaire a ete envoye
  if(isset($_POST['email'], $_POST['pass']))
  {
    //On echappe les variables pour pouvoir les mettre dans des requetes SQL
    if(get_magic_quotes_gpc())
    {
      $oemail = stripslashes($_POST['email']);
      $email = mysql_real_escape_string(stripslashes($_POST['email']));
      $pass = stripslashes($_POST['pass']);
    }
    else
    {
      $email = mysql_real_escape_string($_POST['email']);
      $pass = sha1($_POST['pass']);
    }
    //On recupere le mot de passe de lutilisateur
    $req = mysql_query('SELECT pass,id from profil where email="'.$email.'"');
    $dn = mysql_fetch_array($req);
    //On le compare a celui quil a entre et on verifie si le membre existe
    if($dn['pass']==$pass and mysql_num_rows($req)>0)
    {
      //Si le mot de passe es bon, on ne vas pas afficher le formulaire
      $form = false;
      //On enregistre son email dans la session email et son identifiant dans la session userid
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['userid'] = $dn['id'];
      header("location:monprofil.php");
?>
<?php
    }
    else
    {
      //Sinon, on indique que la combinaison nest pas bonne
      $form = true;
      $message = 'La combinaison que vous avez entr&eacute; n\'est pas bonne.';
    }
  }
  else
  {
    $form = true;
  }
  if($form)
  {
    //On affiche un message sil y a lieu
  if(isset($message))
  {
    echo '<div class="message">'.$message.'</div>';
  }
  //On affiche le formulaire
?>
<div class="content">
    <form action="" method="post">
        Veuillez entrer vos identifiants pour vous connecter:<br />
        <div class="center">
            <label for="email">Email</label><input type="text" name="email" id="email" value="<?php echo htmlentities($oemail, ENT_QUOTES, 'UTF-8'); ?>" /><br />
            <label for="pass">Mot de passe</label><input type="password" name="pass" id="pass" /><br />
            <input type="submit" value="Connection" />
    </div>
    </form>
</div>
<?php
  }
}
?>  <a href="motdepasseoublie.php">J'ai oubli&eacute; mon mot de passe</a>
    <a href="inscription.php">Je souhaite m'inscrire avec un mail</a>
    <?php
if(!isset($_SESSION['steamid'])) {
    echo "<div style='margin: 30px auto; text-align: center;'>Vous pouvez vous connecter via steam ou mail<br>";
    loginbutton();
  echo "</div>";
  }  else {
    header("Location:http://localhost/leon/website/inscriptionsteam.php");
  }?>
  <div style="display:none;" style='float:left;'>
      <a href='https://github.com/SmItH197/SteamAuthentication'>
        <button class='btn btn-success' style='margin: 2px 3px;' type='button'>GitHub Repo</button>
      </a>
      <a href='https://github.com/SmItH197/SteamAuthentication/releases'>
        <button class='btn btn-warning' style='margin: 2px 3px;' type='button'>Download</button>
      </a>
  </div>
<?php include('footer.php');?>