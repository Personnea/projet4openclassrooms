<?php
class ViewConnexion{
    public function viewOnConnexion(){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <?php include('assets/includes/head.html') ?>
                <title>Connexion</title>
            </head>

            <body>

                <?php include('assets/includes/header.php')?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2">
                            <h3 class="thin text-center">Connectez vous à votre compte</h3><br>
                            <p class="text-center text-muted">Si vous n'avez pas encore de compte, <a href="index.php?module=registration">inscrivez-vous !</a>
                            </p>
                            <hr>

                            <form method="post" action="index.php?module=connexion&action=connexion">
                                <div class="top-margin">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="top-margin">
                                    <label>Mot de passe <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>

                                <hr>

                                <button class="btn btn-action" type="submit">Connexion</button>
                                </div>
                            </form>                               
                        </div>
                    </div>
                </div>
                <?php include('assets/includes/footer.html') ?>
            </body>
        </html>
        <?php
    }

}
?>