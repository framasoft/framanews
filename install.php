<?php 
// vim:set sw=4 ts=4 ft=php expandtab:
  header('Location: https://framacloud.org/fr/cultiver-son-jardin/ttrss.html');
  exit();
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
        <title>Framanews - Installer TTRSS</title>

        <link rel="shortcut icon" href="./favicon.png">
        <link media="screen" rel="stylesheet" href="https://framasoft.org/nav/lib/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/framanews.css">
        <link rel="stylesheet" href="css/framanews-responsive.css">
        <script src="https://framasoft.org/nav/lib/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="https://framasoft.org/nav/lib/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://framasoft.org/nav/nav.js" type="text/javascript"></script>
     </head>
    <body data-spy="scroll" data-target="#install-nav" data-offset="46" id="install-body">
        <div id="content">
            <!-- - - - - - - - - - - - - - - - - - Framanews-nav - - - - - - - - - - - - - -->
            <div class="affix col-md-2 visible-md visible-lg" id="install-nav">
                <ul class="nav nav-list">
                    <li><a href="#install" >Installer Tiny Tiny RSS</a></li>
                    <li><a href="#install-ttrss" >Documentation</a></li>
                    <li><a href="#install-requis" ><span class="glyphicon glyphicon-chevron-right muted"></span> Pré-requis</a></li>
                    <li><a href="#install-installation" ><span class="glyphicon glyphicon-chevron-right muted"></span> Installation</a></li>
                    <li><a href="#install-updating" ><span class="glyphicon glyphicon-chevron-right muted"></span> Mise à jour des flux</a></li>
                    <li><a href="#install-help" ><span class="glyphicon glyphicon-chevron-right muted"></span> Trouver de l'aide</a></li>
                    <li><a href="#particular-framanews" >Particularités Framanews</a></li>
                    <li><a href="#part-fork" ><span class="glyphicon glyphicon-chevron-right muted"></span> Fork</a></li>
                    <li><a href="#part-plugins" ><span class="glyphicon glyphicon-chevron-right muted"></span> Plugins</a></li>
                    <li><a href="#part-conseils" ><span class="glyphicon glyphicon-chevron-right muted"></span> Conseils</a></li>
                    <li><a href="index.php" onclick="window.open('index.php', '_self');">Page d'accueil</a></li>
                    <li><a href="ttrss.php" onclick="window.open('ttrss.php', '_self');">FAQ Tiny Tiny RSS</a></li>
                </ul>
            </div>
            <!-- - - - - - - - - - - - - - - - - - /Framanews-nav - - - - - - - - - - - - - -->
            <div class="row" id="install">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h1>
                        <span class="medium-title">Installer Tiny Tiny RSS</span>
                    </h1>
                </div>
            </div>
            <div class="row slide" id="install-ttrss">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Documentation</h1>
                    <div class="lead">
                        <h2>Page officielle</h2>
                        <p><small>Ce guide reprend les élements présents dans la <a href="http://tt-rss.org/redmine/projects/tt-rss/wiki/InstallationNotes">page officielle d'installation de ttrss</a>. </small></p>
                        <h2 id="install-requis">Pré-requis</h2>
                        <ul>
                            <li><p><small>un serveur web et une base de données (MySQL ou PostgreSQL),</small></p></li>
                            <li><p><small>les logins/mots de passe nécessaires à la connexion à la base de données. Ttrss peut coexister avec d'autres applications sur une base de données partagée, créer une base de donnée dédiée n'est pas nécessaire,</small></p></li>
                            <li><p><small>votre serveur web devrait utiliser au moins PHP 5.3 ou plus récent. L'utilisation d'un accélérateur comme php-apc est fortement recommendé.</small></p></li>
                        </ul>
                        <h2 id="install-installation">Installation</h2>
                        <ol>
                            <li>
                                <p><small>
                                    Désarchivez le tar.gz dans le répertoire de destination&nbsp;:
                                    <pre>tar zxfv Tiny-Tiny-RSS-1.x.x.tar.gz</pre>
                                    Il est recommandé de renommer le répertoire en ttrss pour plus de commodité&nbsp;:
                                    <pre>mv Tiny-Tiny-RSS-1.x.x ttrss</pre>
                                    Vous pouvez aussi désarchiver le tar.gz sur votre machine locale et envoyer les fichiers sur le serveur en utilisant FTP ou tout autre moyen à votre disposition.
                                </small></p>
                            </li>
                            <li><p><small>Vérifiez que vous pouvez accéder à <em>http://example.com/ttrss/install/</em>.</small></p></li>
                            <li><p><small>Procédez à l'installation avec l'assistant. Celui-ci vous demandera vos identifiants de base de données et l'URL complète d'accès à votre ttrss (par exemple, <em>http://example.com/ttrss/</em>). Cette URL doit si possible être accessible depuis l'extérieur, n'utilisez pas <em>localhost</em>, cela casse le support du PUSH. Si vous déployez ttrss sur un réseau local, vous pouvez vous en passer.</small></p></li>
                            <li><p><small>L'assistant va générer un fichier <em>config.php</em> pour vous une fois que vous aurez entré les identifiants de la base de donnée et celle-ci initialisée. Vous devrez copier le texte de l'assistant et le copier dans <em>config.php</em> sur le serveur, dans le répertoire d'installation. Si cela lui est possible, l'assistant le fera pour vous de façon automatique.</small></p></li>
                            <li><p><small>Il est conseillé de relire le fichier <em>config.php</em> pour voir si vous voulez pas ajouter des fonctionnalités ou changer les valeurs de configuration par défaut.</small></p></li>
                            <li><p><small>Après en avoir fini avec l'assistant, ouvrez votre installation de Tiny Tiny RSS sur <em>http://example.com/ttrss/</em> et connectez-vous avec les identifiants par défaut (login&nbsp;:&nbsp;<em>admin</em>, mot de passe&nbsp;:&nbsp;<em>password</em>).</small></p></li>
                            <li><p><small>Allez dans le préférences et changer votre mot de passe&nbsp;!</small></p></li>
                            <li><p><small>Vous aurez besoin de choisir la méthode de mise à jour des flux. Voyez <a href="#install-updating">plus bas</a>.</small></p></li>
                            <li><p><small>Si tout s'est bien passé, vous pouvez commencer à utiliser ttrss normalement. Créez un utilisateur non-administrateur, connectez-vous avec celui-ci et commencez à importer vos flux, à vous abonner à d'autres et à configurer ttrss à votre goût.</small></p></li>
                            <li><p><small>C'est fini&nbsp;!</small></p></li>
                        </ol>
                        <h2 id="install-updating">Mise à jour des flux</h2>
                        <p><small>Vous avez besoin d'utiliser une des méthodes ci-dessous pour utiliser ttrss correctement, sinon vos flux ne seront pas mis à jour.</small></p>
                        <p><small>Utilisez le dæmon de mise à jour si vous pouvez faire tourner des processus en arrière-plan. Sinon, utilisez une des autres méthodes. Sur Debian, les paquets officiels ont un système de mise à jour basé sur <em>cron</em>.</small></p>
                        <ul>
                            <li>
                                <h4>Dæmon de mise à jour — <em>méthode recommandée</em></h4>
                                <p><small>
                                    Utilisez cette méthode si vous avez accès à l'interpréteur PHP CLI et pouvez exécuter des processus en arrière-plan. Vous pouvez lancer un dæmon uni-processus ou <em>update_daemon2.php</em> (multi-processus, lance plusieurs tâches de mise à jour en parallèle) avec l'interpréteur PHP CLI.<br>
                                    S'il-vous-plaît, ne lancez jamais le dæmon ou tout autre processus PHP en tant qu'utilisateur <em>root</em>. Il est recommandé mais non obligatoire de lancer le dæmon en tant que l'utilisateur de votre site web (normalement <em>www-data</em>, <em>apache</em> ou un truc comme ça) pour éviter des problèmes de propriété de fichier.<br>
                                    Lancez <pre>./update.php --daemon</pre> (uni-processus) ou <pre>./update_daemon2.php</pre> (multi-processus).<br>
                                    Le script ne se dæmonise pas (c.à.d. ne se détache pas du terminal). Vous pouvez le forcer à tourner en arrièrr-plan en utilisant un utilitaire comme <em>start-stop-daemon</em> dans Debian. Vous pouvez aussi le lancer dans un <em>screen</em> ou un <em>tmux</em>.
                                    Le dæmon multi-processus <em>nécessite obligatoirement</em> que la variable <em>PHP_EXECUTABLE</em> soit correctement configuré dans <em>config.php</em> et pointe vers l'interpréteur PHP CLI de votre système, sinon il ne sera pas capable de lancer les tâches de mise à jour.
                                </small></p>
                            </li>
                            <li>
                                <h4>Mise à jour périodique</h4>
                                <p><small>
                                    Utilisez ceci si vous avez accès à l'interpréteur PHP CLI mais que vous ne pouvez pas (c.à.d. à cause de votre hébergeur) lancer de processus d'arrière-plan persistant. N'essayez pas de lancer des jobs <em>cron</em> avec un binaire PHP CGI, ça ne fonctionnera pas. Si vous voyez des en-têtes HTTP quand vous lancez <em>php ./update.php</em>, vous utilisez un mauvais binaire.<br>
                                    Exemple complet (lisez <em>man 5 crontab</em> pour plus d'information sur la syntaxe)&nbsp;:
                                    <pre>*/30 * * * * /usr/bin/php /home/user/public_html/ttrss/update.php --feeds --quiet</pre>
                                    NB&nbsp;:
                                    <ul>
                                        <li><code>/usr/bin/php</code> doit être remplacé par le chemin correct du binaire PHP CLI sur votre système. Si vous n'êtes pas sûr du binaire ou du chemin à utiliser, demandez à votre hébergeur.</li>
                                        <li><code>/home/user/public_html/ttrss</code> doit etre remplacé par le répertoire dans lequel vous avez installé Tiny Tiny RSS.</li>
                                        <li>Essayez si possible la commande à partir d'un terminal pour vérifier que ça fonctionne avant de créer le job cron.</li>
                                    </ul>
                                </small></p>
                            </li>
                            <li>
                                <h4>Simple mise à jour en arrière-plan (depuis la version 1.7.0)</h4>
                                <small>
                                    Si tout le reste a échoué et que vous ne pouvez utiliser une des méthodes ci-dessus, vous pouvez activer le mode de mise à jour simple où ttrss essayer de mettre à jour périodiquement les flux tant qu'il est ouvert dans votre navigateur. Évidemment, il n'y aura pas de mise à jour quand ttrss ne sera pas ouvert ou que votre ordinateur ne sera pas allumé.<br>
                                    Pour activer ce mode, passez la constante <em>SIMPLE_UPDATE_MODE</em> à <em>true</em> dans le fichier <em>config.php</em>.<br>
                                    Notez bien que seule l'interface principale de ttrss supporte ce mode. Si vous utilise l'interface <em>digest</em> ou <em>mobile</em>, ou un client de l'API (comme une application Android), les flux ne seront pas mis à jour. Vous devez absolument avoir ttrss ouvert dans un onglet de navigateur sur un ordinateur allumé quelque part.
                                </small>
                            </li>
                        </ul>
                        <h2 id="install-help">Trouver de l'aide</h2>
                        <p><small>En cas de problème, vous pouvez aller sur le <a href="http://tt-rss.org/forum/">forum officiel de Tiny Tiny RSS</a> (anglophone). Attention, cherchez bien dedans avant de poser une question, l'auteur n'est pas tendre et a son franc-parler. Les habitués aussi d'ailleurs.</small><p>
                        <p><small>Vous pouvez aussi nous demander conseil en passant par la <a href="http://contact.framasoft.org/">page de contact Framasoft</a></small></p>
                    </div>
                    <a class="btn btn-default btn-sm pull-right goto" href="#install-body" title="Retour au haut de la page"><span class="glyphicon glyphicon-arrow-up"></span></a>
                </div>
            </div>
            <div class="row slide" id="particular-framanews">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Particularités Framanews</h1>
                    <h2 id="part-fork">Fork</h2>
                    <div class="lead">
                        <p><small>Nous avons forké Tiny Tiny RSS pour y apporter quelques modifications nécessaires au bon fonctionnement de Framanews.</small></p>
                        <ul>
                            <li><p><small>traduction en français de certaines messages qui ne passaient pas dans le module de localisation, fuseau horaire Europe/Paris par défaut,</small></p></li>
                            <li><p><small>augmentation de la durée de rétention du cache des flux,</small></p></li>
                            <li><p><small>personnalisation du logo, du titre et de la favicon,</small></p></li>
                            <li><p><small>abonnement automatique au flux du Framablog à l'inscription,</small></p></li>
                            <li><p><small>utilisation de sous-modules git pour automatiser l'installation de plugins que nous voulons proposer,</small></p></li>
                            <li><p><small>intégration d'un système d'invitation / désabonnement à la liste de diffusion des utilisateurs de Framanews lors de l'inscription / la suppression du compte,</small></p></li>
                            <li><p><small>tuning de certaines parties du système de mise à jour (plus agressif, mais moins gourmand en ressources),</small></p></li>
                            <li><p><small>création d'une nouvelle méthode (placesAvailables) dans l'API pour avoir le nombre de places restantes.</small></p></li>
                        </ul>
                        <p><small>Aucune de ces modifications n'est bloquante&nbsp;: vous pouvez utiliser notre fork pour votre instance ttrss. Vous pouvez récupérer notre fork sur <a href="https://github.com/framasoft/framanews_ttrss">Github</a> (branche "full_french" par défaut).</small></p>
                        <pre>git clone https://github.com/framasoft/framanews_ttrss.git</pre>
                    </div>
                    <a class="btn btn-default btn-sm pull-right goto" href="#install-body" title="Retour au haut de la page"><span class="glyphicon glyphicon-arrow-up"></span></a>
                    <h2 id="part-plugins">Plugins</h2>
                    <div class="lead">
                        <p><small>Nous avons aussi développé des plugins ttrss pour nos besoins&nbsp;:</small></p>
                        <ul>
                            <li>
                                <h4>Quota</h4>
                                <p><small>Permet de limiter le nombre de flux par utilisateur. Si l'utilisateur dépasse le nombre de flux autorisé, il sera redirigé vers la page de configuration avec un message lui demanant de supprimer les flux surnuméraires. <a href="https://github.com/framasoft/framanews_quota.git">Lien Github</a></small></p>
                                <pre>git clone https://github.com/framasoft/framanews_quota.git</pre>
                            </li>
                            <li>
                                <h4>Framarticle_toolbar</h4>
                                <p><small>Ajoute un certain nombre de boutons d'accès rapide à l'interface principale de ttrss. <a href="https://github.com/framasoft/framarticle_toolbar.git">Lien Github</a></small></p>
                                <pre>git clone https://github.com/framasoft/framarticle_toolbar.git</pre>
                            </li>
                        </ul>
                    </div>
                    <a class="btn btn-default btn-sm pull-right goto" href="#install-body" title="Retour au haut de la page"><span class="glyphicon glyphicon-arrow-up"></span></a>
                    <h2 id="part-conseils">Conseils de Framanews pour une installation de ttrss à fort trafic</h2>
                    <div class="lead">
                        <p><small>Nous avons dû faire face à plusieurs problématiques au fur et à mesure de la mise en place de Framanews. Voici les leçons que nous en avons tiré&nbsp;:</small></p>
                        <ul>
                            <li><p><small>PostgreSQL. Obligatoire. MySQL ne tient absolument pas la charge.</small></p></li>
                            <li><p><small>le clustering PostgreSQL n'est pas encore suffisamment économe en ressources pour une utilisation massive de ttrss.
                                <br>Nous proposons donc plusieurs instances de ttrss avec chacune sa base de données dédiée</small></p></li>
                            <li><p><small>le disque dur peut vite faire un goulot d'étranglement. Nous avons pris un hébergeur proposant des machines virtuelles avec des disques SSD.</small></p></li>
                            <li><p><small>ne pas hésiter à demander aux goinfRSS (néologisme désignant quelqu'un abonné à plus de flux RSS qu'il n'est humainement possible de lire en une journée) de se limiter, les gens comprennent généralement le problème.
                                <br>Le plugin de quota permet d'éviter la création d'une situation où 20% des utilisateurs possèdent 80% des flux.</small></p></li>
                        </ul>
                        <p>Et surtout&nbsp;: Les utilisateurs sont compréhensifs et sympas. Vraiment. <em>Merci à eux. Merci à vous.</em></p>
                    </div>
                    <a class="btn btn-default btn-sm pull-right goto" href="#install-body" title="Retour au haut de la page"><span class="glyphicon glyphicon-arrow-up"></span></a>
                </div>
            </div>
            <div class="col-md-2 visible-xs visible-sm" id="install-nav">
                <h3>Navigation</h3>
                <ul>
                    <li><a href="#install" >Installer Tiny Tiny RSS</a></li>
                    <li><a href="#install-ttrss" >Documentation</a></li>
                    <ul>
                        <li><a href="#install-requis" ><span class="glyphicon glyphicon-chevron-right muted"></span> Pré-requis</a></li>
                        <li><a href="#install-installation" ><span class="glyphicon glyphicon-chevron-right muted"></span> Installation</a></li>
                        <li><a href="#install-updating" ><span class="glyphicon glyphicon-chevron-right muted"></span> Mise à jour des flux</a></li>
                        <li><a href="#install-help" ><span class="glyphicon glyphicon-chevron-right muted"></span> Trouver de l'aide</a></li>
                    </ul>
                    <li><a href="#particular-framanews" >Particularités Framanews</a></li>
                    <ul>
                        <li><a href="#part-fork" ><span class="glyphicon glyphicon-chevron-right muted"></span> Fork</a></li>
                        <li><a href="#part-plugins" ><span class="glyphicon glyphicon-chevron-right muted"></span> Plugins</a></li>
                        <li><a href="#part-conseils" ><span class="glyphicon glyphicon-chevron-right muted"></span> Conseils</a></li>
                    </ul>
                    <li><a href="index.php" onclick="window.open('index.php', '_self');">Page d'accueil</a></li>
                    <li><a href="ttrss.php" onclick="window.open('ttrss.php', '_self');">FAQ Tiny Tiny RSS</a></li>
                </ul>
                <a class="btn btn-default btn-sm pull-right goto" href="#install-body" title="Retour au haut de la page"><span class="glyphicon glyphicon-arrow-up"></span></a>
            </div>
        </div> <!-- #content -->
        <script src="js/smoothscrool.js"></script>
    </body>
</html>
