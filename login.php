<?php
//Require Files
require_once("inc/config.inc.php");

require_once("inc/Entities/User.class.php");

require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/UserDAO.class.php");
require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Page.class.php");



if (!empty($_POST)) {

    UserDAO::startDb();
    
    $email = $_POST['email'];
    $loginUser = UserDAO::getEmailbyEmail($email);

  
   

    
    if( (gettype($loginUser) == "object") && (get_class($loginUser) == "User") ){
        
        //Check the password
        if ($loginUser->verifyPassword($_POST['password']))  {
            //Start the session
            session_start();
            //Set the user to logged in
            $_SESSION["loggedin"] = true;
            $_SESSION['email'] = $loginUser;

            /* header("Location: index.php"); */
            echo "Welcome to ReadVice!";

            
            exit();
        }
    } 
}

echo Page::pageHeader($userName);
echo Page::titleDefault("Let's start the discover amazing books!");
echo Page::formLogin();


/* if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    echo "Welcome to ReadVice, '$userName'!";
} else {
    
} */

echo Page::pageFooter();