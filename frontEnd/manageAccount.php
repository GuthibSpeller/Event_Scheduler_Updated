<?php
include "../backEnd/adminController.php";

// Initialize Controller
$connect = new adminController();
$connect->connection();

$passwordError = isset($_GET['password_error']) ? true : false;

$admin_id = (int) $_GET['admin_id'];
$use_get = $connect->update_take_data($admin_id);
$homePage = $connect->HomePage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styling/manageAccount.css">
    <script src="eventscript.js" defer></script>
    <title>Manage Account</title>
</head>
<body>
    <div class="navbar">
        <div class="nav-left">My Account</div>
        <div class="nav-right">
            <button id="openModal">Change Password</button>

            <form action="../backEnd/adminController.php?method_finder=logout" method="POST" onsubmit="return confirm('Are you sure you want to log out');">
                <button type="submit">Logout</button>
            </form>

            <form action="../backEnd/adminController.php?method_finder=deleteMyAccount" method="POST" 
                onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone!');">
                <input type="hidden" name="delete_my_acc" value="<?= $use_get['admin_id'] ?>">
                <button type="submit">Delete My Account</button>
            </form>
        </div>
    </div>

    <!--Main Table -->
    <div id="edit-account-container">
        <div class="inner-title">Update User Name</div>
        <form action="../backEnd/adminController.php?method_finder=updateData" method="post">
            <input type="hidden" name="admin_id" value="<?=htmlspecialchars($use_get['admin_id']) ?>">
            
            <label>First Name</label>
            <input type="text" name="fname" value="<?= htmlspecialchars($use_get['fname']) ?>" readonly>

            <label>Last Name</label>
            <input type="text" name="lname" value="<?= htmlspecialchars($use_get['lname']) ?>" readonly>

            <label>Username</label>
            <input type="text" name="username" value="<?= htmlspecialchars($use_get['username']) ?>" required>

            <label>Office</label>
            <input type="text" name="office" value="<?= htmlspecialchars($use_get['office']) ?>" readonly>

            <button type="submit">Update</button>
            <button type="button" onclick="window.location.href='<?= $homePage ?>'">Home</button>
        </form>
    </div>

    <!-- modal to confirm password before changing -->
    <div class="modal" id="passwordModal">
        <div class="modal-content">
            <h3>Confirm Current Password</h3>
            <form action="../backEnd/adminController.php?method_finder=checkPassword" method="post">

                <input type="hidden" name="admin_id" value="<?= $use_get['admin_id'] ?>">

                <label>Enter Current Password</label><br>
                <input type="password" name="admin_password" required>
                 <?php if ($passwordError): ?>
                    <div class="confirm-pass-error-message-container">
                        <p class="confirm-pass-error-message">Incorrect password. Please try again.</p>
                    </div>

                    
                <?php endif; ?>  
                <br>
                <br>

                <button type="submit">Confirm</button>
                <button type="button" id="closeModal">Cancel</button>
            </form>
        </div>
    </div>

<!--Change password modal handler -->
    <script>
    // Get elements
    const openModalBtn = document.getElementById('openModal');
    const closeModalBtn = document.getElementById('closeModal');
    const passwordModal = document.getElementById('passwordModal');

    // Open modal
    openModalBtn.addEventListener('click', () => {
        passwordModal.style.display = 'flex'; // flex to center modal
    });

    // Close modal
    closeModalBtn.addEventListener('click', () => {
        passwordModal.style.display = 'none';   
    });

    // Close modal if click outside content
    window.addEventListener('click', (e) => {
        if (e.target === passwordModal) {
            passwordModal.style.display = 'none';
        }
    });

    //maintains the modal when error appears
    if (window.location.search.includes("password_error=1")) {
        document.getElementById("passwordModal").style.display = "flex";
    
        document.addEventListener('DOMContentLoaded', () => {
            hideConfirmPassErrorOnClickOutside();
        });
}
</script>
</body>
</html
