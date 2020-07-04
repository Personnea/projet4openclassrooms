<?php 

require_once('models\model_database.php');

class ModelAdmin extends ModelDatabase {

    public function addArticleDatabase($auteur, $titre, $article){
        $req = self::$connexion->prepare( "INSERT INTO `article` (`id`, `auteur`, `titre`, `contenue`) VALUES (NULL, ?, ?, ?);" );
        $req->execute(array($auteur, $titre, $article));
    }

    public function getArticle(){
        $req = self::$connexion->query('SELECT * FROM `article` ORDER BY `id` DESC');
        return $req;     
    }

    public function delArticleDatabase($id){
        $req = self::$connexion->prepare("DELETE FROM `article` WHERE `id` = ? ");
        $req->execute(array($id));
    }

    public function editArticleDatabase($id, $titre, $article){
        $req = self::$connexion->prepare("UPDATE `article` SET `titre`= ?,`contenue`= ? WHERE `id` = ? ");
        $req->execute(array($titre, $article, $id));
    }

    public function getArticleDefined($id){
        $req = self::$connexion->prepare("SELECT * FROM `article` WHERE `id` = ?");
        $req->execute(array($id));
        return $req;
    }
}
