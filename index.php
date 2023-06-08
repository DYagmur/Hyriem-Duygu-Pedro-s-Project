<?php

require_once("inc/config.inc.php");

require_once("inc/Entities/Book.class.php");
require_once("inc/Entities/User.class.php");

require_once("inc/Utilities/Repositories/BookRepository.class.php");

require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/BookDAO.class.php");
require_once("inc/Utilities/DAO/UserDAO.class.php");

require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");


$bookList = BookDAO::startDb();
UserDAO::startDb();


$bookRepository = new BookRepository();
$bookRepository->setBookList(BookDAO::getAllBooks());

session_start();

if($_SESSION) {
   $user = $_SESSION['email'];
   $user->getUserName();
   echo Page::pageHeader($user->getUserName()); 
} else {
   echo Page::pageHeader(); 
}

if( !empty($_GET['search'])) {
   $bookRepository->setBookList($bookRepository->findBook($_GET['search_book']));
}

echo Page::titleSearch();
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

echo Page::pageFooter();