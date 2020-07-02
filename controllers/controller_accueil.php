<?php 

require_once('models/modele_accueil.php');
require_once('views/vue_accueil.php');


class ControllerAccueil{

    public function __construct()
    {
        $this->afficherAccueil();
    }

    private function afficherAccueil() {
        $this->vue = new VueAccueil;
        $this->vue->vue_accueil();
    }
}
?>