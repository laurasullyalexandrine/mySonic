<?php

namespace Sonic\Models;

use Sonic\Utils\Database;
use PDO;


class Character extends CoreModel {

private $description;
private $picture;
private $type_id;


// Méthode retournant la liste de tous les personnages.
 public function findAllCharacters() {

    // En premier se connecter à la BDD en récupérant de connexion PDO qui se trouve dans le fichier DataBase
     $pdoDBConnexion = Database::getPDO();
     // dump($pdoDBConnexion);

     // On écrit notre requête sql qui nous permettra d'afficher les différentes infos souhaitées des personnages.
     $sql = 'SELECT `character`.`id`, `character`.`name`, `character`.`description`, `character`.`picture`, `type`.`name` 
     AS`type_name` FROM `character` INNER JOIN `type` ON `type`.`id` = `character`.`type_id` WHERE `character`.`type_id` ORDER BY `character`.`name` '; 

     //  Exécution de la requête avec la connexion
     $pdoStatement = $pdoDBConnexion->query($sql);

         // Récupération des résultats
        $charactersList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        // dump($charactersList);

         return $charactersList;
 }  
 
 
/**
 * Get the value of description
 */ 
public function getDescription()
{
return $this->description;
}

/**
 * Set the value of description
 *
 * @return  self
 */ 
public function setDescription($description)
{
$this->description = $description;

return $this;
}

/**
 * Get the value of picture
 */ 
public function getPicture()
{
return $this->picture;
}

/**
 * Set the value of picture
 *
 * @return  self
 */ 
public function setPicture($picture)
{
$this->picture = $picture;

return $this;
}

/**
 * Get the value of type_id
 */ 
public function getTypeId()
{
return $this->type_id;
}

/**
 * Set the value of type_id
 *
 * @return  self
 */ 
public function setTypeIid($type_id)
{
$this->type_id = $type_id;

return $this;
}
}