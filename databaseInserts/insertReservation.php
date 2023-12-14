<?php
    // Variables to store into reservations table
    $reserveName = "";
    $seats = 0;

    // Database Credentials
    $servername = 'bpetcaugh35054.ipagemysql.com';
    $username = 'bwilliams';
    $password = '9231773t25Ghj!';
    $dbname = 'bwilliams_db';

    // Checks responses and stores them to be sent to the database
	if (isset($_POST['reserveName'])) 
        $reserveName = $_POST['reserveName'];
	if (isset($_POST['seats'])) 
         $seats = $_POST['seats'];

    // Initialization of database connection
	$status = "information";
	$statusMessage = "Please complete the form and click the submit button.";
	$link = mysqli_connect($servername, $username, $password, $dbname);
	if ($status!="information") {
		// do nothing
	} elseif ($link->connect_error) {
        print "There was a problem connecting to the database.<br/>";
        print $link->connect_errno.": {$link->connect_error}";
        $status = "error";
		$statusMessage = $link->connect_error;
	} else {
		if (strlen($reserveName)>0 && $status=="information") {
			$status = "success";
			$statusMessage = "New Reservation Space Added Successfully";
			$q = "INSERT INTO reservations (reservationName,availableSeats) VALUES (?,?);";
			$stmt = $link->prepare($q);
			$stmt->bind_param('si',$p1,$p2);
			$p1 = $reserveName;
			$p2 = $seats;
			if ($result = $stmt->execute()) {
				$statusMessage .= "  Your user ID is {$link->insert_id}.";
			} else {
				$status = "error";
				$statusMessage = "Your registration has failed.  Please try again later.<BR />".$link->error;
			}		
			$stmt->close();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='../Styles.css'/>
    <title>Eden's Bistro</title>
</head>
<body>
    <nav class="navbar"> <!--Navigation bar-->
            <div class="navbar__container"> 
                <img src="../Eden's Bistro logo two.png" alt="Eden's Bistro logo" id="navbarImage">
                <a href="Order.php" class="navbar__item order-link">Payment</a>
                <div id="navbarTitle">Eden's Bistro</div>
            <ul class="navbar__1"> 
                <li class="navbar__item"> 
                    <a href="../Home.php" class="navbar__links">Home</a> <!--Creates the Home button-->
                </li>
                <li class="navbar__item">
                    <a href="../Menu.php" class="navbar__links">Menu</a> <!--Creates the menu button-->
                </li>
                <li class="navbar__item">
                    <a href="../Events.php" class= "navbar_links">Events</a> <!-- Creates the Events button-->
                </li>
                <li class = "navbar__item">
                    <a href="../Reservations.php" class="navbar_links">Reservations</a> <!-- Creates the Reservations button-->
                </li>
                <li class = "navbar__item">
                    <a href="../Login.php" class="navbar_links">Log In</a> <!-- Creates the Reservations button-->
                </li>
                <!--
                <li class="navbar__item">
                    <a href="../Order.php" class="navbar_links">Order Now</a> 
                </li>-->
            </div>
    </nav> 

        <!-- Create a Reservation -->
        <div class = "content">
        <h1>New Reservation</h1>
        <div class = "form__container">
            <form action="insertReservation.php" method="post">
                <label for="reserveName">Name of Reservation Space:</label>
                <input type="text" id="reserveName" name="reserveName" <?php print "value=\"$reserveName\"";?> /><br />
                <label for="seats">Number of Seats:</label>
                <input type="number" id="seats" name="seats"  <?php print "value=\"$seats\"";?> /><br />
                <input type="submit" value="Submit"/>
            </form>
            <form action="../employees.php">
                <button>Go Back</button>
            </form>
        </div>
    </div>
    <?php 
        if ($link instanceof mysqli) $link->close();
    ?>
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