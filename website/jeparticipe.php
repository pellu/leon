<?php session_start();
if(isset($_SESSION['email'])){
	include('config.php');
    $iduser = $_SESSION["userid"];
    $sql = "SELECT * FROM profil WHERE id=$iduser";
    $resultsql = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
    $resultsql = mysql_fetch_array($resultsql);

	$hosted_event = $resultsql['hosted_event']+50;
    $pointstotal = $resultsql['pointstotal']+50;

    $modif = $mysql->prepare("UPDATE profil SET hosted_event='$hosted_event', pointstotal='$pointstotal' WHERE id='".$_SESSION['userid']."'");
    $modif->execute(array(
    'hosted_event' => $hosted_event,
    'pointstotal' => $pointstotal,
    ));

	 $sql = "INSERT INTO `participation` WHERE `id_news_participation`='".$iduser."'";
	    $count = $mysql->exec($sql);
	    $mysql = null;
	 header('Location: http://localhost/leon/website/paypal.php');
}else{
    header("Location:index.php");
}
?>