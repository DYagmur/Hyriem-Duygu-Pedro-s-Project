<?php

require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");

echo Page::pageHeader();
echo Page::titleDefault("Let's get started!");
echo Page::formSignup();
echo Page::pageFooter();
