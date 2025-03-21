<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events for <span id="day"></span></title>
    <link rel="stylesheet" href="../Css/calendarDay.css">
    <link rel="stylesheet" href="../Css/font.css">
    <link rel="stylesheet" href="../Css/addEvent.css">
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
            <h2>Events for <span id="day"></span></h2>
            <button id="addEventBtn">Add Event</button>
        </div>
        <div class="day-schedule">
            <div class="hour" id="hour-0"><span>12:00 AM</span><div class="box1">Event 1: 25th February <br> aaaaaaaaaaaaaaaaaaaaaaa <br> aaaaaaaaaaaaaaaa <br> </div><div class="box2">Event 1: 25th February <br> aaaaaaaaaaaaaaaaaaaaaaa <br> aaaaaaaaaaaaaaaa <br> </div><div class="box3">Event 1: 25th February <br> aaaaaaaaaaaaaaaaaaaaaaa <br> aaaaaaaaaaaaaaaa <br> </div><div class="box4">Event 1: 25th February <br> aaaaaaaaaaaaaaaaaaaaaaa <br> aaaaaaaaaaaaaaaa <br> </div></div>
            <div class="hour" id="hour-1"><span>1:00 AM</span></div>
            <div class="hour" id="hour-2"><span>2:00 AM</span></div>
            <div class="hour" id="hour-3"><span>3:00 AM</span></div>
            <div class="hour" id="hour-4"><span>4:00 AM</span></div>
            <div class="hour" id="hour-5"><span>5:00 AM</span></div>
            <div class="hour" id="hour-6"><span>6:00 AM</span></div>
            <div class="hour" id="hour-7"><span>7:00 AM</span></div>
            <div class="hour" id="hour-8"><span>8:00 AM</span></div>
            <div class="hour" id="hour-9"><span>9:00 AM</span></div>
            <div class="hour" id="hour-10"><span>10:00 AM</span></div>
            <div class="hour" id="hour-11"><span>11:00 AM</span></div>
            <div class="hour" id="hour-12"><span>12:00 PM</span></div>
            <div class="hour" id="hour-13"><span>1:00 PM</span></div>
            <div class="hour" id="hour-14"><span>2:00 PM</span></div>
            <div class="hour" id="hour-15"><span>3:00 PM</span></div>
            <div class="hour" id="hour-16"><span>4:00 PM</span></div>
            <div class="hour" id="hour-17"><span>5:00 PM</span></div>
            <div class="hour" id="hour-18"><span>6:00 PM</span></div>
            <div class="hour" id="hour-19"><span>7:00 PM</span></div>
            <div class="hour" id="hour-20"><span>8:00 PM</span></div>
            <div class="hour" id="hour-21"><span>9:00 PM</span></div>
            <div class="hour" id="hour-22"><span>10:00 PM</span></div>
            <div class="hour" id="hour-23"><span>11:00 PM</span></div>
        </div>
    </div>
    <div class="addEvent">
        <div class="addEvent-container">
            <h2>Add Event</h2>
            <label for="eventTitle">Title:</label>
            <input type="text" id="eventTitle" placeholder="Enter event title">

            <label for="eventDate">Date:</label>
            <input type="date" id="eventDate">

            <label for="eventTime">Time:</label>
            <input type="time" id="eventTime">

            <label for="eventDescription">Description:</label>
            <textarea id="eventDescription" placeholder="Enter event description"></textarea>

            <button id="saveEvent">Save</button>
            <button id="closeEvent">Cancel</button>
        </div>
    </div>
    <script src="../Scripts/calendarDay.js"></script>
</body>
</html>
