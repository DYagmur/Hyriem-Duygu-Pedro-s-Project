<?php

class UserComment {
   private int $commentId;
   private string $userCommentName;
   private string $bookCommentId;
   private string $date;
   private string $message;

   public function getUserCommentName() {
      return $this->userCommentName;
   }

   public function setUserCommentName($userCommentName) {
      $this->userCommentName = $userCommentName;
   }

   public function getCommentId() {
      return $this->commentId;
   }

   public function setCommentId($commentId) {
      $this->commentId = $commentId;
   }

   public function getBookCommentId() {
      return $this->bookCommentId;
   }

   public function setBookCommentId($bookCommentId) {
      $this->bookCommentId = $bookCommentId;
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