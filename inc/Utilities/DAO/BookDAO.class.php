<?php

class BookDAO {
   private static $db;

   public static function startDb() {
      self::$db = new PDOService("Book");
   }

   public static function getAllBooks() {
      $sql = "SELECT * FROM books";

      self::$db->query($sql);
      self::$db->execute();

      return self::$db->resultSet();
   }

   public static function getBookById($bookId) {
      $sql = "SELECT * FROM books WHERE bookId = :bookId";

      self::$db->query($sql);
      self::$db->bind(":bookId", $bookId);

      self::$db->execute();

      return self::$db->singleResult();
   }

   public static function getGenre(string $genre) {
      $sql = "SELECT * FROM books WHERE genres LIKE :genre";
   
      self::$db->query($sql);
      self::$db->bind(":genre", "%$genre%");
   
      self::$db->execute();
   
      return self::$db->resultSet();
   }

}