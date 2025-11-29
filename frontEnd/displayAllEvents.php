<?php
include "../backEnd/adminController.php";
$conn = new AdminController();
$conn->connection();

// Get sort and filter from GET request
$sort = $_GET['sort'] ?? "nearest";
$filter = $_GET['filter'] ?? "all";
$events = $conn->readAll();

if ($sort && $filter) {
    $events = $conn->sortAndfilter($events, $sort, $filter);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styling/displayallevent.css">
    <script src="eventscript.js" defer></script>
    <title>Super Admin Dashboard</title>
</head>
<body>

    <!-- NAVBAR / TITLE -->
    <div class="title">
        <div class="title-in">
            <i class="fa-solid fa-calendar-check" style="font-size: 40px;"></i>
        Events
        </div>
        <button class="back-btn" onclick="window.location.href='AdminDashboard.php'">
            Back
        </button>
    </div>

    <!-- FILTER + SORT CONTROLS -->
    <form method="GET" id="eventForm" class="filter-sort-form" style="margin-bottom:20px; display:flex; gap:15px;">
        <select name="sort" class="select-control"
                onchange="document.getElementById('eventForm').submit()">
            <option disabled selected>-- Sort Events --</option>
            <option value="nearest" <?= ($sort=="nearest"?"selected":"") ?>>Nearest Events</option>
            <option value="farthest" <?= ($sort=="farthest"?"selected":"") ?>>Farthest Events</option>
        </select>

        <select name="filter" class="select-control" onchange="document.getElementById('eventForm').submit()">
            <option disabled selected>-- Filter Events --</option>
            <option value="all" <?= ($filter=="all"?"selected":"") ?>>All</option>
            <option value="pending" <?= ($filter=="pending"?"selected":"") ?>>Pending</option>
            <option value="completed" <?= ($filter=="completed"?"selected":"") ?>>Completed</option>
            <option value="cancelled" <?= ($filter=="cancelled"?"selected":"") ?>>Cancelled</option>
        </select>
    </form>

    <!-- TABLE CONTAINER -->
    <div class="table-container">
        <table class="glass-table">
            <thead>
                <tr>
                    <th>EVENT TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>START</th>
                    <th>END</th>
                    <th>LOCATION</th>
                    <th>STATUS</th>
                    <th>CREATED AT</th>
                    <th>AUTHOR</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($events as $event): ?>
                <tr>
                    <td><?= htmlspecialchars($event['event_title']) ?></td>
                    <td><?= htmlspecialchars($event['event_description']) ?></td>
                    <td><?= htmlspecialchars(date("M d, Y h:i A", strtotime($event['event_start']))) ?></td>
                    <td><?= htmlspecialchars(date("M d, Y h:i A", strtotime($event['event_end']))) ?></td>
                    <td><?= htmlspecialchars($event['event_location']) ?></td>
                    <td class="status <?= htmlspecialchars($event['event_status']) ?>">
                        <?= htmlspecialchars($event['event_status']) ?>
                    </td>
                    <td><?= htmlspecialchars(date("M d, Y h:i A", strtotime($event['event_created_at']))) ?></td>
                    <td><?= htmlspecialchars($event['event_author']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
