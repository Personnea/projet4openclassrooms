<?php

class VueAccueil{
    public function vue_accueil(){
      ?>
      <!DOCTYPE html>
      <html lang="fr">

        <head>
            <?php include('assets/includes/head.html') ?>
            <title>Accueil</title>
        </head>

        <body>
            
            <?php include('assets\includes\header.php'); ?>
            <div class="col-lg-12 premiere-section">
                    <p>Bonjour </p>
                    <?php echo $_SESSION['pseudo']?>
            </div> 
            
        </body>

      </html>
      <?php 
    }
}
?>