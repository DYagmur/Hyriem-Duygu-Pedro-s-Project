<?php

require_once("./inc/config.inc.php");
require_once("./inc/Entities/User.class.php");
require_once("./inc/Utilities/PDOService.class.php");
require_once("./inc/Utilities/DAO/UserDAO.class.php");
require_once("./inc/Utilities/Page.class.php");

if (!empty($_POST)) {
    UserDAO::startDb();

    $userName = $_POST['username'];
    $password = $_POST['passLogin'];

    $userNameExist = UserDAO::getUserByUsername($userName);

    if ( (gettype($userNameExist) === 'object') && (get_class($userNameExist) === 'User')) {
        if ($userNameExist->validateUser($password)) {
            var_dump("howdy");

            session_start();

            $_SESSION["logged"] = true;
            $_SESSION["userName"] = $userNameExist;

           
            exit();
        }
    }
}

echo Page::getPageHeader();
echo Page::loginForm();
echo Page::getPageFooter();