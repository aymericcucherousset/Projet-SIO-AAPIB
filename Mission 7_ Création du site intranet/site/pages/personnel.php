<?php
require("assets/php/classes/personnel.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require('assets/php/head.php'); ?>
    <title>Document</title>
</head>
<body>
<?php require('assets/php/navbar.php'); ?>
    <div class="containner">
        <div class="row mt-5">
            <?php if(!empty($_GET["id"])){
                $personnel = new Personnel($_GET["id"]);
                $user = $personnel->getPersonnel();
                ?>
                <div class="col-1 col-md-3"></div>
                <div class="card border-primary mb-3 col-10 col-md-6">
                    <div class="card-body">
                        <h4 class="card-title text-center">Personnel</h4>
                        <div class="row pb-3 mt-3">
                            <h3>
                                <?= $personnel->getUserLastName() . " " .  $personnel->getUserFirstName()  ?>
                                <small class="text-muted"><?= $personnel->getUserJob()  ?></small>
                            </h3>
                            <div class="row">
                                <div class="col-1 col-md-4"></div>
                                <div class="col-10 col-md-4">
                                    <img src="<?= $personnel->getUserImagePath() ?>" class="w-100" alt="">
                                </div>
                            </div>
                        <p class="lead">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                        <?php 
                        $email = $personnel->getUserEmail();
                        if(!empty($email)){ ?>
                            <p>Adresse email : <?= $email ?></p>
                            <a href="mailto:<?= $email ?>"><button type="button" class="btn btn-primary">Contacter par mail</button></a>
                        <?php } 
            } else { ?>
                <div class="col-1 col-md-2"></div>
                    <div class="card border-primary mb-3 col-10 col-md-8">
                        <div class="card-body">
                            <h4 class="card-title text-center">Personnel</h4>
                            <div class="row pb-3">

                <?php foreach (getAllPersonnelDetail() as $user) {
                    $personnel = new Personnel($user['id']);
                    $imagePath = $personnel->getUserImagePath();
                    $joinDate = $personnel->getUserJoinDate();
                    require('assets/php/personnel_card.php');
                } 
            } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require('assets/php/footer.php'); ?>