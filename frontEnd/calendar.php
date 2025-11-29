<?php
// Set timezone
date_default_timezone_set('Asia/Manila');

// --- Calendar logic ---
$month = isset($_GET['month']) ? (int)$_GET['month'] : date('n');
$year = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');

if ($month < 1) { $month = 12; $year--; }
elseif ($month > 12) { $month = 1; $year++; }

$firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
$daysInMonth = date('t', $firstDayOfMonth);
$startDay = date('w', $firstDayOfMonth);

$prevMonth = $month - 1; $prevYear = $year; if ($prevMonth < 1) { $prevMonth = 12; $prevYear--; }
$nextMonth = $month + 1; $nextYear = $year; if ($nextMonth > 12) { $nextMonth = 1; $nextYear++; }

$months = ["January","February","March","April","May","June","July","August","September","October","November","December"];

// --- Backend events ---
include "../backEnd/adminController.php";
$controller = new AdminController();
$controller->connection();
//Fetches all events and stores it in $events
$events = $controller->readAll();

// Event dates lookup
$eventDates = [];
foreach ($events as $ev) {
    $date = substr($ev['event_start'],0,10);
    $eventDates[$date] = true;
}

// --- Search logic ---
$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
$searchResults = [];
if ($searchTerm !== '') {
    //Uses the $events array to find matching events
    //No need to declare a new connection and function
    foreach ($events as $ev) {
        if (stripos($ev['event_title'],$searchTerm)!==false || stripos($ev['event_description'],$searchTerm)!==false) {
            $searchResults[] = $ev;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Event Scheduler</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styling/calendars.css">
<script src="eventscript.js" defer></script>

<script>
const events = <?= json_encode($events); ?>;
const searchResults = <?= json_encode($searchResults); ?>;
</script>
</head>

<body>

    <nav class="navbar">
        <div class="nav-left">
        <img src="images/CIS_logo.png" class="logo" alt="Logo">
        
        <!-- Wrap each letter in spans for bouncing animation -->
        <span class="logo-text bounce-text">
            <span>S</span><span>c</span><span>h</span><span>e</span><span>d</span>
            <span> </span>
            <span>M</span><span>o</span>
            <br>
            <span>S</span><span>c</span><span>h</span><span>e</span><span>d</span>
            <span> </span>
            <span>K</span><span>o</span>
        </span>
        
        <!-- Add a class for swirling animation -->
        <span class="calendar-logo">
            <i class="fa-solid fa-calendar calendar-icon"></i>
        </span>
    </div>


    <form id="searchForm" method="GET" class="search-bar">
        <input type="text" name="search" placeholder="Search events..." value="<?= htmlspecialchars($searchTerm) ?>" required>
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>

    <div class="admin-button">
        <a href="loginPage.php" class="admin-btn">Log-In <i class="fa-solid fa-circle-user"></i></a>
    </div>
</nav>

<br>

<!-- Calendar here -->
<div class="calendar">
    <div class="header">
        <a href="?month=<?= $prevMonth ?>&year=<?= $prevYear ?>">
            <i  class="fa-solid fa-less-than"></i>
        </a>
        <div class="current-date"><?= $months[$month-1]." ".$year ?></div>
        <a href="?month=<?= $nextMonth ?>&year=<?= $nextYear ?>">
            <i class="fa-solid fa-greater-than"></i>
        </a>
    </div>

    <table class="calendar- container">
        <tr class="week">
            <th class="sun">Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th class="sat">Sat</th>
        </tr>

        <tr>
        <?php
        $prevMonthDays = cal_days_in_month(CAL_GREGORIAN, $prevMonth, $prevYear);

        if ($startDay>0) for($i=$startDay;$i>0;$i--) 
            echo "<td class='inactive'>".($prevMonthDays-$i+1)."</td>";
        $dayCount = $startDay;

        for($day=1;$day<=$daysInMonth;$day++){
            $today = ($day==date('j') && $month==date('n') && $year==date('Y')) ? "today" : "";

            $dateStr = sprintf('%04d-%02d-%02d',$year,$month,$day);

            $dot = isset($eventDates[$dateStr]) ? "<span class='event-dot'></span>" : "";

            echo "<td class='day $today' data-date='$dateStr'><div>$day</div>$dot</td>";

            $dayCount++; 

            if($dayCount%7==0 && $day!=$daysInMonth) 
                echo "</tr><tr>";
        }
        
        $nextDay=1; while($dayCount%7!=0){ echo "<td class='inactive'>$nextDay</td>"; $dayCount++; $nextDay++; }
        ?>
        </tr>
    </table>
</div>

    <footer class="footer">
        Event Scheduler <i class="fa-solid fa-calendar"></i> <br>&copy; 2025
    </footer>


    <!--Displays the events on the selected date if present, displays no available event otherwise-->
    <!-- Event Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <h2 class="modal-title">Event Details</h2>
            <p><span id="modal-date" class="modal-date">--</span></p>
            <ul>
                <!--Content goes here-->
            </ul>
            <button class="modal-close">Close</button>
        </div>
    </div>

    <!--Reused the modal styling to display events that are available-->
    <!-- Search Results Popup Modal -->
    <div id="searchModal" class="modal">
        <div class="modal-content">
            <h2 class="modal-title">Search Results</h2>
            <p><span id="search-query"><?= htmlspecialchars($searchTerm) ?></span></p>
            <ul>
            <?php if(!empty($searchResults)): ?>
                <?php foreach($searchResults as $ev): ?>
                    <li style="margin-bottom:15px; padding-bottom:10px; ">
                        <ul style="list-style-type: circle; padding-left: 20px; margin:0;">

                            <li>
                                <!-- Date Search Modal-->
                                <strong style="color:violet;">Date:</strong> <?= date("M d, Y", strtotime($ev['event_start'])) ?> 
                                - <?= date("M d, Y", strtotime($ev['event_end'])) ?></li>
                                <hr style=" margin:5px 0;
                                border-top:1px solid rgba(255,255,255,0.3);">

                                    <!-- Title Search Modal-->
                                    <li><strong style="color:violet;">Title:</strong> <?= $ev['event_title'] ?></li>
                                    <hr style=" margin:5px 0;
                                    border-top:1px solid rgba(255,255,255,0.3);">

                                        <!-- Description Search Modal-->
                                        <?php if(!empty($ev['event_description'])): ?>
                                        <li><strong style="color:violet;">Description:</strong> <?= $ev['event_description'] ?></li>
                                        <hr style="margin:5px 0;
                                        border-top:1px solid rgba(255,255,255,0.3);">

                                            <!-- Author Search Modal-->
                                            <li><strong style="color:violet;">Author:</strong> <?= $ev['event_author'] ?></li>
                                            <hr style="
                                            border-top:1px solid rgba(255,255,255,0.3);">

                                                <!-- Status Search Modal-->
                                                <?php if(!empty($ev['event_status'])): ?>
                                                <li><strong style="color:violet;">Status:</strong> <?= $ev['event_status'] ?></li>
                                                <hr style="border-top:1px solid rgba(255,255,255,0.3);">
                                                 <?php endif; ?>

                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No events found.</li>
            <?php endif; ?>
            </ul>
            <button class="modal-close" onclick="closeSearchModal()">Close</button>
        </div>
    </div>


    <script>
        //Displays search result
        document.addEventListener('DOMContentLoaded', () => {
        if (searchResults.length > 0 || "<?= $searchTerm ?>" !== "") {
            document.getElementById('searchModal').style.display = 'flex';
        }
    });

    //Closes search modal upon clicking outside
        const searchModal = document.getElementById('searchModal');
    </script>

</body>
</html>
