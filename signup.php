<?php

require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/UserDAO.class.php");
require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Page.class.php");

session_start();
UserDAO::startDb();

$imgFolder = 'img/';
if (!empty($_FILES)) {
    try {
        if ($_FILES["userPicture"]["size"] === 0) {
            throw new Exception("Sorry! No file was uploaded");
        }
        $tempFileName = explode(".",$_FILES["userPicture"]["name"]);
    
        $currentDate = date("Ymd");
        $currentTime = date("H-i-s");
        $milliseconds = floor(microtime(true) * 1000);
        $fileName = $currentDate."-".$currentTime.$milliseconds;
        $newFileName = $fileName.".".$tempFileName[count($tempFileName)-1];

        $fileFolder = $imgFolder . $newFileName;

        move_uploaded_file($_FILES["userPicture"]["tmp_name"],$fileFolder); 
        
    } catch(Exception $error) {
        echo $error->getMessage();
    }
}

if ( ! empty($_POST)) {
    $newUser = new User();
    $newUser->setuserName($_POST['userName']);
    $newUser->setEmail($_POST['email']);
    $newUser->setUserPicture($fileFolder);
    
    $newPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $newUser->setPassword($newPass);

    $userExist = UserDAO::getUserByUsername($_POST['userName']);
    $userExist = UserDAO::getEmailbyEmail($_POST['email']);

    if (!$userExist) {
        UserDAO::insertUser($newUser);  
        unset($_POST);
    }
    header("Location: login.php");
}


echo Page::pageHeader();
echo Page::titleDefault("Let's get started!");
echo Page::formSignup();
echo Page::pageFooter();
