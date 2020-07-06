<?php 

class ViewArticles{
    public function viewOnArticles($req){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <?php include('assets/includes/head.html') ?>
                <title>Articles</title>
            </head>

            <body>
                
                <?php include('assets/includes/header.php'); ?>
                <div class="container">
                    <?php
                        if(($line_number = $req->rowCount()) > 0){
                            while($result = $req->fetch()){
                                ?>

                                <div class="article-premiere-section">
                                    <hr>
                                    <p>Titre de l'article: <?php echo $result['titre'];?></p>
                                    <hr>
                                    <p class="contenue-para">Contenue: <br> <?php echo $result['contenue'];?></p>
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
}
?>