<?php

require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/UserDAO.class.php");
require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Page.class.php");

session_start();
UserDAO::startDb();



if ( ! empty($_POST)) {
    $newUser = new User();
    $newUser->setuserName($_POST['userName']);
    $newUser->setEmail($_POST['email']);
    $newUser->setUserPicture($_FILES['userPicture']['name']);
    $newPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $newUser->setPassword($newPass);

    /* $check = $newUser->setUserPicture($_POST['userPicture']);
    var_dump($check); */

    $userExist = UserDAO::getUserByUsername($_POST['userName']);
    $userExist = UserDAO::getEmailbyEmail($_POST['email']);

    header("Location: index.php");
        

 
    if (!$userExist) {
        UserDAO::insertUser($newUser);  
        echo Page::successMessage();
        unset($_POST);
    }
}


echo Page::pageHeader($userName);
echo Page::titleDefault("Hi there, nice to see you!");
echo Page::formSignup();
echo Page::pageFooter();
