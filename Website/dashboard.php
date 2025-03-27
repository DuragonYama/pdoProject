<?php 
    require "../Database/user.php";
    session_start();

    if (isset($_POST['knop'])) {
        $User->saveTask($_POST['task']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Planner - Dashboard</title>
    <link rel="stylesheet" href="../Css/dashboard.css">
    <link rel="stylesheet" href="../Css/font.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <h1 class="h1">Task Planner</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="calendar.php">Calendar</a></li>
                <li><a href="tasks.php">Tasks</a></li>
                <li><a href="settings.php">Settings</a></li>
            </ul>
        </nav>
    </div>
    
    <div class="main-content">
        <div class="header">
            <h2>Welcome to Your Dashboard</h2>
            <button id="openSidebar">Add Task</button>
        </div>

        <div class="dashboard-cards">
            <div class="card">
                <h3>Upcoming Tasks</h3>
                <ul>
                    <?php $User->tasksOppakkenDashboard(); ?>
                </ul>
                <a href="tasks.php">Edit Tasks</a>
            </div>

            <div class="card">
                <h3>Upcoming Events</h3>
                <ul>
                    <?php $User->eventsOppakkenDashboard(); ?>
                </ul>
                <a href="calendar.php">View Calendar</a>
            </div>

            <div class="card">
                <h3>Recent Activity</h3>
                <ul>
                    <li>Added Task 1 on 20th February</li>
                    <li>Completed Task 2 on 19th February</li>
                </ul>
                <a href="tasks.php">See More Activity</a>
            </div>
        </div>
    </div>

    <div id="taskSidebar" class="task-sidebar">
        <button id="closeSidebar" class="button">&times;</button>
        <h3>Add New Task</h3>
        <form method="POST">
            <input type="text" placeholder="Task Name" name="task" required>
            <button type="submit" name="knop">Add Task</button>
        </form>
    </div>
    
    <script>
        document.getElementById('openSidebar').addEventListener('click', function() {
            document.getElementById('taskSidebar').classList.add('active');
        });
        
        document.getElementById('closeSidebar').addEventListener('click', function() {
            document.getElementById('taskSidebar').classList.remove('active');
        });
    </script>
</body>
</html>
