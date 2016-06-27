<?php session_start();?>
<?php include('header.php'); include('config.php');
require ('steamauth/steamauth.php');
?><br><br><br><br><br><br><br><br>
<?php
//Si lutilisateur est connecte, on le deconecte
if(isset($_SESSION['email']))
{
  //On le deconecte en supprimant simplement les sessions email et userid
  unset($_SESSION['email'], $_SESSION['userid']);
?>
<div class="message">Vous avez bien &eacute;t&eacute; d&eacute;connect&eacute;.<br />
<a href="<?php echo $url_home; ?>">Accueil</a></div>
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
      $pass = $_POST['pass'];
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
?>
<div class="message">Vous avez bien &eacute;t&eacute; connect&eacute;. Vous pouvez acc&eacute;der &agrave; votre espace membre.<br />
<a href="<?php echo $url_home; ?>">Accueil</a></div>
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
    <form action="connexion.php" method="post">
        Veuillez entrer vos identifiants pour vous connecter:<br />
        <div class="center">
            <label for="email">Nom d'utilisateur</label><input type="text" name="email" id="email" value="<?php echo htmlentities($oemail, ENT_QUOTES, 'UTF-8'); ?>" /><br />
            <label for="pass">Mot de passe</label><input type="pass" name="pass" id="pass" /><br />
            <input type="submit" value="Connection" />
    </div>
    </form>
</div>
<?php
  }
}
?>
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
  //$avatar=$steamprofile['avatarfull'];

// SCRIPT ENVOI PHOTO
define('TARGET', 'photos/');    // Repertoire cible
define('MAX_SIZE', 100000);    // Taille max en octets du fichier
define('WIDTH_MAX', 800);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 800);    // Hauteur max de l'image en pixels
 
// Tableaux de donnees
$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
$infosImg = array();
 
// Variables
$extension = '';
$message = '';
$nomImage = '';
 
/************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/
 if( !is_dir(TARGET) ) {
   if( !mkdir(TARGET, 0755) ) {
     exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
  }
 }

    if(!empty($_POST)){
  // On verifie si le champ est rempli
  if( !empty($_FILES['avatar']['name']) )
  {
    // Recuperation de l'extension du fichier
    $extension  = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
    if(in_array(strtolower($extension),$tabExt))
    {
      // On recupere les dimensions du fichier
      $infosImg = getimagesize($_FILES['avatar']['tmp_name']);
 
      // On verifie le type de l'image
      if($infosImg[2] >= 1 && $infosImg[2] <= 14)
      {
        // On verifie les dimensions et taille de l'image
        if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['avatar']['tmp_name']) <= MAX_SIZE))
        {
          // Parcours du tableau d'erreurs
          if(isset($_FILES['avatar']['error']) 
            && UPLOAD_ERR_OK === $_FILES['avatar']['error'])
          {
            // On renomme le fichier
            $nomImage = md5(uniqid()) .'.'. $extension;
 
            // Si c'est OK, on teste l'upload
            if(move_uploaded_file($_FILES['avatar']['tmp_name'], TARGET.$nomImage))
            {
              $message = 'Upload réussi !';
            }
            else
            {
              // Sinon on affiche une erreur systeme
              $message = 'Problème lors de l\'upload !';
            }
          }
          else
          {
            $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
          }
        }
        else
        {
          // Sinon erreur sur les dimensions et taille de l'image
          $message = 'Erreur dans les dimensions de l\'image !';
        }
      }
      else
      {
        // Sinon erreur sur le type de l'image
        $message = 'Le fichier à uploader n\'est pas une image !';
      }
    }
    else
    {
      // Sinon on affiche une erreur pour l'extension
      $message = 'L\'extension du fichier est incorrecte !';
    }
  }
  else
  {
    // Sinon on affiche une erreur pour le champ vide
    $message = 'Veuillez remplir le formulaire svp !';
  }
}

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
if(isset($nomImage)){
  $avatar=$nomImage;
}else{$avatar="";}
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
    $stmt = $mysql->prepare("INSERT INTO profil(id, date_inscription, email, pass, avatar, pseudo, description, url, id_steam) VALUES ('','$date_inscription', '$email', '$pass', '$avatar', '$pseudo','$description','$url', '$id_steam')");
    $stmt->bindParam(':pseudo_steam', $pseudo_steam);
    $stmt->bindParam(':date_inscription', $date_inscription);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $pass);
    $stmt->bindParam(':avatar', $avatar);
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
    <form method="post" action="" enctype="multipart/form-data">
      <label style="display:none;">Votre pseudo: <input type="text" name="pseudo" value="<?php echo $pseudo_steam ?>"/></label><br/>
      <label>Votre pseudo est <a title="Vous pourrez changer votre pseudo une fois inscrit">*</a>: <?php echo $pseudo_steam ?></label>
      <label style="display:none;">IdSteam: <input type="text" name="id_steam" value="<?php echo $id_steam ?>"/></label><br/>
      <label>Votre mail <a title="Pas visible pour les autres membres">*</a>: <input type="mail" name="email" value="<?php echo $email ?>"></label>
      <label>Votre mot de passe</a>: <input type="password" name="pass" value="<?php echo $pass ?>"></label>
      <label>Confirmation du mot de passe: <input type="password" name="confirmation_pass" value="<?php echo $confirmation_pass ?>"></label>
      <label><input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" /></label>
      <label>Avatar <a title="Photo carré">*</a>: <input name="avatar" type="file" id="fichier_a_uploader" /></label>
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