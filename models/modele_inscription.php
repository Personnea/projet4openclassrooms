<?php

require('models\modele_bdd.php');

class ModeleInscription extends ModeleBdd {

    public function inscriptionbdd( $pseudo, $mdp, $email ) {
        
        self::$connexion->exec( "INSERT INTO `projet4` (`id`, `pseudo`, `mdp`, `email`, `admin`) VALUES (NULL, '$pseudo', '$mdp', '$email', '0');" );
        // var_dump(self::$connexion->errorInfo());
        // exit;
    }

}


?>