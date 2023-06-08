<?php
//Require Files
require_once("inc/config.inc.php");

require_once("inc/Entities/User.class.php");

require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/UserDAO.class.php");
require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Page.class.php");

UserDAO::startDb();

session_start();


if (!empty($_POST)) {
    
    $email = $_POST['email'];
    $loginUser = UserDAO::getEmailbyEmail($email);

  
    if( (gettype($loginUser) == "object") && (get_class($loginUser) == "User") ){
        
        if ($loginUser->verifyPassword($_POST['password']))  {

            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION['loginUser'] = $loginUser;
            
            header("Location: index.php" );
            exit();
        } else {
            echo '<aside class="toast error"><p>Incorrect email/password combination</p></aside>';
        }
    } 
}

echo Page::pageHeader();
echo Page::titleDefault("Hi there, nice to see you!");
echo Page::formLogin();
echo Page::pageFooter();