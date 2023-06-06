<?php

require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");

echo Page::pageHeader();
echo Page::titleDefault("Hi there, nice to see you!");
echo Page::formLogin(); 
echo Page::pageFooter();
