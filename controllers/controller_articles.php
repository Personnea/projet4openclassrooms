<?php 

require_once('models/model_articles.php');
require_once('views/view_articles.php');

class ControllerArticles{
    public function __construct() {
        $this->model = new ModelArticles();
        $this->view = new ViewArticles();
        $req = $this->model->getArticleIncrease();
        $this->view->viewOnArticles($req);
    }
}
