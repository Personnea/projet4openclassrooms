<?php

class VueAccueil{
    public function vue_accueil(){
      ?>
      <!DOCTYPE html>
        <html>
            <head>
                <?php include('assets/includes/head.html') ?>
                <title>Accueil</title>
            </head>

            <body>
                
                <?php include('assets\includes\header.php'); ?>
                <div class="container">
                  <div class="article-premiere-section">
                      <hr>
                      <p>Bonjour <?php if(isset($_SESSION['pseudo'])){echo $_SESSION['pseudo'];}?> !</p>
                      <hr>
                      <p class="contenue-para">Bienvenue sur le site de Jean Forteroche ! <br>
                        Vous pourrez retrouver sur le site tous les chapitres écris par lui-même</p>
                      <hr>
                  </div>
                </div>
            </body>
        </html>
      <?php 
    }
}
?>