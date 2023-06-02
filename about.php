<?php

require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");

echo Page::pageHeader();
echo Page::titleDefault("About");
echo PageContent::pageAbout();
echo Page::pageFooter();

