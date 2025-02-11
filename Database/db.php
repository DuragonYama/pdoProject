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

    public function run($sql, $placeholder = null) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($placeholder);
        return $stmt;
    }
}

$pdo = new db_connection();