<?php

class User {

    private int $userId;
    private string $userName;
    private string $email;
    private string $password;
    private string $userPicture;

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getuserPicture() {
        return $this->userPicture;
    }

    public function setuserPicture($userPicture) {
        $this->userPicture = $userPicture;
    }

    //Verify the password
    function verifyPassword(string $passwordToVerify) : bool {
        //password comparator
        $equal = false;
        //Return a boolean based on verifying if the password given is correct for the current user
        if(password_verify($passwordToVerify,$this->getPassword())){
            //set password comparator true
            $equal = true;
        } else {
            //set password comparator false
            $equal = false;
        }
        //return the password comparator
        return $equal;
    }
    
}