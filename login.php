<?php

require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");

echo Page::pageHeader();
echo Page::titleDefault("Let's Start!");
echo Page::formLogin(); 
echo Page::pageFooter();
