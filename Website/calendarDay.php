<?php

    require "../Database/user.php";
    session_start();

    $day = isset($_GET['day']) ? $_GET['day'] : null;
    $month = isset($_GET['month']) ? $_GET['month'] : null;
    $year = isset($_GET['year']) ? $_GET['year'] : null;

    $events = $User->eventsOppaken($day, $month, $year);

    if (isset($_POST['button'])) {
        $title = $_POST['title'];
        $event_time = $_POST['tijd'];
        $description = $_POST['description'];

        $User->saveEvent($day, $month, $year, $title, $event_time, $description);
    }
?>
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
            <?php
            $counter = 0;
            $REALcounter = 0;

            for ($i = 0; $i < 24; $i++) {
                $hour = str_pad($i, 2, '0', STR_PAD_LEFT);
                echo "<div class='hour' id='hour-$hour'><span>" . date('h:i A', strtotime("$hour:00")) . "</span>";
            
                foreach ($events as $event) {
                    $eventHour = substr($event['event_time'], 0, 2);
                    if ($eventHour == $hour) {
                        $counter += 1;
                        $REALcounter += 1;
                        if ($counter >= 5) {
                            $counter = 1;
                            echo "<div class='event-box box{$counter}'>
                            <div class='event-header'>
                            <span class='event-title'>Event {$REALcounter}: {$event['title']}</span>
                            </div>
                            <div class='event-description'>
                            <p>{$event['description']}</p>
                            </div>
                        </div>";
                        } else {
                            echo "<div class='event-box box{$counter}'>
                            <div class='event-header'>
                            <span class='event-title'>Event {$REALcounter}: {$event['title']}</span>
                            </div>
                            <div class='event-description'>
                            <p>{$event['description']}</p>
                            </div>
                        </div>";
                        }
                    }
                }
                echo "</div>";
            }

            ?>
        </div>
    </div>
    <div class="addEvent">
        <form method="POST">
    <div class="addEvent-container">
        <h2>Add Event</h2>
        <label for="eventTitle">Title:</label>
        <input type="text" id="eventTitle" name="title" placeholder="Enter event title">

        <label for="eventTime">Time:</label>
        <select id="eventTime" name="tijd">
            <option value="00:00">12:00 AM</option>
            <option value="01:00">1:00 AM</option>
            <option value="02:00">2:00 AM</option>
            <option value="03:00">3:00 AM</option>
            <option value="04:00">4:00 AM</option>
            <option value="05:00">5:00 AM</option>
            <option value="06:00">6:00 AM</option>
            <option value="07:00">7:00 AM</option>
            <option value="08:00">8:00 AM</option>
            <option value="09:00">9:00 AM</option>
            <option value="10:00">10:00 AM</option>
            <option value="11:00">11:00 AM</option>
            <option value="12:00">12:00 PM</option>
            <option value="13:00">1:00 PM</option>
            <option value="14:00">2:00 PM</option>
            <option value="15:00">3:00 PM</option>
            <option value="16:00">4:00 PM</option>
            <option value="17:00">5:00 PM</option>
            <option value="18:00">6:00 PM</option>
            <option value="19:00">7:00 PM</option>
            <option value="20:00">8:00 PM</option>
            <option value="21:00">9:00 PM</option>
            <option value="22:00">10:00 PM</option>
            <option value="23:00">11:00 PM</option>
        </select>

        <label for="eventDescription">Description:</label>
        <textarea id="eventDescription" name="description" placeholder="Enter event description"></textarea>

        <button id="saveEvent" name="button">Save</button>
        <button id="closeEvent">Cancel</button>
    </div>
    </form>
    </div>
    <script src="../Scripts/calendarDay.js"></script>
</body>
</html>
