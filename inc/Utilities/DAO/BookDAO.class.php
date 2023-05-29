<?php

class BookDAO {
   private static $db;

   public static function startDb() {
      self::$db = new PDOService("book");
   }

   public static function getAllBooks() {
      $sql = "SELECT * FROM book";

      self::$db->query($sql);
      self::$db->execute();

      return self::$db->resultSet();
   }

   public static function getBookById($bookId) {
      $sql = "SELECT * FROM book WHERE bookId = :bookId";

      self::$db->query($sql);
      self::$db->bind(":bookId", $bookId);

      self::$db->execute();

      return self::$db->singleResult();
   }

//    public static function getTitle($title) {
//       $sql = "SELECT * FROM books WHERE title = :title";
//       $pdo = PDOService::getInstance()->getConnection();
  
//       $stmt = $pdo->prepare($sql);
//       $stmt->bindValue(':title', $title);
//       $stmt->execute();
  
//       return $stmt->fetchAll(PDO::FETCH_ASSOC);
//   }
  

   public function insertNewBook($newBook) {
      $sql = "INSERT INTO book(bookId, title, author, rating, description, language, isbn, genres, edition, pages, publisher, publishDate, coverImg, price)  VALUES (:bookId, :title, :author, :rating,:description, :language, :isbn, :genres, :edition, :pages, :publisher, :publishDate, :coverImg, :price)";

      self::$db->query($sql);

      self::$db->bind(":bookId", $newBook->getBookId());
      self::$db->bind(":title", $newBook->getTitle());
      self::$db->bind(":author", $newBook->getAuthor());
      self::$db->bind(":rating", $newBook->getRating());
      self::$db->bind(":description", $newBook->getDescription());
      self::$db->bind(":language", $newBook->getLanguage());
      self::$db->bind(":isbn", $newBook->getIsbn());
      self::$db->bind(":genres", $newBook->getGenres());
      self::$db->bind(":edition", $newBook->getEdition());
      self::$db->bind(":pages", $newBook->getPages());
      self::$db->bind(":publisher", $newBook->getPublisher());
      self::$db->bind(":publishDate", $newBook->getPublishDate());
      self::$db->bind(":coverImg", $newBook->getCoverImg());
      self::$db->bind(":price", $newBook->getPrice());

      self::$db->execute();

      return self::$db->lastInsertedId();
   }
}