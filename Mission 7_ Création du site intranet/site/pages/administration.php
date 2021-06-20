<?php
require "assets/php/administration/functionAdministration.php";
$action = getAdministrationMenu();

if(!empty($_POST['action']))
{
    $action = htmlspecialchars($_POST['action']);
    switch ($action) {
        case 'add-service':
            addService($_POST['service_name']);
            break;
        
        case 'add-job':
            addJob($_POST['job_name']);
            break;

        case 'assign-service':
            assignService($_POST['service'], $_POST['personnel']);
            break;

        case 'assign-job':
            assignJob($_POST['job'], $_POST['personnel']);
            break;
    }
} ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require('assets/php/head.php'); ?>
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <title>Document</title>
</head>
<body>
<?php require('assets/php/navbar.php'); ?>
    <div class="containner">
        <div class="row mt-5">
            <div class="col-md-3 col-sm-2 col-1"></div>
            
                <?php if ($action == 'menu') { ?>
                    <div class="card border-primary mb-3 col-md-6 col-sm-8 col-10" style="border:none;">
                <?php } else{ ?>
                    <div class="card border-primary mb-3 col-md-6 col-sm-8 col-10">
                <?php } ?>

                <div class="card-body">
                    <?php switch ($action) {
                        // Ajout 
                        case 'add-user':
                            require("assets/php/administration/add/add-user.php");
                            break;

                        case 'add-service':
                            require("assets/php/administration/add/add-services.php");
                            break;

                        case 'add-job':
                            require("assets/php/administration/add/add-job.php");
                            break;
                        
                        // Assignation

                        case 'assign-service': 
                            require("assets/php/administration/assign/assign-service.php");
                            break;

                        case 'assign-job': 
                            require("assets/php/administration/assign/assign-job.php");
                            break;

                        // Liste

                        case 'list-user':
                            require("assets/php/administration/list/list-user.php");
                            break;

                        case 'list-service':
                            require("assets/php/administration/list/list-service.php");
                            break;

                        case 'list-job':
                            require("assets/php/administration/list/list-job.php");
                            break;
                        // Menu

                        case 'menu':
                            require("assets/php/administration/menu-administration.php");
                            break;
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php require('assets/php/footer.php'); ?>