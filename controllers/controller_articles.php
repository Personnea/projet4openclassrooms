<?php 

require_once('models/modele_articles.php');
require_once('views/vue_articles.php');

class ControllerArticles{
    function __construct() {
        $this->modele = new ModeleArticles();
        $this->vue = new VueArticles();
        $req = $this->modele->RecupArticleCroissant();
        $this->vue->vue_articles($req);
    }
}
