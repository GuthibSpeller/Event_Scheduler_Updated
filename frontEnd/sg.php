<?php 
    include "../backEnd/sgController.php";

    // Initialize Controller
    $connect = new Controller();
    $connect->connection();

    // Check if an ID was provided (from edit redirect)
    $use_get = null;
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = (int) $_GET['id']; // convert to int safely
        $use_get = $connect->update_take_data($id);
    }
    $events = $connect-> readSg();

    // Get sort and filter from GET request
    $sort = $_GET['sort'] ?? "nearest";
    $filter = $_GET['filter'] ?? "all";

    if ($sort && $filter) {
        $events = $connect->sortAndfilter($events, $sort, $filter);
    }

    require "../backEnd/AdminController.php";
    $admin = new AdminController();
    $admin->officeCheck("Hyperlink");
    $homePage = $admin->HomePage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styling/AdminAllOrgs.css">
    <script src="eventscript.js" defer></script>
    <title>BYTE</title>
</head>

<body>
    <!-- pop up add event -->
    <div id="eventAddModal" class="modal" style="display: none">
        <form class="modal-form" action="../backEnd/sgController.php?method_finder=create" method="post" onsubmit="return validateEvent();">
            <h3 class="modal-title">Create Event</h3> 
            <div>
                <label for="event_title">Event Title</label>
                <input type="text" id="event_title" name="event_title" required class="modal-input">
            </div>  
            <br>
            <div>
                <label for="event_description">Description</label>
                <textarea id="event_description" name="event_description" rows="4" class="modal-input"></textarea>
            </div>
            <br>
            <div>
                <label for="event_start">Start Time</label>
                <input type="datetime-local" id="event_start" name="event_start" required class="modal-input">
            </div>
            <br>
            <div>
                <label for="event_end">End Time</label>
                <input type="datetime-local" id="event_end" name="event_end" required class="modal-input">
                <p id="error" class="modal-error" style="display:none;">Event end date cannot be earlier than event start date.</p>
            </div>
            <br>
            <div>
                <label for="event_location">Location</label>
                <input type="text" id="event_location" name="event_location" class="modal-input">
            </div>
            <br>
            <button type="submit" class="modal-submit" id="submit_button" name="submit_button">Create Event</button>
            <button type="button" class="modal-cancel" onclick="closeModal()">Cancel</button>
        </form>
    </div>
    <!-- until dito -->

    <!-- pop up edit event -->
    <?php if ($use_get): ?>
    <div id="eventEditModal" class="modal" style="display: flex">
        <form class="modal-form" action="../backEnd/sgController.php?method_finder=update" method="post">
            <h4 class="modal-title">Update Event</h4>
            <div>
                <input type="hidden" name="id" value="<?=htmlspecialchars($use_get['id']) ?>">
            </div>
            <br>
            <div>
                <label for="event_title">Event Title</label>
                <input type="text" name="event_title" value="<?= htmlspecialchars($use_get['event_title']) ?>" required class="modal-input">
            </div>
            <br>
            <div>
                <label for="event_description">Description</label>
                <textarea name="event_description" rows="4" cols="40" class="modal-input"><?= htmlspecialchars($use_get['event_description']) ?></textarea>
            </div>
            <br>
            <div>
                <label for="update_start">Start Time</label>
                <input type="datetime-local" name="event_start" value="<?= htmlspecialchars($use_get['event_start']) ?>" required class="modal-input">
            </div>
            <br>
            <div>
                <label for="update_end">End Time</label>
                <input type="datetime-local" name="event_end" value="<?= htmlspecialchars($use_get['event_end']) ?>" required class="modal-input">
                <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_date'): ?>
                    <p class="modal-error" style="color:red; font-weight:bold;">    
                        Event end date cannot be earlier than event start date.
                    </p>
                <?php endif; ?>
            </div>
            <br>
            <div>
                <label for="event_location">Location</label>
                <input type="text" name="event_location" value="<?= htmlspecialchars($use_get['event_location']) ?>" class="modal-input">
            </div>
            <br>
            <div>
                <label for="event_status">Status</label>
                <select name="event_status" required class="modal-input">
                    <option value="Pending" <?= ($use_get['event_status'] == 'pending') ? 'selected' : '' ?>>Pending</option>
                    <option value="Completed" <?= ($use_get['event_status'] == 'completed') ? 'selected' : '' ?>>Completed</option>
                    <option value="Cancelled" <?= ($use_get['event_status'] == 'cancelled') ? 'selected' : '' ?>>Cancelled</option>
                </select>
            </div>
            <br>
            <button type="submit" class="modal-submit">Update Event</button>
            <button type="button" class="modal-cancel" onclick="closeModal()">Cancel</button>
        </form>
    </div>
    <?php endif; ?>
