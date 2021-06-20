<?php  
session_start();
ob_start();
require('assets/php/functions.php');
require('assets/php/bdd.php');

$ip_ad = "10.0.2.248";

// Routeur

$url = "";
if(isset($_GET['url'])){
    $url = htmlspecialchars($_GET['url']);
    $url = explode('/', $url);
}

if (!checkConnection() && $url[0]!="ldap") {
    require('pages/connexion.php');
}else {
    if($url[0] == ''){
        require('pages/nouveautes.php');
    }elseif($url[0] == 'nouveautes'){
        require('pages/nouveautes.php');
    }elseif($url[0] == 'administration'){
        require('pages/administration.php');
    }elseif($url[0] == 'connexion'){
        require('pages/connexion.php');
    }elseif($url[0] == 'deconnexion'){
        require('pages/deconnexion.php');
    }elseif($url[0] == 'personnel'){
        require('pages/personnel.php');
    }elseif($url[0] == 'ldap'){
        require('pages/ldap.php');
    }elseif($url[0] == 'profil'){
        require('pages/profil.php');
    }elseif($url[0] == 'article' AND !empty($url[1])){
        $idArticle = $url[1];
        if (isInteger($idArticle)) {
            require('pages/article.php');
        }else {
            require('pages/404.php');
        }
    }else {
        require('pages/404.php');
    }
}
ob_end_flush();
?>   