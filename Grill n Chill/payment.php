<?php  
	//connect to database
	$conn  = mysqli_connect("localhost", "f33ee", "f33ee", "f33ee");
	if(mysqli_connect_errno()){
		echo "Error connecting to database. Please try again later!";
		exit;
	}
	session_start();
?>


<!DOCTYPE html>
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
	href = "css/payment.css">
	<!--google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Noto+Serif+SC|Playfair+Display|Rock+Salt&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text|Montserrat|Staatliches&display=swap" rel="stylesheet">
	<!--js style doc-->
	<script type="text/javascript" src="js/main.js"></script>
	  
	<style>
		#footer{
		margin-top:0px;
		width:100%;
		min-width:1000px;
		max-width:1920px;
		background-color:#263036;
		}
		#content{
			height: 600px;

		}
		#content button{
			font-size: 20px;
			color:#263036;
			padding: 5px 15px 5px 15px;
			border:1px solid #263036;
			background-color: transparent;
			text-align: center;
		}

		.onLogin{
			font-size: 30px;
			text-align: center;
			width: 40%;
			margin:auto;
			display: block;
		}
		.onLogin a{
			font-size: 25px;
			color:#263036;
			text-decoration: none;

			padding: 5px 15px 5px 15px;
			border:1px solid #263036;
			background-color: transparent;
			text-align: center;

		}

		.onLogin a:hover{
			color:#ffffff;
			background-color: #263036;

		}

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
			<h2>Payment</h2>
		</div>
	</div>
	
	<div id ="content">
		<?php
			if (isset($_SESSION['valid_user'])){
		?>
		<form method="post" action="confirm.php" name = "paymentForm">
			<label>Select a payment type:
				<input type="radio" name ="payment-type" required value="Cash" onchange ="paymentType()">Cash
				<input type="radio" name ="payment-type" required value="Card" onchange ="paymentType()">Card
			</label>
			<label>Card No.
				<input type = "text" name ="card-no" placeholder="xxxx xxxx xxxx xxxx" onchange ="validateCardNo()" required></label>
			<label>Owner:<input type = "text" name ="owner" onchange ="validateOwner()" required></label>
			<label>Card Type: 
				<input type="radio" name ="card-type" required value="Visa">Visa
				<input type="radio" name ="card-type" required value="Master">Master
				<input type="radio" name ="card-type" required value="Nets">Nets
				<input type="radio" name ="card-type" required value="Debit">Debit</label>
			<label>Expiry Date: <input type = "text" required name ="expiry-date" placeholder="mm/yy" onchange ="validateExpiry()"></label>
			<label>CVV<input type = "text" name ="cvv" required onchange ="validateCvv()"></label>
			<?php 
			if (isset($_SESSION['address'])){
				echo 'Shipped to address: '.$_SESSION['address'];
			}
			else {
				?>
			<label>Please input your address: <input type = "text" name = "address" required></label>
			<?php
			}
			?>
			<label><button type="submit" name ="submit" >Confirm and Process</button></label>
					
		</form>
			<?php 
			} else {
				echo "<br>";
				echo '<p class = "onLogin">Please log in to proceed the payment</p><br />';
				echo '<p class = "onLogin"><a href = "login.php">Login here</a></p>';
			}
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
