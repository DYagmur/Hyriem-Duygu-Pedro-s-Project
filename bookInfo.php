<?php

require_once("inc/config.inc.php");

require_once("inc/Entities/Book.class.php");
require_once("inc/Entities/UserComment.class.php");
require_once("inc/Utilities/Repositories/BookRepository.class.php");

require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/BookDAO.class.php");
require_once("inc/Utilities/DAO/UserCommentDAO.class.php");

require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");


$bookList = BookDAO::startDb();

date_default_timezone_set("America/Vancouver");
$currentDate = date("Y-m-d H:i:s");

if (!empty($_GET['book'])) {
   $book = BookDAO::getBookById($_GET['book']);
}

if (!empty($_POST['post_comment'])) {
   $userComment = new UserComment();
   $userComment->setCommentDate($currentDate);
   $userComment->setMessage($_POST['message']);

   $lastIdInserted = UserCommentDAO::insertNewComment($userComment);
}

$bookRepository = new BookRepository();
$bookRepository->setBookList(BookDAO::getAllBooks());


echo Page::pageHeader();
echo PageContent::pageBookDetail($book);  
echo Page::pageFooter();
