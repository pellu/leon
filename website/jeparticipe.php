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

    $idparticipation = $_GET['id'];
    $sqlb = "SELECT * FROM news WHERE id_news=$idparticipation";
    $resultsqlb = mysql_query($sqlb) or die('Erreur SQL !<br />' . $sqlb . '<br />' . mysql_error());
    $resultsqlb = mysql_fetch_array($resultsqlb);

    $placesrestantes_news = $resultsqlb['placesrestantes_news']-1;

    $modifb = $mysql->prepare("UPDATE news SET placesrestantes_news='$placesrestantes_news' WHERE id_news='".$idparticipation."'");
    $modifb->execute(array(
    'placesrestantes_news' => $placesrestantes_news,
    ));

    $id_news_participation = $_GET['id'];
    $id_user_participation = $resultsql['id'];
    $date_participation = date("d-m-Y");
    $heure_participation = date("H:i");

    $stmt = $mysql->prepare("INSERT INTO participation(id_participation, id_news_participation, id_user_participation, date_participation, heure_participation) VALUES ('', '$id_news_participation','$id_user_participation','$date_participation','$heure_participation')");
        $stmt->bindParam(':id_news_participation', $id_news_participation);
        $stmt->bindParam(':id_user_participation', $id_user_participation);
        $stmt->bindParam(':date_participation', $date_participation);
        $stmt->bindParam(':heure_participation', $heure_participation);
        $stmt->execute();
        
	 header('Location:http://localhost/leon/website/paypal.php');
}else{
    header("Location:index.php");
}
?>