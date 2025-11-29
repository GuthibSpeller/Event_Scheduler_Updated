<?php
include "../backEnd/adminController.php";
$controller = new AdminController();
$controller->connection();

$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = $controller->login_admin();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styling/LoginPage.css">
    <script src="eventscript.js" defer></script>
    <title>Log-in Page</title>
</head>

<?php if (isset($_GET['login_error'])): ?>
     <div class="login-error-message-container">
        <p class="login-error-message">Invalid username or password!</p>
    </div>
    <?php endif; ?>

<body class="login-page">
    <div class="login-wrapper">
        <div class="login-left">
            <img src="images/CIS_logo.png" alt="Logo">
            <h2>Welcome Back!</h2> <div class="waving-hand"><i class="fa-solid fa-hand"></i></div>
            <p class="right-pointer">Access the panel</p>
        </div>

        <div class="login-right">
            <div class="login-container">
                <form action="../backEnd/AdminController.php?method_finder=login_admin" method="POST">
                    <fieldset class="fieldset">
                        <legend class="login-title"><i class="fa-solid fa-users"></i></i></legend>

                        <fieldset class="login-fieldset">
                            <div class="user-name">
                                <i class="fas fa-user"></i>                                
                                <input type="text" name="username" placeholder="Username" autofocus required>
                            </div>

                            <div class="password">
                                <i class="fas fa-key"></i>
                                <input type="password" name="admin_password" placeholder="Password" required >
                            </div>

                        </fieldset>
                        <button class="subbutton">Log-In<i class="fa-solid fa-right-to-bracket"></i></button>
                        <button onclick="window.location.href='calendar.php'" class="backbutton">Back<i class="fa-solid fa-arrow-right-from-bracket"></i></button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <script>
        //Makes the one click function work
        document.addEventListener('DOMContentLoaded', () => {
            hideLoginErrorOnClickOutside('.login-error-message-container');
        });

    </script>
</body>s

</html>

