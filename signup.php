<?php

require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/DAO/UserDAO.class.php");
require_once("inc/Utilities/LoginManager.class.php");
require_once("inc/Page.class.php");

session_start();
LoginManager::verifyLogin();
UserDAO::startDb();

$currentUser = $_SESSION["username"];
echo Page::pageHeader();

function signup($username, $email, $password, $userPicture)
{
    // Validate input parameters
    if (empty($username) || empty($email) || empty($password)) {
        return "Please provide all the required information.";
    }

    // Check if the user already exists in the database
    $userExist = UserDAO::getUserByUsername($username);
    if ($userExist) {
        return "Username already exists. Please choose a different username.";
    }

    // Create a new User instance
    $newUser = new User();
    $newUser->setUsername($username);
    $newUser->setEmail($email);
    $newUser->setUserPicture($userPicture); // Set the user picture

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $newUser->setPassword($hashedPassword);

    // Insert the new user into the database
    UserDAO::insertUser($newUser);

    // Successful signup
    return "Signup successful!";
}

// Handle form submission
if (!empty($_POST)) {
    $username = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userPicture = $_POST['userPicture'];

    $result = signup($username, $email, $password, $userPicture);

    // Display the result
    echo $result;
}

// Rest of the code for rendering the signup page
echo Page::pageHeader();
echo Page::titleDefault("Hi there, nice to see you!");
echo Page::formSignup();
echo Page::pageFooter();
