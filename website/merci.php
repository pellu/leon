<?php session_start(); ?>
<?php include('menu.php'); ?>
<?php
if(isset($_SESSION['email']))
{?>

  <section id="rest" class="container-fluid content-section text-center">
    <iframe src="https://www.youtube.com/embed/zzDOpvukhNo?autoplay=1" style="display: none;"></iframe>
    <div class="row">
      <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class='col-lg-2 col-md-12 col-sm-12 col-xs-12' id="gauche"></div>
        <div class='col-lg-8 col-md-12 col-sm-12 col-xs-12' id="fourofour">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1>You win !</h1>
            <div class="progress progress-striped active col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
              <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span class="sr-only">100% Complete (success)</span>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
              <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span class="sr-only">100% Complete (success)</span>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 load"><p>Votre participation a bien été prise en compte !</p></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p>Votre participation a bien été prise en compte !</p></div>
          </div>
          <a href="http://localhost/leon/website/mesannonces.php"><h3 class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-4">Retour</h3></a>
        </div>
          <div class='col-lg-2 col-md-12 col-sm-12 col-xs-12' id="droite"></div>
      </div>
    </div>
    <br/><br/><br/>
  </section>

<?php }else{?>
  <section id="rest" class="container-fluid content-section text-center">
    <div class="row">
      <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12' id="formulaire">
          <div class="message"><h1>Vous devez &ecirc;tre connect&eacute;(e).<br>pour visualiser ce contenu</h1><br/>
            <a href="connexion.php">Se connecter</a></div><br><br><br>
        </div></div>
    </div>
  </section>
<?php }?>
<?php include('footer.php'); ?>