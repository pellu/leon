<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
	<meta charset="utf-8">
	<title>Playce - Come in and Play</title>
	<meta name="generator" content="Bootply" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="La nouvelle plate-forme de mise ne relation entre gamers ! LetsPlayce.com permet aux pratiquants de jeux vidéo, jeux de plateau, cartes à jouer et à collectionner, de se réunir et de partager un moment convivial près de chez eux !" />
	<meta property="og:image" content="http://www.letsplayce.com/img/fb-a.jpg" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@letsplayce">
	<meta name="twitter:creator" content="@letsplayce">
	<meta name="twitter:title" content="Playce - Come in and Play">
	<meta name="twitter:description" content="La nouvelle plate-forme de mise ne relation entre gamers ! LetsPlayce.com permet aux pratiquants de jeux vidéo, jeux de plateau, cartes à jouer et à collectionner, de se réunir et de partager un moment convivial près de chez eux !">
	<meta name="twitter:image" content="http://www.letsplayce.com/img/fb-a.jpg">	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<section class="bg text-center">
		<h1 id="logo"><a href="index.html">Playce</a></h1>
		<h2>Come in and play !</h2>
		<div class="col-md-4 col-md-offset-4" style="padding: 0 60px">
			<p>Playce, la nouvelle plateforme qui permet de vous retrouver entre joueurs, et de rencontrer de nouveaux adversaires pour partager des moments conviviaux près de chez vous !</p>
			<h3>Rejoindre la partie :</h3>
		</div>
		<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
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
			<?php echo $ok; ?>
			<form role="form" id="form_ajax" action="" method="post" data-enable-shim="true" class="form">
				<div class="input-group">

					<input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Votre mail" required>
					<span class="input-group-btn">
						<input id="senregistrer" type="submit" name="ajout" id="check">
					</span>
				</div><!-- fin input-group -->
			</form>
		</div>
		<div class="col-md-6 col-md-offset-3 col-sm-12" class="socialmedia-wrap">
			<a href="http://bit.ly/1W0BQDL" target="_blank" onclick="trackOutboundLink('http://bit.ly/1W0BQDL'); return false;" class="socialmedia" id="facebook"></a>
			<a href="http://bit.ly/23ddTu4" target="_blank" onclick="trackOutboundLink('http://bit.ly/23ddTu4'); return false;" class="socialmedia" id="twitter"></a>
			<a href="http://bit.ly/1UAm8u3" target="_blank" onclick="trackOutboundLink('http://bit.ly/1UAm8u3'); return false;" class="socialmedia" id="instagram"></a>
			<a href="#" id="kitpresse"></a>
			<p>2016 Playce.Sync, In. Tous droits réservés.</p>
			<p><a class="modal-dialog modal-lg" data-toggle="modal" data-target="#myModal" href="">Mentions légales</a></p>
		</div>
	</section>
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Mentions Légales</h4>
				</div>
				<div class="modal-body">
					<h4>Edition du site</h4>
					Le site LetsPlayce.com est édité par l’agence Léon.

					<h4>Directeur de la publication</h4>
					Le directeur de la publication est Polina Obershyteva (contact@loverlooser.com)

					Développeur
					Site développé par Matriona Agency.

					Hébergement du site
					Le site loverlooser.com est hébergé par Jordan Pelluard, via So You Start.

					Cookies
					Pour le bon fonctionnement de la plateforme, celle-ci nécessite l’utilisation de cookies pour Facebook, Twitter et l’analyse des visites.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
	<script type='text/javascript' src="js/jquery.min.js"></script>
	<script type='text/javascript' src="js/bootstrap.min.js"></script>
	<script type='text/javascript' src="js/jquery.easing.min.js"></script>
	<script type='text/javascript' src="js/scrolling-nav.js"></script>
</body>
</html>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-79449232-1', 'auto');
	ga('send', 'pageview');
	var trackOutboundLink = function(url) {
		ga('send', 'event', 'outbound', 'click', url, {
			'transport': 'beacon',
			'hitCallback': function(){document.location = url;}
		});
	}
</script>