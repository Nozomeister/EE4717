
<?php
    session_start();
    $conn  = mysqli_connect("localhost", "f33ee", "f33ee", "f33ee");
	if(mysqli_connect_errno()){
		echo "Error connecting to database. Please try again later!";
		exit;
	}

$sql = "SELECT ItemID, ItemName, Price, Picture, Descriptions FROM GnC_Menu WHERE ItemType = 'Promotions' ;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["ItemID"] == 1) {
            $promo1 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        } elseif ($row["ItemID"] == 2) {
            $promo2 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        } elseif ($row["ItemID"] == 3) {
            $promo3 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        }
    }
}
$sql = "SELECT ItemID, ItemName, Price, Picture, Descriptions FROM GnC_Menu WHERE ItemType = 'ForFamily' ;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["ItemID"] == 4) {
            $fam1 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        } elseif ($row["ItemID"] == 5) {
            $fam2 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        } elseif ($row["ItemID"] == 6) {
            $fam3 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        }
    }
}
$sql = "SELECT ItemID, ItemName, Price, Picture, Descriptions FROM GnC_Menu WHERE ItemType = 'AlaCarte' ;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        switch ($row["ItemID"]) {
            case 7:
                $ala1 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
                break;
            case 8:
                $ala2 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
                break;
            case 9:
                $ala3 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
                break;
            case 10:
                $ala4 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
                break;
            case 11:
                $ala5 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
                break;
            case 12:
                $ala6 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
                break;
            default:
                break;
        }
    }
}
$sql = "SELECT ItemID, ItemName, Price, Picture, Descriptions FROM GnC_Menu WHERE ItemType = 'Sets' ;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["ItemID"] == 13) {
            $set1 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        } elseif ($row["ItemID"] == 14) {
            $set2 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        } elseif ($row["ItemID"] == 15) {
            $set3 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        }
    }
}
$sql = "SELECT ItemID, ItemName, Price, Picture, Descriptions FROM GnC_Menu WHERE ItemType = 'Sides' ;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["ItemID"] == 16) {
            $side1 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        } elseif ($row["ItemID"] == 17) {
            $side2 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        } elseif ($row["ItemID"] == 18) {
            $side3 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        }
    }
}
$sql = "SELECT ItemID, ItemName, Price, Picture, Descriptions FROM GnC_Menu WHERE ItemType = 'Beverages' ;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["ItemID"] == 19) {
            $drink1 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        } elseif ($row["ItemID"] == 20) {
            $drink2 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        } elseif ($row["ItemID"] == 21) {
            $drink3 = array($row["ItemName"], $row["Price"], $row["Picture"], $row["Descriptions"]);
        }
    }
}

    
    //done querying price and value, start cookies and processing
    
    
//if(!isset($_SESSION['price'])){
//    $_SESSION['price'] = array($promo1[1], $promo2[1], $promo3[1], $fam1[1], $fam2[1], $fam3[1], $ala1[1], $ala2[1], $ala3[1], $ala4[1], $ala5[1], $ala6[1], $set1[1], $set2[1], //$set3[1], $side1[1], $side2[1], $side3[1], $drink1[1], $drink2[1], $drink3[1]); //initiate price array
//}
if (isset($_POST["address"])){
    $address = $_POST["address"];
    $_SESSION['address'] = $address;
}

