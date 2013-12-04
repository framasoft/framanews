<?php ?>
<!doctype html>
<!--vim:set sw=4 ts=4 ft=html expandtab:-->
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Framanews - Fonctionnalités</title>

        <link rel="shortcut icon" href="./favicon.png">
        <link media="screen" rel="stylesheet" href="nav/lib/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/framanews.css">
        <link rel="stylesheet" href="css/framanews-responsive.css">
        <script src="nav/lib/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="nav/lib/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="nav/nav.js" id="nav_js" type="text/javascript"></script>
    </head>
    <body id="body-faq-ttrss">
        <div id="content">
            <!-- - - - - - - - - - - - - - - - - - Framanews-nav - - - - - - - - - - - - - -->
            <div class="affix col-md-2 visible-lg visible-md" id="faq-ttrss-nav">
                <ul class="nav nav-list">
                    <li><a href="index.php">Page d'accueil</a></li>
                    <li><a href="install.php">Installer Tiny Tiny RSS</a></li>
                </ul>
            </div>
            <!-- - - - - - - - - - - - - - - - - - /Framanews-nav - - - - - - - - - - - - - -->
            <div class="row" id="faq-ttrss">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h1>
                        <span class="medium-title">FAQ Tiny Tiny RSS</span>
                    </h1>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    Minimiser l'usage du trafic
                                </a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body lead">
                                    <p><small>En cochant cette option à la connexion, vous effectuerez moins de connexions vers le serveur en tâche de fond et vous n'afficherez plus les images.</small></p>
                                    <p><small>Ceci peut être utile si vous souhaitez utiliser moins de bande passante (par exemple avec un smartphone) ou si vous voulez accélerer l'affichage des articles (mauvaise qualité de ligne par exemple)</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    Importer ses flux aux format OPML
                                </a>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body lead">
                                    <p><small>Dans le menu «&nbsp;Actions&nbsp;», choisir «&nbsp;Configuration&nbsp;», aller sur l&rsquo;onglet «&nbsp;Flux&nbsp;» puis, en bas, cliquer sur «&nbsp;OPML&nbsp;».</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    Créer des catégories de flux
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body lead">
                                    <p><small>Dans le menu «&nbsp;Actions&nbsp;», choisir «&nbsp;Configuration&nbsp;», aller sur l&rsquo;onglet «&nbsp;Flux&nbsp;» puis cliquer sur «&nbsp;Catégories&nbsp;».</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                    Marquer des articles comme importants
                                </a>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body lead">
                                    <p><small>Si vous souhaitez marquer des articles pour une raison ou pour une autre, vous pouvez cliquer sur l&rsquo;étoile (en haut à gauche de chaque article), ils seront alors accessibles dans le dossier spécial «&nbsp;Articles remarquables&nbsp;».</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                    Étiqueter les articles
                                </a>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="panel-body lead">
                                    <p><small>Créez des étiquettes dans la configuration (onglet «&nbsp;Étiquettes&nbsp;») et assignez des étiquettes aux articles avec un clic droit sur le titre de l&rsquo;article.</small></p>
                                    <p><small>Vous aurez alors un dossier «&nbsp;Étiquettes&nbsp;», vous permettant ainsi de créer votre propre classement d&rsquo;articles.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                                    Partager les articles par mail
                                </a>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse">
                                <div class="panel-body lead">
                                    <p><small>Cocher l&rsquo;article (ou les articles) à partager, puis cliquer sur «&nbsp;Plus&nbsp;», «&nbsp;Transférer par email&nbsp;».</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                                    Créer son flux personnalisé
                                </a>
                            </div>
                            <div id="collapseSeven" class="panel-collapse collapse">
                                <div class="panel-body lead">
                                    <p><small>Cliquer sur l&rsquo;icône RSS en haut à gauche de l&rsquo;article à partager. C&rsquo;est fait, l&rsquo;article est dans votre flux personnel</small></p>
                                    <p><small>Pour connaître l&rsquo;adresse de votre flux personnel et pouvoir le partager, dans le menu «&nbsp;Actions&nbsp;», choisir «&nbsp;Configuration&nbsp;», aller sur l&rsquo;onglet «&nbsp;Flux&nbsp;» puis, en bas, cliquer sur «&nbsp;Articles publiés et partagés / Flux générés&nbsp;». Vous pouvez aussi aller sur le dossier spécial «&nbsp;Articles publiés&nbsp;» et cliquer sur l&rsquo;icône RSS en haut à droite de l&rsquo;écran ou utiliser le menu «&nbsp;Plus&nbsp;», «&nbsp;Voir comme RSS&nbsp;».</small></p>
                                    <p><small>Vous pouvez créer un flux personnalisé pour chacun de vos dossiers et flux en vous positionnant sur le dossier ou le flux et en cliquant sur l&rsquo;icône RSS en haut à droite ou utiliser le menu «&nbsp;Plus&nbsp;».</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseHeight">
                                    Encore plus de partage !
                                </a>
                            </div>
                            <div id="collapseHeight" class="panel-collapse collapse">
                                <div class="panel-body lead">
                                    <p><small>Parmi les plugins activables (voir plus bas), vous trouverez des plugins permettant le partage par Identi.ca, Twitter, Google+, Pinterest…</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">
                                    Intégration à Firefox
                                </a>
                            </div>
                            <div id="collapseNine" class="panel-collapse collapse">
                                <div class="panel-body lead">
                                    <p><small>Pour que Firefox enregistre Framanews comme lecteur de flux, dans le menu «&nbsp;Actions&nbsp;», choisir «&nbsp;Configuration&nbsp;», aller sur l&rsquo;onglet «&nbsp;Flux&nbsp;» puis, en bas, cliquer sur «&nbsp;Intégration à Firefox&nbsp;».</small></p>
                                    <p><small>Lorsque vous cliquerez sur un lien vers un flux RSS, Firefox vous proposera directement de l&rsquo;ajouter dans Framanews.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">
                                    Activation de plugins
                                </a>
                            </div>
                            <div id="collapseTen" class="panel-collapse collapse">
                                <div class="panel-body lead">
                                    <p><small>Ttrss possède un système de plugins, activables dans la configuration.</small></p>
                                    <p><small>Dans le menu «&nbsp;Actions&nbsp;», choisir «&nbsp;Configuration&nbsp;», en bas, cliquer sur «&nbsp;Plugins&nbsp;» et faire son choix.</small></p>
                                    <p><small>Certains plugins ne sont activables que par les administrateurs, les autres étant à votre discrétion, à l&rsquo;exception de ceux activés par défaut, que vous ne pourrez pas désactiver.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">
                                    Activation de l'API
                                </a>
                            </div>
                            <div id="collapseEleven" class="panel-collapse collapse">
                                <div class="panel-body lead">
                                    <p><small>Ttrss possède une API permettant l'accès à Ttrss par d'autres clients (voir la partie <a href="index.php#mobilite" class="dashed-border">Mobilité</a>).</small></p>
                                    <p><small>Nous n'activons pas cette API par défaut car Ttrss ne nous le permet pas.</small></p>
                                    <p><small>Pour activer l'API, rendez-vous dans vos préférences (menu déroulant «&nbsp;Actions&nbsp;», «&nbsp;Configuration&nbsp;»).</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve">
                                    Utilisation des raccourcis clavier
                                </a>
                            </div>
                            <div id="collapseTwelve" class="panel-collapse collapse">
                                <div class="panel-body lead">  
                                    <p><small>Ttrss possède un grand nombre de raccourcis claviers très utiles.</small></p>
                                    <p><small>Pour consulter la liste des raccourcis claviers disponibles, dans le menu «&nbsp;Actions&nbsp;», choisir «&nbsp;Aide sur les raccourcis clavier&nbsp;».</small></p>
                                    <p><small>Pour utiliser les raccourcis clavier alors que vous utilisez l'extension Firefox <a href="http://5digits.org/pentadactyl/index">Pentadactyl</a>, il suffit de passer en mode "Pass Through" en faisant un Ctrl+z.</small></p>
                                    <p><small>Pour les accros à Vim, vous pouvez intervertir les raccourcis clavier des touches j et k grâce au plugin <code>swap_jk</code> et ainsi retrouver un comportement semblable à celui de votre éditeur préféré.</small></p>
                                </div>
                            </div>
                        </div>
                        <!--<div class="panel panel-default">-->
                            <!--<div class="panel-heading">-->
                                <!--<a class="accordion-toggle lead" data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen">-->
                                <!--</a>-->
                            <!--</div>-->
                            <!--<div id="collapseThirteen" class="panel-collapse collapse">-->
                                <!--<div class="panel-body lead">-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <div class="col-md-2 visible-xs visible-sm" id="faq-ttrss-nav">
                <h3>Navigation</h3>
                <ul>
                    <li><a href="index.php">Page d'accueil</a></li>
                    <li><a href="install.php">Installer Tiny Tiny RSS</a></li>
                </ul>
            </div>
        </div> <!-- #content -->
    </body>
</html>
