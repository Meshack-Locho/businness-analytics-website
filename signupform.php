<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User Sign up</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">

        <form action="signup.php" method="post">
            <label for="name">Name</label>
            <div>
                <input type="text" name="name" id="name" required placeholder="Enter your name" autocomplete="off">
                <i class="fa-solid fa-user"></i>
            </div>
            <label for="email">Email Address</label>
            <div>
            <input type="email" name="email" id="email" required autocomplete="off" placeholder="Enter your email">
            <i class="fa-solid fa-envelope"></i>
            </div>
            <label for="password">Password</label>
            <div>
            <input type="password" name="password" id="password" required placeholder="Enter your password" autocomplete="off">
            <i class="fa-solid fa-eye-slash see-pass"></i>
            <i class="fa-solid fa-key"></i>
            </div>
            <label for="business-type">Type of Business</label>
            <select name="business" id="business-type">
                <option value="select one">Select one</option>
                <option value="Sole proprietorship">Sole proprietorship</option>
                <option value="Patnership">Patnership</option>
                <option value="Corporation">Corporation</option>
                <option value="Non-Profit Organization">Non-Profit Organization</option>
                <option value="Limited Liability Company (LLC)">Limited Liability Company (LLC)</option>
            </select>
            <label for="question">How did you hear about us?</label>
            <select name="question" id="question">
                <option value="select one">Select one</option>
                <option value="youtube">YouTube</option>
                <option value="twitter">Twitter</option>
                <option value="instagram">Instagram</option>
                <option value="other">Other</option>
            </select>
            <input type="submit" value="Sign up" id="submit-btn">
            <h4>Already have an account? <a href="loginform.php">Login</a></h4>
        </form>

        <img src="images/earth img dark1.jpg" alt="" class="side-image">

        
    </div>
    <script src="main.js"></script>
</body>
</html>