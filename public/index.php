<?php


// --------------------------------------------------------------
// Inclusions des classes
// --------------------------------------------------------------

// Inclusion spéfique pour Utiliser les dépendances installées avec 'composer'
require __DIR__.'/../vendor/autoload.php';


// --------------------------------------------------------------
// Préparation d'AltoRouter
// --------------------------------------------------------------

// Instaciation de l'objet Al!toRouter
$router = new AltoRouter();

// Définition du chemin commun à toutes les routes via la fichier .htaccess
// dump($_SERVER['BASE_URI']);
$router->setBasePath($_SERVER['BASE_URI']);

// --------------------------------------------------------------
// Définition des routes
// --------------------------------------------------------------

// Par défaut nous nous trouvons sur la page d'accueil

// Page d'accueil
$router->map( // arguments fournis en entrée de notre méthode 'map'
    'GET', // La méthode HTTP qui est autorisée pour cette route
    '/', // la partie d'url apres la racine du site qui correspond à la page demandée
    [
        'controller' => 'MainController',
        'method' => 'homeAction'
    ],
     // les informations qu'on récupèrera plus tard si on tombe sur cette route 
    'main-home' // un identifiant unique pour cette route
 );

 // route pour la page affichant les mentions légales
$router->map( // arguments fournis en entrée de notre méthode 'map'
    
    'GET', // La méthode HTTP qui est autorisée pour cette route
    '/authors/', // la partie d'url apres la racine du site qui correspond à la page demandée
    [
        'controller' => 'MainController',
        'method' => 'theAuthorsAction'
    ],
    
     // les informations qu'on récupèrera plus tard si on tombe sur cette route 
    'main-the-authors', // un identifiant unique pour cette route
 );

 // On regarde s'il y a une route pour la page demandée
 // On demande à AltoRouter est ce que tu as trouvé une route ?
 $match = $router->match();
 // dump($match);

 if($match) { 
   
     // Et lui répond oui j'ai trouvé une route et nous on dit si tu as trouvé une route alors :

     // => d'abbord check le bon controller 
     // ici maintenant on récupère le bon controller à instancier
     $controllerToUse = '\\Sonic\\Controllers\\' . $match['target']['controller'];
     // dump($controllerToUse);

     // ensuite fais appelle à la bonne méthode située dans le MainController
     $methodToCall = $match ['target']['method'];
     // dump($methodToCall);

     // on récupère les paramètres (données dynamiques) issues de l'url qui ont été extraites par AltoRouter lors du ->match()
         $params = $match['params'];

     // on instancie le bon contrôleur (soit MainController AuthorsController)
     // la variable $controller ira chercher selon la route le MainController qui gère la home etc 
     // ou le CatalogController qui gère le catalogue et ses ++ catagories
     $controller = new $controllerToUse();
    // dump($controller);

     // ici on appelle la méthode du controleur qui permettra d'afficher l'élément central
     $controller->$methodToCall($params);
    // Pour l'accueil
    // $methodToCall vaut 'homeAction'
    // et PHP appelera donc $controller ->homeAction();
    
    }

    
    else {
        // Si on ne trouve pas de route => erreur 404
        $mainController = new \Sonic\Controllers\ErrorController();
        $mainController->pageNotFoundAction();
    }