<?php
    session_start();
    require_once("../connexion/dbconnexion.php"); 
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<?php include("../layout/head_layout/header.php"); ?>
<link href="/Covoiturage/Content/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<style>
    #login {
    --ntp-realbox-height: 1020px;
    border-radius: calc(0.5 * var(--ntp-realbox-height));
    box-shadow: 0 1px 6px 0 rgba(32, 33, 36, .28);
    height: var(--ntp-realbox-height);
}
</style>
<body class="h-100">
    <div class="container h-100" >
        <div class="row h-100 justify-content-center align-items-center" id="login">
            <div class="col-10 col-md-8 col-lg-6">
                <!-- Form -->
                <form class="form-example" action="" method="post">
                    <p style="text-align: center;"><b>Se connecter</b><br>Connectez-vous et accédez à nos services.</p>
                    <!-- Input fields -->
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control username" id="username" placeholder="username..." name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe:</label>
                        <input type="password" class="form-control password" id="password" placeholder="mot de passe..." name="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-customized">Login</button>
                    <!-- End input fields -->
                    <p class="copyright">Si vous n'avez pas compte, <a data-toggle="modal" data-target="#exampleModal" href="#">veuilez vous inscrire</a>.</p>
                </form>
                <!-- Form end -->
            </div>
        </div>
    </div>
    <!-- contact inscription en bas connexion -->  

    <section class="page-banner-section">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="margin-top: 210px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouveau  utilisateur<age</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="Nom" class="col-form-label">Nom:</label>
                            <input type="text" class="form-control" placeholder="Entrer votre nom" id="Nom" name="Nom" required/>
                        </div>
                        <div class="form-group">
                            <label for="prenom" class="col-form-label"> Prénom:</label>
                            <input type="text" class="form-control" placeholder="Entrer votre prénom" id="prenom" name="prenom" required />
                        </div>
                        <div class="form-group">
                            <label for="telephone" class="col-form-label"> Téléphone:</label>
                            <input type="tel" placeholder="Entrer votre numéro de telephone" class="form-control" id="telephone" name="telephone" required />
                        </div>
                        <div class="form-group">
                            <label for="mail" class="col-form-label"> E-mail:</label>
                            <input type="email" placeholder="Entrer votre email" class="form-control" id="mail" name="mail" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z.]{2,4}$" required />
                        </div>
                        <div class="form-group">
                            <label for="adresse" class="col-form-label"> Adresse:</label>
                            <input type="text" placeholder="Où habitez-vous?" class="form-control" id="adresse" name="adresse" required />
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-form-label"> Nom d'utilisateur:</label>
                            <input type="text" placeholder="Entrer un nom d'utilisateur" class="form-control" id="username" name="username" required />
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label"> Mot de passe:</label>
                            <input type="text" placeholder="Entrer un mot de passe" class="form-control" id="password" name="password" required />
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword" class="col-form-label">Retapez Mot de passe:</label>
                            <input type="text" placeholder="Retapez un mot de passe" class="form-control" id="confirm" name="confirm" required />
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: red; border-color: red;"><i class="far fa-window-close"></i></button>
                    <button type="button" id="saveData" class="btn btn-primary" style="background-color: #3EC1D5; border-color: #3EC1D5;"><i class="fas fa-save"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>
 
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>