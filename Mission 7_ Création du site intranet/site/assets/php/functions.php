<?php

function isInteger($input):bool
{
    return(ctype_digit(strval($input)));
}

function checkConnection():bool
{
    if(!empty($_SESSION['id']))
    {
        return true;
    }
    else {
        return false;
    }
}

function getUserId($first_name, $last_name):int
{
    $req = "SELECT id
    FROM user
    WHERE last_name = ?
    AND first_name = ?";
    $req_get_user_id = bdd()->prepare($req);
    $req_get_user_id->execute(array(htmlspecialchars($last_name), htmlspecialchars($first_name)));
    $id = $req_get_user_id->fetch()['id'];
    if($id == ""){
        $req = "INSERT INTO `user`(`last_name`, `first_name`, `join_date`) 
        VALUES (?, ?, ?)";
        $req_insert_user = bdd()->prepare($req);
        $req_insert_user->execute(array(htmlspecialchars($last_name), htmlspecialchars($first_name), date("Y-m-d")));

        $req_get_user_id = bdd()->prepare($req);
        $req_get_user_id->execute(array(htmlspecialchars($last_name), htmlspecialchars($first_name)));
        return $req_get_user_id->fetch()['id'];

    }else {
        return $id;
    }
}

function disconnect(){
    session_destroy();
}
function getAllPersonnelDetail()
{
    $req="SELECT user.id, user.last_name, user.first_name, service.name_service, job_label.job_label
    FROM user, service, service_member, job_label, job_member
    WHERE user.id = service_member.user_id
    AND service_member.service_id = service.id_service
    AND job_label.job_id = job_member.job_id
    AND job_member.user_id = user.id
    AND user.disabled = 0";
    $req_get_personnel = bdd()->prepare($req);
    $req_get_personnel->execute();
    return $req_get_personnel->fetchAll();
}

function getAllServices()
{
    $req_get_all_services = bdd()->prepare("SELECT * FROM `service`");
    $req_get_all_services->execute();
    return $req_get_all_services->fetchAll(PDO::FETCH_ASSOC);
}

function getAllJob()
{
    $req_get_all_jobs = bdd()->prepare("SELECT * FROM `job_label`");
    $req_get_all_jobs->execute();
    return $req_get_all_jobs->fetchAll(PDO::FETCH_ASSOC);
}

function getAllPersonnel()
{
    $req_get_all_services = bdd()->prepare("SELECT * FROM `user`");
    $req_get_all_services->execute();
    return $req_get_all_services->fetchAll(PDO::FETCH_ASSOC);
}

function getAdministrationMenu()
{
    $action = "menu";
    if (!empty($_GET['action'])) {
        $action = htmlspecialchars($_GET['action']);
    }
    return $action;
}

function get_all_articles()
{
    $req = "SELECT id_article
    FROM article
    ORDER BY date_article DESC LIMIT 10";
    $req_get_all_articles = bdd()->prepare($req);
    $req_get_all_articles->execute();
    return $req_get_all_articles->fetchAll();
}

function add_article($article_title, $article_content)
{
    $req="INSERT INTO `article`(`titre_article`, `contenu_article`, `date_article`, `id_auteur`) 
    VALUES (?, ?, ?, ?)";
    $date = date("Y-m-d");    
    $req_add_article = bdd()->prepare($req);
    $req_add_article->execute(array(htmlspecialchars($article_title), htmlspecialchars($article_content), $date, htmlspecialchars($_SESSION['id'])));

    if (!empty($_FILES['article_image'])) {
        $req = "SELECT id_article
        FROM article
        WHERE titre_article = ? 
        AND contenu_article = ?
        AND id_auteur = ?";
        $req_get_article = bdd()->prepare($req);
        $req_get_article->execute(array(htmlspecialchars($article_title), htmlspecialchars($article_content), htmlspecialchars($_SESSION['id'])));
        $article = new Article($req_get_article->fetch()['id_article']);
        $article->upload_image($_FILES['article_image']);
    }
}

function isAdmin():bool
{
    if (in_array('Admins du domaine', $_SESSION['groups'])) {
        return true;
    }else {
        return false;
    }
}

function getNbUser():int
{
    $req = "SELECT COUNT(*) AS total
    FROM user
    WHERE disabled = 0";
    $req_get_nb_user = bdd()->prepare($req);
    $req_get_nb_user->execute();
    return $req_get_nb_user->fetch()['total'];
}

function getNbService():int
{
    $req = "SELECT COUNT(*) AS total
    FROM service";
    $req_get_nb_service = bdd()->prepare($req);
    $req_get_nb_service->execute();
    return $req_get_nb_service->fetch()['total'];
}
function getNbJob():int
{
    $req = "SELECT COUNT(*) AS total
    FROM job_label";
    $req_get_nb_job = bdd()->prepare($req);
    $req_get_nb_job->execute();
    return $req_get_nb_job->fetch()['total'];
}

?>