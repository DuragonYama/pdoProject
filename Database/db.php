<?php

class db_connection {
    public $pdo;

    public function __construct($db = "taskplanner", $user = "root", $pwd = "", $host = "localhost") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db;", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected to: $db";
        } catch (PDOException $e) {
            echo "Connection failed" . $e->getMessage();
        }
    }

    public function run($sql, $placeholders = null) {
        $stmt = $this->pdo->prepare($sql);
        if ($placeholders) {
            $stmt->execute($placeholders);
        } else {
            $stmt->execute();
        }
        return $stmt;
    }    
}

$pdo = new db_connection();