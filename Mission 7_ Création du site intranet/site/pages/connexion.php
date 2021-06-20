<?php
if (!empty($_GET['error'])) {
    switch ($_GET['error']) {
        case '1':
            $erreur = "Mauvais identifiants / Mot de passe";
            break;
        
        default:
            $erreur = "Mauvais identifiants / Mot de passe";
            break;
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require('assets/php/head.php'); ?>
    <title>Connexion</title>
</head>
<body>
    <?php require('assets/php/navbar.php'); ?>
    <div class="containner">
        <div class="row mt-5">
            <div class="col-4"></div>
            <div class="card border-primary mb-3 col-4">
                <div class="card-body">
                    <h4 class="card-title text-center">Connexion</h4>
                    <form method="POST" action="index.php&url=ldap">
                        <fieldset>
                            <div class="form-group">
                                <label class="form-label mt-4">Nom d'utilisateur</label>
                                <input name="username" type="text" class="form-control <?php if(!empty($erreur)){echo('is-invalid');} ?>"placeholder="Nom d'utilisateur" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label mt-4">Mot de passe</label>
                                <input name="password" type="password" class="form-control <?php if(!empty($erreur)){echo('is-invalid');} ?>" placeholder="Mot de passe" required>
                                <div class="invalid-feedback <?php if(empty($erreur)){echo('hidden');} ?>">
                                    Mauvais identifiants ou mot de passe.
                                </div>
                            </div>
                            <fieldset>
                            <div class="form-check form-switch my-2">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">Activer la connexion automatique</label>
                            </div>
                            </fieldset>
                            <button type="submit" class="btn btn-primary d-block">Connexion</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require('assets/php/footer.php'); ?>