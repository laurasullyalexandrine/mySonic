<?php

namespace Sonic\Controllers;

use Sonic\Models\Character;

class MainController extends CoreController {
    public function homeAction() {
        
        // Ici on récupère toutes les données des personnages par ordre alphabétique.
        $charactersListOrderByName = new Character();
        $homeCharacters = $charactersListOrderByName->findAllCharacters();

        $this->show('home', ['home_characters' => $homeCharacters]);
    }
        
    public function theAuthorsAction()
    {
        $this->show('authors');
    }
}
    

    