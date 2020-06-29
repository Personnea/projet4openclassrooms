<?php

require_once('models\modele_connexion.php');
require_once('views\vue_connexion.php');

class ControllerConnexion{

    function __construct() {
        $this->modele = new ModeleConnexion();
        $this->vue = new VueConnexion();
        $this->vue->vue_connexion();

        if(isset($_GET['action'])) {
            $action = htmlspecialchars($_GET['action']);
            switch ($action) {
                case 'connexion':
                    $this->connexion();
                    break;
            }
        }
    }

    function connexion(){

        $reponse = $this->modele->connexionbdd( $_POST[ 'email' ] );
        
        if($req = $reponse->fetch()){

            if(password_verify($_POST[ 'password' ], $req['mdp'])){
                $this->init_session($req['pseudo'], $req['email'], $req['mdp'], $req['admin']);
                header( 'Location: index.php');
            }
            else{
                echo '<div class="col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2 alert alert-warning">Mauvais mot de passe !</div>';
            }
            
        }
        else{
            echo '<div class="col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2 alert alert-warning">Adresse e-mail inexistante !</div>';
        }
    }

    function init_session( $pseudo, $email, $password, $admin ) {
        $_SESSION[ 'pseudo' ] = $pseudo;
        $_SESSION[ 'email' ] = $email;
        $_SESSION[ 'password'] = $password;
        $_SESSION[ 'admin'] = $admin;
    }
}