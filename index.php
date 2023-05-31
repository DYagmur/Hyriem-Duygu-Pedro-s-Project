<?php

require_once("inc/config.inc.php");

require_once("inc/Entities/Book.class.php");
require_once("inc/Utilities/Repositories/BookRepository.class.php");
require_once("inc/Utilities/MainPage.class.php");
require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/BookDAO.class.php");

$bookList = BookDAO::startDb();

$bookRepository = new BookRepository();
$bookRepository->setBookList(BookDAO::getAllBooks());
// var_dump($bookRepository->getAllCoverImgs()); 
// var_dump($bookList->getAllLanguages());  

echo MainPage::topContent();
echo MainPage::bookGallery($bookRepository->getBookList());
