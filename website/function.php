<?php
if(isset($_POST['search'])){
	$search=$_POST['search'];
}else{$search="";
}
function resultat_recherche($search)
{
	$where="";
	$search = preg_split('/[\s]+/', $search);
	$total_resultat = count($search);
	foreach ($search as $key => $searchs)
	{
		$where .="ville_news LIKE '%$searchs%'";
		if($key !=($total_resultat-1))
		{
			$where .=" AND ";
		}
	}
	$recherche = mysql_query("SELECT * FROM profil INNER JOIN news ON profil.id=news.pseudo_news WHERE $where");
	$rows = mysql_num_rows($recherche);
	echo "<div class='row'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
    <div class='row'>";
	if($rows){
		while ($row=mysql_fetch_array($recherche)){?>
    <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
	<img src="http://localhost/leon/website/photos/<?php echo $row['avatar'];?>"><br>
	by <a href="http://localhost/leon/website/profil/<?php echo $row['pseudo'];?>-<?php echo $row['id'];?>"><?php echo $row['pseudo'];?></a><br>
    <?php echo $row['titre_news'];?>
    <?php echo $row['ville_news'];?><br>
    <a href="http://localhost/leon/website/news/<?php echo $row['url_news'];?>-<?php echo $row['id_news'];?>">Lien de l'annonce</a>
    </div>
<?php
		}
		echo "</div></div></div><br>";
	}else echo"Pas de r&eacutesultat pour votre recherche : <strong>".$searchs."</strong>";
}
?>