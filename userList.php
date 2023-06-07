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

if(!empty($_POST['add-list'])) {
    if (!empty($_POST['bookId'])) {
        $bookId = $_POST['bookId'];

        $userList = new UserList();

        $userList->setUserListId(1);
        $userList->setUserId($_SESSION['userId']);
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

// $username = $user->getUserName();


echo Page::pageHeader();
echo Page::titleUser("testname");
// echo PageContent::pageUserList($userList);
echo Page::pageFooter();
