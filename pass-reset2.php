
<?php

session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_GET["email"];
    $token = $_GET["token"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $stmt=$conn->prepare("UPDATE new_users SET password=? WHERE email=?");
    $stmt->bind_param("ss", $password, $email);
    if ($stmt->execute()) {
        echo "<div class='self-response'>
                    <h2>Password Has been Reset Successfully. Go to <a href='loginform.php'>Login</a></h2>
                </div>";
    }else{
        echo "<div class='self-response'>
                    <h2>Sorry, something went wrong in the reset process. Please Try again.</h2>
                </div>";
    }
    $stmt->close();
    $conn->close();

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Password Reset</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <form method="post">
            <a href="index.php">< Home</a>
            <label for="password">Enter Your new password below</label>
            <div>
            <input type="password" name="password" id="password" required placeholder="Enter your password" autocomplete="off">
            <i class="fa-solid fa-eye-slash see-pass"></i>
            <i class="fa-solid fa-key"></i>
            </div>

            <input type="submit" value="Reset Password">

        </form>

        <img src="images/earth img dark1.jpg" alt="" class="side-image">
    </div>
    <script src="main.js"></script>
</body>
</html>