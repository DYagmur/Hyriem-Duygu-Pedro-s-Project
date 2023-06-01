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
               <title>Readvice</title>
               <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
               <link rel="stylesheet" href="css/style.css" />
            </head>
            <body>
               <main>
               <section class="filter-container" id="filter-container">
                  <article class="title">
                     <h2>Let us find your book!</h2>
                     <ul class="filter-list">
                        <span>
                           <li><a href="#">All</a></li>
                        </span>
                        <li><a href="?sortby: ">Medical</a></li>
                        <li><a href="#">Science</a></li>
                        <li><a href="?sortby: fantasy">Fantasy</a></li>
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

   
   public static function searchBar() {
      $searchBar = '
         <nav class="navbar navbar-light bg-light">
            <form class="form-inline">
               <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_book">
               <button class="btn btn-outline-success my-2 my-sm-0" type="submit" type="submit">Search</button>
               <input type="hidden" name="search" value="search">
            </form>
         </nav>
      ';
      return $searchBar;
    }

   public static function bookGallery($bookList) {
      $bookGallery = '
         <article class="book-gallery">';
            foreach ($bookList as $book) {
               $bookGallery .= self::bookImage($book);
            }
            $bookGallery .= '
         </article>
      ';

      return $bookGallery;
   }

   public static function bookImage($book) {
      $bookImage = '
         <figure classs="figure-gallery">
            <a href="bookInfo.php?book='.$book->getBookId().'">
               <img class="coverimg" src="'.$book->getCoverImg().'" alt="book-image">  
            </a>
         </figure>
      ';
      return $bookImage;
   }  

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
