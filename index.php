
<?php

session_start();
include "config.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design 1</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header id="header">
        <div class="navigation">
            <div class="logo">
                <a href="#"><i class="fa-solid fa-store"></i></a>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">App</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Partnerships</a></li>
                    <?php

                        if (isset($_SESSION["id"])) { ?>
                            <li id="username">
                                 <span><?= $_SESSION["name"]?></span>
                                 <div class="user-options">
                                    <a href="dashboard.php">My Account</a>
                                    <a href="analytics.php">My Analytics</a>
                                    <a href="inbox.php">My Inbox</a>
                                    <a href="logout.php">Logout</a>
                                 </div>
                            </li>
                        <?php }else{ ?>
                            <li class="sign-up"><a href="signupform.php">Sign up</a></li>
                            <li class="log-in"><a href="loginform.php">Log in</a></li>
                        <?php }

                    ?>
                </ul>
            </nav>
            <a href="#" class="app-link">Try app</a>
            <div class="nav-background"></div>
            <i class="fa-solid fa-bars menu-toggle"></i>

        </div>


        <div class="mobile-menu">

        <i class="fa-solid fa-xmark menu-toggle"></i>
        <div class="logo">
                <a href="#"><i class="fa-solid fa-store"></i></a>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">App</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Partnerships</a></li>
                    <?php

                        if (isset($_SESSION["id"])) { ?>
                            <li id="username">Welcome <?= $_SESSION["name"]?></li>
                        <?php }else{ ?>
                            <li class="sign-up"><a href="signupform.php">Sign up</a></li>
                            <li class="log-in"><a href="loginform.php">Log in</a></li>
                        <?php }

                    ?>
                </ul>
            </nav>
            <a href="#" class="app-link">Try app</a>
            <div class="nav-background"></div>
        </div>

        <img src="images/earth hero 1.jpg" alt="" class="header-bg-image">
        <div class="header-overlay"></div>
        <div class="stats-circle">
            
        </div>

        <div class="header-text-big">
            <h1 class="main-header">Welcome to Our Website</h1>
            <h3>Your business can now be taken care of with a click of a button</h3>
            <a href="">Explore</a>
        </div>

        <h2 class="stats-heading">Stats</h2>
    </header>

    <main>
        <section class="stats animate">
            <div>
                <h2>600+</h2>
                <h5>Powered Businesses</h5>
            </div>
            <div>
                <h2>4,000+</h2>
                <h5>Locations</h5>
            </div>
            <div>
                <h2>20+</h2>
                <h5>Countries Covered</h5>
            </div>
            <div>
                <h2>3,000+</h2>
                <h5>Powered Cities</h5>
            </div>
        </section>

        <section class="benefits">
            <div class="animate">
                <img src="images/coins.png" alt="" class="img1">
                <span>
                    <h4>Boost your earnings</h4>
                    <p>Boost your earning by quickly accepting different payment options through our platform.</p>
                </span>
                <a href=""><i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="animate">
                <img src="images/store image.png" alt="" class="img2">
                <span>
                    <h4>Run your business with Ease</h4>
                    <p>Easily run your business and stay updated with it's conditions through our analytic tools that will make sure your store or business is running smoothly</p>
                </span>
                <a href=""><i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="animate">
                <img src="images/earth no bg 3d.png" alt="" class="img3">
                <span>
                    <h4>Reach more</h4>
                    <p>Reach more people on our platform through gaining connections, which help other people from accross the world notice you.</p>
                </span>
                <a href=""><i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </section>

        <section class="connect">
            <div class="center-info">
                <h4 class="animate">Connect with our team today to get the best out of us</h4>
            </div>
            <div class="img-slider2">
                <div data-speed="0.5">
                    <img src="images/Lady-pfp.jpg" alt="">
                    <a href="#" class="main-links-body">Connect+</a>
                </div>
                <div data-speed="0.4">
                    <img src="images/lady1.jpg" alt="">
                    <a href="#" class="main-links-body">Connect+</a>
                </div>
                <div data-speed="0">
                    <img src="images/person2.jpg" alt="">
                    <a href="#" class="main-links-body">Connect+</a>
                </div>
                <div data-speed="0.1">
                    <img src="images/person3.jpg" alt="">
                    <a href="#" class="main-links-body">Connect+</a>
                </div>
                <div data-speed="0.75">
                    <img src="images/person1.jpg" alt="">
                    <a href="#" class="main-links-body">Connect+</a>
                </div>
            </div>

            
        </section>

        <section class="analytics">
            <img src="images/analytics.jpg" alt="image shwowing different analytic charts">
            <div>
                <h2 class="animate">Get Access to</h2>
                <h3 class="animate">Powerful Business Analytic Tools</h3>
                <a href="#" class="main-links-body" style="width: 200px;">Get Started</a>
            </div>
        </section>

        <section class="first-cta">
            <img src="images/earth hero 2.jpg" alt="">
            <div class="reg-cont">
                <h2 style="font-size: 50px;" class="animate">Register your Business</h2>
                <p class="animate">Take the first step to taking your business to the next level</p>
                <a href="#" class="main-links-body">Register</a>
            </div>
        </section>

        <h2 style="font-size: 50px;color:white;" class="animate">Download Our App</h2>

        <section class="app-download">
            <img src="images/phone-dark.jpg" alt="" id='app-download-img'>
            <div class="download-links animate">
                <a href="#" class="gg-play">
                    <img src="images/google-play.png" alt="">
                    <h4>Google Play</h4>
                </a>

                <a href="#" class="app-store animate">
                    <img src="images/app-store.png" alt="">
                    <h4>App Store</h4>
                </a>
            </div>
        </section>

        <section class="partners-section">
            <h2 class="animate">Our Partners</h2>

            <div class="partners animate">
                <img src="images/partner1.png" alt="">
                <img src="images/partner2.png" alt="">
                <img src="images/partner3.png" alt="">
                <img src="images/partner4.png" alt="">
                <img src="images/partner5.png" alt="">
            </div>
        </section>

        <section class="second-cta">
            <img src="images/earth img dark1.jpg" alt="">
            <div class="subscription">
                <h3 style="font-size: 50px;" class="animate">Subscribe for the latest updates</h3>
                    
                <form action="" method="post" class="animate">
                    <div>
                        <label for="email">Your Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email" required>
                    </div>
                    <input type="submit" value="Subscribe">
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="upper">
        <div class="footer-divs">
            <h3>Quick Links</h3>
            <div class="footer-links">
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">App</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-divs">
            <h3>Resources</h3>
            <div class="footer-links">
            <ul>
                <li><a href="#">Connect With an advicer</a></li>
                <li><a href="#">Blogs</a></li>
                <li><a href="#">Business Tools</a></li>
                <li><a href="#">Analytical Tools</a></li>
                <li><a href="#">Getting Started</a></li>
                <li><a href="#">How it works</a></li>
            </ul>
            </div>
        </div>
        <div class="footer-divs">
            <h3>Reach us through</h3>
            <div class="footer-links">
                <ul>
                    <li><a href="#">info@businessdevelopmentio.com</a></li>
                    <li><a href="#">+25471234678</a></li>
                    <li>
                        <a href="#"><i class="fa-brands fa-xtwitter"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        </div>

        <hr>

        <div class="lower">
            <h3>Business Development Io &copy; Copyright 2024</h3>
            <p>Designed by: <a href="https://meshacklocho.co.ke/">Meshack Locho</a></p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/TextPlugin.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>


    <script src="main.js"></script>
</body>
</html>