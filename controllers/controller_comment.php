<?php 

require_once('models/model_comment.php');
require_once('views/view_comment.php');
require_once('models/model_articles.php');

class ControllerComment{
    public function __construct() {
        $this->model = new ModelComment();
        $this->model_article = New ModelArticles();
        $this->view = new ViewComment();
        // $req = $this->model->getArticleIncrease();
        // $this->view->viewOnArticles($req);
        if (isset($_GET['menu'])){
            $menu = htmlspecialchars($_GET['menu']); 
            switch ($menu){
                case 'view':
                    $req2 = $this->model_article->getArticleDefined($_GET['idarticle']);
                    $req = $this->model->getCommentIncrease($_GET['idarticle']);
                    $this->view->ViewOnComment($req, $req2);
                    break;
            }
        }

        if (isset($_GET['action'])){
            $menu = htmlspecialchars($_GET['action']); 
            switch ($menu){
                case 'warn':
                    $this->model->warnCommentDatabase($_GET['idcomment']);
                    header('Location: index.php?module=articles');
                    break;
                case 'add':
                    $this->addComment();
                    break;
            }
        }
    }

    private function addComment(){
        if(isset($_POST[ 'content' ])){
            if(isset($_SESSION[ 'pseudo' ])){
                $this->model->addCommentDatabase(htmlspecialchars($_GET['idarticle']), $_SESSION[ 'id' ], $_SESSION[ 'pseudo' ], htmlspecialchars($_POST['content']) );
            }
            else{
                $this->model->addCommentDatabase(htmlspecialchars($_GET['idarticle']), $_SESSION[ 'id' ], 'Visiteur', htmlspecialchars($_POST['content']) );
 
            }
            header('Location: index.php?module=comment&menu=view&idarticle=' . $_GET['idarticle'] );
        }
    }
}
?>