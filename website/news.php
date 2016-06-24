<?php
	include ("config.php");
	$mysql="SELECT * FROM news";
	$req=mysql_query($mysql) or die ('Erreur SQL !<br />'.$mysql.'<br />'.mysql_error());
	while ($data=mysql_fetch_assoc($req)) {
		echo "<h1>{$data['titre']}</h1>";
		echo "<p>{$data['contenu']}</p>";
		echo "<p>".date("j/n/Y",strtotime($data["date"]))."</p>";
	}

?>