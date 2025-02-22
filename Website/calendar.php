<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Planner</title>
    <link rel="stylesheet" href="../Css/calendar.css">
    <link rel="stylesheet" href="../Css/indexWeekly.css">
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
        <h2 id="monthYear"></h2>
        <div class="buttons">
            <button id="previousMonth"><</button> &nbsp;
            <button id="nextMonth">></button>
        </div>
            <button>Add Event</button>
        </div>
        <div class="containerDays">
            <div class="day">Mon</div>
            <div class="day">Tue</div>
            <div class="day">Wed</div>
            <div class="day">Thu</div>
            <div class="day">Fri</div>
            <div class="day">Sat</div>
            <div class="day">Sun</div>
        </div>
        <div class="calendar" id="calendar">
            <!-- javascript doet de dagen erbij -->
        </div>
    </div>

    <script src="../Scripts/date.js"></script>
</body>
</html>