<?php

require_once("./inc/config.inc.php");
require_once("./inc/Entities/User.class.php");
require_once("./inc/Utilities/PDOService.class.php");
require_once("./inc/Utilities/DAO/UserDAO.class.php");
require_once("./inc/Utilities/LoginManager.class.php");
require_once("./inc/Page.class.php");

session_start();

session_destroy();

echo Page::PageHeader($userName);
echo "You are out!";
echo Page::PageFooter();