</body>

<!-- Dashboard Navbar -->
<nav class="dashboard-navbar">
    <!-- Left: Logo + Title -->
    <div class="dashboard-navbar-logo-side">
        <div class="dashboard-navbar-logo">
            <i class="fa-solid fa-building-user"></i>
        </div>
        <span class="dashboard-navbar-title">Organization: SG </span>
    </div>

    <form method="GET" id="formEventFilters" class="dashboard-filters">
            <select name="sort" id="sortEvents" class="filterSort" onchange="document.getElementById('formEventFilters').submit()">
                <option disabled selected>-- Sort Events --</option>
                <option value="nearest" <?= ($sort=="nearest"?"selected":"") ?>>Nearest Events</option>
                <option value="farthest" <?= ($sort=="farthest"?"selected":"") ?>>Farthest Events</option>
            </select>
            <select name="filter" id="filterEvents" class="filterStatus" onchange="document.getElementById('formEventFilters').submit()">
                <option disabled selected>-- Filter Events --</option>
                <option value="all" <?= ($filter=="all"?"selected":"") ?>>All</option>
                <option value="pending" <?= ($filter=="pending"?"selected":"") ?>>Pending</option>
                <option value="completed" <?= ($filter=="completed"?"selected":"") ?>>Completed</option>
                <option value="cancelled" <?= ($filter=="cancelled"?"selected":"") ?>>Cancelled</option>
            </select>
        </form>

    <div class="dashboard-navbar-right">
        <button id="btnAddEvent" class="btnAddEvent" onclick="openAddModal()"><i class="fa-solid fa-plus"></i> Event</button>
        <button id="btnDashboardHome" class="btnHome" onclick="window.location.href='<?= $homePage ?>'"><i class="fa-solid fa-house"></i></button>
    </div>
</nav>


    <!-- Events Table -->
    <table id="eventsTable" class="dashboard-table">
        <thead class="table-header">
            <tr class="table-row">
                <th class="table-cell">Title</th>
                <th class="table-cell">Description</th>
                <th class="table-cell">Start Time</th>
                <th class="table-cell">End Time</th>
                <th class="table-cell">Location</th>
                <th class="table-cell">Status</th>
                <th class="table-cell">Created At</th>
                <th class="table-cell">Author</th>
                <th class="table-cell">Actions</th>
            </tr>
        </thead>
        <tbody class="table-body">
            <?php foreach($events as $event): ?>
            <tr class="table-row">
                <td class="table-cell"><?= htmlspecialchars($event['event_title']) ?></td>
                <td class="table-cell"><?= htmlspecialchars($event['event_description']) ?></td>
                <td class="table-cell"><?= htmlspecialchars(date("M d, Y h:i A", strtotime($event['event_start']))) ?></td>
                <td class="table-cell"><?= htmlspecialchars(date("M d, Y h:i A", strtotime($event['event_end']))) ?></td>
                <td class="table-cell"><?= htmlspecialchars($event['event_location']) ?></td>
                <td class="table-cell"><?= htmlspecialchars($event['event_status']) ?></td>
                <td class="table-cell"><?= htmlspecialchars(date("M d, Y h:i A", strtotime($event['event_created_at']))) ?></td>
                <td class="table-cell"><?= htmlspecialchars($event['event_author']) ?></td>
                <td class="table-cell">
                     <form id="editForm" action="../backEnd/sgController.php?method_finder=edit" method="post" class="edit-event-form">
                            <input type="hidden" name="method_finder" value="edit">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($event['id'])?>">
                            <button type="submit" class="btnEdit"><i class="fa-solid fa-pen-to-square"></i></button>
                        </form>
                        <form action="../backEnd/sgController.php?method_finder=delete" method="get" style="display: inline;" class="delete-event-form">
                            <input type="hidden" name="method_finder" value="delete">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($event['id'])?>">
                            <button type="submit" class="btnDelete" onclick="return confirm('Are you sure you want to delete')"><div class="fa-solid fa-delete-left"></button>
                        </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

  <!--Shake modal when clicking outside the add and edit page(admin)-->   
        <script>
            function shakeModalOnOutsideClick(modalId) {
                const modal = document.getElementById(modalId);
                if (!modal) return;

                modal.addEventListener('click', (e) => {
                    const form = modal.querySelector('.modal-form');
                    if (!form.contains(e.target)) {
                        form.classList.remove('shake'); // reset animation
                        void form.offsetWidth; // force reflow
                        form.classList.add('shake');
                    }
                });
            }

            // Wait for DOM to be fully loaded before calling
            document.addEventListener('DOMContentLoaded', () => {
                shakeModalOnOutsideClick('eventAddModal');
                shakeModalOnOutsideClick('eventEditModal');
            });
        </script>
</body>
</html>
