<?php include('header.php');
include('config.php');?>
<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars">Menu</i>
            </button>
            <a class="navbar-brand" href="http://localhost/leon/website/">
                <img src="http://localhost/leon/website/img/logo-final.png">
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <?php if(isset($_SESSION['email'])){?>
                <li>
                    <a class="menu" href="#partenaire">Devenir h&ocirc;te</a>
                </li>
                <li>
                    <a class="menu" href="http://localhost/leon/website/search.php">Trouver une soir&eacute;e</a>
                </li>
                <li>
                    <?php
                        $nb_new_pm = mysql_fetch_array(mysql_query('SELECT count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
                        $nb_new_pm = $nb_new_pm['nb_new_pm'];
                    ?>
                    <a class="menu" href="http://localhost/leon/website/message_liste.php">Messagerie <?php echo '('.$nb_new_pm. ')' ?></a>
                </li>
                <li>
                    <?php
                    $email=$_SESSION["email"];
                    $sqlprofil="SELECT * FROM profil WHERE email='".$email."'";
                    $reqprofil = mysql_query($sqlprofil) or die('Erreur SQL !<br />'.$sqlprofil.'<br />'.mysql_error());
                    $dataprofil=mysql_fetch_assoc($reqprofil);
                    echo ''?>
                    <a class="menu" href="http://localhost/leon/website/monprofil.php"><?php echo $dataprofil['pseudo'];?><img style="height:20px;" src="http://localhost/leon/website/photos/<?php echo $dataprofil['avatar'];?>"></a>
                </li>
                <?php }else{ ?>
                    <li>
                        <a class="menu" href="#partenaire">Devenir h&ocirc;te</a>
                    </li>
                    <li>
                        <a class="menu" href="http://localhost/leon/website/search.php">Trouver une soir&eacute;e</a>
                    </li>
                    <li>
                        <a class="menu" href="http://localhost/leon/website/connexion.php">Connexion</a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
    <div class="blueray">
    </div>
</nav>