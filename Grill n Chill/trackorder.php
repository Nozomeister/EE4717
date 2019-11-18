<?php
	session_start();
    include "dbconnect.php";
    if (isset($_POST['order'])){
        $orderid = $_POST['order'];
        $sql = 'select * from GnC_Order '."where OrderID='$orderid'";
        $result = $dbcnx->query($sql);
        if($result->num_rows >0){
            $row = $result->fetch_assoc();
                $username = $row["Username"];
                $amount = $row["Amount"];
                $status = $row["OrderStatus"];
                $orderdate = $row["OrderDate"];
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
	href = "css/track-order.css">
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
		#content {
			height: 700px;
		}
		#content form{
			padding:0;
			margin:0;

			text-align: center;
			width: 60%;
			margin:auto;
			padding-top: 10%;

		}
		#content label{
			width: 100%;


		}
		#content form input[type=text]{
			text-align: center;
			width: 70%;
			height: 30px;
			display: inline-block;
			padding: 0px;
			margin:0;
			
		}
		#content form input[type=submit]{
			background-color: #263036;
			color:#eeeeee;
			border:0;
			font-size: 20px;
			padding: 5px 15px 5px 15px;
			text-align: center;
			display: inline-block;
			width: 28%;
			height: 33px;
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

		#trackinfo{
			padding-top: 20px;
			display: block;
			margin-top: 30px;
			font-size: 20px;	
			width: 50%;
			display: block;
			margin:auto;
		}
		#orderbreakdown {
			font-size: 25px;
			width: 100%;
			margin:auto;
			text-align: center;


		}

		#orderbreakdown td{
			padding: 5px 15px 0px 15px;
			width: 50%;
			text-align: center;

		}


		#trackinfo p {
			margin:0;
			padding: 5px 10px 5px 0px;
		}
		#trackinfo span{
			color:red;

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
			<h2>Track Order</h2>
		</div>
	</div>
	
	<div id ="content">
		<form method = "POST" action = "trackorder.php">
		    <label><input type = "text" placeholder = "Input your Order ID" name = "order" id = "order">
		    <input type = "submit" value = "Track"></label>
	    </form>
	    <div id = "trackinfo">
	    <?php
        if($result->num_rows >0){
            echo '<p>Username: '.$username.'</p><br />';
            echo '<p>Your order ID: '.$orderid.'</p><br />';
            echo '<p>Order date: '.$orderdate.'</p><br />';
            echo '<p>Status: <span>'.$status.'</span></p><br />';
			$sql2 = 'select * from GnC_Order_Details '."where OrderID='$orderid'"; //later troubleshoot
            $result2 = $dbcnx->query($sql2);
			$num_results2 = $result2->num_rows;
			?>
			<table id = "orderbreakdown">
                <tr>
                <td>Name</td>
				<td>Quantity</td>
				</tr><?php
            for($i = 0; $i < $num_results2; $i++){
                ?>
                
                
                <?php

                $row = $result2->fetch_assoc();
                echo '<tr>';
                echo '<td>'.$row["ItemName"].'</td>'; //trackorder with detail breakdown
                echo '<td>'.$row["Quantity"].'</td>';
                echo '</tr>';
            }
            ?>
                <tr>
                <td>Total amount: $</td>
                <td><?php echo $amount;?></td>
                </tr>
                </table>
            <?php
        }
        else{
            if (isset($_POST['order'])){
            echo 'Your order ID is not correct. Please enter it again.';
            }
        }
        
    	?>
    </div>
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
