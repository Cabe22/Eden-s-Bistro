<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="GE.js" async></script> 
    <link rel="stylesheet" href="Styles.css">
    <title>Eden's Bistro - Order</title>
</head>
<body>
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
        </div>
    </nav> 
    <div class="Order content">

        <h2>Payment Information</h2>
        <div class="order-form-container">
            <form action="" method="post">
            <input type="text" id="cardType" name="cardType" placeholder="Card Type"><br>
            <input type="text" id="lastFour" name="lastFour" maxlength="4" placeholder="Last Four Digits"><br>
            <input type="date" id="expiryDate" name="expiryDate" placeholder="Expiry Date"><br>
            <input type="text" id="cardHolderName" name="cardHolderName" placeholder="Card Holder Name"><br>
            <input type="submit" name="submit" value="Submit">
            </form> 
        </div>
        <div class="Payment content">
            <?php
            if (isset($_POST['submit'])) {
                $dbhost = 'bpetcaugh35054.ipagemysql.com';
                $dbname = 'bwilliams_db';
                $dbuser = 'bwilliams';
                $dbpassword = '9231773t25Ghj!'; 

                // Create connection
                $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $cardType = $_POST['cardType'];
                $lastFour = $_POST['lastFour'];
                $expiryDate = $_POST['expiryDate'];
                $cardHolderName = $_POST['cardHolderName'];

                $sql = "INSERT INTO CreditCardInfo (CardType, LastFourDigits, ExpiryDate, CardholderName)
                VALUES ('$cardType', '$lastFour', '$expiryDate', '$cardHolderName')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
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
                    <h2>Contact Us</h2>
                    <a href="/">1-800-212-1354</a><br>
                    <a href="/">EdensBistro@gmail.com</a><br>
                    <a href="/">250 Manor Avenue, Langhorne, PA</a>
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
</footer>
</html>
