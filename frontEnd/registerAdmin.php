<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styling/registerAdmins.css">
    <script src="eventscripts.js" defer></script>
    <title>Super Admin Dashboard</title>
</head>
<body class="login-page">

    <!-- Fixed title container outside form -->
    <div class="title-container">
        <div class="logo">
            <i class="fa-solid fa-address-card"></i>
        </div>
        <p class="title">Register Admin</p>
    </div>

    <div class="form-container">
        <form class="register-form" action="../backEnd/AdminController.php?method_finder=register_admin" method="POST" onsubmit="return validatePassword();">    
            <div class="input-container">
                <input type="text" name="fname" placeholder="First Name" required>
                <input type="text" name="lname" placeholder="Last Name" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>

                <select name="office" class="select-control" required>
                    <option value="" disabled selected>Select Office</option>
                    <option value="BYTe">BYTE</option>
                    <option value="LISA">LISA</option>
                    <option value="DevCom">DEVCOM</option>
                    <option value="Hyperlink">HYPERLINK</option>
                    <option value="SG">SG</option>
                </select>
            </div>

            <!-- Radio group -->
            <div class="radio-group-container">
                <div class="radio-title">Set registrant as:</div>
                <div class="radio-group">
                    <label><input type="radio" name="is_ultimate_admin" value="1">Admin</label>
                    <label><input type="radio" name="is_ultimate_admin" value="0" checked>User</label>
                </div>
            </div>

            <!-- Passwords -->
            <div class="input-container">
                <input type="password" name="admin_password" id="admin_password" placeholder="Password" required>
                <input type="password" name="admin_confirm" id="admin_confirm" placeholder="Confirm Password" required>
                <p id="error" style="display:none; color:red; font-weight:bold;">Password do not match</p>
            </div>

            <button type="submit" class="subbutton">Register</button>
            <button type="button" class="backbutton" onclick="window.location.href='AdminDashboard.php'">Back</button>

        </form>
    </div>

</body>
</html>
