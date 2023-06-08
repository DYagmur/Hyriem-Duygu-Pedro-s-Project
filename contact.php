<?php

require_once("inc/config.inc.php");
require_once("inc/Page.class.php");
require_once("inc/PageContent.class.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Utilities/PDOService.class.php");

require_once("inc/Utilities/DAO/UserDAO.class.php");


UserDAO::startDb();

session_start();

if($_SESSION) {
   $user = $_SESSION['email'];
   $user->getUserName();
   echo Page::pageHeader($user->getUserName()); 
} else {
   echo Page::pageHeader(); 
}

if(! empty($_POST)) {
   echo Page::titleDefault("Contact Us");
   echo Page::formContact();

   $name = $_POST['name'];
   $email = $_POST['email'];
   $message = $_POST['message'];

   $to = "pedrossgarcia88@gmail.com";
   $subject = "Email Test - ";

   $message = "<b>Email messages from Readvice customers.</b>\n";
   $message .= "
      <ul>
         <li>Name: $name</li>
         <li>Email: $email</li>
      </ul>
   ";

   $header = "From: pedrossgarcia88@gmail.com \n";
   $header .= "Cc:pedrossgarcia88@gmail.com \r\n";
   $header .= "MIME-Version: 1.0\n";
   $header .= "Content-type: text/html\n";
   
   $retval = mail($to, $subject, $message, $header);

   if($retval == true) {
      echo "Message sent successfully";
   } else {
      echo "Message could not be sent";
   }

} else {
   echo Page::titleDefault("Contact Us");
   echo Page::formContact();
}

echo Page::pageFooter();


