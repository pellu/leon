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