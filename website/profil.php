<?php
header( 'content-type: text/html; charset=UTF-8' );
include("config.php");
$id=$_GET["id"];
$mysql = "SELECT * FROM profil WHERE id='$id' LIMIT 1";
$req = mysql_query($mysql) or die( mysql_error()." ERROR");
$data = mysql_fetch_assoc($req);
if(isset($data['url'])) {
	if($data['url'] !=$_GET['url']){
		header("Location: /leon/website/profil/".$data["url"]."-".$data["id"]);
	}
}
 else{
 	header("Location: /leon/test/404.php");
}
?>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
	<meta charset="utf-8">
	<link rel="stylesheet" media="screen" type="text/css" title="style" href="http://localhost/leon/website/css/style.css" />
	<link rel="stylesheet" media="screen" type="text/css" title="style" href="http://localhost/leon/website/css/bootstrap.min.css" />
	</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars">Menu</i>
                </button>
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo-final.png">
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../index.php">Accueil</a>
                    </li>
                    <li>
                        <a href="#partenaire">Trouver un partenaire</a>
                    </li>
                    <li>
                        <a href="#nouveau">Nouveau sur la playce ?</a>
                    </li>
                    <li>
                        <a href="#connexion">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
				<h2>Pseudo : <?php echo $data['pseudo'];?></h2>
				<h3>Utilisateur inscrit le : <?php echo $data['date']; ?></h3>
				<p>Description : <?php echo $data['description']; ?></p>
            </div>
        </div>
    </section>
<br><br>
    <footer>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
            <div class="col-lg-3">
                <img src="http://localhost/leon/website/img/logo-final.png">
            </div>
            <div class="col-lg-2">
                <p>Playce</p>
                <ul>
                    <li>Concept</li>
                    <li>Recherche</li>
                    <li>Mentions légales</li>
                </ul>
            </div>
            <div class="col-lg-2">
                <p>Contact</p>
                <ul>
                    <li>FAQ</li>
                    <li>Aide</li>
                </ul>
            </div>
            <div class="col-lg-2">
                <p>Suivez-nous</p>
                <ul>
                    <li>FAQ</li>
                    <li>Aide</li>
                </ul>   
            </div>
            <div class="col-lg-3">
                <p>S'inscrire à la newsletter</p>
                 <form role="form" id="form_ajax" action="" method="post" data-enable-shim="true">
                    <div class="input-group">
                        <input type="email" id="email" name="email" class="form-control" value="" placeholder="Entrez votre mail" required="">
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