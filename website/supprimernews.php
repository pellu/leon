<?php session_start();
if(isset($_SESSION['email'])){
	include('config.php');
    $iduser = $_SESSION["userid"];
    $sql = "SELECT * FROM profil WHERE id=$iduser";
    $resultsql = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
    $resultsql = mysql_fetch_array($resultsql);

	$hosted_event = $resultsql['hosted_event']-1;
    $pointstotal = $resultsql['pointstotal']-1;

    $modif = $mysql->prepare("UPDATE profil SET hosted_event='$hosted_event', pointstotal='$pointstotal' WHERE id='".$_SESSION['userid']."'");
    $modif->execute(array(
    'hosted_event' => $hosted_event,
    'pointstotal' => $pointstotal,
    ));
	$sql = "DELETE FROM `news` WHERE `id_news`='".$_GET["id"]."'";
	   $count = $mysql->exec($sql);
	   $mysql = null;
	header('Location: http://localhost/leon/website/mesannonces.php');
}else{
    header("Location:index.php");
}
?>