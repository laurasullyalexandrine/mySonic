<?php

namespace Sonic\Controllers;

class ErrorController extends CoreController {


    // ici on traite la cas avec cette méthode de la page non trouvée cela affichera la page 404.tpl.php
    public function pageNotFoundAction() {
        header("HTTP/1.0 404 Not Found");
        $this->show('404');
        }
}