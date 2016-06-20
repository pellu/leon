<?php include('config.php');
function resultat_recherche($search)
{
	$where="";
	$search = preg_split('/[\s]+/', $search);
	$total_resultat = count($search);
	foreach ($search as $key => $searchs)
	{
		$where .="pseudo LIKE '%$searchs%'";
		if($key !=($total_resultat-1))
		{
			$where .=" AND ";
		}
	}
	$recherche = mysql_query("SELECT * FROM profil WHERE $where");
	$rows = mysql_num_rows($recherche);
	if($rows){
		while ($row=mysql_fetch_array($recherche)){?>
			<?php echo "<a href=\"profil/".$row['url']."-".$row["id"]."\"/>"?>
			<?php echo $row['pseudo']."</a><br/><br/>";?>
			<?php echo $row['description'];?><br/><br/>
			<?php
		}
	}else echo"Pas de r&eacutesultat pour votre recherche : <strong>".$searchs."</strong>";
}
?>