<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="GE.js" async></script> 
    <link rel="stylesheet" href="Styles.css">
    <title>Eden's Bistro - Login</title>
</head>
<nav class="navbar"> <!--Navigation bar-->
        <div class="navbar__container"> 
            <img src="Eden's Bistro logo two.png" alt="Eden's Bistro logo" id="navbarImage">
            <a href="Order.php" class="navbar__item order-link">Payment</a>
            <div id="navbarTitle">Eden's Bistro</div>
        <ul class="navbar__1"> 
            <li class="navbar__item"> 
                <a href="Home.php" class="navbar__links">Home</a> <!--Creates the Home button-->
            </li>
            <li class="navbar__item">
                <a href="Menu.php" class="navbar__links">Menu</a> <!--Creates the menu button-->
            </li>
            <li class="navbar__item">
                <a href="Events.php" class= "navbar_links">Events</a> <!-- Creates the Events button-->
            </li>
            <li class = "navbar__item">
                <a href="Reservations.php" class="navbar_links">Reservations</a> <!-- Creates the Reservations button-->
            </li>
            <li class = "navbar__item">
                <a href="Login.php" class="navbar_links">Log In</a> <!-- Creates the Reservations button-->
            </li>
            <!--
            <li class="navbar__item">
                <a href="Order.php" class="navbar_links">Order Now</a> 
            </li>
-->
        </div>
    </nav> 
    <!--Login Section-->
    <div class="content wrapper">
        <h1>Employee Log In</h1>
        <h4>Please enter your username and password</h4>
        <div>
            <div class="form__container">
                <form action="employees.php" method="post">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" name="submit">Log In</button>
                </form>
            </div>
            <?php
            // Database credentials
            $dbhost = 'bpetcaugh35054.ipagemysql.com';
            $dbname = 'bwilliams_db';
            $dbuser = 'bwilliams';
            $dbpassword = '9231773t25Ghj!';

            //  connection
            $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
    
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
    
            // Close the connection
            $conn->close();
            ?>
        </div>
    </div>
</body>

<footer>
   <!--Footer section-->
   <div class="footer__container">
        <div class="footer__links">
            <div class="footer__link--wrapper">
                <div class="footer__link--items"> <!-- Bottom of the page-->
                    <h2 class="footer__text">Contact Us</h2>
                    <a href="/">1-800-212-1354</a>
                    <a href="/">EdensBistro@gmail.com</a>
                </div>
                <div class="social__media">
                    <div class="social__meida--wrap">
                        <div class="footer__logo">
                            <a href="/" id ="footer__logo"><i class="GOOD EATS"></i></a>
                        </div>
                        <p class="footer__text">Eden's Bistro 2023. All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</html>

