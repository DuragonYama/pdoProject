<?php

require "db.php";

class User
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = new db_connection();
    }

    public function registerUser($firstname, $lastname, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->pdo->run("INSERT INTO user (firstname, lastname, password) VALUES (:firstname, :lastname, :password)", [
            "firstname" => $firstname,
            "lastname" => $lastname,
            "password" => $hash
        ]);
    }
}

$User = new User();