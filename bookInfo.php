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

session_start();

if($_SESSION) {
   $user = $_SESSION['email'];
   $user->getUserName();
   echo Page::pageHeader($user->getUserName()); 
} else {
   echo Page::pageHeader(); 
}


date_default_timezone_set("America/Vancouver");
$currentDate = date("y-m-d h:i:s");



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

if(!empty($_GET['add-list'])) {

   if (!empty($_POST['bookId'])) {
       $bookId = $_POST['bookId'];

       $userList = new UserList();

       $userList->setUserListId(1);
      //  $userList->setUserId();
       $userList->setBookListId($bookId);
   
       $lastIdInserted = UserListDAO::insertToList($userList);
       var_dump($userList);

       if($lastIdInserted !== false) {
           echo "Book added to your list!";
       } else {
           echo "Sorry, there was a problem adding the book to your list.";
       }
   }
}


if (empty($book)) {
   $book = BookDAO::getBookById($_POST['bookId']);
}


echo PageContent::pageBookDetail($book, $allComment);
echo Page::pageFooter();
