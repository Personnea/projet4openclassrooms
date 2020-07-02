<?php

require('models\modele_bdd.php');

class ModeleInscription extends ModeleBdd {

    public function inscriptionbdd( $pseudo, $mdp, $email ) {
        
        $req = self::$connexion->prepare( "INSERT INTO `projet4` (`id`, `pseudo`, `mdp`, `email`, `admin`) VALUES (NULL , ? , ? , ? , '0');" );
        $req->execute(array($pseudo, $mdp, $email));
    }

}


?>