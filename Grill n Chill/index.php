<?php  
	//connect to database
	include "dbconnect.php";
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
		#footer{
		margin-top:0px;
		width:100%;
		min-width:1000px;
		max-width:1920px;
		background-color:#263036;
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

	<div id = "top-banner" >

		<div id="img-container">
			<img src="img/bg1.jpg" id="bg1">
			<img src="img/bg2.jpg" id="bg2">
			<img src="img/bg3.jpg" id="bg3">
		</div>
		
		<form action="menu.php" method="post">
			<table>
				<tr>
					<td><input type="text" placeholder="Enter Your Address" name = "address" required></td>
					<td><button type="submit">Confirm</button></td>
				</tr>
			</table>	
		</form>	
		
		<div id="dots">
			<span class="dot" id="dot1" onclick="showImg1()"></span>
			<span class="dot" id="dot2" onclick="showImg2()"></span>
			<span class="dot" id="dot3" onclick="showImg3()"></span>
		</div>
	</div>

	<div id = "quick-menu" class = "content-div">
		<h2>A Quick Look At Our Menu</h2>
		<img src = "img/menu.jpg">
		<button><a href = "menu.php">See More</a></button>
	</div>

	<div id= "promotion" class = "content-div">
		<h2>Our Promotions</h2>
		<div id="promo-img-div">
			<img src = "img/promotion.jpg">
			<img src = "img/promotion1.png">
			<img src = "img/promotion2.jpg">
		</div>
		<button><a href = "menu.php">Get A Promotion Now! </a></button>
	</div>

	<div id= "about-us" class = "content-div">
		<p>Learn About US</p>
		<ul>
			<li>Our History</li>
			<li>Enterprise value</li>
			<li>Our Goals</li>
			<li><a href = "about-us.php">Our Story > </a></li>
		</ul>
	</div>

	<div id = "contact-us" class = "content-div">
		<h2>Contact Us Now!</h2>
		<table>
			<tr>
				<td style ="width: 30%;">
					<div id="contact-info">
						<ul>
							<li>Address: #03-15, 302 Orchard Rd, <br>Tong Building, Singapore 238862</li>
							<li>TEL: 8888 8888</li>
							<li>Email: grillnchill@grill.com</li>
						</ul>			
					</div>
				</td>

				<td>
					<div>
						<form action="contact-us.php" method= "post" name = "registerForm">
							<label>Your name: </label><br>
							
								<input name = "name" type = "text" id ="username" required onchange = "validateName()"><br>
							<label>Your message:</label><br>
								<input name = "content" type = "textarea" id = "message" required><br>

							<label>
								<button name = "submit">Send us now!</button>
							</label>

						</form>
					</div>
				</td>
				
			</tr>
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
