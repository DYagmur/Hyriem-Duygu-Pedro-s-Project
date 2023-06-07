<?php

require_once("inc/config.inc.php");
require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Utilities/PDOService.class.php");

require_once("inc/Utilities/DAO/UserDAO.class.php");


UserDAO::startDb();

session_start();


    $user = $_SESSION['email'];
    $user->getUserName();

echo Page::pageHeader($user->getUserName()); 
echo Page::titleDefault("Contact Us");
echo Page::formContact();
echo Page::pageFooter();


