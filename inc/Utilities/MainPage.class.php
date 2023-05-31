<?php
class MainPage {

   public static function topContent(){
      $top = '
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
               <main>
               <section class="filter-container" id="filter-container">
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
      return $top;
   }

   public static function bookGallery($bookList) {
      $bookGallery = '
         <article class="book-gallery">
            <figure>
               <img src="" alt="">
               <figcaption>';
                  foreach ($bookList as $book) {
                     $bookGallery .= self::bookCaptions($book);
                  }
                  $bookGallery .= '
               </figcaption>
      ';

      return $bookGallery;
   }

   public static function bookCaptions($book) {
      $bookCaptions = '
               <img src="" alt="">
               <span class="publish-group">
                  <h4 class="publish-date">Published</h4>
                  <p>'.$book->getPublishDate().'</p>
               </span>
               <span class="language-group">
                  <h4 class="language">Language</h4>
                  <p>'.$book->getLanguage().'</p>
               </span>
               <span class="isbn-group">
                  <h4 class="isbn">ISBN</h4>
                  <p>'.$book->getIsbn().'</p>
               </span>
               <section class="genres-group">
                  <h4 class="genres-title">Genres</h4>
                  <span>'.$book->getGenres().'</span>
               </section>
               <section class="ratings">
                  <span>'.$book->getRating().'</span>
               </section>
            </figure>
            <article class="book-sideinfo">
               <span class="title-group">
                  <h2>'.$book->getTitle().'</h2>
                  <h3>'.$book->getAuthor().'</h3>
               </span>
               <section class="description">
                  '.$book->getDescription().'
               </section>
            </article>
         </article>
      ';
      return $bookCaptions;
   }  

   // public static function bookSideInfo($book) {
   //    $bookSideInfo = '
   //       <span class="title-group">
   //          <h2>'.$book->getTitle().'</h2>
   //          <h3>'.$book->getAuthor().'</h3>
   //       </span>
   //       <section class="description">
   //          '.$book->getDescription().'
   //       </section>
   //    ';
   //    return $bookSideInfo;
   // }

   // public static function loginPage() {
   //    $login = '
   //       <form method="POST">
   //          <input type="text" name="email" id="email" placeholder="Email">
   //          <input type="password" name="password" id="password" placeholder="Password">
   //       </form>
   //    ';
   //    return $login;
   // }

   public static function pageEnd() {
      $htmlPageEnd = '
            </main>
         </body>
      </html>';
      return $htmlPageEnd;
   }
}
