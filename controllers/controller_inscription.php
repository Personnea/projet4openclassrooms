<?php

require_once('models\modele_inscription.php');
require_once('views\vue_inscription.php');

class ControllerInscription{


    function __construct() {

        $this->modele = new ModeleInscription();
        $this->vue = new VueInscription();

        $this->vue->vue_inscription();

        if(isset($_GET['action'])) {
            $action = htmlspecialchars($_GET['action']);
            switch ($action) {
                case 'inscription':
                    $this->inscription();
                    break;
            }
        }
    }

    function inscription() {
        if ( isset( $_POST[ 'pseudo' ] ) ) {

            $hash = password_hash( $_POST[ 'password' ], PASSWORD_BCRYPT );

            $this->modele->inscriptionbdd( $_POST[ 'pseudo' ], $hash, $_POST[ 'mail' ] );

            header( 'Location: index.php?module=connexion' );
        } 
    }
}