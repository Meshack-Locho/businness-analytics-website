<?php

include "config.php";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("SELECT * FROM new_users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $details=$result->fetch_assoc();
        if (password_verify($password, $details["password"])) {
            echo "Successfully logged in";
            $_SESSION["name"] = $details["name"];
            $_SESSION["id"] = $details["id"];
            header("Location: dashboard.php?id=" . $details["id"]);
        }else{
            echo "Password is incorrect";
        }
    }else{
        echo "Email or password does not exist";
    }
}else{
    echo "An error Occured, Please try again";
}

?>