<?php

class UserListDAO {
   private static $db;

   public static function startDb() {
      self::$db = new PDOService("UserList");
   }

   public static function getAllUserLists() {
      $sql = "SELECT * FROM user_list";

      self::$db->query($sql);
      self::$db->execute();

      return self::$db->resultSet();
   }

   public function getUserListByUserId($userId) {
      $sql = "SELECT * FROM user_list WHERE userId = :id";

      self::$db->query($sql);
      self::$db->bind(":id", $userId);

      self::$db->execute();
      
      return self::$db->singleResult();
   }

   public function insertToList($userList) {
      $sql = "INSERT INTO user_list (userId, bookId) VALUES (:userId, :bookId)";

      self::$db->query($sql);
      self::$db->bind(":userId", $userList->getUserId());
      self::$db->bind(":bookId", $userList->getBookId());

      self::$db->execute();
   }
}