<?php session_start();?>
<?php include('header.php');
require ('steamauth/steamauth.php');
?>
<?php
$message="";
if(isset($_POST['submit']))
{
  $email=htmlspecialchars($_POST['email']);
  $pass=sha1(htmlspecialchars($_POST['pass']));
  require_once('config.php');
  $requete=$mysql->prepare('SELECT * FROM profil WHERE email = :email AND pass = :pass');
  $requete->execute(array(':email'=>$email,':pass'=>$pass));
  if($requete->rowCount()==1)
  {
    $donnee=$requete->fetch(PDO::FETCH_ASSOC);
    $_SESSION=$donnee;
      $lifetime=600;
      session_set_cookie_params($lifetime);
      $timestamp = time() + 30*24*3600;
    $hashed_password = sha1($_SESSION['pseudo']);
    setcookie("user",sha1($_SESSION['pseudo']), $timestamp);
    header('location:http://localhost/leon/website/monprofil.php');
    $message="Connexion ok";
  }
  else
  {
    $message="Email ou mot de passe invalide";
  }
}
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
    </div></div>
    <a href="inscription.php">Je souhaite m'inscrire avec un mail</a>
    <?php
if(!isset($_SESSION['steamid'])) {
    echo "<div style='margin: 30px auto; text-align: center;'>Vous pouvez vous connecter via steam ou mail<br>";
    loginbutton();
  echo "</div>";
  }  else {
    include ('steamauth/userInfo.php');
  ?>
  <div style="display:none;" style='float:left;'>
      <a href='https://github.com/SmItH197/SteamAuthentication'>
        <button class='btn btn-success' style='margin: 2px 3px;' type='button'>GitHub Repo</button>
      </a>
      <a href='https://github.com/SmItH197/SteamAuthentication/releases'>
        <button class='btn btn-warning' style='margin: 2px 3px;' type='button'>Download</button>
      </a>
    </div>
    <br>
    <br>

    <h4 style="display:none;" style='margin-bottom: 3px; float:left;'>Steam WebAPI-Output:</h4><span style='float:right;'><?php logoutbutton(); ?></span>
    <table style="display:none;" class='table table-striped'>
      <tr>
        <td><b>Variable name</b></td>
        <td><b>Value</b></td>
        <td><b>Description</b></td>
      </tr>
      <tr>
        <td>$steamprofile['steamid']</td>
        <td><?=$steamprofile['steamid']?></td>
        <td>SteamID64 of the user</td>
      </tr>
      <tr>
        <td>$steamprofile['communityvisibilitystate']</td>
        <td><?=$steamprofile['communityvisibilitystate']?></td>
        <td>1 - Account not visible; 3 - Account is public (Depends on the relationship of your account to the others)</td>
      </tr>
      <tr>
        <td>$steamprofile['profilestate']</td>
        <td><?=$steamprofile['profilestate']?></td>
        <td>1 - The user has a Steam Community profile; 0 - if not</td>
      </tr>
      <tr>
        <td>$steamprofile['personaname']</td>
        <td><?=$steamprofile['personaname']?></td>
        <td>Public name of the user</td>
      </tr>
      <tr>
        <td>$steamprofile['lastlogoff']</td>
        <td><?=$steamprofile['lastlogoff']?></td>
        <td>
          <a href='http://www.unixtimestamp.com/' target='_blank'>Unix timestamp</a> of the user's last logoff
        </td>
      </tr>
      <tr>
        <td>$steamprofile['profileurl']</td>
        <td><?=$steamprofile['profileurl']?></td>
        <td>Link to the user's profile</td>
      </tr>
      <tr>
        <td>$steamprofile['personastate']</td>
        <td><?=$steamprofile['personastate']?></td>
        <td>0 - Offline, 1 - Online, 2 - Busy, 3 - Away, 4 - Snooze, 5 - looking to trade, 6 - looking to play</td>
      </tr>
      <tr>
        <td>$steamprofile['realname']</td>
        <td><?=$steamprofile['realname']?></td>
        <td>"Real" name</td>
      </tr>
      <tr>
        <td>$steamprofile['primaryclanid']</td>
        <td><?=$steamprofile['primaryclanid']?></td>
        <td>The ID of the user's primary group</td>
      </tr>
      <tr>
        <td>$steamprofile['timecreated']</td>
        <td><?=$steamprofile['timecreated']?>
        </td>
        <td>
          <a href='http://www.unixtimestamp.com/' target='_blank'>Unix timestamp</a> for the time the user's account was created
        </td>
      </tr>
      <tr>
        <td>$steamprofile['uptodate']</td>
        <td><?=$steamprofile['uptodate']?></td>
        <td>
          <a href='http://www.unixtimestamp.com/' target='_blank'>Unix timestamp</a> for the time the user's account information was last updated
        </td>
      </tr>
      <tr>
        <td>$steamprofile['avatar']</td>
        <td>
          <img src='<?=$steamprofile['avatar']?>'><br>
          <?=$steamprofile['avatar']?>
        </td>
        <td>Address of the user's 32x32px avatar</td>
      </tr>
      <tr>
        <td>$steamprofile['avatarmedium']</td>
        <td>
          <img src='<?=$steamprofile['avatarmedium']?>'><br>
          <?=$steamprofile['avatarmedium']?>
        </td>
        <td>Address of the user's 64x64px avatar</td>
      </tr>
      <tr>
        <td>$steamprofile['avatarfull']</td>
        <td>
          <img src='<?=$steamprofile['avatarfull']?>'><br>
          <?=$steamprofile['avatarfull']?>
        </td>
        <td>Address of the user's 184x184px avatar</td>
      </tr>
    </table>
    <?php
    }    
    ?>
  </div>
  <?php
