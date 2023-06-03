<?php

require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");

echo Page::pageHeader();
echo Page::titleUser("testname");
// echo Page::pageUserList();
echo Page::pageFooter();
