<!DOCTYPE html>
<html>
    <head>
        <?php include('assets\includes\head.html');?>
    </head>
    <header>
        <div class="row col-lg-12">
            <div class="col-lg-9">
                <p class="col-lg-2 blanc">Jean Forteroche</p>
            </div>
            <nav class="col-lg-3">
                <li class="header-nav">
                    <?php
                    if(isset($_SESSION[ 'pseudo' ]) && $_SESSION[ 'admin' ] == 1){
                        ?><ul><a href="?module=admin" class="blanc nounderline">Admin</a></ul><?php
                    }
                    ?>
                    <ul><a href="?module=accueil" class="blanc nounderline">Accueil</ul>
                    <ul><a href ="?module=articles" class="blanc nounderline">Articles</ul>
                    <?php 
                    if (isset($_SESSION[ 'pseudo' ])){
                        ?><ul><a href="?module=deconnexion" class="blanc nounderline">Déconnexion</a><?php
                    }
                    else{
                        ?><ul><a href="?module=connexion" class="blanc nounderline">Connexion</a><?php
                    }
                    ?>
                    </ul>
                </li>
            </nav>
        </div>
    </header>


    <!-- <footer>
        <div class="row">
            <div class="col-lg-12">
              Pied de page
            </div>
        </div>
    </footer>  -->
</html>
