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

   // public static function compareFantasy($book1, $book2) {
   //    return $book1->getGenre("Fantasy") <=> $book2->getGenre("Fantasy");
   // }

   // public function sortBook(string $sortBy) {
   //    switch ($sortBy) {
   //       case "fantasy";
   //          usort($this->bookList,'self::compareFantasy');
   //       break;
   //       case "";
   //          usort($this->bookList,'self::compareFName');
   //       break;
   //       case "";
   //          usort($this->bookList,'self::compareLName');
   //       break;
   //       case "";
   //          usort($this->bookList,'self::compareUsername');
   //       break;
   //       case "";
   //          usort($this->bookList,'self::compareEmail');
   //       break;
   //       case "";
   //          usort($this->bookList,'self::compareAge');
   //       break;
   //       case "";
   //          usort($this->bookList,'self::compareGender');
   //       break;
   //    }
   // }

}