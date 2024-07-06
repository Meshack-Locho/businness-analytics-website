<?php

session_start();
include "config.php";

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $token = md5(uniqid(rand(), true));

    $stmt = $conn->prepare("SELECT * FROM new_users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $stmt = $conn->prepare("INSERT INTO pass_reset (email, token) VALUES (?,?)");
        $stmt->bind_param("si", $email, $token);
        if ($stmt->execute()) {
            $reset_link = "http://localhost:8080/mysite/design1/pass-reset2.php?email=$email&token=$token";
            $mail = new PHPMailer(true);

            try{
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = "meshacklocho5@gmail.com";
                $mail->Password = "udfu jtgj ldah wzth";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;


                $mail->setFrom("meshacklocho@meshacklocho.co.ke", "Meshack Locho");
                $mail->addAddress($email, $name);
                $mail->addReplyTo("meshacklocho@meshacklocho.co.ke", "Meshack Locho");


                $mail->isHTML(true);
                $mail->Subject = "PASSWORD RESET";
                $mail->Body = "<html>
                                 <h4>Hey $name Click this link to reset your password</h4>
                                 <p><a href='$reset_link'>Reset Link</a></p>
                               </html>";
                $mail->AltBody = 'You mail does not support HTML elements';

                $mail->send();

                echo "<div class='self-response'>
                            <h2>An email has been sent to $email, If you did not receive it, check your spam folder.</h2>
                            <button>Go Back</button>  
                      </div>";
                }catch (Exception $e){
                    echo "<div class='self-response'>
                                <h2>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</h2>
                                <button>Go Back</button>   
                          </div>";
                }

                
        }else{
            echo "<div class='self-response'>
                    <h2>Sorry, something went wrong when executing. Please Try again.</h2>
                  </div>";
        }
    }else{
        echo "<div class='self-response'>
                    <h2>No user with that email was found.</h2>
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
            <h2>Forgotten you password? No problem, just enter your email down below.</h2>
            <label for="email">Enter Your Email</label>
            <div>
            <input type="email" name="email" id="email" required placeholder="Enter your email">
            <i class="fa-solid fa-envelope"></i>
            </div>

            <input type="submit" value="Send Link">
        </form>

        <img src="images/earth img dark1.jpg" alt="" class="side-image">
    </div>
    <script src="main.js"></script>

    <script>
        let responses = document.querySelector(".self-response")

       
            setTimeout(()=>{
                responses.classList.add("inactive")
            }, 10000)
            
    </script>
</body>
</html>