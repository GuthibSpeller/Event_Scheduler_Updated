<?php
    include "../backEnd/adminController.php";
    $conn = new AdminController();
    $conn -> connection();
    $users = $conn-> readAdmin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling/displayalladmins.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Super Admin Dashboard</title>
</head>
<body>

    <!-- PAGE TITLE -->
    <nav class="navbar">
        <div class="logo"><i class="fa-solid fa-users"></i></div>
        <p class="title">Registered Admins</p>
        <button class="back-btn" onclick="window.location.href='AdminDashboard.php'">Back</button>
    </nav>

    <!-- GLASS TABLE CONTAINER -->
    <div class="table-container">
        <table class="glass-table">
            <thead>
                <tr>
                    <th>First&nbsp;Name</th>
                    <th>Last&nbsp;Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Office</th>
                    <th>Is&nbsp;Admin</th>
                    <th>Created&nbsp;At</th>
                    <th>Remove</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['fname']) ?></td>
                    <td><?= htmlspecialchars($user['lname']) ?></td>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['office']) ?></td>
                    <td><?= $user['is_ultimate_admin'] == 1 ? 'Yes' : 'No' ?></td>
                    <td><?= htmlspecialchars(date("M d, Y h:i A", strtotime($user['admin_created_at']))) ?></td>

                     <td >
                        <form action="../backEnd/adminController.php?method_finder=deleteAdmin" method="POST" onsubmit="return confirm('Are you sure you want to delete this admin?');" class="delete-event-form">
                            <input type="hidden" name="delete_admin_id" value="<?= $user['admin_id'] ?>">
                            <button type="submit" class="btnDelete"><i class="fa-solid fa-delete-left"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</body>
</html>
