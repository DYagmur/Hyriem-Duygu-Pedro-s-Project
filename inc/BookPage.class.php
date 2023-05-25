<?php
class BookPage {
   public static function pageHeader() {
      $htmlHeader = '
         <!DOCTYPE html>
         <html lang="en">
            <head>
               <meta charset="UTF-8" />
               <meta http-equiv="X-UA-Compatible" content="IE=edge" />
               <meta name="viewport" content="width=device-width, initial-scale=1.0" />
               <title>Book Recommendation</title>
               <link rel="stylesheet" href="css/style.css" />
            </head>
            <body>
      ';
      return $htmlHeader;
   }

   public static function navigation() {
      $navigation = '
         <nav class="nav">
            <h1 class="nav-title">
               <a href="#">re<span class="advice-color">advice</span></a>
            </h1>
            <ul class="nav-list">
               <li><a href="#">Home</a></li>
               <li><a href="#">About</a></li>
               <li><a href="#">Team</a></li>
               <li><a href="#">My List</a></li>
            </ul>
            <form action="#">
               <input type="search" name="search" id="search-books" placeholder="Search books"/>
            </form>
            <section class="button-group">
               <button class="login-btn" id="login-btn">Login</button>
               <button class="signup-btn" id="signup-btn">Sign up</button>
            </section>	
         </nav>
      ';
      return $navigation;
   }

   public static function mainPage(){
      $mainPage = '
         <section class="main" id="main">
            <article class="title">
               <h2>Let us find your book!</h2>
               <input type="search" name="search" id="search">
               <ul class="filter-list">
                  <span>
                     <li><a href="#">All</a></li>
                  </span>
                  <li><a href="#">Medical</a></li>
                  <li><a href="#">Science</a></li>
                  <li><a href="#">Fantasy</a></li>
                  <li><a href="#">Art</a></li>
                  <li><a href="#">Fiction</a></li>
                  <li><a href="#">Nonfiction</a></li>
                  <li><a href="#">Magic</a></li>
                  <li><a href="#">Adventure</a></li>
                  <li><a href="#">Fairy Tales</a></li>
                  <li><a href="#">Classics</a></li>
                  <li><a href="#">Romance</a></li>
                  <li><a href="#">Novels</a></li>
                  <li><a href="#">Thriller</a></li>
                  <li><a href="#">Horror</a></li>
                  <li><a href="#">Mystery</a></li>
                  <li><a href="#">Biography</a></li>
                  <li><a href="#">Crime</a></li>
                  <li><a href="#">Humor</a></li>
               </ul>
            </article>
         </section>
      ';
   }

   public static function loginPage() {
      $login = '
         <form method="POST">
            <input type="text" name="email" id="email" placeholder="Email">
            <input type="password" name="password" id="password" placeholder="Password">
         </form>
      ';
   }

   public static function pageEnd() {
      $htmlPageEnd = '
         </body>
      </html>';
      return $htmlPageEnd;
   }
}
