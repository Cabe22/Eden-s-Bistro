<!--menu page-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles.css">
    <script src="WE.js" async></script> 
    <title>Eden's Bistro</title>
<body>
    <nav class="navbar"> <!--Navigation bar for questions-->
        <div class="navbar__container"> 
        <ul class="navbar__1"> <!--Creates the Page1 button-->
            <li class="navbar__item"> <!--Creates the Home button-->
                <a href="Home.html" class="navbar__links">Home</a> <!--Creates the Main page button-->
            </li>
            <li class="navbar__question2"><!--Creates the Page2 button-->
                <a href="Menu.php" class="navbar__links">Menu</a> <!--Creates the menu button-->
            </li>
            <li class="navbar__question3">
                <a href="Events.php" class= "navbar_links">Events</a> <!-- Creates the Page3 button-->
            </li>
            <li class = "navbar__item">
                <a href="Reservations.php" class="navbar_links">Reservations</a> <!-- Creates the Reservations button-->
            </li>
        </div>
    </nav> 

    <div class="content">
        <h1>Menu</h1>
        <h4>Find your favorite dish here!</h4>
        <h1>Breakfast</h1>
        <div>
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
    
            
            $sql = "SELECT * FROM breakfast";
    
            
            $result = $conn->query($sql);
    
            
            if ($result->num_rows > 0) {
                // Output data for each row
                while($row = $result->fetch_assoc()) { // Displays each reservation name and number of seats
                    echo "<h2>" . $row["item_name"]. "</h2>";
                    echo "<p>$: " . $row["price"]. "</p>";
                }
            } else {
                echo "Sold out";
            }
    
            // Close the connection
            $conn->close();
            ?>
        </div>
        <h1>Lunch</h1>
        <div>
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
    
            
            $sql = "SELECT * FROM lunch";
    
            
            $result = $conn->query($sql);
    
            
            if ($result->num_rows > 0) {
                // Output data for each row
                while($row = $result->fetch_assoc()) { // Displays each reservation name and number of seats
                    echo "<h2>" . $row["item_name"]. "</h2>";
                    echo "<p>$: " . $row["price"]. "</p>";
                }
            } else {
                echo "Sold out";
            }
    
            // Close the connection
            $conn->close();
            ?>
        </div>
        <h1>Dinner</h1>
        <div>
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
    
            
            $sql = "SELECT * FROM dinner";
    
            
            $result = $conn->query($sql);
    
            
            if ($result->num_rows > 0) {
                // Output data for each row
                while($row = $result->fetch_assoc()) { // Displays each reservation name and number of seats
                    echo "<h2>" . $row["item_name"]. "</h2>";
                    echo "<p>$: " . $row["price"]. "</p>";
                }
            } else {
                echo "Sold out";
            }
    
            // Close the connection
            $conn->close();
            ?>
        </div>
        <h1>Sides</h1>
        <div>
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
    
            
            $sql = "SELECT * FROM sides";
    
            
            $result = $conn->query($sql);
    
            
            if ($result->num_rows > 0) {
                // Output data for each row
                while($row = $result->fetch_assoc()) { // Displays each reservation name and number of seats
                    echo "<h2>" . $row["item_name"]. "</h2>";
                    echo "<h2>" . $row["side_type"]. "</h2>";
                    echo "<p>$: " . $row["side_price"]. "</p>";
                }
            } else {
                echo "Sold out";
            }
    
            // Close the connection
            $conn->close();
            ?>
        </div>
        <h1>Drinks</h1>
        <div>
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
    
            
            $sql = "SELECT * FROM drinks";
    
            
            $result = $conn->query($sql);
    
            
            if ($result->num_rows > 0) {
                // Output data for each row
                while($row = $result->fetch_assoc()) { // Displays each reservation name and number of seats
                    echo "<h2>" . $row["item_name"]. "</h2>";
                    echo "<p>$: " . $row["price"]. "</p>";
                }
            } else {
                echo "Sold out";
            }
    
            // Close the connection
            $conn->close();
            ?>
        </div>

    </div>
<!-- <div class = "Drinks"> <h4 class= "Item-Category">Drinks</h4> -->


<!-- Service Section-->
<div class="services">
<div class="services__container">
<div class="services__card">
</div>
</div>
</div>
<!--Footer section-->
<div class="footer__container">
<div class="footer__links">
<div class="footer__link--wrapper">
    <div class="footer__link--items">
        <h2>Contact Us</h2>
        <a href="/">1-800-212-1354</a>
        <a href="/">EdenBistro@gmail.com</a>
</div>
<div class="social__media">
    <div class="social__meida--wrap">
        <div class="footer__logo">
            <a href="/" id ="footer__logo"><i class="Eden's Bistro"></i></a>
        </div>
        <p class="website__rights">Eden's Bistro 2023. All rights reserved</p>
    </div>
</div>
</div>
</div>
<script src="WE.js"></script> <!--Connects to the JavaScript code-->
</body>
</html>



 
