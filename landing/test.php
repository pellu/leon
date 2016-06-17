<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
    <meta charset="utf-8">
    <title>LEON - Landing Page</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Parallax One Pager template example snippet for Bootstrap." />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
<body>
<?php
  if(isset($_POST['email'])) $email=$_POST['email']; else $email="";
  $ok = "";
  if(isset($_POST['ajout'])){
    $date = date("d-m-Y");
    $heure = date("H:i");
    require_once('config.php');
    $mysql->query("INSERT INTO newsletter (id, date, heure, email)VALUES ('', '$date', '$heure', '$email')");
    $ok = "Le mail est bien reçu<br><br>";
  }
?>
<!--parallax 1 -->
  <section class="bg-1 text-center">
    <h1 class="">Bootstrap Parallax</h1>
    <p class="lead">Add Some Motion</p>
    <P><a class="btn btn-default page-scroll" href="#2">Click Me to Scroll Down!</a></P>
  </section>
<!--parallax 2-->
  <section class="bg-2 text-center" id="2">
    <h1 class="">Bootstrap Parallax</h1>
    <p class="lead">Add Some Motion</p>
    <P><a class="btn btn-default page-scroll" href="#3">Click Me to Scroll Down!</a></P>
  </section>
<!--parallax 3-->
  <div class="container" id="3">
    <div class="row">
      <div class="divider"></div>
        <div class="col-md-6 col-md-offset-3">
          <h1 class="text-center">NOM DEFINITIF</h1>
          <p class="text-center">Je suis une baseline</p><br><br>
          <p>Obtenez un compte au lancement</p>
          <?php echo $ok;?>
          <form role="form" id="form_ajax" action="" method="post" data-enable-shim="true">
            <div class="input-group">
              <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Votre mail" required>
              <span class="input-group-btn">
                <button class="btn btn-primary" type="submit" name="ajout" id="check">J'envoie</button>
              </span>
            </div><!-- fin input-group -->
          </form><br>
        </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="divider"></div>
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="">DESARROLLO SOFTWARE</h3>
            </div>
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra
            varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt
            condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis
            nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor
            accumsan. Aliquam in felis sit amet augue.</div>
            <div class="panel-footer text-right">
              <a href="#" class="btn btn-default">More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="">APLICACIONES MOVILES.</h3>
            </div>
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra
            varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt
            condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis
            nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor
            accumsan. Aliquam in felis sit amet augue.</div>
            <div class="panel-footer text-right">
              <a href="#" class="btn btn-default">More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="">SERVICIO TESTING</h3>
            </div>
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra
            varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt
            condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis
            nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor
            accumsan. Aliquam in felis sit amet augue.</div>
            <div class="panel-footer text-right">
              <a href="#" class="btn btn-default">More</a>
            </div>
          </div>
        </div>
    </div>
  </div>
  <div class="divider"></div>
  <div id="footer" class="">
    <div class="container">
      <p class="text-muted">LEON - <a href="contact">Contact</a> - <a href="presse">Kit Presse</a> - IESA Multimédia</a></p>
    </div>
  </div>
  <script type='text/javascript' src="js/jquery.min.js"></script>
  <script type='text/javascript' src="js/bootstrap.min.js"></script>
  <script type='text/javascript' src="js/jquery.easing.min.js"></script>
  <script type='text/javascript' src="js/scrolling-nav.js"></script>
  <!--<div class="ad collapse in">
    <button class="ad-btn-hide" data-toggle="collapse" data-target=".ad">&times;</button>
    <script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?zoneid=1673&serve=C6AILKT&placement=bootplycom" id="_carbonads_js"></script>
    <hr class="">-->
  </div>
</body>
</html>