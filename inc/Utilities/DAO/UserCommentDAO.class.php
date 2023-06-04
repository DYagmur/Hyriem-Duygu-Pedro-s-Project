<?php

class UserCommentDAO {
   private static $db;

   public static function startDb() {
      self::$db = new PDOService("UserComment");
   }

   public static function getAllComments() {
      $sql = "SELECT * FROM user_comment";

      self::$db->query($sql);
      self::$db->execute();

      return self::$db->resultSet();
   }

   public static function getCommentById($commentId) {
      $sql = "SELECT * FROM user_comment WHERE commentId = :id";

      self::$db->query($sql);
      self::$db->bind(":commentId", $commentId);

      self::$db->execute();

      return self::$db->singleResult();
   } 
}