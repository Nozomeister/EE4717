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
?>


<html lang = "en">
    <head>
        <title>JavaJam Coffee House</title>
        <meta charset="utf-8">
        <link rel = "stylesheet" href = "javajam.css">
        <style>
            table {padding-left: 100px; padding-bottom: 50px}
            tr:nth-of-type(odd) {background-color: rgb(210, 180, 140);}
            tr {color: rgb(47, 3, 2); border-style: none; height: 70px; margin: auto; font-size: 1.25em;}
            td {padding-left: 10px;}
            .name {text-align: center; font-weight: bold; width:125px; padding-left: 0px;}
            .priceinput {width: 50px; display: inline-block;}
        </style>
        <script type = "text/javascript" src="javajam.js"></script>
    </head>
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
                <div id = "rightcolumn">
                    <h2>Click to update product prices</h2>
                    <div>W
                        <form name = "update" action="updateprice.php" method = "POST">
                        <table>
                            <tr>
                                <td><input type="checkbox" name = "changeJava" onchange="this.form.submit()"> </td>
                                <td class = "name"><b>Just Java</b></td>
                                <td>Regular house blend, decaffeinated coffee, or flavor of the day.<br>Endless Cup $ <input type = "text" name = "priceJava" id = "priceJava" class = "priceinput"></td>
                            </tr>
                            <tr>
                                <td><input type ="checkbox" name = "changeAuLait" onchange="this.form.submit()"></td>
                                <td class = "name"><b>Cafe au Lait</b></td>
                                <td>House blended coffee infused into a smooth, steamed milk.<br>Single: $ <input type = "text" name = "priceAlSingle" id = "priceAlSingle" class = "priceinput"> &nbsp;&nbsp;Double: $ <input type = "text" name = "priceAlDouble" id ="priceAlDouble" class = "priceinput"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name = "changeIceCap" onchange="this.form.submit()"></td>
                                <td class = "name"><b>Iced Cappucino</b></td>
                                <td>Sweetened espresso blended with icy-cold milk and served in a chilled glass.<br>Single: $ <input type = "text" name = "priceIceCapSingle"  id ="priceIceCapSingle" class = "priceinput"> &nbsp;&nbsp;Double: $ <input type = "text" name =  "priceIceCapDouble" id = "priceIceCapDouble" class = "priceinput"></td>
                            </tr>
                        </table>
                    </form>
                    </div>
                </div>
            </div>
            </header>         
                    <footer>Copyright &copy; 2014 JavaJam Coffee House<br><small><a href ="mailto:HongDuc@Nguyen.com">HongDuc@Nguyen.com</a></small></footer>
            </div>
        <script type="text/javascript" src="javajamr.js"></script>
        </body>
</html>