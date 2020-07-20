<?php 

require_once('models/model_database.php');

class ModelArticles extends ModelDatabase {

    public function getArticleIncrease(){
        $req = self::$connexion->query('SELECT * FROM `article` ORDER BY `id` ASC');
        return $req;     
    }

    public function getArticleDefined($id){
        $req = self::$connexion->prepare("SELECT * FROM `article` WHERE `id` = ?");
        $req->execute(array($id));
        return $req;
    }
}
?>