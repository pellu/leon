<br><br>
<footer>
    <div class="row">

    </div>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 col-lg-offset-1 centered">
                <img src="http://localhost/leon/website/img/logo-final.png">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 left">
                <p><a href="http://localhost/leon/website/" class="footer-title">2016 &copy; Playce</a></p>
                <p><a href="http://localhost/leon/website/">Concept</a></p>
                <p><a href="http://localhost/leon/website/search.php">Recherche</a></p>
                <p><a href="http://localhost/leon/website/mentionslegales.php">Mentions l&eacute;gales</a></p>
                <p><a href="http://localhost/leon/website/mentionslegales.php">Conditions g&eacute;n&eacute;rales
                        d'utilisation</a></p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 left">
                <p><a href="http://localhost/leon/website/contact.php" class="footer-title">Contact</a></p>
                <p><a href="http://localhost/leon/website/faq.php">FAQ</a></p>
                <p><a href="http://localhost/leon/website/aide.php">Aide</a></p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 left">
                <p class="footer-title">Suivez-nous</p>
                <ul>
                    <li><a target="_blank" href="https://www.facebook.com/letsplayce">Facebook</a></li>
                    <li><a target="_blank" href="https://twitter.com/letsplayce">Twitter</a></li>
                    <li><a target="_blank" href="https://www.instagram.com/letsplayce/">Instagram</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php
                if (isset($_POST['email'])) $email = $_POST['email']; else $email = "";
                $ok = "";
                if (isset($_POST['ajout'])) {
                    $date = date("d-m-Y");
                    $heure = date("H:i:s");
                    require_once('config.php');
                    $mysql->query("INSERT INTO newsletter (id, date, heure, email)VALUES ('', '$date', '$heure', '$email')");
                    $ok = "<p style='font-size: 14px; color: #7ae3f9; font-weight: bold;'>Votre mail a bien été pris en compte,<br/>vous recevrez nos prochaines newsletter.</p>";
                    $email = '';
                }
                ?>
                <?php echo $ok; ?>
                <p>S'inscrire &agrave; la newsletter</p>
                <form role="form" id="form_ajax" action="" method="post" data-enable-shim="true">
                    <div class="input-group">
                        <input type="email" id="email" name="email" class="form-control" value=""
                               placeholder="Entrez votre mail" required="">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit" name="ajout" id="check">></button>
						</span>
                    </div><!-- fin input-group -->
                </form>
            </div>
        </div>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/grayscale.js"></script>
</body>
</html>