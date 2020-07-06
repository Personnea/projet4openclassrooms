<?php

require_once('models/model_registration.php');
require_once('views/view_registration.php');

class ControllerRegistration{


    public function __construct() {

        $this->model = new ModelRegistration();
        $this->view = new ViewRegistration();

        $this->view->viewOnRegistration();

        if(isset($_GET['action'])) {
            $action = htmlspecialchars($_GET['action']);
            switch ($action) {
                case 'registration':
                    $this->registration();
                    break;
            }
        }
    }

    private function registration() {
        if ( isset( $_POST[ 'pseudo' ] ) ) {

            $hash = htmlspecialchars(password_hash( $_POST[ 'password' ], PASSWORD_BCRYPT ));

            $this->model->registrationDatabase( $_POST[ 'pseudo' ], $hash, $_POST[ 'email' ] );

            header( 'Location: index.php?module=connexion' );
        } 
    }
}
?>