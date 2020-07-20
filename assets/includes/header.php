
<header>
    <div class="row col-lg-12">
        <div class="col-lg-9">
            <p class="col-lg-2 blanc">Jean Forteroche</p>
        </div>
        <nav class="col-lg-3">
            <ul class="header-nav">
                <?php
                if(isset($_SESSION[ 'pseudo' ]) && $_SESSION[ 'admin' ] == 1){
                    ?><li><a href="?module=admin" class="blanc nounderline">Admin</a></li><?php
                }
                ?>
                <li><a href="?module=home" class="blanc nounderline">Accueil</a></li>
                <li><a href ="?module=articles" class="blanc nounderline">Articles</a></li>
                <?php 
                if (isset($_SESSION[ 'pseudo' ])){
                    ?><li><a href="?module=logout" class="blanc nounderline">Déconnexion</a><?php
                }
                else{
                    ?><li><a href="?module=connexion" class="blanc nounderline">Connexion</a><?php
                }
                ?>
                </li>
            </ul>
        </nav>
    </div>
</header>

