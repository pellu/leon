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
    <div class='row'>
        <div class='col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1'>
    ";
    if ($rows) {
        echo "<br/><h3 id='h3'>R&eacute;sultats de votre recherche &agrave; <strong>" . $searchs . "</strong></h3><br/><div class='row'>
    ";
        while ($row = mysql_fetch_array($recherche)) {
            ?>

            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1" id="result">
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
            <div class='col-lg-2 col-md-2 col-sm-12 col-xs-12'></div>
            </div></div>
            <?php
        }
        echo "</div></div></div></div>";
    } else echo "<h3 id='h3' style='padding-bottom: 50px;'>Pas de r&eacute;sultats de votre recherche &agrave; <strong>" . $searchs . "</strong></h3><div class='row'>
    <div class='col-lg-2 col-md-2 col-sm-12 col-xs-12'></div></div>";
}

?>
