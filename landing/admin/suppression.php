<?php
session_start();
if(isset($_COOKIE['admin']) ){
	//Si oui le fichier est supprimé
	header("location:index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<style>
	html{
		background-color: #fff;
	}
	#monbloc{
		font-size: 55px;
		font-family: sans-serif;
		width:700px;
		height:200px;
		position:absolute;
		left:50%;
		top:50%;
		margin:-100px 0 0 -345px;
		color: #000;
	}
</style>

<div id="monbloc">Base supprimée<br/></div>

<script type="text/javascript">
        window.onload = Init;
        var waitTime = 2; // Temps d'attente en seconde
        var url = 'modif.php';     // Lien de destination
        var x;
        function Init() {
                window.document.getElementById('compteur').innerHTML = waitTime;
                x = window.setInterval('Decompte()', 1000);
        }
        function Decompte() {
                ((waitTime > 0)) ? (window.document.getElementById('compteur').innerHTML = --waitTime) : (window.clearInterval(x));
                if (waitTime == 0) {
                        window.location = url;
                }
        }
</script>
<div style="color:#fff;"><p>Veuillez patienter, redirection dans <span id='compteur'>2</span> secondes</p></div>
<a style="color:#fff;" href="http://cpam78.fr/quiz/admin/modif.php">Retour rapide</a>
</body>
</html>
<?php
}
}else{
 //Si le cookie admin n'est pas présent l'accès est refusé
header('location:index.php');
}
?>