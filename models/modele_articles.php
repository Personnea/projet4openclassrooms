<?php 

require_once('models\modele_bdd.php');

class ModeleArticles extends ModeleBdd {

    public function RecupArticleCroissant(){
        $req = self::$connexion->query('SELECT * FROM `article` ORDER BY `id` ASC');
        // var_dump('salut');
        // var_dump(self::$connexion->errorInfo());
        // exit;
        return $req;     
    }
}