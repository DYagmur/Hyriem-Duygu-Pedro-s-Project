<?php

class BookRepository {
   private $bookList;

   public function getBookList() {
      return $this->bookList;
   }
   
   public function setBookList($newBookList) {
      $this->bookList = $newBookList;
   }

   public function findBook($bookInput) {
      $result = [];
      foreach ($this->bookList as $book) {
         if(
            str_contains($book->getBookId(), $bookInput) ||
            str_contains(strtolower($book->getTitle()), $bookInput) ||
            str_contains(strtolower($book->getAuthor()), $bookInput) ||
            str_contains(strtolower($book->getGenres()), $bookInput)
         ) {
            $result[] = $book;
         }
      }
      return $result;
   }

}