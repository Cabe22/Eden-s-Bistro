<?php
    // Variables to store into reservations table
    $itemName = "";
    $price = 0.0;
    $itemType = "";
    
    // Signifies if an item is a side
    $side = "";

    // Database Credentials
    $servername = 'bpetcaugh35054.ipagemysql.com';
    $username = 'bwilliams';
    $password = '9231773t25Ghj!';
    $dbname = 'bwilliams_db';

    // Checks responses and stores them to be sent to the database
	if (isset($_POST['itemName'])) 
        $itemName = $_POST['itemName'];
	if (isset($_POST['price'])) 
         $price = $_POST['price'];
    if (isset($_POST['itemType']))
        $itemType = $_POST['itemType'];
    if(isset($_POST['side']))
        $side = $_POST['side'];


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
		if (strlen($itemName)>0 && $status=="information") {
			$status = "success";
			$statusMessage = "New Menu Item Added Successfully";
            $p1 = $itemName;
            $p2 = $itemType;
            $p3 = $price;
            if($side == "Yes"){
                $q = "INSERT INTO sides (item_name,side_type,side_price) VALUES (?,?,?);";
                $stmt = $link->prepare($q);
                $stmt->bind_param('ssd',$p1,$p2,$p3);
            }elseif($itemType == "Breakfast"){
                $q = "INSERT INTO breakfast (item_name,price) VALUES (?,?);";
                $stmt = $link->prepare($q);
                $stmt->bind_param('sd',$p1,$p3);
            }elseif($itemType == "Lunch"){
                $q = "INSERT INTO lunch (item_name,price) VALUES (?,?);";
                $stmt = $link->prepare($q);
                $stmt->bind_param('sd',$p1,$p3);
            }elseif ($itemType == "Drinks"){
                $q = "INSERT INTO drinks (item_name,price) VALUES (?,?);";
                $stmt = $link->prepare($q);
                $stmt->bind_param('sd',$p1,$p3);
            }
        if ($result = $stmt->execute()) {
            $statusMessage .= "  Your user ID is {$link->insert_id}.";
        }else {
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
            <div id="navbarTitle">Eden's Bistro</div>
        <ul class="navbar__1"> 
            <li class="navbar__item"> 
                <a href="../Home.html" class="navbar__links">Home</a> <!--Creates the Home button-->
            </li>
            <li class="navbar__item">
                <a href="../Menu.html" class="navbar__links">Menu</a> <!--Creates the menu button-->
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
        </div>
    </nav> 

    <div class = "content">
        <h1>New Menu Item</h1>
        <div class = "form__container">
            <form action="insertMenu.php" method="post">
                <label for="itemName">Menu Item Name:</label>
                <input type="text" id="itemName" name="itemName"/><br />
                <label for="price">Price:</label>
                <input type="number" step="0.01" id="price" name="price"/><br />
                <label>Item Type:</label>
                <select name = "itemType">
                    <option value="Breakfast">Breakfast</option> 
                    <option value="Lunch">Lunch</option> 
                    <option value="Drinks">Drinks</option>
                </select>
                <br>
                <label for="side"> Side Item? </label>
                <input type="checkbox" id="side" name="side" value="Yes">
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