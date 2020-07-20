<?php 

require_once('models/model_admin.php');
require_once('models/model_comment.php');
require_once('views/view_admin.php');


class ControllerAdmin{

    public function __construct(){
        $this->view = new ViewAdmin();
        $this->model = new ModelAdmin();
        $this->model_comment = New ModelComment();
        if ($_SESSION[ 'admin' ] != 1){
            header( 'Location: index.php');
        }

        if (isset($_GET['action'])){
            $action = htmlspecialchars($_GET['action']);
            switch ($action) {
                case 'edit':
                    $this->editArticle(htmlspecialchars($_GET['idarticle']));
                    break;
                case 'add':
                    $this->addArticle();
                    break;
                case 'del':
                    $this->delArticle(htmlspecialchars($_GET['idarticle']));
                    break;
                case 'delcomment':
                    $this->delComment($_GET['idcomment']);
                    break;
                default:
                    $req = $this->model->getArticle();
                    $this->view->viewOnAdmin($req);
                    break;
            }
        }

        if (isset($_GET['menu'])){
            $menu = htmlspecialchars($_GET['menu']); 
            switch ($menu){
                case 'edit':
                    $req = $this->model->getArticleDefined($_GET['idarticle']);
                    $this->view->editArticle($req);
                    break;
                case 'add':
                    $this->view->addArticle();
                    break;
                case 'viewcomment':
                    $req = $this->model_comment->getAllComment();
                    $this->view->ViewOnComment($req);
                    break;
                default:
                    $req = $this->model->getArticle();
                    $this->view->viewOnAdmin($req);
                    break;
            }
        }
        else{
            $req = $this->model->getArticle();
            $this->view->viewOnAdmin($req);
        }
    }

    private function editArticle($id){
        $this->model->editArticleDatabase($id, htmlspecialchars($_POST[ 'titre' ]), $_POST[ 'article' ]);
        header( 'Location: index.php?module=admin' );
    }
    
    private function addArticle(){
        if (isset( $_POST[ 'titre' ])){

            $this->model->addArticleDatabase($_SESSION[ 'id'], htmlspecialchars($_SESSION[ 'pseudo' ]), htmlspecialchars($_POST[ 'titre' ]), $_POST[ 'article' ]);

            header('Location: index.php?module=admin');
        } 
    }

    private function delArticle($id){
        $this->model->delArticleDatabase($id);
        header('Location: index.php?module=admin');
    }

    private function delComment($id){
        $this->model_comment->delCommentDatabase($id);
        header('Location: index.php?module=admin&menu=viewcomment');
    }

}
?>