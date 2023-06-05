<?php

class UserComment {
   private int $commentId;
   private int $userId;
   private string $bookId;
   private string $date;
   private string $message;

   public function getCommentId() {
      return $this->commentId;
   }

   public function setCommentId($commentId) {
      $this->commentId = $commentId;
   }

   public function getUserCommentId() {
      return $this->userId;
   }

   public function setUserCommentId($userId) {
      $this->userId = $userId;
   }

   public function getBookCommentId() {
      return $this->bookId;
   }

   public function setBookCommentId($bookId) {
      $this->bookId = $bookId;
   }

   public function getCommentDate() {
      return $this->date;
   }

   public function setCommentDate($date) {
      $this->date = $date;
   }

   public function getMessage() {
      return $this->message;
   }

   public function setMessage($message) {
      $this->message = $message;
   }
}