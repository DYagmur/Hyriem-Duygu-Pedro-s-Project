<?php

class UserDAO {
    
    private static $db;

    public static function startDb() {
        self::$db = new PDOService("User");
    }

   public static function insertUser(User $newUser) {
        $sql = "INSERT INTO users(username,email,password) VALUES (:username,:email,:password)";

        self::$db->query($sql);

        self::$db->bind(":username",$newUser->getUserName());
        self::$db->bind(":email",$newUser->getEmail());
        self::$db->bind(":password",$newUser->getPassword());
        

        self::$db->execute();

        return self::$db->lastInsertedId();
    }
 
    static function getUserByUserName(string $userName)  {
        $sql = "SELECT * FROM users WHERE userName=:userName";

        self::$db->query($sql);

        self::$db->bind(":userName",$userName);

        self::$db->execute();
      
        return self::$db->singleResult();
    }


    public static function getAllUsers(){
        $sql = "SELECT * FROM users";

        self::$db->query($sql);
        self::$db->execute();

        return self::$db->resultSet();
    }


    
}