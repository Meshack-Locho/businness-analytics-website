
<?php

session_start();
include "config.php";
if (!isset($_SESSION["id"])) {
    header("Location: loginform.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div id="header">
        <div class="navigation">
            <nav>
                <ul>
                    <li><a href="#">App</a></li>
                    <li><a href="#">Plans</a></li>
                </ul>
            </nav>
            <i class="fa-solid fa-bars options-toggle"></i>
        </div>
    </div>
    <div class="options">
            <i class="fa-solid fa-circle-xmark options-toggle"></i>
            <div class="logo">
                <a href=""><i class="fa-solid fa-store"></i></a>
            </div>
            <div class="user-info">
                <i class="fa-solid fa-user user-icon"></i>
                <h4><?= $_SESSION["name"]?></h4>
                  
                
            </div>
        <nav>
        <ul>
            <li><a href="dashboard.php">Account <i class="fa-solid fa-user"></i></a></li>

            <li><a href="analytics.php">Sales Analytics <i class="fa-solid fa-chart-pie"></i></a></li>

            <li><a href="inbox.php">Inbox <i class="fa-solid fa-envelope"></i></a></li>

            <li><a href="edit.php">Edit Info <i class="fa-solid fa-edit"></i></a></li>

            <li><a href="logout.php">Logout <i class="fa-solid fa-person-through-window"></i></a></li>
        </ul>
        </nav>
    </div>

    <div class="dashboard-content">
        <div class="chart-container">
            <div class="messages">
                <h2>You currently Don't have any messages.</h2>
                <i class="fa-solid fa-envelope"></i>
            </div>
        </div>
    </div>

    <script src="main.js"></script>
</body>
</html>