<?php 
include "dbconnect.php";
session_start();
?>



<html>
<head>
    <title>Grill n Chill</title>
    <meta charset = "utf-8">
    <!--css style doc-->
    <link rel = "stylesheet"
    type = "text/css"
    href = "css/main.css">
    <link rel = "stylesheet"
    type = "text/css"
    href = "css/register.css">
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
                <a href ="track-order.php">Track Order</a>
                <a href ="contact-us.php">Contact Us</a>    
            </div>  
        </div>
    
        <a href="cart.php"><img id ="cart-icon" src="img/cart.png"></a>

        <p>Grill n Chill</p>    <!--replace with an img later-->    
        
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
            <h2>Log In</h2>
        </div>
    </div>
    
    <div id="content">
        
        <div id= "table">
            <?php 
                include "dbconnect.php";
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                echo ("<br />" . "Your Username : $username" . "<br />". "Your Password: $password2" . "<br /> "."<br />");
                $password = md5($password);
                $sql = "INSERT INTO GnC_User (Username, Userpassword, Phone, Email) 
                        VALUES ('$username', '$password', '$phone', '$email')";
                $result = $dbcnx->query($sql);
                if (!$result){
                 echo "Your query failed.";
                }   
                else{
                    echo "Welcome ". $username . ". You are now registered."; echo "<br />"; echo "<br />";
                    echo '<a href = "login.php">Return back to login </a>';
                    //header("Location: login.php"); /* Redirect browser */
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
