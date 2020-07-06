<?php

require_once('models/model_connexion.php');
require_once('views/view_connexion.php');

class ControllerConnexion{

    public function __construct() {
        $this->model = new ModelConnexion();
        $this->view = new ViewConnexion();
        $this->view->viewOnConnexion();

        if(isset($_GET['action'])) {
            $action = htmlspecialchars($_GET['action']);
            switch ($action) {
                case 'connexion':
                    $this->connexion();
                    break;
            }
        }
    }

    private function connexion(){

        sleep(1);

        $reponse = $this->model->connexionDatabase( $_POST[ 'email' ] );
        
        if($req = $reponse->fetch()){

            if(htmlspecialchars(password_verify($_POST[ 'password' ], $req['password']))){
                $this->initSession($req['id'] ,htmlspecialchars($req['pseudo']), htmlspecialchars($req['email']), htmlspecialchars($req['password']), htmlspecialchars($req['admin']));
                header('Location: index.php?module=home');
            }
            else{
                echo '<div class="col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2 alert alert-warning">Mauvais mot de passe !</div>';
            }
            
        }
        else{
            echo '<div class="col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2 alert alert-warning">Adresse e-mail inexistante !</div>';
        }
    }

    private function initSession( $id, $pseudo, $email, $password, $admin ) {
        $_SESSION[ 'id' ] = $id;
        $_SESSION[ 'pseudo' ] = $pseudo;
        $_SESSION[ 'email' ] = $email;
        $_SESSION[ 'password'] = $password;
        $_SESSION[ 'admin'] = $admin;
    }
}
?>