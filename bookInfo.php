<?php

require_once("inc/config.inc.php");

require_once("inc/Entities/Book.class.php");
require_once("inc/Utilities/Repositories/BookRepository.class.php");

require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/BookDAO.class.php");

require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");


$bookList = BookDAO::startDb();

if (!empty($_GET['book'])) {
   $book = BookDAO::getBookById($_GET['book']);
}

$bookRepository = new BookRepository();
$bookRepository->setBookList(BookDAO::getAllBooks());


echo Page::pageHeader();
echo PageContent::pageBookDetail($book);  
echo Page::pageFooter();
