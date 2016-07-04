<?php session_start();?>
<?php include('menu.php');?>
<section class="container-fluid content-section text-center">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 parallax" id="trans1">
            <h1 id="maintitle">The Playce to be</h1>
            <h2 id="baseline">Trouvez votre soir&eacute;e sans plus attendre !</h2>
            <div id="opacitysquare" class="col-lg-12 col-md-12 col-xs-12">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-lg-offset-4" >
                    <form action="search.php" method="POST">
                        <select name="search"  id="homesearch">
                            <option value="" disabled selected>Où vas-tu jouer ?</option>
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
                        <input type="submit" value="Recherche" name="submit" id="rechercher">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="rest" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2">
                <h3 id="decouvrez">Decouvrir Playce</h3>
                <span class="scroll-btn glowing-btn">
                    <a href="#">
                        <span class="mouse"><span></span></span>
                    </a>
                </span>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
                <h3 id="h3">Qu'est-ce que Playce ?</h3>
                <p>&Agrave; l'heure o&ugrave; les tournois de jeux s'organisent essentiellement en ligne, Playce se
                    propose
                    comme la premi&egrave;re plateforme communautaire pour participer mais aussi organiser des soir&eacute;es
                    gaming pr&egrave;s de chez soi.</p>
                <p>C'est un syst&egrave;me innovant pour trouver de nouveaux partenaires de jeu qui se
                    correspondent.</p>
            </div>
<div class="row">            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <img src="img/canap.png" alt="Canape Gaming" id="canape" width="100%">
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-left">
        <h4 id="h4" style="margin-top: 90px;">Devenez h&ocirc;te et rencontrez de nouveaux adversaires</h4>
        <p>Que vous soyez imbattable &agrave; FIFA, as du volant &agrave; Mario Kart ou encore incollable sur
            les
            cartes Magic, Playce vous permet d'organiser des tournois et soir&eacute;es &agrave;
            th&egrave;me &agrave; votre domicile, pour y affronter ou tout simplement &eacute;changer avec les
            gamers de votre quartier !</p>
    </div></div>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-lg-offset-3 col-md-offset-3 col-xs-12 text-right">
        <h4 id="h4" style="margin-top: 90px;">Participez aux soir&eacute;es et renforcez votre réseau !</h4>
        <p>Si vous n'&ecirc;tes pas en mesure d'accueillir vos futures adversaires, aucun probl&egrave;me : eux
            le
            peuvent ! Il ne vous reste qu'&agrave; les d&eacute;couvrir en parcourant les nombreuses annonces
            que
            Playce met en ligne. Et comme il y en a pour tous les go&ucirc;ts, vous pouvez les trier &agrave;
            l'aide
            des filtres personnalisés !</p>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <img src="img/PS.png" alt="Controller Gaming" id="controller" width="100%">
    </div>
