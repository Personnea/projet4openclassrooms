<?php

require('models\modele_bdd.php');

class ModeleConnexion extends ModeleBdd {

    public function connexionbdd($email) {
        
        $reponse = self::$connexion->query( "SELECT * FROM `projet4` WHERE email = '$email'" );
        return $reponse;
    }

}


?>