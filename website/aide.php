<?php session_start(); ?>
<?php include('menu.php');
header('content-type: text/html; charset=ISO-8859-1');
?>
    <section id="rest" class="container-fluid content-section text-center">
        <iframe src="https://www.youtube.com/embed/rE4ZdMZqkHQ?autoplay=1" style="display: none;"></iframe>
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2' id="fourofour">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1>Aide</h1>
                        <h2 id="nobody">Personne ne peut t'aider</h2>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
                            <img src="http://31.media.tumblr.com/1d9c0607ad727d8c9efd0e20f3ca6e57/tumblr_mlm1myFIje1rrftcdo1_500.gif" alt="" class="img-responsive">
                        </div>
                        <div class="row">
                            <a href="http://localhost/leon/website/index.php"><h3
                                    class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-4">
                                    Try again</h3></a>
                        </div>
                    </div>
                    <?php
                    if (!empty($_SERVER['HTTP_REFERER'])) {
                        echo '<p><a href="' . $_SERVER['HTTP_REFERER'] . '">
							    <a href="http://localhost/leon/website/index.php"><h3 class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-4">Retour page pr&eacutec&eacutedente</h3></a>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>