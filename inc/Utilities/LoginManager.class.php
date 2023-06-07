<?php

class LoginManager  {
    private static $login;
    //This function checks if the user is logged in, if they are not they are redirected to the login page
    static function verifyLogin()   {
        //Login status
        self::$login = false;

        //Check for a session
        if(!isset($_SESSION)){
            //Start it up
            session_start();
        }

        //If there is session data
        if(isset($_SESSION['loggedin'])){
            //The user is loggedin, return true
            //set login status true
            self::$login = true;

        } else {//The user is not logged in
            //Destroy any session just in case
            session_destroy();
            //set login status false
            self::$login = false;
            //Send them back to the login pages
            header("Location: login.php");
        }
        //return login Status
        return self::$login;
    }
        
}

?>