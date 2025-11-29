
<?php
    include "../backEnd/adminController.php";
    $conn = new AdminController();
    $conn -> connection();
    $admin_id = $_GET['admin_id']; // GET ADMIN ID FROM URL
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Create New Password</title>
    <link rel="stylesheet" href="styling/newPassword.css">
    <script src="eventscript.js" defer></script>
</head>
<body class="login-page">
    <div class="login-wrapper">
        <!-- Left Panel -->
        <div class="login-left">
            <div class="waving-hand"><i class="fa-solid fa-hand"></i></div>
            <h2>Welcome Back!</h2>
            <p>Please create your new password securely.</p>
        </div>

        <!-- Right Panel -->
        <div class="login-right">
            <div class="login-container">
                <h2 class="login-title">Create New Password</h2>
                <form action="../backEnd/adminController.php?method_finder=changePassword" method="post" onsubmit="return validateNewPassword();">
                    <input type="hidden" name="admin_id" value="<?= htmlspecialchars($admin_id) ?>">
                    
                    <label for="new_password">New Password:</label>
                    <input type="password" name="new_password" id="new_password" placeholder="Enter new password" required>
                    
                    <label for="confirm_new_password">Confirm Password:</label>
                    <input type="password" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm password" required>
                    
                        <p id="error" class="error-message">Passwords do not match.</p>

               
                    
                    <button type="submit" class="subbutton">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

