<center>
<?php
	//Création des tables
	echo "<h2>Créer les tables</h2>";
  	if(isset($_POST['create'])){
	    require_once('../config.php');
	    $mysql->query("DROP TABLE `users`");
	    $mysql->query("DROP TABLE `newsletter`");
	    $mysql->query("CREATE TABLE users (id int(11) NOT NULL AUTO_INCREMENT, date text NOT NULL, heure time NOT NULL, prenom text NOT NULL, nom text NOT NULL, pass text NOT NULL, email text NOT NULL, PRIMARY KEY (id));");
	    $mysql->query("CREATE TABLE newsletter (id int(11) NOT NULL AUTO_INCREMENT, date text NOT NULL, heure time NOT NULL, email text NOT NULL, PRIMARY KEY (id));");
	    $ok = "Tables créées ok<br><br>";
	    echo $ok;
	}
	echo '
<form action="" method="post">
<input class="" type="submit" name="create" value="Créer les tables">
</form>';
	//Création du contenu
	echo "<h2>Ajouter le contenu</h2>";
	if(isset($_POST['ajout'])){
		$date = date("d-m-Y");
		$heure = date("H:i");
		require_once('../config.php');
		$mysql->query("INSERT INTO users (id, date, heure, prenom, nom, pass, email)VALUES (1, '$date', '$heure', 'Leon', 'Paon', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@letsplayce.com')");
		$ok = "Config du serveur ok<br><br>";
		echo $ok;
	}
	echo '
<form action="" method="post">
<input class="" type="submit" name="ajout" value="Créer autre">
</form>
';
?>
</center>