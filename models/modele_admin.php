<?php 

require_once('models\modele_bdd.php');

class ModeleAdmin extends ModeleBdd {

    function verifadmin(){
        $req = self::$connexion->prepare( "SELECT * FROM `projet4` WHERE `admin` = 1" );
        $req->execute();
        $req->closeCursor();

        return $req;
    }

    function AjouterArticleBdd($auteur, $titre, $article){
        self::$connexion->exec( "INSERT INTO `article` (`id`, `auteur`, `titre`, `contenue`) VALUES (NULL, '$auteur', '$titre', '$article');" );
    }

    function RecupArticle(){
        $req = self::$connexion->query('SELECT * FROM `article`');
        // var_dump('salut');
        // var_dump(self::$connexion->errorInfo());
        // exit;
        return $req;     
    }

    function SupprimerArticleBdd($id){
        self::$connexion->exec("DELETE FROM `article` WHERE `id` = '$id' ");
    }

    function ModifierArticleBdd($id, $titre, $article){
        self::$connexion->exec("UPDATE `article` SET `titre`='$titre',`contenue`='$article' WHERE `id` = '$id' ");
    }

    function RecupArticleDef($id){
        $req = self::$connexion->query("SELECT * FROM `article` WHERE `id` = '$id'");
        return $req;
    }
}
