<?php

require('models\modele_bdd.php');

class ModeleConnexion extends ModeleBdd {

    public function connexionbdd($email) {
        
        $reponse = self::$connexion->prepare( "SELECT * FROM `projet4` WHERE email = ? " );
        $reponse->execute(array($email));
        return $reponse;
    }

}


?>