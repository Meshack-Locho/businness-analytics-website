<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to account</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <form action="login.php" method="post">
            <label for="email">Email</label>
            <div>
            <input type="email" name="email" id="email" required placeholder="Enter your email">
            <i class="fa-solid fa-envelope"></i>
            </div>

            <label for="password">Password</label>
            <div>
            <input type="password" name="password" id="password" required placeholder="Enter your password" autocomplete="off">
            <i class="fa-solid fa-eye-slash see-pass"></i>
            <i class="fa-solid fa-key"></i>
            </div>

            <input type="submit" value="Login">

            <h4>Do not have an accoun? <a href="signupform.php">Sign up</a></h4>
        </form>

        <img src="images/earth img dark1.jpg" alt="" class="side-image">
    </div>
    <script src="main.js"></script>
</body>
</html>