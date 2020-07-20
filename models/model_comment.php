<?php 

require_once('models/model_database.php');

class ModelComment extends ModelDatabase {

    public function getAllComment(){
        $req = self::$connexion->query( "SELECT * FROM `comment`" );
        return $req ;
    }

    public function getCommentIncrease($id){
        $req = self::$connexion->prepare( "SELECT * FROM `comment` WHERE `id_article` = ? " );
        $req->execute(array($id));
        return $req;     
    }

    public function warnCommentDatabase($id){
        $req = self::$connexion->exec("UPDATE `comment` SET `warning` = '1' WHERE `comment`.`id` = '$id';");
    }

    public function addCommentDatabase($id, $user_id, $pseudo, $content){
        $req = self::$connexion->exec( "INSERT INTO `comment` (`id`, `user_id`, `id_article`, `name`, `content`, `warning`) VALUES (NULL, '$user_id', '$id', '$pseudo', '$content', '0');" );
    }

    public function delCommentDatabase($id){
        $req = self::$connexion->exec(" DELETE FROM `comment` WHERE `id` = '$id' ");
    }
}
?>