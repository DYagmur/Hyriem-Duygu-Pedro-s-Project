<?php

class Book {
   private string $bookId;
   private string $title;
   private string $author;
   private float $rating;
   private string $description;
   private string $language;
   private int $isbn;
   private string $genres;
   private string $edition;
   private int $pages;
   private string $publisher;
   private string $publishDate;
   private string $coverImg;
   private float $price;

   public function getBookId() {
      return $this->bookId;
   }

   public function setBookId($bookId) {
      $this->bookId = $bookId;
   }

   public function getTitle() {
      return $this->title;
   }

   public function setTitle($title) {
      $this->title = $title;
   }

   public function getAuthor() {
      return $this->author;
   }

   public function setAuthor($author) {
      $this->author = $author;
   }

   public function getRating() {
      return $this->rating;
   }

   public function setRating($rating) {
      $this->rating = $rating;
   }

   public function getDescription() {
      return $this->description;
   }

   public function setDescription($description) {
      $this->description = $description;
   }

   public function getLanguage() {
      return $this->language;
   }

   public function setLanguage($language) {
      $this->language = $language;
   }

   public function getIsbn() {
      return $this->isbn;
   }

   public function setIsbn($isbn) {
      $this->isbn = $isbn;
   }

   public function getGenres() {
      return $this->genres;
   }

   public function setGenres($genres) {
      $this->genres = $genres;
   }

   public function getEdition() {
      return $this->edition;
   }

   public function setEdition($edition) {
      $this->edition = $edition;
   }
 
   public function getPages() {
      return $this->pages;
   }

   public function setPages($pages) {
      $this->pages = $pages;
   }

   public function getPublisher() {
      return $this->publisher;
   }

   public function setPublisher($publisher) {
      $this->publisher = $publisher;
   }

   public function getPublishDate() {
      return $this->publishDate;
   }

   public function setPublishDate($publishDate) {
      $this->publishDate = $publishDate;
   }

   public function getCoverImg() {
      return $this->coverImg;
   }
   
   public function setCoverImg($coverImg) {
      $this->coverImg = $coverImg;
   }

   public function getPrice() {
      return $this->price;
   }

   public function setPrice($price) {
      $this->price = $price;
   }
}