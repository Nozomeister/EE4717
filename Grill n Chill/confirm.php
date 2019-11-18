<?php
	include "dbconnect.php";
	session_start();
	if (isset($_POST['address'])){
		$_SESSION['address'] = $_POST['address'];
		$address = $_SESSION['address'];
	}
	else $address = $_SESSION['address']; //required info
	$username = $_SESSION['valid_user'];
	$total = $_SESSION['total'];
	$date = date("d/m/Y");
	$orderstatus = "Ordered";
	while(1){
		$orderid = rand(1, 1000000000);
		$sql = 'select * from GnC_Order '."where OrderID='$orderid'"; //generate orderid
		$result = $dbcnx->query($sql);
		if ($result->num_rows == 0){
			break;
		}
	}

	$sql2 = "INSERT INTO GnC_Order (OrderID, Username, Amount, OrderDate, OrderAddress, OrderStatus) 
            VALUES ('$orderid', '$username', '$total', '$date', '$address', '$orderstatus')";  //insert to GnC_Order table to track the order later
	$result2 = $dbcnx->query($sql2);

	for($i = 1; $i <= 21; $i++){ //insert to GnC_Order_Details for order breakdown.
		if ($_SESSION['cart'][$i]['Quantity'] > 0){ 
			$quantity = $_SESSION['cart'][$i]['Quantity'];
			$itemname = $_SESSION['cart'][$i]['Name'];
			$sql3 = "INSERT INTO GnC_Order_Details (OrderID, ItemID, ItemName, Quantity) 
			VALUES ('$orderid', '$i', '$itemname', '$quantity')";
			$dbcnx->query($sql3);
			}
		}
?>

<html lang= "en">
<head>
	<title>Grill n Chill</title>
	<meta charset = "utf-8">
	<!--css style doc-->
	<link rel = "stylesheet"
	type = "text/css"
	href = "css/main.css">
	<link rel = "stylesheet"
	type = "text/css"
	href = "css/confirm.css">
	<!--google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Noto+Serif+SC|Playfair+Display|Rock+Salt&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text|Montserrat|Staatliches&display=swap" rel="stylesheet">
	<!--js style doc-->
	<script type="text/javascript" src="js/main.js"></script>
	  
	<style>
		.log-in , .log-out{
			display: inline;
			float:right;
			margin:0;
			margin-right:20px;
			margin-top:20px;	
			border:1px solid #ffffff;
			border-radius:5px;
			background-color:transparent;
			opacity:0.8;
			cursor:pointer;	
		}
		.log-in:hover,  .log-out:hover{
			opacity:1;
		}

		.log-in a,  .log-out a{
			text-decoration: none;
			font-size:20px;
			color:#ffffff;
			font-family: 'Playfair Display', serif;

		}
		#header h3{
			margin-top:45px;
			display: inline;
			font-size: 20px;
			color:#ffffff;
			float: left;
			margin-left: 260px;		
			font-family: 'Dancing Script', cursive;
		

		}
		#content{
		width:80%;
		margin: auto;
		height: 500px;
		margin-top: 80px;
		}
		#footer{
		margin-top:0px;
		width:100%;
		min-width:1000px;
		max-width:1920px;
		background-color:#263036;
		}
}

	</style>

</head>
<body>		
	<div id = "header">
		<div id="nav">
			<button onmouseover="showNav()" onmouseleave="closeNav()" >Navigation</button>
			<div id="drop-down" onmouseover="showNav()" onmouseleave="closeNav()">
				<a href ="index.php">Home</a>
				<a href ="menu.php">Menu</a>
				<a href ="trackorder.php">Track Order</a>
				<a href ="contact-us.php">Contact Us</a>	
			</div>	
		</div>
	
		<a href="cart.php"><img id ="cart-icon" src="img/cart.png"></a>

		<p>Grill n Chill</p>	<!--replace with an img later-->

		<?php
			if (isset($_SESSION['valid_user'])){
				$username = $_SESSION['valid_user'];
				echo '<h3 id = "welcome">Hello, '.$username.'</h3><br />"';
				echo '<button class="log-in"><a href = "logout.php">Log out</a></button><br />';
			}
			else{
				$_SESSION['redirect_url'] = $_SERVER['PHP_SELF']; 
			 echo '<button class ="log-out">&nbsp &nbsp &nbsp <a href = "login.php">Log In</a> &nbsp &nbsp &nbsp</button>';
			} //code for dynamic Login button
		?>
	
	</div>

	<div id = "banner">
		<div>
			<h2>Confirmation</h2>
		</div>
	</div>
	
	<div id ="content">
		<h2>Your Order Has Been Placed!</h2>
		<p>Order breakdown: </p><br />
		<p>Order No. <?php echo $orderid ?></p><br />
		<p>Total amount:$ <?php echo $total ?></p><br />
		<p>Order date: <?php echo $date ?></p><br />
		<p>Shipping address: <?php echo $address ?></p><br />
        <p>Estimated shipping time: <?php echo rand(1,60) ?> minutes</p><br />
		<a href="trackorder.php">Track Your Order Status </a>
		<a href = "index.php">Back to home</a>
		<?php 
			unset($_SESSION['total'], $_SESSION['cart'], $_SESSION['address']); //reset everything except username
		?>
	</div>

	<div id = "footer">
		<table>	
			<tr>
				<td><a href="about-us.php">About Us</a></td>
				<td><a href="contact-us.php">Contact Us</a></td>
				<td><a href="contact-us.php">Feedback</a></td>	
			</tr>
		</table>
	</div>
</body>
</html>
