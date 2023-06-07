<?php

class UserDAO {
    
    private static $db;

    public static function startDb() {
        self::$db = new PDOService("User");
    }

   public static function insertUser(User $newUser) {
        $sql = "INSERT INTO users(username,email,password,userPicture) VALUES (:username,:email,:password,:userPicture)";

        self::$db->query($sql);

        self::$db->bind(":username",$newUser->getUserName());
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

    static function getUserByUserId(string $userId)  {
        $sql = "SELECT * FROM users WHERE userId=:id";

        self::$db->query($sql);

        self::$db->bind(":id",$userId);

        self::$db->execute();
      
        return self::$db->singleResult();
    }

    public static function getAllUsers(){
        $sql = "SELECT * FROM users";

        self::$db->query($sql);
        self::$db->execute();

        return self::$db->resultSet();
    }

    public static function getEmailbyEmail(string $email)  {
        $sql = "SELECT * FROM users WHERE email=:email";

        self::$db->query($sql);

        self::$db->bind(":email",$email);

        self::$db->execute();
      
        return self::$db->singleResult();
    }



    

}