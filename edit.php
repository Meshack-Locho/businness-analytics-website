
<?php

session_start();
include "config.php";

if (!isset($_SESSION["id"])) {
    header("Location: loginform.php");
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user_id = $_SESSION["id"];

$stmt = $conn->prepare("SELECT * FROM new_users WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
$username = $row["name"];
$user_business_name = $row["business_name"];
$user_business_type = $row["business"];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
    $type = htmlspecialchars($_POST["type"], ENT_QUOTES, 'UTF-8');
    $employees = htmlspecialchars($_POST["employees"], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($_POST["description"], ENT_QUOTES, 'UTF-8');
    $regNo = htmlspecialchars($_POST["reg-no"], ENT_QUOTES, 'UTF-8');
    $location = htmlspecialchars($_POST["location"], ENT_QUOTES, 'UTF-8');

    echo "SUBMITTED";

    $stmt = $conn->prepare("SELECT * FROM business_info WHERE user_id=?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $results = $stmt->get_result();

    if ($results->num_rows > 0) {
        $row = $results->fetch_assoc();
        $stmt = $conn->prepare("UPDATE business_info SET name=?, type=?, employees=?, description=?, registration_number=?, location=? WHERE user_id=?");
        $stmt->bind_param("ssisisi", $name, $type, $employees, $description, $regNo, $location, $user_id);

            if ($stmt->execute()) {
                echo "<h2 class='response'>Your Business Information has been Updated Successfully</h2>";
            }else{
                echo "<h2 class='response'>Business Information has not been Updated Successfully. Please try again.</h2>"; 
            }
    }else{
            $stmt = $conn->prepare("INSERT INTO business_info (user_id, name, type, employees, description, registration_number, location) VALUES (?,?,?,?,?,?,?)");
            $stmt->bind_param("issisis", $user_id, $name, $type, $employees, $description, $regNo, $location);
            if($stmt->execute()){
                echo "<h2 class='response'>Your Business Information Has Been Created.</h2>";
            }else{
                echo "<h2 class='response'>Sorry, Something Went wrong, Your Business Information Has Not Been Created. Please Try Again</h2>";
            }
    }
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
                <a href="index.php"><i class="fa-solid fa-store"></i></a>
            </div>
            <div class="user-info">
                <i class="fa-solid fa-user user-icon"></i>
                <h4><?php echo htmlspecialchars($username)?></h4>
                  
                
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
            <div class="edit-options">

                <h2>Edit Your Business Information</h2>
                <?php


                    $stmt = $conn->prepare("SELECT * FROM business_info WHERE user_id=?");
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) { 
                        $row = $result->fetch_assoc();

                    
                        ?>
                        
                        <form method="post">
                            <label for="name">Business Name</label>
                            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user_business_name)?>">
                            <label for="type">Business Type</label>
                            <input type="text" name="type" id="type" value="<?php echo htmlspecialchars($user_business_type)?>">
                            <label for="employess">Number of Employees</label>
                            <input type="text" name="employees" id="employees" value="<?php echo htmlspecialchars($row["employees"])?>">
                            <label for="description">Business Description</label>

                            <textarea name="description" id="description" cols="30" rows="10"><?php echo htmlspecialchars($row["description"])?></textarea>

                            <label for="reg-no">Registration Number</label>
                            <input type="text" name="reg-no" id="reg-no" value="<?php echo htmlspecialchars($row["registration_number"])?>">
                            <label for="location">Business Location</label>
                            <input type="text" name="location" id="location" value="<?php echo htmlspecialchars($row["location"])?>">
                            <input type="submit" value="Save">
                        </form>
                    <?php }else{ ?>
                        <form method="POST" action="edit.php">
                            <label for="name">Business Name</label>
                            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user_business_name)?>">
                            <label for="type">Business Type</label>
                            <input type="text" name="type" id="type" value="<?php echo htmlspecialchars($user_business_type)?>">
                            <label for="employees">Number of Employees</label>
                            <input type="text" name="employees" id="employees">
                            <label for="description">Business Description</label>
                            <textarea name="description" id="description" cols="30" rows="10"></textarea>
                            <label for="reg-no">Registration Number</label>
                            <input type="text" name="reg-no" id="reg-no">
                            <label for="location">Business Location</label>
                            <input type="text" name="location" id="location" >
                            <input type="submit" value="Save">
                        </form>
                    <?php }
                ?>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="main.js"></script>
    
    <script>
        let responses = document.querySelector(".response")

       
            setTimeout(()=>{
                responses.classList.add("inactive")
            }, 5000)
            
    </script>
    
</body>
</html>