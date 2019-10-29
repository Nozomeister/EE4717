<?php
$servername = "localhost";
$username = "f33ee";
$password = "f33ee";
$dbname = "f33ee";
$inputjava = $_POST["changeJava"];
$inputaulait = $_POST["changeAuLait"];
$inputicecap = $_POST["changeIceCap"];
$javaprice = $_POST["priceJava"];
$alsprice = $_POST["priceAlSingle"];
$aldprice = $_POST["priceAlDouble"];
$icsprice = $_POST["priceIceCapSingle"];
$icdprice = $_POST["priceIceCapDouble"];
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($inputjava)){
  $sql = "UPDATE itemprice SET Price = '".$javaprice."' WHERE Item = 'JustJava'";
  if($javaprice>0){
  $result = mysqli_query($conn, $sql);
  }
    /*if ($result) {
        echo "Item JustJava updated successfully with the price of $".$javaprice."<br />";
    }
    else {
        echo "Error updating price: " . mysqli_error($conn);
    }*/
}

if(isset($inputaulait)){
    $sql = "UPDATE itemprice SET Price = '".$alsprice."' WHERE Item = 'AuLaitSingle'";
    $sql1 = "UPDATE itemprice SET Price = '".$aldprice."' WHERE Item = 'AuLaitDouble'";
    if($alsprice>0){
        $result = mysqli_query($conn, $sql);
    }
    if($aldprice>0){
    $result1 = mysqli_query($conn, $sql1);
    }
    /*if($result){
        echo "Item AuLaitSingle updated successfully with the price of $".$alsprice."<br />";
    }
    if($result1){
        echo "Item AuLaitDouble updated successfully with the price of $".$aldprice."<br />";
    }*/
}

if(isset($inputicecap)){
    $sql = "UPDATE itemprice SET Price = '".$icsprice."' WHERE Item = 'IceCapSingle'";
    $sql1 = "UPDATE itemprice SET Price = '".$icdprice."' WHERE Item = 'IceCapDouble'";
    if($icsprice>0){
    $result = mysqli_query($conn, $sql);
    }
    if($icdprice>0){
    $result1 = mysqli_query($conn, $sql1);
    }
    /*if($result){
        echo "Item IceCapSingle updated successfully with the price of $".$icsprice."<br />";
    }
    if($result1){
        echo "Item IceCapDouble updated successfully with the price of $".$icdprice."<br />";
    }*/
}
mysqli_close($conn);
?>
<html>
<head>
    <title>Price Update</title>
    <link rel = "stylesheet" href = "javajam.css">
    <style>
            table {padding-left: 100px; padding-bottom: 50px}
            tr:nth-of-type(odd) {background-color: rgb(210, 180, 140);}
            tr {color: rgb(47, 3, 2); border-style: none; height: 70px; margin: auto; font-size: 1.25em;}
            td {padding-left: 10px;}
            .name {text-align: center; font-weight: bold; width:125px; padding-left: 0px;}
            .priceinput {width: 50px; display: inline-block;}
    </style>
<head>
<body>
<div class = "wrapper">
                <header><img class='java' src="javalogo.gif"></header>
                <!------src of logo: http://personal.kent.edu/~dpearso7/lab4/javajam4/javalogo.gif-->
                <div class = "row">
                <div id = "leftcolumn">
                    <div class = "priceupdate">
                        <ul>
                            <li>Product</li>
                            <li>Price</li>
                            <li>Update</li>
                        </ul>
                    </div>
                </div>
                <div id = "rightcolumn" style ="padding:10px;">
                <div>
                        <form name = "update" action="updateprice.php" method = "POST">
                        <table>
                            <tr>
                                <td>Update</td>
                                <td>Item</td>
                                <td>Description</td>
                                <td>Single</td>
                                <td>Double</td>
                            <tr>
                                <td><input type="checkbox" name = "changeJava" onchange="this.form.submit()"> </td>
                                <td class = "name"><b>Just Java</b></td>
                                <td>Regular house blend, decaffeinated coffee, or flavor of the day.<br>Endless Cup $ <input type = "text" name = "priceJava" id = "priceJava" class = "priceinput"></td>
                                <td><?php echo $javaprice ?></td>
                            </tr>
                            <tr>
                                <td><input type ="checkbox" name = "changeAuLait" onchange="this.form.submit()"></td>
                                <td class = "name"><b>Cafe au Lait</b></td>
                                <td>House blended coffee infused into a smooth, steamed milk.<br>Single: $ <input type = "text" name = "priceAlSingle" id = "priceAlSingle" class = "priceinput"> &nbsp;&nbsp;Double: $ <input type = "text" name = "priceAlDouble" id ="priceAlDouble" class = "priceinput"></td>
                                <td><?php echo $alsprice ?></td>
                                <td><?php echo $aldprice ?></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name = "changeIceCap" onchange="this.form.submit()"></td>
                                <td class = "name"><b>Iced Cappucino</b></td>
                                <td>Sweetened espresso blended with icy-cold milk and served in a chilled glass.<br>Single: $ <input type = "text" name = "priceIceCapSingle"  id ="priceIceCapSingle" class = "priceinput"> &nbsp;&nbsp;Double: $ <input type = "text" name =  "priceIceCapDouble" id = "priceIceCapDouble" class = "priceinput"></td>
                                <td><?php echo $icsprice ?></td>
                                <td><?php echo $icdprice ?></td>
                            </tr>
                        </table>
                    </form>
                    </div>
</div>
                </div>
            </div>
            </header>         
                    <footer>Copyright &copy; 2014 JavaJam Coffee House<br><small><a href ="mailto:HongDuc@Nguyen.com">HongDuc@Nguyen.com</a></small></footer>
            </div>
        </body>
</html>