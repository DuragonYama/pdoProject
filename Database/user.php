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

        $sql = "SELECT id, password FROM user WHERE email = :email";
        $stored_info = $this->pdo->run($sql, ["email" => $email])->fetch();

        if (!$stored_info) {
            echo "Email bestaat niet!";
            return;
        }

        if (password_verify($password, $stored_info['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $stored_info['id'];
        }
    }
    
    public function saveEvent($day, $month, $year, $title, $event_time, $description) {

        if (!isset($_SESSION['id'])) {
            echo "User not logged in!";
            return;
        }
    
        $sql = "INSERT INTO events (user_id, day, month, year, title, event_time, description) 
                VALUES (:user_id, :day, :month, :year, :title, :event_time, :description)";
        
        $this->pdo->run($sql, [
            "user_id" => $_SESSION['id'],
            "day" => $day,
            "month" => $month,
            "year" => $year,
            "title" => $title,
            "event_time" => $event_time,
            "description" => $description
        ]);
    }

    public function saveTask($task) {
        if (!isset($_SESSION['id'])) {
            return;
        }

        $sql = "INSERT INTO tasks (task, user_id)
        VALUES (:task, :user_id)";

        $this->pdo->run($sql, [
            "task" => $task, 
            "user_id" => $_SESSION['id']
        ]);
    }

    public function eventsOppaken($day, $month, $year) {
        $events = [];
    
        if ($day && $month && $year) {
            $sql = "SELECT title, event_time, description 
                    FROM events 
                    WHERE user_id = :user_id 
                    AND day = :day 
                    AND month = :month 
                    AND year = :year 
                    ORDER BY event_time";
    
            $events = $this->pdo->run($sql, [
                "user_id" => $_SESSION['id'],
                "day" => $day,
                "month" => $month,
                "year" => $year
            ])->fetchAll();
        }
    
        return $events;
    }
    
    public function eventsOppakkenDashboard() {
        $nummer = 0;
        $stmt = $this->pdo->run("SELECT title, description, event_time, day, month, year 
            FROM events 
            WHERE user_id = :user_id 
            ORDER BY year, month, day, event_time ASC", 
            ['user_id' => $_SESSION['id']]
        );
    
        while ($event = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nummer += 1;
            $eventDate = "{$event['day']}-{$event['month']}-{$event['year']}";
            $formattedTime = date("H:i", strtotime($event['event_time']));
            echo "<li>Event {$nummer}: <strong>{$event['title']}</strong> ({$eventDate} om {$formattedTime})</li>";
        }
    }

    public function tasksOppakkenDashboard() {
        $nummer = 0;
        $stmt = $this->pdo->run("SELECT task, updated_at, completed
        FROM tasks
        WHERE user_id = :user_id",
        ['user_id' => $_SESSION['id']]);

        while ($tasks = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($tasks['completed'] == 0) {
                $nummer += 1;
                echo "<li>Task {$nummer}: <strong>{$tasks['task']}</strong></li>";
            }
        }
    }

    public function getTasksByUser($userId) {
        $sql = "SELECT * FROM tasks WHERE user_id = :user_id";
        return $this->pdo->run($sql, ["user_id" => $userId])->fetchAll();
    }
    
    public function getTaskById($taskId) {
        $sql = "SELECT * FROM tasks WHERE id = :task_id";
        return $this->pdo->run($sql, ["task_id" => $taskId])->fetch();
    }
    
    public function updateTask($taskId, $name, $completed) {
        $sql = "UPDATE tasks SET task = :task, completed = :completed, updated_at = CURRENT_TIMESTAMP WHERE id = :task_id";
        $this->pdo->run($sql, [
            "task" => $name,
            "completed" => $completed,
            "task_id" => $taskId
        ]);
    }

    public function deleteTask($taskId) {
        $sql = "DELETE FROM tasks WHERE id = :task_id";
        $this->pdo->run($sql, ["task_id" => $taskId]);
    }

    public function getTotalTasks() {
        $query = "SELECT COUNT(*) FROM tasks WHERE user_id = ?";
        $stmt = $this->pdo->run($query, [$_SESSION['id']]);
        return $stmt->fetchColumn();
    }
    
    public function getCompletedTasks() {
        $query = "SELECT COUNT(*) FROM tasks WHERE user_id = ? AND completed = 1";
        $stmt = $this->pdo->run($query, [$_SESSION['id']]);
        return $stmt->fetchColumn();
    }
    
    public function getPendingTasks() {
        $query = "SELECT COUNT(*) FROM tasks WHERE user_id = ? AND completed = 0";
        $stmt = $this->pdo->run($query, [$_SESSION['id']]);
        return $stmt->fetchColumn();
    }
}

$User = new User();