<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="GE.js" async></script> 
    <!-- <link rel="stylesheet" href="Web.css">-->
    <title>Eden's Bistro - Events</title>
</head>
<body>
    <nav class="navbar"> <!--Navigation bar-->
        <div class="navbar__container"> 
        <ul class="navbar__1"> <!--Creates the Page button-->
            <li class="navbar__item"> <!--Creates the Home button-->
                <a href="/Home.html" class="navbar__links">Home</a> <!--Creates the Main page button-->
            </li>
            <li class="navbar__item"><!--Creates the Menu button-->
                <a href="/menu.html" class="navbar__links">Menu</a> <!--Creates the menu button-->
            </li>
            <li class="navbar__item">
                <a href="/events.php" class= "navbar_links">Events</a> <!-- Creates the Events button-->
            </li>
        </div>
    </nav> 

    <!--Events Section-->
    <div class="events">
        <h1>Upcoming Events at Eden's Bistro</h1>
        <div class="events">
            <h1>Upcoming Events at Eden's Bistro</h1> 
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
    
            
            $sql = "SELECT * FROM events";
    
            
            $result = $conn->query($sql);
    
            
            if ($result->num_rows > 0) {
                // Output data for each row
                while($row = $result->fetch_assoc()) {
                    echo "<h2>" . $row["Date"]. "</h2>";
                    echo "<p>" . $row["Event"]. "</p>";
                }
            } else {
                echo "No upcoming events";
            }
    
            // Close the connection
            $conn->close();
            ?>
        </div>
        
    </div>

    <!--Footer section-->
    <div class="footer__container">
        <div class="footer__links">
            <div class="footer__link--wrapper">
                <div class="footer__link--items"> <!-- Bottom of the page-->
                    <h2>Contact Us</h2>
                    <a href="/">1-800-212-1354</a>
                    <a href="/">EdensBistro@gmail.com</a>
                </div>
                <div class="social__media">
                    <div class="social__meida--wrap">
                        <div class="footer__logo">
                            <a href="/" id ="footer__logo"><i class="GOOD EATS"></i></a>
                        </div>
                        <p class="website__rights">Eden's Bistro 2023. All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

