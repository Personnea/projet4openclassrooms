<?php 

require_once('models\modele_admin.php');
require_once('views\vue_admin.php');


class ControllerAdmin{

    public function __construct(){
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
                    $this->ModifierArticles(htmlspecialchars($_GET['idarticle']));
                    break;
                case 'ajouter':
                    $this->AjouterArticles();
                    break;
                case 'supprimer':
                    $this->SupprimerArticles(htmlspecialchars($_GET['idarticle']));
                    break;
                default:
                    $req = $this->modele->RecupArticle();
                    $this->vue->vue_admin($req);
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
                default:
                    $req = $this->modele->RecupArticle();
                    $this->vue->vue_admin($req);
                    break;
            }
        }
        else{
            $req = $this->modele->RecupArticle();
            $this->vue->vue_admin($req);
        }
    }

    private function ModifierArticles($id){
        $this->modele->ModifierArticleBdd($id, htmlspecialchars($_POST[ 'titre' ]), $_POST[ 'article' ]);
        header( 'Location: index.php?module=admin' );
    }
    
    private function AjouterArticles(){
        if ( isset( $_POST[ 'titre' ] ) ) {

            $this->modele->AjouterArticleBdd( htmlspecialchars($_SESSION[ 'pseudo' ]), htmlspecialchars($_POST[ 'titre' ]), $_POST[ 'article' ] );

            header( 'Location: index.php?module=admin' );
        } 
    }

    private function SupprimerArticles($id){
        $this->modele->SupprimerArticleBdd($id);
        header( 'Location: index.php?module=admin' );
    }


}