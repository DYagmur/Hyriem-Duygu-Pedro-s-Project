<?php

require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");

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

echo Page::pageHeader();
echo Page::titleDefault("Let's Start!");
echo Page::formLogin(); 
echo Page::pageFooter();