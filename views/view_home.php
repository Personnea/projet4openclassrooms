<?php

class ViewHome{
    public function viewOnHome(){
      ?>
      <!DOCTYPE html>
        <html lang="fr">
            <head>
                <?php include('assets/includes/head.html') ?>
                <title>Accueil</title>
            </head>

            <body>
                
                <?php include('assets/includes/header.php') ?>
                <div class="container">
                  <div class="article-premiere-section">
                      <hr>
                      <p>Bonjour <?php if(isset($_SESSION['pseudo'])){echo $_SESSION['pseudo'];}?> !</p>
                      <hr>
                      <p class="contenue-para">Bienvenue sur le site de Jean Forteroche ! <br>
                        Vous pourrez retrouver sur le site tous les chapitres écris par lui-même</p>
                      <img alt="Photo de Mr Jean Forteroche" class="text-center" src="assets/img/PhotoAvatar.PNG" >
                      <p class="contenue-para">Moi c'est Jean Forteroche, je suis écrivain !</p>

                      <hr>
                  </div>
                </div>
                <?php include('assets/includes/footer.html') ?>
            </body>
        </html>
      <?php 
    }
}
?>