<?php
// vim:set sw=4 ts=4 ft=php expandtab:
    require_once('config.php');
    $bestchoice  = array('text' => 'Désolé, il n\'y a plus de place pour l\'instant.', 'places' => 0);
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
            $response = json_decode($result);
            if ($response->content->places > $bestchoice['places']) {
                $bestchoice['places'] = $response->content->places;
                $places = ($bestchoice['places'] > 1) ? ' places disponibles' : ' place disponible';
                $bestchoice['text'] = '<a class="btn btn-large" href="https://framanews.org/'.$instance.'/register.php">Encore '.$bestchoice['places'].$places.'</a>';
            }
        }
    }
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Framanews - Accueil</title>

        <link rel="shortcut icon" href="./favicon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/framanews.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/framanews-responsive.css">
        <link href="framanav/nav.css" rel="stylesheet"><!-- Framanav -->
    </head>
    <body data-spy="scroll" data-target="#framanews-nav" data-offset="46" id="gototop">
        <?php include_once('navbar.php'); ?>
        <div id="content">
            <!-- - - - - - - - - - - - - - - - - - Framanews-nav - - - - - - - - - - - - - -->
            <div class="visible-desktop row-fluid" id="framanews-nav">
                <ul class="nav nav-list affix span2">
                    <li><a href="#home" class="brand">Framanews</a></li>
                    <li><a href="#kezako">C'est quoi&nbsp;?</a></li>
                    <li><a href="#kezako-rss">RSS&nbsp;?</a><li>
                    <li><a href="#komen-sa-marche">Et comment je fais&nbsp;?</a></li>
                    <li><a href="#framarticle_toolbar">La barre d'outils Framarticle</a></li>
                    <li><a href="#mobilite">Mobilité</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="ttrss.php" onclick="window.open('ttrss.php', '_self');">FAQ Tiny Tiny RSS</a></li>
                    <li><a href="install.php"  onclick="window.open('install.php', '_self');">Installer Tiny Tiny RSS</a><li>
                </ul>
            </div>
            <!-- - - - - - - - - - - - - - - - - - /Framanews-nav - - - - - - - - - - - - - -->
            <div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <div class="row-fluid" id="home">
                <div class="span6 offset3 text-center">
                    <h1>
                        <span class="big-title"><span class="frama">Frama</span><span class="news">news</span></span>
                        <img src="img/beta.png" alt="beta" class="beta">
                    </h1>
                    <!--<p class="lead"><?php print $bestchoice['text'];?></p>-->
                    <a id="btn-ttrss" class="btn btn-large" href="#modal" role="button" data-toggle="modal">Connexion / inscription</a>
                </div>
            </div>
            <div class="row-fluid slide" id="kezako">
                <div class="span8 offset2">
                    <div class="rotateY pull-left visible-desktop">
                        <img src="img/framanews-screenshot.png" alt="Framanews screenshot" class="img-rounded">
                    </div>
                    <h1>C&rsquo;est quoi <span class="frama">Frama</span><span class="news">news</span>&nbsp;?</h1>
                    <div class="lead" style="padding-top: 20px;">
                        <p>Framanews est un service gratuit proposé par le réseau <a href="http://framasoft.org"><span class="frama">Frama</span><span class="soft">soft</span></a>.</p>
                        <p>Vous disposez ainsi d&rsquo;un lecteur de flux RSS en ligne, vous permettant d&rsquo;être toujours au courant de l&rsquo;actualité à partir des flux RSS de vos sites préférés&nbsp;!</p>
                        <p>Il s&rsquo;agit d&rsquo;une instance du Logiciel Libre <a href="http://tt-rss.org">Tiny Tiny RSS</a> (souvent abrégé ttrss).</p>
                        <p></p>
                    </div>
                    <a class="btn btn-small pull-right goto" href="#gototop" title="Retour au haut de la page"><i class="icon-arrow-up"></i></a>
                </div>
            </div>
            <div class="row-fluid slide" id="kezako-rss">
                <div class="span8 offset2">
                    <img src="img/rss.png" alt="Symbole RSS" id="rss-symbol" class="pull-right">
                    <h1>Et c&rsquo;est quoi un flux RSS&nbsp;?</h1>
                    <div class="lead">
                        <p>C&rsquo;est un petit fichier dans un format spécial<a href="#NB-RSS">*</a> qui contient la liste des nouveautés ou des informations du site.<p>
                        <p>Notez bien que tous les sites ne fournissent pas forcément un flux RSS et s&rsquo;il le font, il est possible que les articles ne soient pas complets</p>
                        <p>Vous trouverez la plupart du temps sur les sites une petite icône semblable à celle à droite de ce texte. Il s&rsquo;agit normalement d&rsquo;un lien vers le flux RSS du site.</p>
                        <span id="NB-RSS"></span><p>*<small>Ce format peut être le <a href="http://fr.wikipedia.org/wiki/RSS">RSS</a> ou le format <a href="http://fr.wikipedia.org/wiki/Atom">Atom</a>. Par abus de langage, on parle juste des flux RSS, c&rsquo;est plus simple.</small></p>
                    </div>
                    <a class="btn btn-small pull-right goto" href="#gototop" title="Retour au haut de la page"><i class="icon-arrow-up"></i></a>
                </div>
            </div>
            <div class="row-fluid slide" id="komen-sa-marche">
                <div class="span8 offset2">
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
                    <a class="btn btn-small pull-right goto" href="#gototop" title="Retour au haut de la page"><i class="icon-arrow-up"></i></a>
                </div>
            </div>
            <div class="row-fluid slide" id="framarticle_toolbar">
                <div class="span8 offset2">
                    <h1>La barre d&rsquo;outils Framarticle</h1>
                    <p class="lead">C&rsquo;est un plugin ttrss (<a href="https://github.com/framasoft/framarticle_toolbar">framarticle_toolbar</a>) donnant un accès rapide à certaines fonctionnalités de ttrss, en plaçant des boutons d&rsquo;accès rapides en haut à droite de l&rsquo;interface.</p>
                    <p>Sur Framanews, ce plugin est activé par défaut et n&rsquo;est pas désactivable.</p>
                    <br>
                    <div class="row">
                        <div class="span3">
                            <button class="btn"><i class="icon-th-list"></i></button>
                            <p class="lead">Développer ou réduire les articles</p>
                            <p>Vous pouvez basculer entre les articles au complet ou juste la liste des titres.</p>
                        </div>
                        <div class="span3">
                            <button class="btn"><i class="icon-eye-open"></i></button>
                            <p class="lead">Marquer les articles comme lus<p>
                            <p>Retour de vacances, pas le temps de tout lire&nbsp;? Zou&nbsp;! Tout les articles affichés sont lus&nbsp;!</p>
                        </div>
                        <div class="span3">
                            <button class="btn"><i class="icon-refresh"></i></button>
                            <p class="lead">Rafraîchir le flux</p>
                            <p>Des nouveaux articles sont disponibles mais pas encore affichés&nbsp;? Il n&rsquo;y a qu&rsquo;à demander.</p>
                        </div>
                        <div class="span3">
                            <button class="btn"><i class="icon-plus"></i></button>
                            <p class="lead">S&rsquo;abonner au flux</p>
                            <p>Raccourci pour la boîte de dialogue d&rsquo;ajout d&rsquo;abonnement</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span3">
                            <button class="btn"><i class="icon-arrow-up"></i></button>
                            <p class="lead">Article précédent</p>
                        </div>
                        <div class="span3">
                            <button class="btn"><i class="icon-arrow-down"></i></button>
                            <p class="lead">Prochain article</p>
                        </div>
                        <div class="span6">
                            <button class="btn"><i class="icon-heart"></i></button>
                            <p class="lead">Faire un don à <span class="frama">Frama</span><span class="soft">soft</span></p>
                            <p>Vous aimez <span class="frama">Frama</span><span class="news">news</span> et vous voulez nous soutenir ? Ce bouton fait apparaître une petite popup contenant le lien vers notre page de soutien.</p>
                        </div>
                    </div>
                    <a class="btn btn-small pull-right goto" href="#gototop" title="Retour au haut de la page"><i class="icon-arrow-up"></i></a>
                </div>
            </div>
            <div class="row-fluid slide" id="mobilite">
                <div class="span8 offset2">
                    <div class="rotateY-right pull-right visible-desktop">
                        <img src="img/mobile_version.png" alt="Version mobile de Framanews">
                    </div>
                    <h1>Mobilité</h1>
                    <p class="lead">Parce que nous sommes tous les jours plus mobiles, Framanews possède un mode tablette, qui conviendra tout aussi bien aux smartphones.</p>
                    <p class="lead">Nous avons aussi installé un client HTML + JavaScript optimisé pour les mobiles mais qui convient aussi pour le bureau : <a href="https://framanews.org/enyojs/">https://framanews.org/enyojs/</a> (voir sur le <a href="http://tt-rss.org/forum/viewtopic.php?f=22&t=1770&start=15&sid=fa4c09a2aa382cf68b9ae4df9fec018b">forum de ttrss</a> pour les sources).</p>
                    <p class="lead">Sinon plusieurs applications pour ttrss existent&nbsp;:</p>
                    <ul>
                        <li class="lead"><a href="http://tt-rss.org/redmine/projects/tt-rss-android/wiki/">Tiny Tiny RSS</a> (Android)</li>
                        <li class="lead"><a href="https://code.google.com/p/ttrss-reader-fork/">TTRSS-Reader</a> (Android)</li>
                        <li class="lead"><a href="https://github.com/andreafortuna/YATTRSSC">YATTRSSC</a> (webapp, fonctionne aussi sur iOs, et sans doute tous les autres OS mobiles permettant l&rsquo;utilisation des webapp)</li>
                        <li class="lead"><a href="https://github.com/jeena/feedmonkey">FeedMonkey</a> (webapp, faite au départ pour Firefox OS, devrait fonctionner partout)</li>
                        <li class="lead"><a href="http://www.mj-devs.fr/ttrss.html">TT-RSS Reader</a> (iOs)</li>
                    </ul>
                    <p>À noter que ces applications nécessitent d&rsquo;autoriser l&rsquo;accès par l&rsquo;<a href="ttrss.php">API</a> dans les préférences (menu déroulant «&nbsp;Actions&nbsp;», «&nbsp;Configuration&nbsp;»)</p>
                    <a class="btn btn-small pull-right goto" href="#gototop" title="Retour au haut de la page"><i class="icon-arrow-up"></i></a>
                </div>
            </div>
            <div class="row-fluid slide" id="faq">
                <div class="span8 offset2">
                    <h1>F.A.Q.</h1>
                    <ul>
                        <li class="lead">
                            <p>Limitations</p>
                            <p><small>Nous n'avons qu'une petite infrastructure, aucunement comparable aux géants du web, et cela nous amène à poser certaines limitations :
                                <ul>
                                    <li>nous limitons le nombre d'inscriptions par instance de ttrss (environ 250 utilisateurs, mais cela peut varier selon la charge de l'instance). S'il n'y a plus de place, il faut prendre son mal en patience et attendre que nous puissions mettre en place une nouvelle instance.</li>
                                    <li>nous limitons le nombre de flux par compte à 100. Au-delà, nous risquons de ne plus pouvoir mettre à jour les flux de façon efficace. Si vous avez besoin de plus de flux, nous pouvons éventuellement vous aider à mettre en place votre propre instance de ttrss (voir <a href="install.php">ici</a>)</li>
                                    <li>au bout de 3 mois sans connexion, nous demandons au titulaire d'un compte s'il a toujours besoin de Framanews et s'il peut laisser sa place à quelqu'un d'autre.</li>
                                </ul>
                            </small></p>
                        </li>
                        <li class="lead">
                            <p>Pourquoi une inscription obligatoire&nbsp;?</p>
                            <p><small>C&rsquo;est vrai, la majorité des services de Framasoft sont utilisables sans inscription, mais la nature même d&rsquo;un lecteur de flux RSS nous a poussés à choisir une solution avec inscription.</small></p>
                            <p><small>Alors que <a href="http://framapad.org"><span class="frama">Frama</span><span class="news">pad</span></a>, <a href="http://framacalc.org"><span class="frama">Frama</span><span class="news">calc</span></a>, <a href="http://framadate.org"><span class="frama">Frama</span><span class="news">date</span></a> et consorts sont plutôt utilisés pour des besoins ponctuels et limités dans le temps, un lecteur de flux RSS est un service qu&rsquo;on utilise sur une longue durée, dont la vandalisation serait plus grave que sur les autres services évoqués. Pour se prémunir de cela, l&rsquo;inscription est nécessaire.</small></p>
                            <p><small>Framasoft n&rsquo;utilisera vos données — adresse email (nécessaire), nom (facultatif) — que pour les besoins du service (renvoi de mot de passe, etc.). De plus, vous serez automatiquement invité à rejoindre la liste de diffusion dédiée aux utilisateurs de Framanews (voir <a href="http://framalistes.org/sympa/info/framanews_users">ici</a>).</small></p>
                        </li>
                        <li class="lead">
                            <p>Et la suppression de mon compte&nbsp;?</p>
                            <p><small>Seul les administrateurs peuvent supprimer un compte. Il faut écrire <a href="http://contact.framasoft.org/">ici</a>.</small></p>
                            <p><small>La suppression du compte entraîne automatiquement une demande de suppression de votre abonnement à la liste de diffusion dédiée aux utilisateurs de Framanews.</small></p>
                        </li>
                        <li class="lead">
                            <p>Il y a un nouvel article sur tel ou tel site et je le vois pas encore dans Framanews</p>
                            <p><small>Ttrss rafraîchit les flux toutes les 30 minutes par défaut (modifiable pour chaque flux ou sur tous les flux du compte (menu déroulant «&nbsp;Actions&nbsp;», «&nbsp;Configuration&nbsp;») donc si l'article est paru juste après le passage de Ttrss, il ne sera pas vu avant le prochain passage, 30 minutes plus tard.</small></p>
                            <p><small>De plus, Framanews ne bénéficie pas des infrastructures d'un Google Reader ou d'un Feedly, donc rafraîchir les flux de tous les inscrits prend un certain temps.</small></p>
                            <p><small>Enfin, nous sommes obligés de par notre petite infrastructure d'allonger la durée de rétention du cache des flux à 45 minutes.</small></p>
                        </li>
                        <li class="lead">
                            <p>Mon navigateur me dit que la connexion est <strong>partiellement</strong> chiffrée. Pourquoi ?</p>
                            <p><small>Nous avons mis en place une connexion sécurisée pour l'utilisation de Framanews mais les images qui sont contenues dans vos flux, elles, ne sont pas forcément appelées par une URL sécurisée.</small></p>
                            <p><small>Le navigateur détecte que certains éléments de la page ne sont pas sécurisés et vous avertit donc.</small></p>
                            <p><small>Pour les utilisateurs des applications mobiles, il est nécessaire de mettre l'URL sécurisée de Framanews (en <strong>https</strong> donc) pour être sûr du bon fonctionnement de votre application.</small></p>
                        </li>
                        <li class="lead">
                            <p>Comment installer ttrss chez moi&nbsp;? Vous avez changé quoi à ttrss&nbsp;?</p>
                            <p><small>Comme un certain nombre de personnes nous demandent des conseils à ce sujet, nous avons créé une <a href="install.php">page dédiée</a></small>.</p>
                        </li>
                        <li class="lead">
                            <p>Une question&nbsp;? Une suggestion&nbsp;?</p>
                            <p><small>C&rsquo;est par <a href="http://contact.framasoft.org/">là</a>&nbsp;!</small></p>
                        </li>
                    </ul>
                    <a class="btn btn-small pull-right goto" href="#gototop" title="Retour au haut de la page"><i class="icon-arrow-up"></i></a>
                </div>
            </div>
        </div> <!-- #content -->
        <script src="js/smoothscrool.js"></script>
    </body>
</html>
