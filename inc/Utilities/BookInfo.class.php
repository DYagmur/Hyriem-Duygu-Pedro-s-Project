<?php

class BookInfo {

   public static function bookInfo($book) {
      $bookInfo = '
            <span class="publish-group">
               <h4 class="publisher">Publish Date</h4>
               <p>'.$book->getPublishDate().'</p> 
            </span>
            <span class="publish-group">
               <h4 class="publisher">Publisher</h4>
               <p>'.$book->getPublisher().'</p> 
            </span>
            <span class="language-group">
               <h4 class="language">Language</h4>
               <p>'.$book->getLanguage().'</p>
            </span>
            <span class="isbn-group">
               <h4 class="isbn">ISBN</h4>
               <p>'.$book->getIsbn().'</p>
            </span>
            <section class="ratings">
               <span>'.$book->getRating().'</span>
            </section>
            <section class="genres-group">
               <h4 class="genres-title">Genres</h4>
               <span>'.$book->getGenres().'</span>
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
      return $bookInfo;
   }
}