</div>
        <br><br><br>
            <div class="col-lg-4 col-md-4 hidden-sm hidden-xs" id="gauche">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h3 class="glowingtext">Maintenant,<br/>Choisissez votre camp !</h3>
            </div>
            <div class="col-lg-4 col-md-4 hidden-sm hidden-xs" id="droite">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="switch">
                <a href="#">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-2 text-right" id="hote"><a href="http://letsplayce.com/website/connexion.php"><img class="img-responsive" src="http://localhost/leon/website/img/hebergeur.png"></a>Hote</div>
                </a>
                <a href="#">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 text-left" id="participant"><a href="http://localhost/leon/website/search.php"><img class="img-responsive" src="http://localhost/leon/website/img/participant.png"></a>Participant</div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12 col-lg-offset-3 col-md-offset-3">
                <br><br>
                <h3 class="glowingtext">Ils ont testé Playce</h3><br><br><br>
            </div>
            <div class="comment-right col-lg-6 col-md-8 col-sm-7 col-xs-12 col-lg-offset-6 col-md-offset-4 col-sm-offset-5" id="user-avatar-1">
                <div class="comment col-lg-5 col-md-7 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-3 col-sm-offset-4 col-xs-offset-4 text-left">
                    <p class="user-name">Stéphanie Mandiano, hôte</p>
                    <p class="user-comment">En ligne j'avais l'impression de jouer avec des robots, ou en tout cas pas
                        avec
                        de "vraies" personnes. Le gros plus de Playce est sans conteste sa dimension humaine et
                        chaleureuse.</p>
                </div>
            </div>
            <div class="comment-left col-lg-7 col-md-7 col-sm-7 col-xs-12" id="user-avatar-2">
                <div class="comment col-lg-5 col-md-7 col-xs-8 col-lg-offset-5 col-md-offset-1 text-right">
                    <p class="user-name">Stéphanie Mandiano, hôte</p>
                    <p class="user-comment">En ligne j'avais l'impression de jouer avec des robots, ou en tout cas pas
                        avec
                        de "vraies" personnes. Le gros plus de Playce est sans conteste sa dimension humaine et
                        chaleureuse.</p>
                </div>
            </div>
        <div class="comment-right col-lg-6 col-md-8 col-sm-7 col-xs-12 col-lg-offset-6 col-md-offset-4 col-sm-offset-5" id="user-avatar-1">
            <div class="comment col-lg-5 col-md-7 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-3 col-sm-offset-4 col-xs-offset-4 text-left">
                    <p class="user-name">Stéphanie Mandiano, hôte</p>
                    <p class="user-comment">En ligne j'avais l'impression de jouer avec des robots, ou en tout cas pas
                        avec
                        de "vraies" personnes. Le gros plus de Playce est sans conteste sa dimension humaine et
                        chaleureuse.</p>
                </div>
            </div>
        <div class="comment-left col-lg-7 col-md-7 col-sm-7 col-xs-12" id="user-avatar-2">
            <div class="comment col-lg-5 col-md-7 col-xs-8 col-lg-offset-5 col-md-offset-1 text-right">
                    <p class="user-name">Stéphanie Mandiano, hôte</p>
                    <p class="user-comment">En ligne j'avais l'impression de jouer avec des robots, ou en tout cas pas
                        avec
                        de "vraies" personnes. Le gros plus de Playce est sans conteste sa dimension humaine et
                        chaleureuse.</p>
                </div>
            </div>






            <div class="col-lg-5 col-md-5 col-xs-12 partagez-votre-experience">
            <span class="input-group-btn text-center">
                        <input type="submit" name="comment" id="shareexp" id="check"
                               value="Partagez votre expérience">
                    </span>
            </div>
    </div>
</section>
<?php include('footer.php'); ?>
<script type="text/javascript">
    (function ($) {

        $.fn.parallax = function (options) {

            var windowHeight = $(window).height();

            // Establish default settings
            var settings = $.extend({
                speed: 0.15
            }, options);

            // Iterate over each object in collection
            return this.each(function () {

                // Save a reference to the element
                var $this = $(this);

                // Set up Scroll Handler
                $(document).scroll(function () {

                    var scrollTop = $(window).scrollTop();
                    var offset = $this.offset().top;
                    var height = $this.outerHeight();

                    // Check if above or below viewport
                    if (offset + height <= scrollTop || offset >= scrollTop + windowHeight) {
                        return;
                    }

                    var yBgPosition = Math.round((offset - scrollTop) * settings.speed);

                    // Apply the Y Background Position to Set the Parallax Effect
                    $this.css('background-position', 'center ' + yBgPosition + 'px');

                });
            });
        }
    }(jQuery));

    $('.bg-1').parallax({
        speed: 0.15
    });
</script>
<script type="text/javascript">
    function scrollNav() {
        $('.nav a').click(function(){
            //Toggle Class
            $(".active").removeClass("active");
            $(this).closest('li').addClass("active");
            var theClass = $(this).attr("class");
            $('.'+theClass).parent('li').addClass('active');
            //Animate
            $('html, body').stop().animate({
                scrollTop: $( $(this).attr('href') ).offset().top - 160
            }, 400);
            return false;
        });
        $('.scrollTop a').scrollTop();
    }
    scrollNav();
</script>
