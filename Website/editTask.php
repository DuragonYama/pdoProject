<?php 
require "../Database/user.php";
session_start();

if (!isset($_SESSION['id']) || !isset($_GET['id'])) {
    header("Location: tasks.php");
    exit();
}

$task = $User->getTaskById($_GET['id']); // Fix: Use $_GET['id'] instead of $_SESSION['id']

if (isset($_POST['updateTask'])) {
    $completed = isset($_POST['completed']) ? 1 : 0; // Convert checkbox to 1 or 0
    $User->updateTask($_POST['task_id'], $_POST['task_name'], $completed);
    header("Location: tasks.php");
    exit();
}

if (isset($_POST['cancelUpdate'])) {
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="../Css/editTask.css">
</head>
<body>
    <div class="container">
        <h2>Edit Task</h2>
        <form method="POST">
            <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
            <input class="textField" type="text" name="task_name" value="<?= htmlspecialchars($task['task']) ?>" required>
            
            <label>
                <input type="checkbox" name="completed" value="1" <?= $task['completed'] ? 'checked' : '' ?>>
                Completed
            </label>

            <button type="submit" name="updateTask">Save Changes</button>
            <button type="submit" class="cancel" name="cancelUpdate">Cancel</button>
        </form>
    </div>
</body>
</html>

