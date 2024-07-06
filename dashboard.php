<?php

session_start();
include "config.php";
if (!isset($_SESSION["name"])) {
    header("Location: loginform.php");
}

$user_id = $_SESSION["id"];


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
                <?php
                    if (isset($_SESSION["name"])) {?>
                        <h4><?= $_SESSION["name"]?></h4>
                    <?php }
                ?>
                
            </div>
        <nav>
        <ul>
            <li><a href="dashboard.php">Account <i class="fa-solid fa-user"></i></a></li>
            <li><a href="analytics.php">Sales Analytics <i class="fa-solid fa-chart-pie"></i></a></li>
            <li><a href="">Inbox <i class="fa-solid fa-envelope"></i></a></li>
            <li><a href="edit.php">Edit Info <i class="fa-solid fa-edit"></i></a></li>
            <li><a href="logout.php">Logout <i class="fa-solid fa-person-through-window"></i></a></li>
        </ul>
        </nav>
    </div>

    <div class="dashboard-content">
        <div class="chart-container">
            <div class="personal-details">
                <h2>Personal Details</h2>
                <?php
                
                $stmt = $conn->prepare("SELECT * FROM new_users WHERE id=?");
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $username = $row['name'];
                $useremail = $row["email"];
                $phoneNumber = $row["phone"];
                ?>
                    <ul>
                        <li>Full Name: <?php echo htmlspecialchars($username)?></li>
                        <li>Email Address: <?php echo htmlspecialchars($useremail)?></li>
                        <li>Phone Number: +<?php echo htmlspecialchars($phoneNumber)?></li>
                    </ul>
            </div>

            <div class="business-information">
                <h2>Business Information</h2>
                <?php
                    $stmt = $conn->prepare("SELECT * FROM business_info WHERE user_id=?");
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $business_name = $row["name"];
                        $business_type = $row["type"];
                        $employees = $row["employees"];
                        $description = $row["description"];
                        $regNo = $row["registration_number"];
                        $location = $row["location"];
                    }else{
                        $business_name = "Not Set";
                        $business_type = "Not Set";
                        $employees = "Not Set";
                        $description = "Not Set";
                        $regNo = "Not Set";
                        $location = "Not Set";
                    }

                ?>
                <ul>
                    <li>Business Name: <?php echo htmlspecialchars($business_name)?></li>
                    <li>Type of Business: <?php echo htmlspecialchars($business_type)?></li>
                    <li>Number of Employees: <?php echo htmlspecialchars($employees)?></li>
                    <li>Business Description:<br><br> <p> <?php echo htmlspecialchars($description)?> <p></li>
                    <li>Registration Number: <?php echo htmlspecialchars($regNo)?></li>
                    <li>Business Location: <?php echo htmlspecialchars($location)?></li>
                    <li>All Time Revenue: </li>
                    <li>Recent Profit (6 months): </li>
                    <li>Currency: USD </li>
                </ul>
            </div>
        
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="main.js"></script>
    
    
</body>
</html>