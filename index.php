<?php

require_once("inc/config.inc.php");

require_once("inc/Entities/Book.class.php");
require_once("inc/Utilities/Repositories/BookRepository.class.php");

require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/BookDAO.class.php");

require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");


$bookList = BookDAO::startDb();

$bookRepository = new BookRepository();
$bookRepository->setBookList(BookDAO::getAllBooks());


echo Page::pageHeader();

if( !empty($_GET['search'])) {
   $bookRepository->setBookList($bookRepository->findBook($_GET['search_book']));
}

echo Page::titleSerch();
echo Page::pageFilter();

if(!empty ($_GET)) {
   if(!empty ($_GET['genre'])) {
      $bookRepository->setBookList(BookDAO::getGenre($_GET['genre']));
      echo PageContent::pageMainList($bookRepository->getBookList());
   } else {
      echo PageContent::pageMainList($bookRepository->getBookList());
   } 
} else {
   echo PageContent::pageMainList($bookRepository->getBookList());
}


if( !empty($_GET['search'])) {
   $bookRepository->setBookList($bookRepository->findBook($_GET['search_book']));
}

// echo MainPage::searchBar();
// echo MainPage::bookGallery($bookRepository->getBookList());
