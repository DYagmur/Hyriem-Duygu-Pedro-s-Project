<?php

require_once("inc/config.inc.php");
require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Utilities/PDOService.class.php");

require_once("inc/Utilities/DAO/UserDAO.class.php");


UserDAO::startDb();

session_start();

if($_SESSION) {
   $user = $_SESSION['loginUser'];
   $user->getUserName();
   echo Page::pageHeader($user->getUserName()); 
} else {
   echo Page::pageHeader(); 
}


echo Page::titleDefault("About");
echo PageContent::pageAbout();
echo Page::pageFooter();

