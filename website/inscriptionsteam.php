<?php include('header.php');
require ('steamauth/steamauth.php');
if(!isset($_SESSION['steamid'])) {
    echo "<div style='margin: 30px auto; text-align: center;'>Vous pouvez vous connecter via steam<br>";
    loginbutton('');
  echo "</div>";
  }  else {
    include ('steamauth/userInfo.php');
    include('header.php');
    include('config.php');
  ?>
  <section class="container content-section text-center">
  <div class="row">
    <div class="col-lg-12 col-ls-12 col-xs-12">
    <br><br><br><br><br><br>
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
<?php if(isset($_SESSION['steamid'])) {?>
    <h4 style="display:none;" style='margin-bottom: 3px; float:left;'>Steam WebAPI-Output:</h4><span style='float:right;'>Je me d&eacute;connecte<br> de steam<?php logoutbutton(); ?></span>
    <?php
    }

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

$pseudo_steam=$steamprofile['personaname'];
$id_steam=$steamprofile['steamid'];

if(isset($_POST['description'])){
  $description=$_POST['description'];
}else{$description="";}
if(isset($pseudo_steam)){
  $pseudo=$pseudo_steam;
}else{$pseudo="";}
if(isset($pseudo_steam)){
  $pseudo=$pseudo_steam;
}else{$pseudo="";}
if(isset($_POST['city'])){
  $city=$_POST['city'];
}else{$city="";}
if(isset($nomImage)){
  $avatar=$nomImage;
}else{$avatar="";}

//On verifie que le formulaire a ete envoye
if(isset($_POST['pseudo'], $_POST['pass'], $_POST['passverif'], $_POST['email']) and $_POST['pseudo']!='')
{

  //On enleve lechappement si get_magic_quotes_gpc est active
  if(get_magic_quotes_gpc())
  {

    $_POST['pseudo'] = stripslashes($_POST['pseudo']);
    $_POST['email'] = stripslashes($_POST['email']);
    $_POST['pass'] = stripslashes($_POST['pass']);
    $_POST['passverif'] = stripslashes($_POST['passverif']);
    $_POST['city'] = stripslashes($_POST['city']);
    $_POST['description'] = stripslashes($_POST['description']);
  }
  //On verifie si le mot de passe et celui de la verification sont identiques
  if($_POST['pass']==$_POST['passverif'])
  {
    //On verifie si le mot de passe a 6 caracteres ou plus
    if(strlen($_POST['pass'])>=6)
    {
      //On verifie si lemail est valide
      if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
      {
        //Generation du slug
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

        $pseudo = mysql_real_escape_string($_POST['pseudo']);
        $email = mysql_real_escape_string($_POST['email']);
        $pass = mysql_real_escape_string(sha1($_POST['passverif']));
        $city = mysql_real_escape_string($_POST['city']);
        $description = mysql_real_escape_string($_POST['description']);

        if(empty($_POST['choix'])){
        }else{
          $date = date("d-m-Y");
          $heure = date("H:i:s");
          $mysql->query("INSERT INTO newsletter (id, date, heure, email)VALUES ('', '$date', '$heure', '$email')");
        }

        //On verifie sil ny a pas deja un utilisateur inscrit avec le pseudo choisis
        $dn = mysql_num_rows(mysql_query('SELECT id FROM profil WHERE email="'.$email.'"'));
        if($dn==0)
        {
          //On recupere le nombre dutilisateurs pour donner un identifiant a lutilisateur actuel
          $dn2 = mysql_num_rows(mysql_query('SELECT id FROM profil'));
          $id = $dn2+1;
          $url=Slug($pseudo);
          $date_inscription=date("d-m-Y");
          //On enregistre les informations dans la base de donnee
          if(mysql_query('INSERT INTO profil (id, date_inscription, pseudo, description, pass, email, city, avatar, url, id_steam) VALUES ("'.$id.'", "'.$date_inscription.'", "'.$pseudo.'", "'.$description.'", "'.$pass.'", "'.$email.'", "'.$city.'", "'.$avatar.'", "'.$url.'", "'.$id_steam.'")'))
          {
            //Si ca a fonctionne, on naffiche pas le formulaire
            $form = false;
?>
<div class="message">Vous avez bien &eacute;t&eacute; inscrit. Vous pouvez dor&eacute;navant vous connecter.<br />
<a href="connexion.php">Se connecter</a></div>
<?php
          }
          else
          {
            //Sinon on dit quil y a eu une erreur
            $form = true;
            $message = 'Une erreur est survenue lors de l\'inscription.';
          }
        }
        else
        {
          //Sinon, on dit que le pseudo voulu est deja pris
          $form = true;
          $message = 'Un autre utilisateur utilise d&eacute;j&agrave; le mail que vous d&eacute;sirez utiliser.';
        }
      }
      else
      {
        //Sinon, on dit que lemail nest pas valide
        $form = true;
        $message = 'L\'email que vous avez entr&eacute; n\'est pas valide.';
      }
    }
    else
    {
      //Sinon, on dit que le mot de passe nest pas assez long
      $form = true;
      $message = 'Le mot de passe que vous avez entr&eacute; contien moins de 6 caract&egrave;res.';
    }
  }
  else
  {
    //Sinon, on dit que les mots de passes ne sont pas identiques
    $form = true;
    $message = 'Les mots de passe que vous avez entr&eacute; ne sont pas identiques.';
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
    <form action="" method="POST" enctype="multipart/form-data">
        Veuillez remplir ce formulaire pour vous inscrire:<br />
        <div class="center">
            <label for="pseudo" style="display:none;">Votre pseudo: <input type="text" name="pseudo" value="<?php echo $pseudo;?>"/></label><br/>
            <label>Votre pseudo est <a title="Vous pourrez changer votre pseudo une fois inscrit">*</a>: <?php echo $pseudo_steam ?></label><br/>
            <!--<label for="pseudo">Nom d'utilisateur</label><input type="text" name="pseudo" value="<?php //if(isset($_POST['pseudo'])){echo htmlentities($_POST['pseudo'], ENT_QUOTES, 'UTF-8');} ?><!--" /><br />-->
            <label for="pass">Mot de passe<span class="small">(6 caract&egrave;res min.)</span></label><input type="password" name="pass" /><br />
            <label for="passverif">Mot de passe<span class="small">(v&eacute;rification)</span></label><input type="password" name="passverif" /><br />
            <label for="email">Email</label><input type="text" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
            <label><input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" /></label>
          <label>Avatar: <input name="avatar" type="file" id="fichier_a_uploader" /></label><br>
                    <label>Votre ville:
            <select name="city">
              <option value="" disabled selected>Quelle est ta ville ?</option>
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
              <option value="versailles">Versailles (78)</option>
              <option value="villejuif">Villejuif (94)</option>
              <option value="vitry-sur-seine">Vitry-sur-Seine (94)</option>
            </select>
          </label><br>
          <label>Description <a title="Les utilisateurs veront votre description">*</a>: <textarea name="description"/><?php echo $description ?></textarea></label>
          <label for="id_steam" style="display:none;"><input type="text" name="id_steam" value="<?php echo $id_steam;?>"/></label><br/>
          <input type="checkbox" name="choix[]" value="1" checked> Je m'inscris &agrave; la newsletter<br>
          <input type="submit" value="Envoyer" />
      </div>
    </form>
</div>
<?php
}
?>
<?php
}
?>
</div></div></section>
<?php include('footer.php');?>