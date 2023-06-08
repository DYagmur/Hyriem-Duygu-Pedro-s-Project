<?php

require_once("inc/config.inc.php");

require_once("inc/Entities/Book.class.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Entities/UserList.class.php");
require_once("inc/Entities/UserComment.class.php");
require_once("inc/Utilities/Repositories/BookRepository.class.php");

require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/BookDAO.class.php");
require_once("inc/Utilities/DAO/UserDAO.class.php");
require_once("inc/Utilities/DAO/UserCommentDAO.class.php");
require_once("inc/Utilities/DAO/UserListDAO.class.php");

require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");

BookDAO::startDb();
UserDAO::startDb();
UserCommentDAO::startDb();
UserListDAO::startDb();

session_start();

if($_SESSION) {
   $user = $_SESSION['loginUser'];
   $user->getUserName();
   echo Page::pageHeader($user->getUserName()); 
} else {
   echo Page::pageHeader(); 
}

if(! empty($_GET['user'])) {
   $bookRepository = new BookRepository();
   $bookRepository->setBookList(UserListDAO::getUserListByUserId($user->getUserId()));
   if(! empty($_GET['remove'])) {
      $bookRepository->setBookList(UserListDAO::removeFromList($_GET['remove']));
      $bookRepository->setBookList(UserListDAO::getUserListByUserId($user->getUserId()));
   } 
   $userList = $bookRepository->getBookList();
} else {
   $userList = '';
}


echo Page::titleUser($user);
echo PageContent::pageUserList($userList, $user->getUserId());
echo Page::pageFooter();
