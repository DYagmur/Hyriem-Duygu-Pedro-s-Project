<?php

require_once("inc/config.inc.php");

require_once("inc/Entities/Book.class.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Entities/UserComment.class.php");
require_once("inc/Utilities/Repositories/BookRepository.class.php");

require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/BookDAO.class.php");
require_once("inc/Utilities/DAO/UserDAO.class.php");
require_once("inc/Utilities/DAO/UserCommentDAO.class.php");

require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");


BookDAO::startDb();
UserDAO::startDb();
UserCommentDAO::startDb();


date_default_timezone_set("America/Vancouver");
$currentDate = date("y-m-d");



if (!empty($_GET['book'])) {
   $book = BookDAO::getBookById($_GET['book']);
   $bookId = $book->getBookId();
   $allComment = UserCommentDAO::getAllCommentByBookId($_GET['book']);
} 


if (!empty($_POST['post_comment'])) {

   if (! empty($_POST['bookId'])) {
      $bookId = $_POST['bookId'];
   
      $userComment = new UserComment();
      $userComment->setUserCommentId(1);
      $userComment->setBookCommentId($bookId);
      $userComment->setCommentDate($currentDate);
      $userComment->setMessage($_POST['post_comment']);
   
      $lastIdInserted = UserCommentDAO::insertNewComment($userComment);

      // $comment = UserCommentDAO::getCommentByBookId($bookId);
      // $comment->setBookCommentId($bookId);
      $allComment = UserCommentDAO::getAllCommentByBookId($bookId);
      
   }
} 


if (empty($book)) {
   $book = BookDAO::getBookById($_POST['bookId']);
}


echo Page::pageHeader();
echo PageContent::pageBookDetail($book, $allComment);
echo Page::pageFooter();
