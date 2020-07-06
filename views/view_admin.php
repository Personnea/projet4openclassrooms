<?php 

class ViewAdmin {
    public function viewOnAdmin($req){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <?php include('assets/includes/head.html') ?>
                <title>Administrateur</title>
            </head>

            <body>
          
            <?php include('assets/includes/header.php'); ?>
                <div class="container">

                    <div class="maincontent center premiere-section-admin">
                        <p class="alert alert-dark text-center">Bienvenue sur la page admin.</p>
                        <button class="btn btn-success" onclick="location.href='index.php?module=admin&menu=add'">Ajouter un article</button>
                        <hr>
                        <p class="alert alert-info text-center">Liste des articles</p>

                    </div>


                    <?php
                        if(($nb_de_ligne = $req->rowCount()) > 0){
                            while($result = $req->fetch()){
                                ?>

                                <div class="article-premiere-section">
                                    <hr>
                                    <p>Titre de l'article: <?php echo $result['titre'];?></p>
                                    <hr>
                                    <p class="contenue-para">Contenue: <br> <?php echo $result['contenue'];?></p>
                                    <hr>
                                    <a href="index.php?module=admin&menu=edit&idarticle=<?php echo $result['id'];?>"><button class="btn btn-primary">Modifier cet article ?</button></a>
                                    <a href="index.php?module=admin&action=del&idarticle=<?php echo $result['id'];?>"><button type="button" class="btn btn-danger">Supprimer cet article ?</button></a>                                  
                                    <hr>
                                </div>                               

                                <?php

                            }
                        }
                        else{
                            ?>

                                <div class="alert alert-warning" role="alert">
                                    Aucun article à afficher !
                                </div>

                            <?php
                        }
                    ?>
                </div>
            </body>
        </html>
	    <?php 
    }

    public function addArticle(){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <?php include('assets/includes/head.html') ?>
                <title>Ajouter un article</title>
                <script src="https://cdn.tiny.cloud/1/maaeh0wceajbwep46slp84j49zvbc9l9pcy7nscz45sda43i/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                <script>
                    tinymce.init({
                        selector:'textarea'
                    });
                </script>
            </head>

            <body>
                
          
                <?php include('assets/includes/header.php'); ?>

                <div class="container">

                    <div class="row">
                        <p class="alert alert-dark">Pour ajouter un article.</p>
                    </div>

                    <div class="row">
                        <form method="post" action="index.php?module=admin&action=add">
                            <input type="text" name="titre" class="form-control" placeholder="Titre"required>
                            <hr>
                            <textarea class="textarea-tinymce" name="article" placeholder="Ecrire le contenu..."></textarea>
                            <div class="row">
                                    <div class="col-lg-4 text-right">
                                        <button class="btn btn-action" type="submit">Envoyer</button>
                                    </div>
                            </div>             
                        </form>                      
                    </div>
                </div>               
            </body>
        </html>
        <?php
    }

    public function editArticle($req){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <?php include('assets/includes/head.html') ?>
                <title>Modifier un article</title>
                <script src="https://cdn.tiny.cloud/1/maaeh0wceajbwep46slp84j49zvbc9l9pcy7nscz45sda43i/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                <script>
                    tinymce.init({
                        selector:'textarea'
                    });
                </script>
            </head>

            <body>
                
          
                <?php include('assets/includes/header.php'); ?>

                <div class="container">

                    <div class="row">
                        <p class="alert alert-dark">Modifier un article.</p>
                    </div>

                    <div class="row">
                        <?php
                         while($result = $req->fetch()){
                                ?>

                            <form method="post" action="index.php?module=admin&action=edit&idarticle=<?php echo $result['id'];?>">
                                <input type="text" name="titre" class="form-control" value="<?php echo $result['titre'];?>" required>
                                <hr>
                                <textarea class="textarea-tinymce" name="article"><?php echo $result['contenue'];?></textarea>
                                <div class="row">
                                        <div class="col-lg-4 text-right">
                                            <button class="btn btn-action" type="submit">Modifier</button>
                                        </div>
                                </div>             
                            </form> 

                        <?php 
                         }
                         ?>                    
                    </div>
                </div>               
            </body>
        </html>
        <?php
    }

}
?>