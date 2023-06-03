<?php

require_once("./inc/config.inc.php");
require_once("./inc/Entities/User.class.php");
require_once("./inc/Utilities/PDOService.class.php");
require_once("./inc/Utilities/DAO/UserDAO.class.php");
require_once("./inc/Utilities/LoginManager.class.php");
require_once("./inc/Utilities/Page.class.php");

session_start();
LoginManager::verifyLogin();
UserDAO::startDb();

$currentUser = $_SESSION["username"];
echo Page::getPageHeader();
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

echo Page::formNewUser();