<?php

namespace Sonic\Controllers;

class CoreController {

    protected function show($viewName, $viewVars = []) {

    // c'est pas recommandé t'utiliser 'global' mais accessible de donner 
    // accès à la variable $router (définie dans index.php) dans la méthode show
    // au lieu de faire des choses trop compliquées à ce stade de la formation
    // en utilisant 'global' $router qui est défini à l'extérieur de show sera accessible ici
    global $router;

    // Pour corriger les liens des assets sur notre site on doit utiliser des urls absolues, on rajoute donc une variable contenant le chemin vers le répertoire 'public'
    $absoluteUrl = $_SERVER['BASE_URI'].'/';
    // dump($absoluteUrl);

    extract($viewVars);
        // $viewVars est disponible dans chaque fichier de vue (views)
        require_once __DIR__.'/../views/header.tpl.php';
        require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
        require_once __DIR__.'/../views/footer.tpl.php';
    // dump($viewName);

        }
}