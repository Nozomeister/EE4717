<?php  
	//connect to database
	$conn  = mysqli_connect("localhost", "f33ee", "f33ee", "f33ee");
	if(mysqli_connect_errno()){
		echo "Error connecting to database. Please try again later!";
		exit;
	}
	session_start();
	if(isset($_POST['name'])){
		$name = $_POST['name'];
		$to = 'f33ee@localhost';
		$subject = 'Contact us';
		$message = $_POST['content'];
		$headers = 'From: f33ee@localhost' . "\r\n" .
    	'Reply-To: f33ee@localhost' . "\r\n" .
    	'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers,'-ff33ee@localhost');
		$_SESSION['contact'] = $name;
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
		html, body{
			padding:0;
			margin:0;
			min-height: 700px;
			background-color:#d8cfc2;

		}

		#banner{
			height: 200px;
			background-color: #263036;
			margin: 0;
			padding:0;
		}

		#banner h2{
			padding-top: 110px;
			width: 20%;
			margin: auto;
			text-align: center;
			font-size: 40px;
			color:#d8cfc2;
		}
		#contact-us h2{
			color:#263036;
			background-color: #d8cfc2;
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
			<h2>Contact Us</h2>
		</div>
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
					<?php if(!isset($_SESSION['contact'])){

						?>

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
					<?php }else{
						?>
						<label>Thank you for contact us!</label>
						<?php unset($_SESSION['contact']);
					}
					?>
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
