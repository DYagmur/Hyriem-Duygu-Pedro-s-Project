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

    public function getUserPicture() {
        return $this->userPicture;
    }

    public function setUserPicture($userPicture) {
        $this->userPicture = $userPicture;
    }
}