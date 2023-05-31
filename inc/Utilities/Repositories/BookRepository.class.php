<?php

class BookRepository {
   private $bookList;

   public function getBookList() {
      return $this->bookList;
   }
   
   public function setBookList($newBookList) {
      $this->bookList = $newBookList;
   }


   public function getAllTitles() {
      $titlesList = [];

      foreach($this->bookList as $book){
         $titlesList[] = $book->getTitle();
      }

      return $titlesList;
   }

   public function getAllRatings() {
      $ratingsList = [];

      foreach($this->bookList as $book){
         $ratingsList[] = $book->getRating();
      }

      return $ratingsList;
   }

   public function getAllAuthors() {
      $authorsList = [];

      foreach($this->bookList as $book){
         $authorsList[] = $book->getAuthor();
      }

      return $authorsList;
   }

   public function getAllDescriptions() {
      $descriptionsList = [];

      foreach($this->bookList as $book){
         $descriptionsList[] = $book->getAuthor();
      }

      return $descriptionsList;
   }
   
   public function getAllLanguages() {
      $languagesList = [];

      foreach($this->bookList as $book){
         $languagesList[] = $book->getLanguage();
      }

      return $languagesList;
   }

   public function getAllGenres() {
      $genresList = [];

      foreach($this->bookList as $book){
         $genresList[] = $book->getGenre();
      }

      return $genresList;
   }

   public function getAllPages() {
      $pagesList = [];

      foreach($this->bookList as $book){
         $pagesList[] = $book->getPages();
      }
      
      return $pagesList;
   }

   public function getAllPublishDate() {
      $publishDateList = [];

      foreach($this->bookList as $book){
         $publishDateList[] = $book->getPublishDate();
      }

      return $publishDateList;
   }

   public function getAllCoverImgs() {
      $coverImgsList = [];

      foreach($this->bookList as $book){
         $coverImgsList[] = $book->getCoverImg();
      }

      return $coverImgsList;
   }

   public function getAllPrices() {
      $pricesList = [];

      foreach($this->bookList as $book){
         $pricesList[] = $book->getPrice();
      }
      return $pricesList;
   }


}