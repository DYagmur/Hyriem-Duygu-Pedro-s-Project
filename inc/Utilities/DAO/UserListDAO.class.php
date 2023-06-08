<?php

class UserListDAO {
   private static $db;

   public static function startDb() {
      self::$db = new PDOService("UserList");
   }

   public static function getAllUserLists() {
      $sql = "SELECT books.bookId, books.title, books.author, books.rating, books.description, books.language, books.isbn, books.genres, books.edition, books.pages, books.publisher, books.publishDate, books.coverImg, books.price FROM user_list JOIN books ON user_list.bookId = books.bookId";

      self::$db->query($sql);
      self::$db->execute();

      return self::$db->resultSet();
   }

   public static function getUserListByUserId($userId) {
      $sql = "SELECT books.bookId, books.title, books.author, books.rating, books.description, books.language, books.isbn, books.genres, books.edition, books.pages, books.publisher, books.publishDate, books.coverImg, books.price FROM user_list JOIN books ON user_list.bookId = books.bookId WHERE userId = :id";

      self::$db->query($sql);
      self::$db->bind(":id", $userId);

      self::$db->execute();
      
      return self::$db->resultSet();
   }

   public static function findBookByUser($userId) {
      $sql = "SELECT bookId FROM user_list WHERE userId = :id";
      
      self::$db->query($sql);
      self::$db->bind(":id", $userId);

      self::$db->execute();
      
      return self::$db->resultSet();
   }

   public static function insertToList($userList) {
      $sql = "INSERT INTO user_list (userId, bookId) VALUES (:userId, :bookId)";

      self::$db->query($sql);
      self::$db->bind(":userId", $userList->getUserId());
      self::$db->bind(":bookId", $userList->getBookListId());

      self::$db->execute();

      return self::$db->lastInsertedId();
   }

   public static function removeFromList($bookId) {
      $sql = "DELETE FROM user_list WHERE bookId = :id";

      self::$db->query($sql);
      self::$db->bind(":id", $bookId);

      self::$db->execute();

      return self::$db->rowCount();

   }
}