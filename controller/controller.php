<?php
require_once("./model/UserManager.php");

function homepage()
{
    require("./view/homepage.php");
}

function photo(){
    require("./view/photo.php");
}

function registerView(){
    require("./view/register.php");
}


function registerAction ($params){
    $userManager = new UserManager();
    $userManager->registerAction($params["email"], $params["pwd"], $params["username"]);
    header("Location:index.php?action=loginView");
}

function insertUser($params) {
    $userManager = new UserManager();
    $userManager->insertUser($params['google_token'], $params['email'], $params['profile_url']);
    
    // require_once("./connection.php");
    
    echo "http://localhost/sites/proPhoto/index.php";
}
function loginView (){
    require("./view/login.php");
}

function loginAction ($params){
    $userManager = new UserManager();
    $loginResult = $userManager->loginAction($params["email"], $params["pwd"]);
    if ($loginResult) {
        header('Location:index.php?action=homepage');
    } else {
        header('Location:index.php?action=loginView&login=false');
    }
}

function logoutAction($params) {
    session_destroy();
    header('Location:index.php?action=homepage');
}

function privateProfView($params) {
    if (isset($_SESSION["email"])) {
        // set the link variable to get the correct css files for the view private profile
        $link = '<link rel="stylesheet" href="./public/css/modalProfilePicture.css"><link rel="stylesheet" href="./public/css/privateProfView.css">
';
        $userManager = new UserManager();
        $user = $userManager->getUserInfo($_SESSION["email"]);
        require("./view/privateProfView.php");     
        echo $_SESSION["email"];
        echo $_SESSION["id"];   
    } else {
        require("./view/homepage.php");
    }
}
