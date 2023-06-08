<?php

require_once("./inc/config.inc.php");
require_once("./inc/Entities/User.class.php");
require_once("./inc/Utilities/PDOService.class.php");
require_once("./inc/Utilities/DAO/UserDAO.class.php");
require_once("./inc/Utilities/LoginManager.class.php");
require_once("./inc/Page.class.php");

session_start();

session_destroy();

echo Page::PageHeader();
echo Page::titleDefault("See you soon &#x1F44B;");
echo '
<a href="login.php" class="btn-lg">
    <i class="fa-solid fa-arrow-left-long"></i>
    <p>Go to main</p>
</a>';
echo Page::PageFooter();