if (!isset($_SESSION['cart'])) {
    //$_SESSION['cart'] = array($promo1[0]=>0, $promo2[0]=>0, $promo3[0]=>0, $fam1[0]=>0, $fam2[0]=>0, $fam3[0]=>0, $ala1[0]=>0, $ala2[0]=>0, $ala3[0]=>0, $ala4[0]=>0, $ala5[0]=>0, $ala6[0]=>0, $set1[0]=>0, $set2[0]=>0, $set3[0]=>0, $side1[0]=>0, $side2[0]=>0, $side3[0]=>0, $drink1[0]=>0, $drink2[0]=>0, $drink3[0]=>0); //initiate cart array

    $_SESSION['cart'] = array();

    $sql = "SELECT ItemID, ItemName, Price FROM GnC_Menu;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['cart'][(int)$row["ItemID"]] = array('Name' => $row["ItemName"], 'Price' => $row["Price"], 'Quantity' => 0);
        }
    }
}
//done initializing cookies for cart.
else{
    if (isset($_GET['promo1'])) {
        $_SESSION['cart'][1]['Quantity'] += $_GET['promo1'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['promo2'])) {
        $_SESSION['cart'][2]['Quantity'] += $_GET['promo2'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['promo3'])) {
        $_SESSION['cart'][3]['Quantity'] += $_GET['promo3'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['fam1'])) {
        $_SESSION['cart'][4]['Quantity'] += $_GET['fam1'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['fam2'])) {
        $_SESSION['cart'][5]['Quantity'] += $_GET['fam2'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['fam3'])) {
        $_SESSION['cart'][6]['Quantity'] += $_GET['fam3'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['ala1'])) {
        $_SESSION['cart'][7]['Quantity'] += $_GET['ala1'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['ala2'])) {
        $_SESSION['cart'][8]['Quantity'] += $_GET['ala2'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['ala3'])) {
        $_SESSION['cart'][9]['Quantity'] += $_GET['ala3'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['ala4'])) {
        $_SESSION['cart'][10]['Quantity'] += $_GET['ala4'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['ala5'])) {
        $_SESSION['cart'][11]['Quantity'] += $_GET['ala5'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['ala6'])) {
        $_SESSION['cart'][12]['Quantity'] += $_GET['ala6'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['set1'])) {
        $_SESSION['cart'][13]['Quantity'] += $_GET['set1'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['set2'])) {
        $_SESSION['cart'][14]['Quantity'] += $_GET['set2'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['set3'])) {
        $_SESSION['cart'][15]['Quantity'] += $_GET['set3'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['side1'])) {
        $_SESSION['cart'][16]['Quantity'] += $_GET['side1'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['side2'])) {
        $_SESSION['cart'][17]['Quantity'] += $_GET['side2'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['side3'])) {
        $_SESSION['cart'][18]['Quantity'] += $_GET['side3'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['drink1'])) {
        $_SESSION['cart'][19]['Quantity'] += $_GET['drink1'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['drink2'])) {
        $_SESSION['cart'][20]['Quantity'] += $_GET['drink2'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
    if (isset($_GET['drink3'])) {
        $_SESSION['cart'][21]['Quantity'] += $_GET['drink3'];
        echo '<script type="text/javascript">';
        echo ' alert("Item added successfully")';  
        echo '</script>';
    }
}
    mysqli_close($conn);
    
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
	href = "css/menu.css">
	<!--google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Noto+Serif+SC|Playfair+Display|Rock+Salt&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text|Montserrat|Staatliches&display=swap" rel="stylesheet">
	<!--js style doc-->
	<script type="text/javascript" src="js/main.js"></script>
	 <script type="text/javascript">	
	 	function showProm(){

			document.getElementById("pro").style.display = "block";
			document.getElementById("fml").style.display = "none";
			document.getElementById("ala").style.display = "none";
			document.getElementById("set").style.display = "none";
			document.getElementById("side").style.display = "none";
			document.getElementById("bev").style.display = "none";


		}

		function showFml(){

			document.getElementById("pro").style.display = "none";
			document.getElementById("fml").style.display = "block";
			document.getElementById("ala").style.display = "none";
			document.getElementById("set").style.display = "none";
			document.getElementById("side").style.display = "none";
			document.getElementById("bev").style.display = "none";


		}


		function showAla(){

			document.getElementById("pro").style.display = "none";
			document.getElementById("fml").style.display = "none";
			document.getElementById("ala").style.display = "block";
			document.getElementById("set").style.display = "none";
			document.getElementById("side").style.display = "none";
			document.getElementById("bev").style.display = "none";


		}


		function showSet(){

			document.getElementById("pro").style.display = "none";
			document.getElementById("fml").style.display = "none";
			document.getElementById("ala").style.display = "none";
			document.getElementById("set").style.display = "block";
			document.getElementById("side").style.display = "none";
			document.getElementById("bev").style.display = "none";


		}


		function showSide(){

			document.getElementById("pro").style.display = "none";
			document.getElementById("fml").style.display = "none";
			document.getElementById("ala").style.display = "none";
			document.getElementById("set").style.display = "none";
			document.getElementById("side").style.display = "block";
			document.getElementById("bev").style.display = "none";


		}


		function showBvr(){

			document.getElementById("pro").style.display = "none";
			document.getElementById("fml").style.display = "none";
			document.getElementById("ala").style.display = "none";
			document.getElementById("set").style.display = "none";
			document.getElementById("side").style.display = "none";
			document.getElementById("bev").style.display = "block";


}


	 </script>
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
			<h2>Menu</h2>
		</div>
	</div>

	<div id = "type-bar">
		<table>
			<tr>
				<button onclick = "showProm()">Promotions</button>
				<button onclick = "showFml()">For Family</button>
				<button onclick = "showAla()">A La Carte</button>
				<button onclick = "showSet()">Sets</button>
				<button onclick = "showSide()">Sides</button>
				<button onclick = "showBvr()">Beverages</button>
			</tr>
		</table>

	</div>

	<div id="pro" class = "content" style="display: block;">
		<table>
			<tr>
                <td colspan="3" id="Promo"><h2>Promotions</h2></td>
            </tr>
			<tr>
				<td>
                        <div id="1">
                            <div class = "food-img" style="background-image: url('img/<?php echo $promo1[2]?>');">                            
                                <p>
                                    <?php echo $promo1[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $promo1[0] ?><br>
                            <?php echo "Price: "; echo  $promo1[1] ?>
                            <p>Quantity</p><input type = "text" name = "promo1">
                            <input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                    <td>	
                        <div id="2">
                            <div class = "food-img" style="background-image: url('img/<?php echo $promo2[2]?>');">                            
                                <p>
                                <?php echo $promo2[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $promo2[0] ?><br>
                            <?php echo "Price: ";  echo $promo2[1] ?>
                            <p>Quantity</p><input type = "text" name = "promo2">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                    <td>
                        <div id="3">
                        <div class = "food-img" style="background-image: url('img/<?php echo $promo3[2]?>');">                            
                                <p>
                                <?php echo $promo3[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $promo3[0] ?><br>
                            <?php echo "Price: "; echo $promo3[1] ?>
                            <p>Quantity</p><input type = "text" name = "promo3">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
			</tr>
		</table>
	</div>

	<div id ="fml" class = "content">
		<table>
			<tr>
                    <td colspan="3" id="Fam"><h2>For Family</h2></td>
                </tr>
                <tr>
                    <td>
                        <div id="4">
                        <div class = "food-img" style="background-image: url('img/<?php echo $fam1[2]?>');">                             
                                <p>
                                    <?php echo $fam1[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $fam1[0] ?><br>
                            <?php echo "Price: "; echo $fam1[1] ?>
                            <p>Quantity</p><input type = "text" name = "fam1">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                    <td>
                        <div id="5">
                        <div class = "food-img" style="background-image: url('img/<?php echo $fam2[2]?>');">                            
                                <p>
                                <?php echo $fam2[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $fam2[0] ?><br>
                            <?php echo "Price: "; echo $fam2[1] ?>
                            <p>Quantity</p><input type = "text" name = "fam2">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                    <td>
                        <div id="6">
                        <div class = "food-img" style="background-image: url('img/<?php echo $fam3[2]?>');">                              
                                <p>
                                <?php echo $fam3[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $fam3[0] ?><br>
                            <?php echo "Price: "; echo $fam3[1] ?>
                            <p>Quantity</p><input type = "text" name = "fam3">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                </tr>
		</table>
	</div>


	<div id = "ala" class = "content">
		<table>
			<tr>
                    <td colspan="3" id="Alc"><h2>Ala Carte</h2></td>
                </tr>
                <tr>
                    <td>
                        <div id="7">
                        <div class = "food-img" style="background-image: url('img/<?php echo $ala1[2]?>');">                             
                                <p>
                                    <?php echo $ala1[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $ala1[0] ?><br>
                            <?php echo "Price: "; echo $ala1[1] ?>
                            <p>Quantity</p><input type = "text" name = "ala1">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                    <td>
                        <div id="8">
                        <div class = "food-img" style="background-image: url('img/<?php echo $ala2[2]?>');">                            
                                <p>
                                <?php echo $ala2[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $ala2[0] ?><br>
                            <?php echo "Price: "; echo $ala2[1] ?>
                            <p>Quantity</p><input type = "text" name = "ala2">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>

                    <td>
                        <div id="9">
                        <div class = "food-img" style="background-image: url('img/<?php echo $ala3[2]?>');">                            
                                <p>
                                <?php echo $ala3[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $ala3[0] ?><br>
                            <?php echo "Price: "; echo $ala3[1] ?>
                            <p>Quantity</p><input type = "text" name = "ala3">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                </tr>
                <tr><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td></tr>
                <tr>
                    <td>
                        <div id="10">
                        <div class = "food-img" style="background-image: url('img/<?php echo $ala4[2]?>');">                            
                                <p>
                                <?php echo $ala4[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $ala4[0] ?><br>
                            <?php echo "Price: "; echo $ala4[1] ?>
                            <p>Quantity</p><input type = "text" name = "ala4">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                    <td>
                        <div id="11">
                        <div class = "food-img" style="background-image: url('img/<?php echo $ala5[2]?>');">                            
                                <p>
                                <?php echo $ala5[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $ala5[0] ?><br>
                            <?php echo "Price: "; echo $ala5[1] ?>
                            <p>Quantity</p><input type = "text" name = "ala5">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                    <td>
                        <div id="12">
                        <div class = "food-img" style="background-image: url('img/<?php echo $ala6[2]?>');">                          
                                <p>
                                <?php echo $ala6[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $ala6[0] ?><br>
                            <?php echo "Price: "; echo $ala6[1] ?>
                            <p>Quantity</p><input type = "text" name = "ala6">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                </tr>


		</table>
	</div>

	<div id = "set" class = "content">
		<table>
			 <tr>
                    <td colspan="3" id="Sets"><h2>Sets</h2></td>
                </tr>
                <tr>
                    <td>
                        <div id="13">
                        <div class = "food-img" style="background-image: url('img/<?php echo $set1[2]?>');">                          
                                <p>
                                <?php echo $set1[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $set1[0] ?><br>
                            <?php echo "Price: "; echo $set1[1] ?>
                            <p>Quantity</p><input type = "text" name = "set1">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                    <td>
                        <div id="14">
                        <div class = "food-img" style="background-image: url('img/<?php echo $set2[2]?>');">                           
                                <p>
                                <?php echo $set2[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $set2[0] ?><br>
                            <?php echo "Price: "; echo $set2[1] ?>
                            <p>Quantity</p><input type = "text" name = "set2">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                    <td>
                        <div id="15">
                        <div class = "food-img" style="background-image: url('img/<?php echo $set3[2]?>');">                            
                                <p>
                                <?php echo $set3[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $set3[0] ?><br>
                            <?php echo "Price: "; echo $set3[1] ?>
                            <p>Quantity</p><input type = "text" name = "set3">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                </tr>
              

		</table>
	</div>

	<div id = "side" class = "content">
		<table>
			<tr>
                    <td colspan="3" id="Sides"><h2>Sides</h2></td>
                </tr>
                <tr>
                    <td>
                        <div id="16">
                        <div class = "food-img" style="background-image: url('img/<?php echo $side1[2]?>');">                            
                                <p>
                                <?php echo $side1[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $side1[0] ?><br>
                            <?php echo "Price: "; echo $side1[1] ?>
                            <p>Quantity</p><input type = "text" name = "side1">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                    <td>
                        <div id="17">
                        <div class = "food-img" style="background-image: url('img/<?php echo $side2[2]?>');">                       
                                <p>
                                <?php echo $side2[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $side2[0] ?><br>
                            <?php echo "Price: "; echo $side2[1] ?>
                            <p>Quantity</p><input type = "text" name = "side2">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                    <td>
                        <div id="18">
                        <div class = "food-img" style="background-image: url('img/<?php echo $side3[2]?>');">                          
                                <p>
                                <?php echo $side3[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $side3[0] ?><br>
                            <?php echo "Price: "; echo $side3[1] ?>
                            <p>Quantity</p><input type = "text" name = "side3">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                </tr>

		</table>
	</div>

	<div id = "bev" class = "content">
		<table>
			<tr>
                    <td colspan="3" id="Drinks"><h2>Beverages</h2></td>
                </tr>
                <tr>
                    <td>
                        <div id="19">
                        <div class = "food-img" style="background-image: url('img/<?php echo $drink1[2]?>');">                            
                                <p>
                                <?php echo $drink1[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $drink1[0] ?><br>
                            <?php echo "Price: "; echo $drink1[1] ?>
                            <p>Quantity</p><input type = "text" name = "drink1">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                    <td>
                        <div id="20">
                        <div class = "food-img" style="background-image: url('img/<?php echo $drink2[2]?>');">                             
                                <p>
                                <?php echo $drink2[3]?>
                                </p>
                            </div>
                            <br>
                        <form method = "GET" action = "menu.php">
                            <?php echo $drink2[0] ?><br>
                            <?php echo "Price: "; echo $drink2[1] ?>
                            <p>Quantity</p><input type = "text" name = "drink2">
                            <br><input type = "submit" value = "Add Item">
                            </form>
                        </div>
                    </td>
                    <td>
                        <div id="21">
                        <div class = "food-img" style="background-image: url('img/<?php echo $drink3[2]?>');">                             
                                <p>
                                <?php echo $drink3[3]?>
                                </p>
                            </div>
                            <br>
                            <form method = "GET" action = "menu.php">
                            <?php echo $drink3[0] ?><br>
                            <?php echo "Price: "; echo $drink3[1] ?>
                            <p>Quantity</p><input type = "text" name = "drink3">
                            <br><input type = "submit" value = "Add Item">
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
