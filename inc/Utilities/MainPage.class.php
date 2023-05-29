<?php
class Page {
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
