<?php 
require("assets/php/classes/personnel.php");
$user = new Personnel($_SESSION['id']);
$userData = $user->getPersonnel();
if(!empty($_POST['first_name']) && !empty($_POST['last_name'])){

    // Mise à jour de l'email
    if (!empty($_POST['email'])) {
        $user->updateEmail($_POST['email']);
    }
    // Mise à jour du prénom / nom
    $user->updateFirstName($_POST['first_name']);
    $user->updateLastName($_POST['last_name']);
    $userData = $user->getPersonnel($_SESSION['id']);
}

// Modification de l'image de profile.
if (!empty($_FILES['image'])) {
    $user->updateUserPicture($_FILES['image']);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>Profile</title>
</head>
<body>
    <?php require('assets/php/navbar.php'); ?>
    <div class="containner">
        <div class="row mt-5">
            <div class="col-4"></div>
            <div class="card border-primary mb-3 col-4">
                <div class="card-body">
                    <h4 class="card-title text-center">Profil</h4>
                    <form action="index.php?url=profile" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <label class="form-label mt-4">Adresse Email</label>
                                <input type="email" class="form-control" placeholder="Entrez votre email" value="<?= $userData['email']; ?>" name="email">
                            </div>
                            <div class="form-group">
                                <label class="form-label mt-4">Prénom</label>
                                <input type="text" class="form-control" placeholder="Entrez votre prénom" value="<?= $userData['first_name']; ?>" name="first_name">
                            </div>
                            <div class="form-group">
                                <label class="form-label mt-4">Nom</label>
                                <input type="text" class="form-control" placeholder="Entrez votre nom" value="<?= $userData['last_name']; ?>" name="last_name">
                            </div>
                            <div class="form-group">
                                <label class="form-label mt-4">Service</label>
                                <input type="text" class="form-control" placeholder="Pas de services" value="<?= $userData['name_service']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label mt-4">Changer de photo de profile (.jpg / .png)</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-primary w-100">Modifier</button>
                        </fieldset>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <?php require('assets/php/footer.php'); ?>