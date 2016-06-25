<?php session_start();?>
<br><br>
<?php include('header.php');
include('config.php');?><br><br><br><br><h1>Inscription</h1>
<?php
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

    $stmt = $mysql->prepare("INSERT INTO profil(id, date_inscription, email, pass, avatar, pseudo, description, url) VALUES ('','$date_inscription', '$email', '$pass', '$avatar', '$pseudo','$description','$url')");
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':date_inscription', $date_inscription);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $pass);
    $stmt->bindParam(':avatar', $avatar);
    $stmt->bindParam(':description', $description);
    // insertion d'une ligne
    $pseudo=htmlentities($pseudo,ENT_QUOTES,'UTF-8');
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
      <label>Votre pseudo: <input type="text" name="pseudo" value="<?php echo $pseudo ?>"/></label><br/>
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
<?php include('footer.php');?>