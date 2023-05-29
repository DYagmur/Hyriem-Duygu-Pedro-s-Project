<?php

require_once("inc/config.inc.php");

require_once("inc/Entities/Book.class.php");
require_once("inc/Utilities/MainPage.class.php");
require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/BookDAO.class.php");

$bookList = BookDAO::startDb();

$bookList = BookDAO::getAllBooks();
var_dump($bookList);


