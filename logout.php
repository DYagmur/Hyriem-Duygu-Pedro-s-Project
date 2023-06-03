<?php

require_once("./inc/config.inc.php");
require_once("./inc/Entities/User.class.php");
require_once("./inc/Utilities/PDOService.class.php");
require_once("./inc/Utilities/DAO/UserDAO.class.php");
require_once("./inc/Utilities/LoginManager.class.php");
require_once("./inc/Utilities/Page.class.php");

session_start();

session_destroy();

echo Page::getPageHeader();
echo "You are out!";
echo Page::getPageFooter();