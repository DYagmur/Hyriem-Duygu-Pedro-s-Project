<?php

class UserDAO {
    
    private static $db;

    public static function startDb() {
        self::$db = new PDOService("User");
    }

   public static function insertUser(User $newUser) {
        $sql = "INSERT INTO users(userName,email,password,userPicture) VALUES (:fName,:lName,:user,:email,:pass)";

        self::$db->query($sql);

        self::$db->bind(":userName",$newUser->getUserName());
        self::$db->bind(":email",$newUser->getEmail());
        self::$db->bind(":password",$newUser->getPassword());
        self::$db->bind(":userPicture",$newUser->getUserPicture());

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