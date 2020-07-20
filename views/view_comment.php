<?php 

class ViewComment{
    public function viewOnComment($req, $req2){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <?php include('assets/includes/head.html') ?>
                <title>Commentaires sur l'article</title>
            </head>

            <body>
                
                <?php include('assets/includes/header.php'); ?>
                <div class="container">
                    <?php
                        if($result = $req2->fetch()){
                            ?>

                            <div class="article-premiere-section">
                                <hr>
                                <p>Titre de l'article: <?php echo $result['titre'];?></p>
                                <hr>
                                <p class="contenue-para">Contenue: <br> <?php echo $result['contenue'];?></p>
                                <hr>
                                <form method="post" action="index.php?module=comment&action=add&idarticle=<?php echo $result['id']; ?>">
                                    <div class="top-margin">
                                        <label>Contenu: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="content" required>
                                    </div>                               
                                    <hr>
                                    <button class="btn btn-action" type="submit">Ajouter mon commentaire</button>
                                </form>           
                            </div>                               

                            <?php

                        }


                        if(($line_number = $req->rowCount()) > 0){
                            while($result_comment = $req->fetch()){
                                ?>

                                <div class="article-premiere-section">
                                    <hr>
                                    <p>Auteur: <?php echo $result_comment['name'];?></p>
                                    <hr>
                                    <p class="contenue-para">Contenue: <br> <?php echo $result_comment['content'];?></p>
                                    <br>
                                    <a href="index.php?module=comment&action=warn&idcomment=<?php echo $result_comment['id'];?>"><button class="btn btn-primary">Signaler le commentaire</button></a>
                                    <hr>
    
                                </div>                               
    
                                <?php
                            }
                        }
                        else{
                            ?>

                                <div class="alert alert-warning" role="alert">
                                    Aucun commentaire à afficher !
                                </div>

                            <?php
                        }

                    ?>
                </div>
            </body>
            <?php include('assets/includes/footer.html') ?>
        </html>
    <?php
    }
}
