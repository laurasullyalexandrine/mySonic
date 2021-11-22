<?php

namespace Sonic\Models;

use Sonic\Utils\Database;
use PDO;

class Type extends CoreModel {

    public function find($id) {
        $pdoDBConnexion = Database::getPDO();

        // On écrit notre requête sql
        $sql = 'SELECT * FROM `type`WHERE id = ' . $id;
   
        //  Exécution de la requête
        $pdoStatement = $pdoDBConnexion->query($sql);
   
            // Récupération des résultats
            $typeList = $pdoStatement->fetchObject(self::class);

   
            return $typeList;
            dump($typeList);
            }

}