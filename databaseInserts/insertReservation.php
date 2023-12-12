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
        $name = $_POST['reserveName'];
	if (isset($_POST['seats'])) 
         $ans1 = $_POST['seats'];

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
		if (strlen($name)>0 && $status=="information") {
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
<html>
    <head>
        <title>
            Survey Page
        </title>
        <meta charset="UTF-8"/>
        <link rel='stylesheet' type='text/css' href='style.css'/>
        <body>
            <?php
                print "<DIV class=\"$status\">$statusMessage</DIV>";
                if ($status!="success") {
            ?>
            <h1>Welcome to the survey!</h1>
            <h3>Rate each item from a scale of 1 - 5. 1 = Strongly dislike, 5 = Strongly like.</h3>
            <div id="input">
                <form id="registration" action="insertReservation.php" method="post">
                    <label for="reserveName">Name of Reservation Space:</label>
                    <input type="text" id="reserveName" name="reserveName" <?php print "value=\"$reserveName\"";?> /><br />
                    <label for="seats">Number of Seats:</label>
                    <input type="number" id="seats" name="seats"  <?php print "value=\"$seats\"";?> /><br />
                    <input type="submit" value="Submit" />
                </form>
            </div>
            <?php } 
                if ($link instanceof mysqli) $link->close();
            ?>
        </body>
    </head>
</html>