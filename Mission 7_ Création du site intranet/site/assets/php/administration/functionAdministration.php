<?php
function assignService($service, $personnel)
{
    $req_add_assignation = bdd()->prepare("INSERT INTO `service_member`(`user_id`, `service_id`) VALUES (?,?)");
    $req_add_assignation->execute(array(htmlspecialchars($personnel), htmlspecialchars($service)));
}  

function assignJob($job, $personnel)
{
    $req_add_assignation = bdd()->prepare("INSERT INTO `job_member`(`job_id`, `user_id`) VALUES (?,?)");
    $req_add_assignation->execute(array(htmlspecialchars($job), htmlspecialchars($personnel)));
}  

function addService($nameService)
{
    if (!empty($nameService)) {
        $req_add_service = bdd()->prepare("INSERT INTO `service`(`name_service`) VALUES (?)");
        $req_add_service->execute(array(htmlspecialchars($nameService)));
    }
}

function addJob($nameJob)
{
    if (!empty($nameJob)) {
        $req_add_job = bdd()->prepare("INSERT INTO `job_label`(`job_label`) VALUES (?)");
        $req_add_job->execute(array(htmlspecialchars($nameJob)));
    }
}