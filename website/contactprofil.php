<?php session_start();?>
<?php include('menu.php');
?>

<?php
if(isset($_SESSION['email'])){

//Pour l'USER
$idpour = $_GET['id'];
$sqlb = "SELECT * FROM profil WHERE id=$idpour";
$resultsqlb = mysql_query($sqlb) or die('Erreur SQL !<br />' . $sqlb . '<br />' . mysql_error());
$resultsqlb = mysql_fetch_array($resultsqlb);
?>
<div class="content">
    <section id="rest" class="container-fluid content-section text-center">
    <div class="row">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
    <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12' id="formulaire">
    <br><br><br><br><br>
    <?php include('headerprofil.php'); ?>
    <h1>Nouveau message priv&eacute;</h1>
    <?php
    $form = true;
$otitle = '';
$orecip = '';
$omessage = '';
//On verifie si le formulaire a ete valide
if(isset($_POST['title'], $_POST['recip'], $_POST['message']))
{
    $otitle = $_POST['title'];
    $orecip = $_POST['recip'];
    $omessage = $_POST['message'];
    //On enleve lechappement si get_magic_quotes_gpc est active
    if(get_magic_quotes_gpc())
    {
        $otitle = stripslashes($otitle);
        $orecip = stripslashes($orecip);
        $omessage = stripslashes($omessage);
    }
    //On verifie si tout les champs ont ete remplis
    if($_POST['title']!='' and $_POST['recip']!='' and $_POST['message']!='')
    {
        //On echappe les variables pour les utiliser dans une requette SQL
        $title = mysql_real_escape_string($otitle);
        $recip = mysql_real_escape_string($orecip);
        $message = mysql_real_escape_string(nl2br(htmlentities($omessage, ENT_QUOTES, 'UTF-8')));
        //On verifie que le destinataire existe
        $dn1 = mysql_fetch_array(mysql_query('SELECT count(id) as recip, id as recipid, (select count(*) from pm) as npm from profil where pseudo="'.$recip.'"'));
        if($dn1['recip']==1)
        {
            //On verifie que le destinataire nest pas lutilisateur meme
            if($dn1['recipid']!=$_SESSION['userid'])
            {
                $id = $dn1['npm']+1;
                //On envoi le message
                if(mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "1", "'.$title.'", "'.$_SESSION['userid'].'", "'.$dn1['recipid'].'", "'.$message.'", "'.time().'", "yes", "no")'))
                {
    ?>
    <div class="message"><p>Le message a bien &eacute;t&eacute; envoy&eacute;.</p>
    <a href="message_liste.php"><p>Liste de mes messages priv&eacute;s</a></p></div>
    <?php
                    $form = false;
                }
                else
                {
                    //Sinon, on dit quune erreur sest produite
                    $error = '<p>Une erreur c\'est produite lors de l\'envoi du message.</p>';
                }
            }
            else
            {
                //Sinon, on dit quil ne peut pas envoyer un message a lui meme
                $error = '<p>Vous ne pouvez pas envoyer un message &agrave; vous m&ecirc;me.</p>';
            }
        }
        else
        {
            //Sinon, on dit que le destinataire nexiste pas
            $error = '<p>Le destinataire de votre message n\'existe pas.</p>';
        }
    }
    else
    {
        //Sinon on dit quun champ nest pas rempli
        $error = '<p>Un des champs n\'est pas rempli.</p>';
    }
}
elseif(isset($_GET['recip']))
{
    //On recupere le nom dutilisateur si disponible
    $orecip = $_GET['recip'];
}
if($form)
{
//On affiche lerreur sil ya lieu
if(isset($error))
{
    echo '<div class="message">'.$error.'</div>';
}
//On affiche le formulaire
?>
                        <form action="" method="post">
                        <h2>Je contacte <?php echo $resultsqlb['pseudo'];?></h2>
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right"><h2><label for="title">Objet</label>
                                </h2></div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left"><input
                                    class="col-lg-8 col-md-8 col-sm-8 col-xs-8" type="text" id="pseudo" name="title" value="<?php echo htmlentities($otitle, ENT_QUOTES, 'UTF-8'); ?>" tabindex="1"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right"><h2><label for="message">Mon message</label>
                                </h2></div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left">
                                <textarea rows="8" cols="50" class="col-lg-8" type="text" for="message" id="message" name="message" placeholder="Je vous contactes car ..."><?php echo htmlentities($omessage, ENT_QUOTES, 'UTF-8'); ?></textarea>
                            </div>
                        </div>
                        <div style="display:none;" class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right"><h2><label for="pseudo"></label>
                                </h2></div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-left"><input
                                    class="col-lg-8 col-md-8 col-sm-8 col-xs-8" type="hidden" id="pseudo" name="recip" placeholder="Indiquer un objet"
                                    value="<?php echo $resultsqlb['pseudo']; ?>" tabindex="1" id="title" name="title" />
                            </div>
                        </div>
        <input type="submit" value="Envoyer" />
    </form>
</div>
<?php
}
}else{?>

    <section id="rest" class="container-fluid content-section text-center">
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12'
                     id="formulaire">
                    <div class="message"><h1>Vous devez &ecirc;tre connect&eacute;(e).<br>pour
                            visualiser ce contenu</h1><br/>
                        <a href="connexion.php">Se connecter</a></div>
                    <br><br><br>
                </div>
            </div>
        </div>
    </section>
<?php
}
?>
</div></div></section>
<?php include('footer.php');?>