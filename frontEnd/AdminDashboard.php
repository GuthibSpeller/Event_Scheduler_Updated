<?php
    include "../backEnd/adminController.php";
    $conn = new AdminController();
    $conn->connection();
    $users = $conn->readAdmin();
     $admin_id = $_SESSION['admin_id']; // GET LOGGED IN USER ID
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="styling/AdminDashboards.css">
    <script src="events.js" defer></script>
    <title>Super Admin Dashboard</title>
</head>

<body class="admin-body">

<!-- Admin Navbar -->
<div class="admin-navbar">
    <div class="navbar-left">
        <div class="navbar-logo">
            <i class="fas fa-user-cog fa-2x"></i>
        </div>
        <div class="navbar-title">Admin Panel</div>
        <div class="navbar-actions">
            <button onclick="window.location.href='displayAllEvents.php'">Display All Events</button>
            <button onclick="window.location.href='registerAdmin.php'">Register Admin</button>
            <button onclick="window.location.href='displayAllAdmin.php'">Display All Admin</button>
            <button onclick="window.location.href='adminCalendar.php'">Calendar</button>
        </div>
    </div>
    <div class="navbar-right">
        <button onclick="window.location.href='manageAccount.php?admin_id=<?= $admin_id ?>'">
            Manage Account&nbsp;
            <div class="fas fa-user-cog" style="font-size: 25px;"></div>
        </button> 
    </div>

     
</div>
    <h1 class="title">Organizations</h1>

    <!-- Main Tabs Container -->
    <div class="main-container">

        <!-- BYTe Tab -->
        <div class="tab-wrapper">
            <div class="tab-description">Body of young Information Technologists</div>
            <div class="tab-box">
                <div class="tab-left">
                    <a href="https://www.facebook.com/bsu.iit.byte" target="_blank" rel="noopener noreferrer">
                        <img src="images/BYTE_logo.png" alt="Byte Logo">
                    </a>
                </div>
                <a href="byte.php" class="tab-right">
                    <span class="tab-button">BYTE</span>
                </a>
            </div>
        </div>

        <!-- LISA Tab -->
        <div class="tab-wrapper">
            <div class="tab-description">Library and Information Sciences Association</div>
            <div class="tab-box">
                <div class="tab-left">
                    <a href="https://www.facebook.com/libraryandinformationscienceassociation" target="_blank" rel="noopener noreferrer">
                        <img src="images/LISA_logo.png" alt="Lisa Logo">
                    </a>
                </div>
                <a href="lisa.php" class="tab-right">
                    <span class="tab-button">LISA</span>
                </a>
            </div>
        </div>

        <!-- DevCom Tab -->
        <div class="tab-wrapper">
            <div class="tab-description">Development Communication Society</div>
            <div class="tab-box">
                <div class="tab-left">
                    <a href="https://www.facebook.com/BSUDevComSoc" target="_blank" rel="noopener noreferrer">
                        <img src="images/DEVCOM_logo.png" alt="Dev-Com Logo">
                    </a>
                </div>
                <a href="devcom.php" class="tab-right">
                    <span class="tab-button">DEV-COM</span>
                </a>
            </div>
        </div>

        <!-- Hyperlink Tab -->
        <div class="tab-wrapper">
            <div class="tab-description">The Hyperlink</div>
            <div class="tab-box">
                <div class="tab-left">
                    <a href="https://www.facebook.com/profile.php?id=61551883948704" target="_blank" rel="noopener noreferrer">
                        <img src="images/Hyperlink_logo.png"  alt="Hyperlink Logo">
                    </a>
                </div>
                <a href="hyperlink.php" class="tab-right">
                    <span class="tab-button">HYPERLINK</span>
                </a>
            </div>
        </div>

        <!-- SG Tab -->
        <div class="tab-wrapper">
            <div class="tab-description">BSU-CIS-Student Government</div>
            <div class="tab-box">
                <div class="tab-left">
                    <a href="https://www.facebook.com/profile.php?id=61551046561692" target="_blank" rel="noopener noreferrer">
                        <img src="images/SG_logo.png"  alt="Sg Logo">
                    </a>
                </div>
                <a href="sg.php" class="tab-right">
                    <span class="tab-button">SG</span>
                </a>
            </div>
        </div>



    </div>  
</body>
</html>
