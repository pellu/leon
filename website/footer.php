<footer>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 col-lg-offset-1 centered">
                <img id="playce" src="http://localhost/leon/website/img/logo-final.png">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 left separator">
                <p class="footer-title"><a href="http://localhost/leon/website/" class="footer-title">2016 &copy;
                        Playce</a></p>
                <p><a href="http://localhost/leon/website/">Concept</a></p>
                <p><a href="http://localhost/leon/website/search.php">Recherche</a></p>
                <p><a href="http://localhost/leon/website/mentionslegales.php">Mentions l&eacute;gales</a></p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 left">
                <p class="footer-title"><a href="http://localhost/leon/website/contact.php"
                                           class="footer-title">Contact</a></p>
                <p><a href="http://localhost/leon/website/faq.php">FAQ</a></p>
                <p><a href="http://localhost/leon/website/cgu.php">CGU</a></p>
                <p><a href="http://letsplayce.com/website/img/KitPresse-playce.zip"
                        onclick="trackOutboundNewWindow('http://letsplayce.com/website/img/KitPresse-playce.zip'); return false;"
                        onclick="window.open(this.href); return false;" id="kitpresse" alt="Télécharger le Kit Press de Playce - LetsPlayce.com"></a>
                </p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 left">
                <p class="footer-title">Suivez-nous</p>
                <a target="_blank" href="https://www.facebook.com/letsplayce" ><i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a target="_blank" href="https://twitter.com/letsplayce" ><i class="fa fa-twitter" aria-hidden="true"></i>

                </a>
                <a target="_blank" href="https://www.instagram.com/letsplayce/" ><i class="fa fa-instagram" aria-hidden="true"></i>

                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php
                if (isset($_POST['email'])) $email = $_POST['email']; else $email = "";
                $ok = "";
                if (isset($_POST['ajout'])) {
                    $date = date("d-m-Y");
                    $heure = date("H:i:s");
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 

                    $sql = "INSERT INTO newsletter (id, date, heure, email) VALUES ('', '$date', '$heure', '$email')";

                    if ($conn->query($sql) === TRUE) {
                        $ok="<p style='font-size: 14px; color: #7ae3f9; font-weight: bold;'>Votre mail a bien &eacute;t&eacute; pris en compte,<br/>vous recevrez nos prochaines newsletter.</p>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $conn->close();
                }
                ?>
                <?php echo $ok; ?>
                <p class="footer-title">S'inscrire &agrave; la newsletter</p>
                <form role="form" id="form_ajax" action="" method="post" data-enable-shim="true">
                    <div class="input-group">
                        <input type="email" id="email" name="email" class="form-control" value=""
                               placeholder="Entrez votre mail" required="">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit" name="ajout" id="check">></button>
						</span>
                    </div>
                </form>
            </div>
        </div>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/grayscale.js"></script>

<?php if(isset($_SESSION['email'])){
echo'<script src="js/main.js"></script>';
}else{}?>
</body>
</html>