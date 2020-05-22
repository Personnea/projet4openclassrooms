<?php 

require_once('models/modele_accueil.php');
require_once('views/vue_accueil.php');


class ControllerAccueil{

    function afficherAccueil() {
        $vue = new VueAccueil;
        $vue->vue_accueil();
    }
}
?>