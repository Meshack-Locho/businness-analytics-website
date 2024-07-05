<?php

include "config.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT);
$business = $_POST["business"];
$question = $_POST["question"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = mysqli_query($conn, "SELECT * FROM new_users WHERE email = '$email'");
    if (mysqli_num_rows($query)>0) {
        echo "<h2>Email Already in use</h2><button onclick='history.back'>Go back</button>";
    } else {
        $stmt = $conn->prepare("INSERT INTO new_users (name, email, password, business, question) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $name, $email, $password, $business, $question); 
        $stmt->execute();
        $result = $stmt->get_result();

        $_SESSION["name"] = $name;
        echo "Signed up sucessfully";
    }
    

} else {
    echo "Something went wrong";
}

?>