if(isset($steamprofile['avatarfull'])){
  include('config.php');
header( 'content-type: text/html; charset=ISO-8859-1' );
/* Remplace caractères accentués d'une chaine */
function remove_accent($str)
{
  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ','œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
  return str_replace($a, $b, $str);
}
/* Générateur de Slug (Friendly Url) : convertit un titre en une URL conviviale.*/
function Slug($str){
  return mb_strtolower(preg_replace(array('/[^a-zA-Z0-9 \'-]/', '/[ -\']+/', '/^-|-$/'),
  array('', '-', ''), remove_accent($str)));
}
?>
<div class="container">
  <div class="row">
    <div class="col-xs-6 col-xs-offset-3">
<?php
$req = $mysql->prepare("SELECT * FROM profil");
$req->execute() or die(print_r($req->errorInfo()));
  $pseudo_steam=$steamprofile['personaname'];
  $id_steam=$steamprofile['steamid'];
if(isset($_POST['pseudo'])){
  $pseudo=$_POST['pseudo'];
}else{$pseudo="";}
if(isset($_POST['description'])){
  $description=$_POST['description'];
}else{$description="";}
if(isset($_POST['email'])){
  $email=$_POST['email'];
}else{$email="";}
if(isset($_POST['pass'])){
  $pass=sha1($_POST['pass']);
}else{$pass="";}
if(isset($_POST['confirmation_pass'])){
  $confirmation_pass=sha1($_POST['confirmation_pass']);
}else{$confirmation_pass="";}
if(isset($_POST['url'])){
  $url=Slug($pseudo);
}else{$url="";}
if(isset($_POST['id_description'])){
  $id_description=$_POST['id_description'];
}else{$id_description="";}
$date_inscription = date("Y-m-d");

if(!isset($_POST['submit']))
{
  if(empty($pseudo) AND empty($email) AND empty($pass) AND empty($confirmation_pass)) 
    {
    echo 'Seul le champ description peut-&ecirc;tre vide';
    }

// Aucun champ n'est vide, on peut enregistrer dans la table 
else      
    {
    $stmt = $mysql->prepare("INSERT INTO profil(id, date_inscription, email, pass, pseudo, description, url, id_steam) VALUES ('','$date_inscription', '$email', '$pass', '$pseudo','$description','$url', '$id_steam')");
    $stmt->bindParam(':pseudo_steam', $pseudo_steam);
    $stmt->bindParam(':date_inscription', $date_inscription);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $pass);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id_steam', $id_steam);
    // insertion d'une ligne
    $pseudo_steam=htmlentities($pseudo_steam,ENT_QUOTES,'UTF-8');
    $description=htmlentities($description,ENT_QUOTES,'UTF-8');
    $stmt->execute();
    header('location:http://localhost/leon/website/monprofil.php');
    }
}
    else{
      echo '';
    }
?>
    <form method="post" action="">
      <label style="display:none;">Votre pseudo: <input type="text" name="pseudo" value="<?php echo $pseudo_steam ?>"/></label><br/>
      <label>Votre pseudo est <a title="Vous pourrez changer votre pseudo une fois inscrit">*</a>: <?php echo $pseudo_steam ?></label>
      <label style="display:none;">IdSteam: <input type="text" name="id_steam" value="<?php echo $id_steam ?>"/></label><br/>
      <label>Votre mail <a title="Pas visible pour les autres membres">*</a>: <input type="mail" name="email" value="<?php echo $email ?>"></label>
      <label>Votre mot de passe</a>: <input type="text" name="pass" value="<?php echo $pass ?>"></label>
      <label>Confirmation du mot de passe: <input type="text" name="confirmation_pass" value="<?php echo $confirmation_pass ?>"></label>
      <label>Description <a title="Les utilisateurs veront votre description">*</a>: <textarea name="description"/><?php echo $description ?></textarea></label><br/>
      <input type="hidden" name="url" value="<?php echo $url ?>"/>
      <input type="submit" value="ENVOYER"/>
    </form>
    </div>
  </div>
</div>

</body>
</html>
<?php
}else{}
?>
<?php include('footer.php');?>