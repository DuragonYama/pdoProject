<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Planner - Dashboard</title>
    <link rel="stylesheet" href="../Css/dashboard.css">
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
            <button>Add Task</button>
        </div>

        <div class="dashboard-cards">
            <div class="card">
                <h3>Upcoming Tasks</h3>
                <ul>
                    <li>Task 1: Due on 23rd February</li>
                    <li>Task 2: Due on 28th February</li>
                    <li>Task 3: Due on 1st March</li>
                </ul>
                <a href="tasks.php">View All Tasks</a>
            </div>

            <div class="card">
                <h3>Upcoming Events</h3>
                <ul>
                    <li>Event 1: 25th February</li>
                    <li>Event 2: 5th March</li>
                </ul>
                <a href="index.php">View Calendar</a>
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

    <script src="../Scripts/date.js"></script>
</body>
</html>
