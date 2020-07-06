<?php

require('models/model_database.php');

class ModelConnexion extends ModelDatabase {

    public function connexionDatabase($email) {
        
        $reponse = self::$connexion->prepare( "SELECT * FROM `user` WHERE email = ? " );
        $reponse->execute(array($email));
        return $reponse;
    }

}


?>