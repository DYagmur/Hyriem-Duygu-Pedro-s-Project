<?php

require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/UserDAO.class.php");
require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Page.class.php");

session_start();
UserDAO::startDb();

echo Page::PageHeader();

if ( ! empty($_POST)) {
    $newUser = new User();
    $newUser->setuserName($_POST['userName']);
    $newUser->setEmail($_POST['email']);
    $newPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $newUser->setPassword($newPass);

    $userExist = UserDAO::getUserByUsername($_POST['userName']);
 
    if (!$userExist) {
        UserDAO::insertUser($newUser);  
        echo Page::successMessage();
        unset($_POST);
    }
}

echo Page::formSignup();

echo Page::pageHeader();
echo Page::titleDefault("Hi there, nice to see you!");
echo Page::formSignup();
echo Page::pageFooter();
