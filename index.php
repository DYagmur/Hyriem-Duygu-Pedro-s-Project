<?php

require_once("inc/config.inc.php");

require_once("inc/Entities/Book.class.php");
require_once("inc/Utilities/BookInfo.class.php");
require_once("inc/Utilities/Repositories/BookRepository.class.php");
require_once("inc/Utilities/MainPage.class.php");
require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/BookDAO.class.php");
require_once("inc/Utilities/BookInfo.class.php");

$bookList = BookDAO::startDb();

$bookRepository = new BookRepository();
$bookRepository->setBookList(BookDAO::getAllBooks());
// var_dump($bookRepository->getAllCoverImgs()); 
// var_dump($bookList->getAllLanguages());  


// if ( !empty($_GET)) {
//    if ( !empty($_GET['sortby'])) {
//          $bookRepository->sortBook($_GET['sortby']);
//          echo MainPage::bookGallery($bookRepository->getBookList());
//       } else {
//          echo MainPage::bookGallery($bookRepository->getBookList());
//       }
//          echo MainPage::pageEnd();
//    }

// if (!empty($_GET)) {
//    if (!empty($_GET['sortby'])) {
//       $sortby = $_GET['sortby'];
      
//       if ($sortby === 'genre') {
//          $genre = 'Fantasy'; 
//          $sortedBooks = BookDAO::getGenre($genre);
         
//          echo MainPage::bookGallery($sortedBooks);
//       } else {
//          echo MainPage::bookGallery($bookRepository->getBookList());
//       }
//    } else {
//       echo MainPage::bookGallery($bookRepository->getBookList());
//    }
//    echo MainPage::pageEnd();
// }

echo MainPage::topContent();

if(!empty ($_GET)) {
   if(!empty ($_GET['genre'])) {
      $bookRepository->setBookList(BookDAO::getGenre($_GET['genre']));
      echo MainPage::bookGallery($bookRepository->getBookList());
   } else {
      echo MainPage::bookGallery($bookRepository->getBookList());
   } 
} else {
   echo MainPage::bookGallery($bookRepository->getBookList());
}


if( !empty($_GET['search'])) {
   $bookRepository->setBookList($bookRepository->findBook($_GET['search_book']));
}

echo MainPage::searchBar();
echo MainPage::bookGallery($bookRepository->getBookList());
echo MainPage::pageEnd();
