<?php
class ViewRegistration{
    public function viewOnRegistration() {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <?php include('assets/includes/head.html') ?>
                <title>Inscription</title>
                <?php include('assets/includes/header.php')?>
            </head>

            <body>

                <div class="container">

                    <div class="row">

                        <div class="col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2">

                            <h3 class="thin text-center">Créez votre compte</h3><br>
                            <p class="text-center text-muted">Si vous avez déjà un compte, <a href="index.php?module=connexion">connectez-vous</a> à celui-ci.</p>

                            <hr>

                            <form method="post" action="index.php?module=registration&action=registration">
                                <div class="top-margin">
                                    <label>Pseudo <span class="text-danger">*</span></label>
                                    <input type="text" name="pseudo" class="form-control" required>
                                </div>
                                <div class="top-margin">
                                    <label>Adresse mail <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                                <div class="row top-margin">
                                    <div class="col-sm-6">
                                        <label>Mot de passe <span class="text-danger">*</span></label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                            <hr>
                            <button class="btn btn-action" type="submit">Inscription</button>
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

