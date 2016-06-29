<?php
$title="Administration";
if(isset($_COOKIE['admin'])){ ?>
<!DOCTYPE html>
<html>
<head>
  <title>LEON - ADMIN</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
    <meta charset="utf-8">
    <link href="http://localhost/leon/website/css/style.css" rel="stylesheet">
    <link href="http://localhost/leon/website/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
<center><h1>LEON - ADMIN</h1>
<body >
    <!-- Navigation -->
    <nav class="navbar" role="navigation">
        <div class="container">
            <div class="collapse navbar-collapse navbar-cente navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/leon/admin/index.php">Accueil</a></li>
                    <li><a href="/leon/admin/profil.php">Liste des profils</a>
                    </li>
                    <li><a href="/leon/admin/messagerie.php">Messagerie</a>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/leon/admin/news.php">Liste des news<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/leon/admin/ajoutnews.php">Ajouter une news</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/leon/admin/commentaires.php">Liste des commentaires<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/leon/admin/ajoutcommentaires.php">Ajouter un commentaire</a></li>
                        </ul>
                    </li>
                    <li><a href="/leon/admin/newsletter.php">Newsletter</a></li>
                    <li><a href="/leon/admin/deconnexion.php">Deconnexion</a></li>
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