<?php include('../config.php');
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
	if($rows){
		while ($row=mysql_fetch_array($recherche)){?>
			<tr valign='top' class='TDDonnees'>
	<img src="http://localhost/leon/website/photos/<?php echo $row['avatar'];?>">
    <td ><?php echo $row['titre_news'];?></td>
    <td ><?php echo $row['ville_news'];?></td>
    <td ><a href="http://localhost/leon/website/news/<?php echo $row['url_news'];?>-<?php echo $row['id_news'];?>">rr</a><?php echo $row['url_news'];?></td>
  </tr><br/>
<?php
		}
	}else echo"Pas de r&eacutesultat pour votre recherche : <strong>".$searchs."</strong>";
}
?>