<?php 
require "../Database/user.php";
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$tasks = $User->getTasksByUser($_SESSION['id']);

if (isset($_POST['deleteTask'])) {
    $User->deleteTask($_POST['task_id']);
    header("Location: tasks.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link rel="stylesheet" href="../Css/calendarDay.css">
    <link rel="stylesheet" href="../Css/tasks.css">
</head>
<body>
    <div class="sidebar">
        <h1 class="h1">Task Planner</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="calendar.php">Calendar</a></li>
                <li><a href="tasks.php">Tasks</a></li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <h2>Your Tasks</h2>
        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Last Updated</th>
                    <th>Completed</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= htmlspecialchars($task['task']) ?></td>
                        <td><?= $task['updated_at'] ?></td>
                        <td>
                            <?= $task['completed'] ? '<span class="completed">✔ Yes</span>' : '<span class="not-completed">❌ No</span>' ?>
                        </td>
                        <td>
                            <a href="editTask.php?id=<?= $task['id'] ?>" class="edit-btn">Edit</a>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                                <button type="submit" name="deleteTask" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
