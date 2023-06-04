<?php
//Require Files
require_once("inc/config.inc.php");

require_once("inc/Entities/User.class.php");

require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/UserDAO.class.php");

require_once("inc/Page.class.php");

if (!empty($_POST['username'])) {
    $userName = $_POST['username'];
    $userNameExist = UserDAO::getUserByUsername($userName);
    //Check the DAO returned an object of type user
    if( (gettype($authUser) == "object") && (get_class($authUser) == "User") ){
        
        //Check the password
        if ($authUser->verifyPassword($_POST['password']))  {
            //Start the session
            session_start();
            //Set the user to logged in
            $_SESSION["loggedin"] = true;
            $_SESSION['userName'] = $authUser;

            header("Location: updateaccount.php");
            exit();
        }
    }
}

echo Page::pageHeader();
echo Page::titleDefault("Let's start the discover amazing books!");
echo Page::formLogin(); 
echo Page::pageFooter();