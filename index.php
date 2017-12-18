<?php
// vim:set sw=4 ts=4 ft=php expandtab:
    require_once('config.php');
    $bestchoice    = array('text' => 'Désolé, il n\'y a plus de place pour l\'instant.', 'places' => 0);
    $best_instance = '';
    $total_places  = 0;
    foreach ($instances as $instance) {
        $url     = "https://framanews.org/$instance/api/";
        $data    = array('op' => 'placesAvailables');
        $options = array(
            'http' => array(
                'method'  => 'POST',
                'content' => json_encode($data),
                'header'  => "Content-Type: application/json\r\n" .
                             "Accept: application/json\r\n"
            )
        );

        $context  = stream_context_create($options);
        $result   = file_get_contents($url, false, $context);
        if ($result != false) {
            $response     = json_decode($result);
            $total_places = $total_places + $response->content->places;
            if ($response->content->places > $bestchoice['places']) {
                $bestchoice['places'] = $response->content->places;
                $best_instance        = $instance.'/';
            }
        }
    }
    $places = ($bestchoice['places'] > 1) ? ' places disponibles' : ' place disponible';
    $bestchoice['text'] = '<a class="btn btn-default btn-lg" href="https://framanews.org/'.$best_instance.'register.php">Encore '.$total_places.$places.'</a>';
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Framanews - Accueil</title>

        <link rel="shortcut icon" href="./favicon.png">
        <link media="screen" rel="stylesheet" href="https://framasoft.org/nav/lib/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/framanews.css">
        <link rel="stylesheet" href="css/framanews-responsive.css">
        <script src="https://framasoft.org/nav/lib/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="https://framasoft.org/nav/lib/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body data-spy="scroll" data-target="#framanews-nav" data-offset="46" id="gototop">
        <script src="https://framasoft.org/nav/nav.js" type="text/javascript"></script>
        <div id="content">
            <!-- - - - - - - - - - - - - - - - - - Framanews-nav - - - - - - - - - - - - - -->
            <div class="col-md-2 visible-md visible-lg">
                <div class="hidden-print affix" id="framanews-nav">
                    <ul class="nav nav-list">
                        <li><a href="#home" class="brand">Framanews</a></li>
                        <li><a href="#kezako">C'est quoi&nbsp;?</a></li>
                        <li><a href="#kezako-rss">RSS&nbsp;?</a></li>
                        <li><a href="#komen-sa-marche">Et comment je fais&nbsp;?</a></li>
                        <li><a href="#framarticle_toolbar">La barre d'outils Framarticle</a></li>
                        <li><a href="#mobilite">Mobilité</a></li>
                        <li><a href="https://contact.framasoft.org/foire-aux-questions/#framanews" onclick="window.open(this.href, '_self')">FAQ</a></li>
                        <li><a href="ttrss.php" onclick="window.open(this.href, '_self')">FAQ Tiny Tiny RSS</a></li>
                        <li><a href="https://framacloud.org/cultiver-son-jardin/installation-de-tinytinyrss/" onclick="window.open(this.href, '_self')">Installer Tiny Tiny RSS</a></li>
                    </ul>
                </div>
            </div>
            <!-- - - - - - - - - - - - - - - - - - /Framanews-nav - - - - - - - - - - - - - -->
            <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Connexion / Inscription</h3>
                        </div>
                        <div class="modal-body">
                            <h4>Inscription</h4>
                            <p><?php print $bestchoice['text'];?></p>
                            <h4>Connexion</h4>
                            <ul>
                                <?php
                                    foreach ($instances as $instance) {
                                        print '<li><a href="'.$instance.'/">https://framanews.org/'.$instance.'/</a></li>';
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="home">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h1>
                        <span class="big-title"><span class="frama">Frama</span><span class="news">news</span></span>
                    </h1>
                    <!--<p class="lead"><?php print $bestchoice['text'];?></p>-->
                    <a id="btn-ttrss" class="btn btn-default btn-lg" href="#modal" role="button" data-toggle="modal">Connexion / inscription</a>
                </div>
            </div>
            <div class="row slide" id="kezako">
                <div class="col-md-8 col-md-offset-2">
                    <div class="rotateY pull-left visible-desktop">
                        <img src="img/framanews-screenshot.png" alt="Framanews screenshot" class="img-rounded"  style="width:100%; margin-bottom:30px;">
                    </div>
                    <h1>C&rsquo;est quoi <span class="frama">Frama</span><span class="news">news</span>&nbsp;?</h1>
                    <div class="lead" style="padding-top: 20px;">
                        <p>Framanews est un service gratuit proposé par le réseau <a href="http://framasoft.org"><span class="frama">Frama</span><span class="soft">soft</span></a>.</p>
                        <p>Vous disposez ainsi d&rsquo;un lecteur de flux RSS en ligne, vous permettant d&rsquo;être toujours au courant de l&rsquo;actualité à partir des flux RSS de vos sites préférés&nbsp;!</p>
                        <p>Il s&rsquo;agit d&rsquo;une instance du Logiciel Libre <a href="http://tt-rss.org">Tiny Tiny RSS</a> (souvent abrégé ttrss).</p>
                        <p></p>
                    </div>
                    <a class="btn btn-default btn-sm pull-right goto" href="#gototop" title="Retour au haut de la page"><span class="glyphicon glyphicon-arrow-up"></span></a>
                </div>
            </div>
            <div class="row slide" id="kezako-rss">
                <div class="col-md-8 col-md-offset-2">
                    <img src="img/rss.png" alt="Symbole RSS" id="rss-symbol" class="pull-right">
                    <h1>Et c&rsquo;est quoi un flux RSS&nbsp;?</h1>
                    <div class="lead">
                        <p>C&rsquo;est un petit fichier dans un format spécial<a href="#NB-RSS">*</a> qui contient la liste des nouveautés ou des informations du site.<p>
                        <p>Notez bien que tous les sites ne fournissent pas forcément un flux RSS et s&rsquo;il le font, il est possible que les articles ne soient pas complets</p>
                        <p>Vous trouverez la plupart du temps sur les sites une petite icône semblable à celle à droite de ce texte. Il s&rsquo;agit normalement d&rsquo;un lien vers le flux RSS du site.</p>
                        <span id="NB-RSS"></span><p>*<small>Ce format peut être le <a href="http://fr.wikipedia.org/wiki/RSS">RSS</a> ou le format <a href="http://fr.wikipedia.org/wiki/Atom">Atom</a>. Par abus de langage, on parle juste des flux RSS, c&rsquo;est plus simple.</small></p>
                    </div>
                    <a class="btn btn-default btn-sm pull-right goto" href="#gototop" title="Retour au haut de la page"><span class="glyphicon glyphicon-arrow-up"></span></a>
                </div>
            </div>
            <div class="row slide" id="komen-sa-marche">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Et comment je fais&nbsp;?</h1>
                    <p class="lead">C&rsquo;est très simple&nbsp;:</p>
                    <ol>
                        <li class="lead">Se <a href="#modal" role="button" data-toggle="modal">créer un compte</a>, relever ses mails, éventuellement regarder dans le dossier des spams puis confirmer son inscription</li>
                        <li class="lead">Ajouter des flux RSS</li>
                        <li class="lead">Lire ses flux RSS</li>
                    </ol>
                    <h1>C&rsquo;est si simple&nbsp;?</h1>
                    <p class="lead">Basiquement, oui&nbsp;! Par contre, on peut faire plus de choses très intéressantes (voir la <a href="ttrss.php">FAQ Tiny Tiny RSS</a> pour plus de détails)&nbsp;:</p>
                    <ul>
                        <li class="lead">Importer ses flux aux format OPML</li>
                        <li class="lead">Créer des catégories de flux</li>
                        <li class="lead">Partager les articles</li>
                        <li class="lead">…</li>
                    </ul>
                    <a class="btn btn-default btn-sm pull-right goto" href="#gototop" title="Retour au haut de la page"><span class="glyphicon glyphicon-arrow-up"></span></a>
                </div>
            </div>
            <div class="row slide" id="framarticle_toolbar">
                <div class="col-md-8 col-md-offset-2">
                    <h1>La barre d&rsquo;outils Framarticle</h1>
                    <p class="lead">C&rsquo;est un plugin ttrss (<a href="https://github.com/framasoft/framarticle_toolbar">framarticle_toolbar</a>) donnant un accès rapide à certaines fonctionnalités de ttrss, en plaçant des boutons d&rsquo;accès rapides en haut à droite de l&rsquo;interface.</p>
                    <p>Sur Framanews, ce plugin est activé par défaut et n&rsquo;est pas désactivable.</p>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-th-list"></span></button>
                            <p class="lead">Développer ou réduire les articles</p>
                            <p>Vous pouvez basculer entre les articles au complet ou juste la liste des titres.</p>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span></button>
                            <p class="lead">Marquer les articles comme lus<p>
                            <p>Retour de vacances, pas le temps de tout lire&nbsp;? Zou&nbsp;! Tout les articles affichés sont lus&nbsp;!</p>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span></button>
                            <p class="lead">Rafraîchir le flux</p>
                            <p>Des nouveaux articles sont disponibles mais pas encore affichés&nbsp;? Il n&rsquo;y a qu&rsquo;à demander.</p>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button>
                            <p class="lead">S&rsquo;abonner au flux</p>
                            <p>Raccourci pour la boîte de dialogue d&rsquo;ajout d&rsquo;abonnement</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-arrow-up"></span></button>
                            <p class="lead">Article précédent</p>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-arrow-down"></span></button>
                            <p class="lead">Prochain article</p>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-heart"></span></button>
                            <p class="lead">Faire un don à <span class="frama">Frama</span><span class="soft">soft</span></p>
                            <p>Vous aimez <span class="frama">Frama</span><span class="news">news</span> et vous voulez nous soutenir ? Ce bouton fait apparaître une petite popup contenant le lien vers notre page de soutien.</p>
                        </div>
                    </div>
                    <a class="btn btn-default btn-sm pull-right goto" href="#gototop" title="Retour au haut de la page"><span class="glyphicon glyphicon-arrow-up"></span></a>
                </div>
            </div>
            <div class="row slide" id="mobilite">
                <div class="col-md-8 col-md-offset-2">
                    <div class="rotateY-right pull-right visible-desktop">
                        <img src="img/mobile_version.png" alt="Version mobile de Framanews" style="width:100%">
                    </div>
                    <h1>Mobilité</h1>
                    <p class="lead">Parce que nous sommes tous les jours plus mobiles, Framanews possède un mode tablette, qui conviendra tout aussi bien aux smartphones.</p>
                    <p class="lead">Nous avons aussi installé un client HTML + JavaScript optimisé pour les mobiles mais qui convient aussi pour le bureau : <a href="https://framanews.org/enyojs/">https://framanews.org/enyojs/</a> (voir sur le <a href="http://tt-rss.org/forum/viewtopic.php?f=22&t=1770&start=15&sid=fa4c09a2aa382cf68b9ae4df9fec018b">forum de ttrss</a> pour les sources).</p>
                    <p class="lead">Sinon plusieurs applications pour ttrss existent&nbsp;:</p>
                    <ul>
                        <li class="lead"><a href="https://git.tt-rss.org/git/tt-rss-android">Tiny Tiny RSS</a> (Android)</li>
                        <li class="lead"><a href="https://code.google.com/p/ttrss-reader-fork/">TTRSS-Reader</a> (Android)</li>
                        <li class="lead"><a href="https://github.com/andreafortuna/YATTRSSC">YATTRSSC</a> (webapp, fonctionne aussi sur iOs, et sans doute tous les autres OS mobiles permettant l&rsquo;utilisation des webapp)</li>
                        <li class="lead"><a href="https://github.com/jeena/feedmonkey">FeedMonkey</a> (webapp, faite au départ pour Firefox OS, devrait fonctionner partout)</li>
                        <li class="lead"><a href="http://www.mj-devs.fr/ttrss.html">TT-RSS Reader</a> (iOs)</li>
                    </ul>
                    <p>À noter que ces applications nécessitent d&rsquo;autoriser l&rsquo;accès par l&rsquo;<a href="ttrss.php">API</a> dans les préférences (menu déroulant «&nbsp;Actions&nbsp;», «&nbsp;Configuration&nbsp;»)</p>
                    <a class="btn btn-default btn-sm pull-right goto" href="#gototop" title="Retour au haut de la page"><span class="glyphicon glyphicon-arrow-up"></span></a>
                </div>
            </div>
            <div class="col-md-2 visible-xs visible-sm">
                <div class="hidden-print" id="framanews-nav">
                    <h3>Navigation</h3>
                    <ul>
                        <li><a href="#home" class="brand">Framanews</a></li>
                        <li><a href="#kezako">C'est quoi&nbsp;?</a></li>
                        <li><a href="#kezako-rss">RSS&nbsp;?</a></li>
                        <li><a href="#komen-sa-marche">Et comment je fais&nbsp;?</a></li>
                        <li><a href="#framarticle_toolbar">La barre d'outils Framarticle</a></li>
                        <li><a href="#mobilite">Mobilité</a></li>
                        <li><a href="https://contact.framasoft.org/foire-aux-questions/#framanews" onclick="window.open(this.href, '_self')">FAQ</a></li>
                        <li><a href="ttrss.php" onclick="window.open(this.href, '_self')">FAQ Tiny Tiny RSS</a></li>
                        <li><a href="https://framacloud.org/cultiver-son-jardin/installation-de-tinytinyrss/" onclick="window.open(this.href, '_self')">Installer Tiny Tiny RSS</a></li>
                    </ul>
                    <a class="btn btn-default btn-sm pull-right goto" href="#gototop" title="Retour au haut de la page"><span class="glyphicon glyphicon-arrow-up"></span></a>
                </div>
            </div>
        </div> <!-- #content -->
        <script src="js/smoothscrool.js"></script>
    </body>
</html>
