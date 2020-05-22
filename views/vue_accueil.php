<?php

class VueAccueil{
    function vue_accueil(){
      ?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
          <?php include ('assets/includes/head.html') ?>
          <title>Projet4</title>
      </head>

      <body>
          
          <?php include('assets\includes\header.html'); ?>
          <div class="premiere-section">
                  <p>Bonjour </p>
          </div>
          <footer class="row">
            <div class="col-lg-12">
              Pied de page
            </div>
          </footer>  
          
      </body>

      </html>
      <?php 
    }
}
?>