<?php

require "db.php";

class User
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = new db_connection();
    }

    public function registerUser($firstname, $lastname, $email, $password) {
        try {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $this->pdo->run("INSERT INTO user (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)", [
                "firstname" => $firstname,
                "lastname" => $lastname,
                "email" => $email,
                "password" => $hash
            ]);
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "<div class='notification error'>This email is already in use!</div>";
                header("refresh:3; url = register.php");
            } else {
                echo "<div class='notification success'>Register Successful!</div>";
                header("refresh:3; url = login.php");
            }
        }
    }

    public function loginUser($email, $password) {
        session_start();

        $sql = "SELECT password FROM user WHERE email = :email";
        $stored_info = $this->pdo->run($sql, ["email" => $email])->fetch();

        if (!$stored_info) {
            echo "Email bestaat niet!";
            return;
        }

        if (password_verify($password, $stored_info['password'])) {
            $_SESSION['email'] = $email;
        }
    } 
}

$User = new User();