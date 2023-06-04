<?php

require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");
require_once("inc/Utilities/LoginManager.class.php");

session_start();
LoginManager::verifyLogin();
UserDAO::startDb();

$currentUser = $_SESSION["username"];
echo Page::PageHeader();
if ( ! empty($_POST)) {
    $newUser = new User();
    $newUser->setUsername($_POST['userName']);
    $newUser->setEmail($_POST['email']);
    $newUser->setUserPicture($_POST['userPicture']);

    $newPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $newUser->setPassword($newPass);

    $userExist = UserDAO::getUserByUsername($_POST['userName']);
 
    if (!$userExist) {
        UserDAO::insertUser($newUser);  
        echo Page::successMessage();
        unset($_POST);
    }
}

echo Page::pageHeader();
echo Page::titleDefault("Hi there, nice to see you!");
echo Page::formSignup();
echo Page::pageFooter();