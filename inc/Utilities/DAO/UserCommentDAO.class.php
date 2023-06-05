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

   public static function insertNewComment($comment) {
    $sql = "INSERT INTO user_comment(userId, bookId, date, message) VALUES (:userId, :bookId, :date, :message)";

    self::$db->query($sql);

    self::$db->bind(":userId", $comment->getUserCommentId());
    self::$db->bind(":bookId", $comment->getBookCommentId());
    self::$db->bind(":date", $comment->getCommentDate());
    self::$db->bind(":message", $comment->getMessage());
    
    self::$db->execute();

    return self::$db->lastInsertedId();
 }
}