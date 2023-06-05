<?php

require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");

echo Page::pageHeader();
echo Page::titleDefault("Contact Us");
echo Page::formContact();
echo Page::pageFooter();

