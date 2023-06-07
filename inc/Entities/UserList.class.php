<?php

class UserList {
   private int $userListId;
   private int $userId;
   private string $bookListId;

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

   public function getBookListId() {
      return $this->bookListId;
   }

   public function setBookListId($bookListId) {
      $this->bookListId = $bookListId;
   }
}