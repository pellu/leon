<?php
$title="Administration";
if(isset($_COOKIE['admin'])){ ?>
<!DOCTYPE html>
<html>
<head>
  <title>LEON - ADMIN</title>
</head>
<body>
<header>
<center><h1>LEON - ADMIN</h1>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
	<meta charset="utf-8">
	<link rel="stylesheet" media="screen" type="text/css" title="style" href="http://localhost/leon/website/css/style.css" />
	<link rel="stylesheet" media="screen" type="text/css" title="style" href="http://localhost/leon/website/css/bootstrap.min.css" />
</head>
<body >
    <!-- Navigation -->
    <nav class="navbar" role="navigation">
        <div class="container">
            <div class="collapse navbar-collapse navbar-cente navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/leon/landing/admin/index.php">Accueil</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/leon/landing/admin/profil.php">Liste des profils<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/leon/landing/admin/ajout.php">Ajouter un profil</a></li>
                        </ul>
                    </li>
                    <li><a href="/leon/landing/admin/newsletter.php">Newsletter</a></li>
                    <li><a href="/leon/landing/admin/deconnexion.php">Deconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
<hr>
</body>
</html>
</center>
</header>
<?php }else{header("Location:index.php");}?>