<?php

require('models/model_database.php');

class ModelRegistration extends ModelDatabase {

    public function registrationDatabase( $pseudo, $password, $email ) {
        
        $req = self::$connexion->prepare( "INSERT INTO `user` (`id`, `pseudo`, `password`, `email`, `admin`) VALUES (NULL , ? , ? , ? , '0');" );
        $req->execute(array($pseudo, $password, $email));
    }

}


?>