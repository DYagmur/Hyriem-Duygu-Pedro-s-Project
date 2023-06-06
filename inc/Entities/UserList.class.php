<?php

class UserList {
   private int $userListId;
   private int $userId;
   private string $bookId;

   public function getUserListId() {
      return $this->userListId;
   }

   public function setUserListId($userListId) {
      $this->userListId = $userListId;
   }

   public function getUserId() {
      return $this->userId;
   }

   public function setUserId($userId) {
      $this->userId = $userId;
   }

   public function getBookId() {
      return $this->bookId;
   }

   public function setBookId($bookId) {
      $this->bookId = $bookId;
   }
}