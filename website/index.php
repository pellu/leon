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
	<link rel="stylesheet" media="screen" type="text/css" title="style" href="http://localhost/leon/website/css/style.css" />
	<link rel="stylesheet" media="screen" type="text/css" title="style" href="http://localhost/leon/website/css/bootstrap.min.css" />
	
	<!-- Pas encore mis en place -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars">Menu</i>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo-final.png">
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Accueil</a>
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

<!-- En cours -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                

    <?php include("function.php");?>
<?php
if(isset($_POST['submit']))
{
	$search=mysql_real_escape_string(htmlentities(trim($_POST['search'])));
	if(empty($search))
		{
			$error[]="Veuillez saisir une recherche";
		}
		else if(strlen($search)<2)
		{
			$error[]="Veuillez saisir au moins deux caract&egraveres";
		}
		if(empty($error))
		{
			resultat_recherche($search);
		}
		else
		{
			foreach($error as $errors){echo $errors."<br/>";
		}}
}

if(isset($_POST['search'])){
	$search=$_POST['search'];
}else{$search="";
}

$myql = "SELECT COUNT(id) as nbProfil FROM profil";
$reqa=mysql_query($myql) or die(mysql_error());
$data=mysql_fetch_assoc($reqa);

$nbProfil=$data['nbProfil'];
$perPage=5;
$nbPage=ceil ($nbProfil/$perPage);

if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPage){
	$cPage = $_GET['p'];
}
else{
	$cPage = 1;
}

?>
<form method="POST" action="">
<strong>Votre recherche</strong><br/><br/>
<input type="text" name="search" value="<?php echo $search ?>" >
<input type="submit" value="GO" name="submit">
</form>
<br/>
<?php
$mysql = "SELECT * FROM profil ORDER BY date DESC LIMIT ".(($cPage-1)*$perPage).",$perPage";
$req = mysql_query($mysql) or die(mysql_error()." ERROR");
while ($data = mysql_fetch_array($req)){
	$url = "/leon/website/profil/".$data["url"]."-".$data["id"];
	$id = $data["id"];
	echo "<li><a href=\"$url\">".$data["pseudo"]."</a></li>";
}
?>
<br/><br/>
<?php
for($i=1;$i<=$nbPage;$i++){
	if($i==$cPage){
		echo " $i /";
	}
	else{
		echo " <a href=\"index.php?p=$i\">$i</a> /";
	}
	
}

?>
            </div>
        </div>
    </section>
<br/><br/><br/>

    <footer>
	    <div class="row">
	        <div class="col-lg-10 col-lg-offset-1">
	        <div class="col-lg-3">
	        	<img src="img/logo-final.png">
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