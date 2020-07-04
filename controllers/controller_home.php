<?php 

require_once('models/model_home.php');
require_once('views/view_home.php');


class ControllerHome{

    public function __construct()
    {
        $this->displayHome();
    }

    private function displayHome() {
    $this->view = new ViewHome;
        $this->view->viewOnHome();
    }
}
?>