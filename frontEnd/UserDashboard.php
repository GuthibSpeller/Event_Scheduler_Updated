<?php
    include "../backEnd/adminController.php";
    $conn = new AdminController();
    $conn->connection();
    $users = $conn->readAdmin();
    $homePage = $conn->HomePage();
    $admin_id = $_SESSION['admin_id']; // GET LOGGED IN USER ID    

    // Get the logged-in user's info (assuming username is stored in session) to be displayed on the title
    $currentUserOrg = '';
    if (isset($_SESSION['username'])) {
        $userInfo = $conn->getUserByUsername($_SESSION['username']); 
        if ($userInfo) {
            $currentUserOrg = $userInfo['office']; 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="styling/UserDashboards.css">
    <script src="eventscript.js" defer></script>
    <title>Admin Dashboard</title>
</head>
<body>

<?php if (isset($_GET['office_error'])): ?>
    <div class="error-message-container">
        <p class="error-message">You can't access this page!</p>
        <p class="disorg">You can only access <?php echo htmlspecialchars($currentUserOrg); ?></p>

    </div>
<?php endif; ?>

<div class="user-navbar">
    <div class="user-navbar-left">
        <div class="user-navbar-logo">
            <i class="fas fa-user-cog fa-2x"></i>
        </div>

        <div class="user-navbar-title">
            Event Manager
        </div>
    </div>

    <div class="user-navbar-right">
    <div class="calendar-container">
        <button onclick="window.location.href='adminCalendar.php'">Calendar</button>
    </div>

    <button class="manage-account-btn" onclick="window.location.href='manageAccount.php?admin_id=<?= $admin_id ?>'">
        Manage Account
        <div class="fas fa-user-cog" style="font-size: 25px;"></div>
    </button>
</div>

</div>

<h1 class="title">
    Organization: <?php echo htmlspecialchars($currentUserOrg); ?>
</h1>

<!-- Main container for all tabs -->
<div class="main-container">

    <!-- Tab 1 -->
<div class="tab-wrapper">
    <div class="tab-description">Body of Young Information Technologists</div>
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

    <!-- Tab 2 -->
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

    <!-- Tab 3 -->
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

    <!-- Tab 4 -->
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

    <!-- Tab 5 -->
    <div class="tab-wrapper">
        <div class="tab-description">BSU-CIS-Student Government</div>
        <div class="tab-box">
            <div class="tab-left">
                <a href="https://www.facebook.com/BSUDevComSoc" target="_blank" rel="noopener noreferrer">
                    <img src="images/SG_logo.png" alt="Sg Logo">
                </a>
            </div>
            <a href="sg.php" class="tab-right">
                <span class="tab-button">SG</span>
            </a>
        </div>
    </div>

</div>

<script>
    //Makes the one click function work
        document.addEventListener('DOMContentLoaded', () => {
            hideErrorOnClickOutside('.error-message-container');
        });
</script>

</body>
</html>
