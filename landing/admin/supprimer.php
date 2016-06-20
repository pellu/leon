<?
if(isset($_COOKIE['admin']) ){
$connexion = mysql_connect("localhost","root","atlantis28") or die('erreur connexion');
   mysql_select_db("c4letsplayce") or die('impossible de choisir la base de données');
$id = $_GET["id"];
$connexion=mysql_query("DELETE FROM `profil` WHERE id='".$id."'");
header("Location:profil.php");
}else{
    header("Location:index.php");
}
?>