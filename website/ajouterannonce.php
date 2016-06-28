<?php session_start();?>
<?php
  header( 'content-type: text/html; charset=ISO-8859-1' );
include('header.php');
if(isset($_SESSION['email'])){
include('config.php');
?>
<section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <br><br><br><br><br>
<?php
include('headerprofil.php');
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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM profil";
$result = $conn->query($sql);
?>
<div class="container">
  <div class="row">
    <div class="col-xs-4 col-xs-offset-4">
<?php
$req = $mysql->prepare("SELECT * FROM news");
$req->execute() or die(print_r($req->errorInfo())); 

// SCRIPT ENVOI PHOTO
define('TARGET', '../website/photos/');    // Repertoire cible
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
  if( !empty($_FILES['photo']['name']) )
  {
    // Recuperation de l'extension du fichier
    $extension  = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
    if(in_array(strtolower($extension),$tabExt))
    {
      // On recupere les dimensions du fichier
      $infosImg = getimagesize($_FILES['photo']['tmp_name']);
 
      // On verifie le type de l'image
      if($infosImg[2] >= 1 && $infosImg[2] <= 14)
      {
        // On verifie les dimensions et taille de l'image
        if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['photo']['tmp_name']) <= MAX_SIZE))
        {
          // Parcours du tableau d'erreurs
          if(isset($_FILES['photo']['error']) 
            && UPLOAD_ERR_OK === $_FILES['photo']['error'])
          {
            // On renomme le fichier
            $nomImage = md5(uniqid()) .'.'. $extension;
 
            // Si c'est OK, on teste l'upload
            if(move_uploaded_file($_FILES['photo']['tmp_name'], TARGET.$nomImage))
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
  $pseudo_news= $_POST['pseudo'];
}else{$pseudo_news="";}
if(isset($_POST['ville_news'])){
  $ville_news=$_POST['ville_news'];
}else{$ville_news="";}
if(isset($_POST['titre_news'])){
  $titre_news=$_POST['titre_news'];
}else{$titre_news="";}
if(isset($_POST['adresse'])){
  $adresse=$_POST['adresse'];
}else{$adresse="";}
if(isset($_POST['prix'])){
  $prix=$_POST['prix'];
}else{$prix="";}
if(isset($nomImage)){
  $photo=$nomImage;
}else{$photo="";}
if(isset($_POST['typedesoiree'])){
  $typedesoiree=$_POST['typedesoiree'];
}else{$typedesoiree="";}
if(isset($_POST['console'])){
  $console=$_POST['console'];
}else{$console="";}
if(isset($_POST['typedejeu'])){
  $typedejeu=$_POST['typedejeu'];
}else{$typedejeu="";}
if(isset($_POST['nb_participants'])){
  $nb_participants=$_POST['nb_participants'];
}else{$nb_participants="";}
if(isset($_POST['contenu_news'])){
  $contenu_news=$_POST['contenu_news'];
}else{$contenu_news="";}
if(isset($_POST['datedejeu'])){
  $datedejeu=$_POST['datedejeu'];
}else{$datedejeu=date("Y-m-d");}
if(isset($_POST['heuredejeu'])){
  $heuredejeu=$_POST['heuredejeu'];
}else{$heuredejeu=date("H:i");}
if(isset($_POST['url_news'])){
  $url_news=Slug($titre_news);
}else{$url_news="";}
$date_news=date("d-m-Y");
$heuredejeu=date("H:i");

if(!isset($_POST['submit']))
{
  if(empty($titre_news)) 
    {
    echo 'Seul le champs contenu peut etre vide'; 
    }

// Aucun champ n'est vide, on peut enregistrer dans la table 
else      
    {
    $stmt = $mysql->prepare("INSERT INTO news(id_news, date_news, pseudo_news, titre_news, ville_news, adresse, prix, photo, typedesoiree, console, typedejeu, nb_participants, contenu_news, datedejeu, heuredejeu, url_news) VALUES ('','$date_news', '$pseudo_news','$titre_news','$ville_news','$adresse','$prix','$photo','$typedesoiree','$console','$typedejeu','$nb_participants','$contenu_news','$datedejeu','$heuredejeu','$url_news')");
    $stmt->bindParam(':pseudo_news', $pseudo_news);
    $stmt->bindParam(':ville_news', $ville_news);
    $stmt->bindParam(':titre_news', $titre_news);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':photo', $photo);
    $stmt->bindParam(':typedesoiree', $typedesoiree);
    $stmt->bindParam(':console', $console);
    $stmt->bindParam(':typedejeu', $typedejeu);
    $stmt->bindParam(':nb_participants', $nb_participants);
    $stmt->bindParam(':contenu_news', $contenu_news);
    $stmt->bindParam(':datedejeu', $datedejeu);
    $stmt->bindParam(':heuredejeu', $heuredejeu);
    $stmt->execute();
    header('location:http://localhost/leon/admin/news.php');
    }
}
    else{
      echo '';
    }
?>
    <form method="post" action="" enctype="multipart/form-data">
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
$conn->close();?><br>
      <label>Titre:<input type="text" name="titre_news" value="<?php echo $titre_news ?>"/></label>
      <label>Ville:
        <select name="ville_news">
        <option value="" disabled selected>O&ugrave; vas-tu jouer ?</option>
        <option value="antony">Antony (92)</option>
        <option value="argenteuil">Argenteuil (95)</option>
        <option value="aubervilliers">Aubervilliers (93)</option>
        <option value="aulnay-sous-bois">Aulnay-sous-Bois (93)</option>
        <option value="asnieres-sur-seine">Asni&egrave;res-sur-Seine (92)</option>
        <option value="Boulogne-Billancourt">Boulogne-Billancourt (92)</option>
        <option value="bondy">Bondy (93)</option>
        <option value="cergy">Cergy (95)</option>
        <option value="champigny-sur-marne">Champigny-sur-Marne (94)</option>
        <option value="chelles">Chelles (77)</option>
        <option value="clamart">Clamart (92)</option>
        <option value="clichy">Clichy (92)</option>
        <option value="colombes">Colombes (92)</option>
        <option value="courbevoie">Courbevoie (92)</option>
        <option value="creteil">Cr&eacute;teil (94)</option>
        <option value="drancy">Drancy (93)</option>
        <option value="epinay-sur-seine">&Eacute;pinay-sur-Seine (93)</option>
        <option value="evry">&Eacute;vry (91)</option>
        <option value="fontenay-sous-Bois">Fontenay-sous-Bois (94)</option>
        <option value="issy-les-moulineaux">Issy-les-Moulineaux (92)</option>
        <option value="ivry-sur-seine">Ivry-sur-Seine (94)</option>
        <option value="le-blanc-mesnil">Le Blanc-Mesnil (93)</option>
        <option value="levallois-perret">Levallois-Perret (92)</option>
        <option value="maisons-alfort">Maisons-Alfort (94)</option>
        <option value="meaux">Meaux (77)</option>
        <option value="montreuil">Montreuil (93)</option>
        <option value="nanterre">Nanterre (92)</option>
        <option value="paris1">Neuilly-sur-Seine (92)</option>
        <option value="noisy-le-grand">Noisy-le-Grand (93)</option>
        <option value="pantin">Pantin (93)</option>
        <option value="paris1">Paris (75 001)</option>
        <option value="paris1">Paris (75 002)</option>
        <option value="paris3">Paris (75 003)</option>
        <option value="paris4">Paris (75 004)</option>
        <option value="paris5">Paris (75 005)</option>
        <option value="paris6">Paris (75 006)</option>
        <option value="paris7">Paris (75 007)</option>
        <option value="paris8">Paris (75 008)</option>
        <option value="paris9">Paris (75 009)</option>
        <option value="paris10">Paris (75 010)</option>
        <option value="paris11">Paris (75 011)</option>
        <option value="paris12">Paris (75 012)</option>
        <option value="paris13">Paris (75 013)</option>
        <option value="paris14">Paris (75 014)</option>
        <option value="paris15">Paris (75 015)</option>
        <option value="paris16">Paris (75 016)</option>
        <option value="paris17">Paris (75 017)</option>
        <option value="paris18">Paris (75 018)</option>
        <option value="paris19">Paris (75 019)</option>
        <option value="paris20">Paris (75 020)</option>
        <option value="rueil-malmaison">Rueil-Malmaison (92)</option>
        <option value="saint-denis">Saint-Denis (93)</option>
        <option value="saint-maur-des-fosses">Saint-Maur-des-Foss&eacute;s (94)</option>
        <option value="sarcelles">Sarcelles (95)</option>
        <option value="sartrouville">Sartrouville (78)</option>
        <option value="sevran">Sevran (93)</option>
        <option value="versailles">Versailles</option>
        <option value="villejuif">Villejuif (94)</option>
        <option value="vitry-sur-seine">Vitry-sur-Seine (94)</option>
      </select>
    </label><br>
    <label>Adresse:<input type="text" name="adresse" value="<?php echo $adresse ?>"/></label><br>
    <label>Prix:
      <select name="prix">
        <option value="5">5 &euro;</option>
        <option value="10" selected>10 &euro;</option>
        <option value="15">15 &euro;</option>
      </select>
    </label><br>
    <label><input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" /></label>
    <label>Photo <a title="Photo carré">*</a>: <input name="photo" type="file" id="fichier_a_uploader" /></label>
    <label>Type de soir&eacute;e:
      <select name="typedesoiree">
        <option value="" disabled selected>Choisir</option>
        <option value="Casual">Casual</option>
        <option value="Tournoi">Tournoi</option>
        <option value="Formation">Formation</option>
      </select>
    </label>
    <label>Type de jeu:<input type="text" name="typedejeu" value="<?php echo $typedejeu ?>"/></label>
    <label>Console:
      <select name="console">
        <option value="" disabled selected>Choisir</option>
        <option value="Atari">Atari</option>
        <option value="Microsoft">Microsoft</option>
        <option value="Nintendo">Nintendo</option>
        <option value="Sega">Sega</option>
        <option value="Sony">Sony</option>
      </select>
    </label><br>
    <label>Nombre de participants:
      <select name="nb_participants">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
      </select>
    </label><br>
    <label>Description:<input type="text" name="contenu_news" value="<?php echo $contenu_news ?>"/></label>
    <label>Date de la soir&eacute;e:<input type="date" name="datedejeu" value="<?php echo $datedejeu ?>"/></label>
    <label>Heure de la soir&eacute;e:<input type="time" name="heuredejeu" value="<?php echo $heuredejeu ?>"/></label><br>
    <input type="hidden" name="url_news" value="<?php echo $url_news ?>"/>
    <input type="submit" value="ENVOYER"/>
    </form>
    </div>
  </div>
</div>
</div></div></section>
<?php
}else{?>
<br><br><br><br><br>
<section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="message">Pour acc&eacute;der &agrave; cette page, vous devez &ecirc;tre connect&eacute;.<br />
<a href="connexion.php">Se connecter</a></div>
</div></div></section>
<?php
}
?>

<?php include('footer.php');?>