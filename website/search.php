<?php include('header.php');
  header( 'content-type: text/html; charset=ISO-8859-1' );?>
  <section class="container content-section text-center">
    <div class="row">
        <div class="col-lg-12 col-ls-12 col-xs-12">
<br><br><br><br><br>
    <?php include("function.php");?>
<?php
if(isset($_POST['search'])){
  $search=$_POST['search'];
}else{$search="";
$_POST['search']="";
}
if(isset($_POST['submit']))
{
  $search=mysql_real_escape_string(htmlentities(trim($_POST['search'])));
  if(empty($search))
    {
      $error[]="Veuillez saisir une recherche";
    }
    else if(!empty($error))
    {
      $error[]="Veuillez saisir au moins deux caract&egraveres";
    }
    if(empty($error))
    {
      resultat_recherche($search);
    }
    else
    {
      foreach($error as $errors){echo $errors."<br/>";
    }
  }
}
?>
<form action="search.php" method="POST">
                      <select name="search">
                        <option value="" disabled selected>O&ugrave; vas-tu jouer ?</option>
                        <option value="antony">Antony (92)</option>
                        <option value="argenteuil">Argenteuil (95)</option>
                        <option value="aubervilliers">Aubervilliers (93)</option>
                        <option value="aulnay-sous-bois">Aulnay-sous-Bois (93)</option>
                        <option value="asnieres-sur-seine">Asni&egrave;res-sur-Seine (92)</option>
                        <option value="Boulogne-Billancourt">Boulogne-Billancourt (92)</option>
                        <option value="bondy">Bondy (93)</option>
                        <option value="cergy">Cergy (95)</option>
                        <option value="champigny-sur-marne">Champigny-sur-Marne (94)</option>
                        <option value="chelles">Chelles (77)</option>
                        <option value="clamart">Clamart (92)</option>
                        <option value="clichy">Clichy (92)</option>
                        <option value="colombes">Colombes (92)</option>
                        <option value="courbevoie">Courbevoie (92)</option>
                        <option value="creteil">Cr&eacute;teil (94)</option>
                        <option value="drancy">Drancy (93)</option>
                        <option value="epinay-sur-seine">&Eacute;pinay-sur-Seine (93)</option>
                        <option value="evry">&Eacute;vry (91)</option>
                        <option value="fontenay-sous-Bois">Fontenay-sous-Bois (94)</option>
                        <option value="issy-les-moulineaux">Issy-les-Moulineaux (92)</option>
                        <option value="ivry-sur-seine">Ivry-sur-Seine (94)</option>
                        <option value="le-blanc-mesnil">Le Blanc-Mesnil (93)</option>
                        <option value="levallois-perret">Levallois-Perret (92)</option>
                        <option value="maisons-alfort">Maisons-Alfort (94)</option>
                        <option value="meaux">Meaux (77)</option>
                        <option value="montreuil">Montreuil (93)</option>
                        <option value="nanterre">Nanterre (92)</option>
                        <option value="paris1">Neuilly-sur-Seine (92)</option>
                        <option value="noisy-le-grand">Noisy-le-Grand (93)</option>
                        <option value="pantin">Pantin (93)</option>
                        <option value="paris1">Paris (75 001)</option>
                        <option value="paris1">Paris (75 002)</option>
                        <option value="paris3">Paris (75 003)</option>
                        <option value="paris4">Paris (75 004)</option>
                        <option value="paris5">Paris (75 005)</option>
                        <option value="paris6">Paris (75 006)</option>
                        <option value="paris7">Paris (75 007)</option>
                        <option value="paris8">Paris (75 008)</option>
                        <option value="paris9">Paris (75 009)</option>
                        <option value="paris10">Paris (75 010)</option>
                        <option value="paris11">Paris (75 011)</option>
                        <option value="paris12">Paris (75 012)</option>
                        <option value="paris13">Paris (75 013)</option>
                        <option value="paris14">Paris (75 014)</option>
                        <option value="paris15">Paris (75 015)</option>
                        <option value="paris16">Paris (75 016)</option>
                        <option value="paris17">Paris (75 017)</option>
                        <option value="paris18">Paris (75 018)</option>
                        <option value="paris19">Paris (75 019)</option>
                        <option value="paris20">Paris (75 020)</option>
                        <option value="rueil-malmaison">Rueil-Malmaison (92)</option>
                        <option value="saint-denis">Saint-Denis (93)</option>
                        <option value="saint-maur-des-fosses">Saint-Maur-des-Foss&eacute;s (94)</option>
                        <option value="sarcelles">Sarcelles (95)</option>
                        <option value="sartrouville">Sartrouville (78)</option>
                        <option value="sevran">Sevran (93)</option>
                        <option value="versailles">Versailles (78)</option>
                        <option value="villejuif">Villejuif (94)</option>
                        <option value="vitry-sur-seine">Vitry-sur-Seine (94)</option>
                      </select>
                    <input type="submit" value="Recherche" name="submit">
                  </form>
</div></div></section>
<?php include('footer.php'); ?>