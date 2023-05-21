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

   public static function pageEnd() {
      $htmlPageEnd = '
         </body>
      </html>';
      return $htmlPageEnd;
   }
}
