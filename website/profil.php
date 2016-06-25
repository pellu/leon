<?php
header( 'content-type: text/html; charset=ISO-8859-1' );
include("config.php");
$id=$_GET["id"];
$mysql = "SELECT * FROM profil WHERE id='$id' LIMIT 1";
$req = mysql_query($mysql) or die( mysql_error()." ERROR");
$data = mysql_fetch_assoc($req);
if(isset($data['url'])) {
	if($data['url'] !=$_GET['url']){
		header("Location: /leon/website/profil/".$data["url"]."-".$data["id"]);
	}
}
 else{
 	header("Location: /leon/test/404.php");
}
?>
<?php include('header.php');?>
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <p><img src="http://localhost/leon/website/photos/<?php echo $data['avatar'];?>"></p>
				<h2>Pseudo : <?php echo $data['pseudo'];?></h2>
				<h3>Utilisateur inscrit le : <?php echo $data['date_inscription']; ?></h3>
				<p>Description : <?php echo $data['description']; ?></p>
            </div>
        </div>
    </section>
<br><br>
    <?php include('footer.php');?>