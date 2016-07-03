<?php session_start(); ?>
<?php include('menu.php'); ?>
    <section id="rest" class="container-fluid content-section text-center">
        <iframe src="https://www.youtube.com/embed/votpmwC25Ek?autoplay=1" style="display: none;"></iframe>
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2' id="fourofour">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1>Game Over</h1>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="http://localhost/leon/website/img/404.jpg" alt="">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2>404</h2>
                        <a href="http://localhost/leon/website/index.php"><h3 class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-4">Try again</h3></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
if (!empty($_SERVER['HTTP_REFERER'])) {
    echo '<p><a href="' . $_SERVER['HTTP_REFERER'] . '">Retour page pr&eacutec&eacutedente</a></p>';
}
?>
<?php include('footer.php'); ?>