<?php session_start();
if(isset($_SESSION['email'])){
	include('config.php');
    $iduser = $_SESSION["userid"];
    $sql = "SELECT * FROM profil WHERE id=$iduser";
    $resultsql = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
    $resultsql = mysql_fetch_array($resultsql);

	$hosted_event = $resultsql['hosted_event']-50;
    $pointstotal = $resultsql['pointstotal']-50;

    $idparticipation = $_GET['id'];
    $sqlb = "SELECT * FROM news WHERE id_news=$idparticipation";
    $resultsqlb = mysql_query($sqlb) or die('Erreur SQL !<br />' . $sqlb . '<br />' . mysql_error());
    $resultsqlb = mysql_fetch_array($resultsqlb);

    $placesrestantes_news = $resultsqlb['placesrestantes_news']+1;

    $modifb = $mysql->prepare("UPDATE news SET placesrestantes_news='$placesrestantes_news' WHERE id_news='".$idparticipation."'");
    $modifb->execute(array(
    'placesrestantes_news' => $placesrestantes_news,
    ));

    $modif = $mysql->prepare("UPDATE profil SET hosted_event='$hosted_event', pointstotal='$pointstotal' WHERE id='".$_SESSION['userid']."'");
    $modif->execute(array(
    'hosted_event' => $hosted_event,
    'pointstotal' => $pointstotal,
    ));
	 $sql = "DELETE FROM `participation` WHERE `id_news_participation`='".$_GET["id"]."'";
	    $count = $mysql->exec($sql);
	    $mysql = null;
	 header('Location: http://localhost/leon/website/mesannonces.php');
}else{
    header("Location:index.php");
}
?>