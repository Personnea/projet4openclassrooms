<?php 

require_once('models\modele_admin.php');
require_once('views\vue_admin.php');


class ControllerAdmin{

    function __construct(){
        $this->vue = new VueAdmin();
        $this->modele = new ModeleAdmin();
        if($_SESSION[ 'admin' ] != 1){
            // var_dump('cc3');
            // exit;
            header( 'Location: index.php');
        }

        if(isset($_GET['action'])) {
            $action = htmlspecialchars($_GET['action']);
            switch ($action) {
                case 'modifier':
                    $this->ModifierArticles($_GET['idarticle']);
                    break;
                case 'ajouter':
                    $this->AjouterArticles();
                    break;
                case 'supprimer':
                    $this->SupprimerArticles($_GET['idarticle']);
                    break;
            }
        }

        if(isset($_GET['menu'])) {
            $menu = htmlspecialchars($_GET['menu']);
            switch ($menu) {
                case 'modifier':
                    $req = $this->modele->RecupArticleDef($_GET['idarticle']);
                    $this->vue->mod_article($req);
                    break;
                case 'ajouter':
                    $this->vue->add_article();
                    break;
            }
        }
        else{
            $req = $this->modele->RecupArticle();
            $this->vue->vue_admin($req);
        }
    }

    function ModifierArticles($id){
        $this->modele->ModifierArticleBdd($id, $_POST[ 'titre' ], $_POST[ 'article' ]);
        header( 'Location: index.php?module=admin' );
    }
    
    function AjouterArticles(){
        if ( isset( $_POST[ 'titre' ] ) ) {

            $this->modele->AjouterArticleBdd( $_SESSION[ 'pseudo' ], $_POST[ 'titre' ], $_POST[ 'article' ] );

            header( 'Location: index.php?module=admin' );
        } 
    }

    function SupprimerArticles($id){
        $this->modele->SupprimerArticleBdd($id);
        header( 'Location: index.php?module=admin' );
    }


}