<?php
	session_start();
	//connect to database
	$conn  = mysqli_connect("localhost", "f33ee", "f33ee", "f33ee");
	if(mysqli_connect_errno()){
		echo "Error connecting to database. Please try again later!";
		exit;
	}
	if(isset($_GET['remove'])){
		$index = $_GET['remove'];
		$_SESSION['cart'][$index]['Quantity'] = 0;
	}
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
	href = "css/cart.css">
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
		<!-- <button id="log-in">&nbsp &nbsp &nbsp Log In &nbsp &nbsp &nbsp</button> -->
	
	</div>

	<div id = "banner">
		<div>
			<h2>Shopping Cart</h2>
		</div>
	</div>
	
	<div id="table">
		<table>
			<tr>
				<th><!--picture--></th>
				<th>Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total Price</th>
				<th>Action<!--remove--></th>
			</tr>
			
			<?php
				if(!empty($_SESSION['cart']))
				{	
					$total = 0;
					for($i = 1; $i <= count($_SESSION['cart']); $i++){
						if ($_SESSION['cart'][$i]['Quantity'] > 0){	
				?>
				<tr>	
					<td><!-- img --></td>
					<td><?php echo $_SESSION['cart'][$i]['Name']; ?></td>
					<td>$<?php echo $_SESSION['cart'][$i]['Price']; ?></td>
					<td><?php echo $_SESSION['cart'][$i]['Quantity']; ?></td>				
					<td>$<?php echo number_format($_SESSION['cart'][$i]['Price'] * $_SESSION['cart'][$i]['Quantity'], 2);?></td>
					<td><form  method = "GET" action = "cart.php"><input style = "color: #f2f2f2;" type = "submit" name = 'remove' value = <?php echo $i; ?> ><span class="text-danger">Remove</span></form></td>
				</tr>
			<?php
					$total = $total + $_SESSION['cart'][$i]['Price'] * $_SESSION['cart'][$i]['Quantity'];
					$_SESSION['total'] = $total;		
						}
					}
				if ($total == 0){
					?>
					<tr><td></td></tr>
					<tr><td></td></tr>
					<tr><td></td></tr>
					<tr><td colspan="6" style="text-align:center; font-size:25px;color:#787a79;">Shopping cart is empty! Please add items.</td></tr>	
					<tr id="back"><td colspan="6">
					<a href="menu.php">
						Go to add items ->
					</a>
					</td></tr>
				<?php
				}
				
			?>
				<tr>
					<td colspan="4" align="right">Total</td>
					<td align="right">$ <?php echo number_format($total, 2); ?></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="6" align="right">
						<button id ="proceed" ><a href="payment.php" style="color: #000000;"> Proceed to Checkout -></a></button>
					</td>
				</tr>
			<?php
				}else{
			?>		
				
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td colspan="6" style="text-align:center; font-size:25px;color:#787a79;">Shopping cart is empty! Please add items.</td></tr>	
				<tr id="back"><td colspan="6">
					<a href="menu.php">
						Go to add items ->
					</a>
				</td></tr>
			<?php
				}
			?>
		</table>
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
