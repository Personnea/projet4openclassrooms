<?php 

require_once('models\modele_bdd.php');

class ModeleAdmin extends ModeleBdd {

    public function verifadmin(){
        $req = self::$connexion->prepare( "SELECT * FROM `projet4` WHERE `admin` = 1" );
        $req->execute();
        $req->closeCursor();

        return $req;
    }

    public function AjouterArticleBdd($auteur, $titre, $article){
        $req = self::$connexion->prepare( "INSERT INTO `article` (`id`, `auteur`, `titre`, `contenue`) VALUES (NULL, ?, ?, ?);" );
        $req->execute(array($auteur, $titre, $article));
    }

    public function RecupArticle(){
        $req = self::$connexion->query('SELECT * FROM `article` ORDER BY `id` DESC');
        return $req;     
    }

    public function SupprimerArticleBdd($id){
        $req = self::$connexion->prepare("DELETE FROM `article` WHERE `id` = ? ");
        $req->execute(array($id));
    }

    public function ModifierArticleBdd($id, $titre, $article){
        $req = self::$connexion->prepare("UPDATE `article` SET `titre`= ?,`contenue`= ? WHERE `id` = ? ");
        $req->execute(array($titre, $article, $id));
    }

    public function RecupArticleDef($id){
        $req = self::$connexion->prepare("SELECT * FROM `article` WHERE `id` = ?");
        $req->execute(array($id));
        return $req;
    }
}
