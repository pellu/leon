<?php
if (isset($_POST['search'])) {
    $search = $_POST['search'];
} else {
    $search = "";
}
function resultat_recherche($search)
{
    $where = "";
    $search = preg_split('/[\s]+/', $search);
    $total_resultat = count($search);
    foreach ($search as $key => $searchs) {
        $where .= "ville_news LIKE '%$searchs%'";
        if ($key != ($total_resultat - 1)) {
            $where .= " AND ";
        }
    }
    $recherche = mysql_query("SELECT * FROM profil INNER JOIN news ON profil.id=news.pseudo_news WHERE $where");
    $rows = mysql_num_rows($recherche);
    echo "<div class='row'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' id='rest-search'>

    ";
    if ($rows) {
        echo "<br/><h3 id='h3'>R&eacute;sultats de votre recherche &agrave; <strong>" . $searchs . "</strong></h3><br/><div class='row'>
    <div class='col-lg-2 col-md-2 col-sm-12 col-xs-12'></div>";
        while ($row = mysql_fetch_array($recherche)) {
            ?>


            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="result">
                <div class="result-photo"><img src="http://localhost/leon/website/photos/<?php echo $row['photo']; ?>"
                                               alt="" width="485" height="320"></div>
                <div class="result-price"><?php echo $row['prix']; ?>&nbsp;&euro;</div>
                <div class="result-square">
                    <div class="result-title text-left"><?php echo $row['titre_news']; ?></div>
                    <div class="result-user">Post&eacute;e par <a
                            href="http://localhost/leon/website/profil/<?php echo $row['pseudo']; ?>-<?php echo $row['id']; ?>"><?php echo $row['pseudo']; ?></a>
                    </div>
                    <div class="result-user-avatar">
                        <?php
                            switch ($row['avatar']) {
                            case '' :
                            echo '<img src="http://localhost/leon/website/img/avatar.png" alt="" height="70"
                            width="70"
                            class="img-circle" alt="Image Perso">';
                            break;
                            default :
                            echo '<img src="http://localhost/leon/website/photos/'.htmlentities($row['avatar']).'" alt="" height="70"
                            width="70"
                            class="img-circle" alt="Image Perso">';
                            break;
                            }
                        ?>


                    </div>
                    <div class="result-description text-left"><p><?php echo $row['contenu_news']; ?></p>
                </div>
                <a href="http://localhost/leon/website/news/<?php echo $row['url_news']; ?>-<?php echo $row['id_news']; ?>">
                    <p class="regarder-annonce" >Voir l'annonce</p></a>
            </div></div>
            <!--    <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>-->
            <!--	<img src="http://localhost/leon/website/photos/--><?php //echo $row['avatar'];
            ?><!--"><br>-->
            <!--	by <a href="http://localhost/leon/website/profil/--><?php //echo $row['pseudo'];
            ?><!-----><?php //echo $row['id'];
            ?><!--">--><?php //echo $row['pseudo'];
            ?><!--</a><br>-->
            <!--    --><?php //echo $row['titre_news'];
            ?>
            <!--    --><?php //echo $row['ville_news'];
            ?><!--<br>-->
            <!--    <a href="http://localhost/leon/website/news/--><?php //echo $row['url_news'];
            ?><!-----><?php //echo $row['id_news'];
            ?><!--">Lien de l'annonce</a>-->
            <!--    </div>-->
            <?php
        }
        echo "</div></div></div>";
    } else echo "<h3 id='h3' style='padding-bottom: 50px;'>Pas de r&eacute;sultats de votre recherche &agrave; <strong>" . $searchs . "</strong></h3><div class='row'>
    <div class='col-lg-2 col-md-2 col-sm-12 col-xs-12'></div></div>";
}

?>
