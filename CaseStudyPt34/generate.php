<?php 
 $choiceVal = $_POST['report'];
 $servername = "localhost";
 $username = "f33ee";
 $password = "f33ee";
 $dbname = "f33ee";
?>

<html>
<head>
    <title>Sale report of JavaJam Coffeehouse</title>
    <link rel = "stylesheet" href = "javajam.css">
    <meta charset="utf-8">
    <style>
        #img {float: left; padding-left: 50px; margin-bottom: 50px; }
        #content {margin-left: 480px; padding-left: 100px; font-size: 1.25em;}
        #content p {padding-left: 20px;}
        #dollar {block-size: 3em; color: rgb(226, 210, 176);}
        input[type="radio"] {
            size: 5em;
            padding: 2px;

        }

    </style>
</head>
<body>
<div class = "wrapper">
            <header><img class='java' src="javalogo.gif"></header>
            <!------src of logo: http://personal.kent.edu/~dpearso7/lab4/javajam4/javalogo.gif-->
            <div class = "row">
                <div id = "leftcolumn">
                    <div class="priceupdate">
                        <ul>
                            <li>Daily</li>
                            <li>Sales</li>
                            <li>Report</li>
                        </ul>
                    </div>
                </div>
            <div id = "rightcolumn" style = "padding: 10px;">
<?php 
    $summoney = 0;
    $single = 0;
    $double = 0;
    $singleMoney = 0;
    $doubleMoney = 0;
    $javaNum = 0;
    $alSing = 0;
    $alDouble = 0;
    $icSing = 0;
    $icDouble = 0;
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn){
        die("Connection failed: ".mysqli_connect_error());
    } //End of MySQL connection.
    $sql = "SELECT Item, Price, SaleAmount, TypeOfShot FROM itemprice;";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $summoney += $row["Price"] * $row["SaleAmount"];
            if($row["TypeOfShot"] == 1){
                $single += $row["SaleAmount"];
                $singleMoney += $row["Price"] * $row["SaleAmount"];
                if($row["Item"] =="JustJava"){
                    $javaNum = $row["SaleAmount"];
                    $javaMon = $javaNum * $row["Price"];
                }
                elseif($row["Item"] =="AuLaitSingle"){
                    $alSing = $row["SaleAmount"];
                    $alSingMon = $alSing * $row["Price"];
                }
                elseif($row["Item"] =="IceCapSingle"){
                    $icSing = $row["SaleAmount"];
                    $icSingMon = $icSing * $row["Price"];
                }
            }
            else{
                $double += $row["SaleAmount"];
                $doubleMoney += $row["Price"] * $row["SaleAmount"];
                if($row["Item"] == "AuLaitDouble"){
                    $alDouble = $row["SaleAmount"];
                    $alDoubleMon = $alDouble * $row["Price"];
                }
                else{
                    $icDouble = $row["SaleAmount"];
                    $icDoubleMon = $icDouble * $row["Price"];
                }
            }
        }
    }
    else{
        echo "<p>There is a problem within the database.</p>";
    }
    $alSum = $alSingMon + $alDoubleMon;
    $icSum = $icSingMon + $icDoubleMon;
    $alNum = $alSing + $alDouble;
    $icNum = $icSingMon + $icDouble;
    echo "<p>Sale report generated at ".date('H:i, js F Y')."</p>";

    if($choiceVal == "First"){
        echo "<h2>Total dollar sales by products: $".$summoney."</h2>";
        echo "<p>Breakdown: </p><br />";
        echo "<table>
              <tr>
                <td> Name </td>
                <td> Quantity </td>
                <td> Total sale </td>
              </tr>
              <tr>
                <td> JustJava </td>
                <td> $javaNum </td>
                <td> $javaMon </td>
              </tr>
              <tr>
                <td> Coffee Au Lait </td>
                <td> $alNum </td>
                <td> $alSum </td>
              </tr>
              <tr>
                <td> Ice Cappucino </td>
                <td> $icNum </td>
                <td> $icSum </td>
              </tr>              
              </table>";
    }
    elseif($choiceVal == "Second"){
        echo "<p>Sales of single shot: ".$single." cups</p> <br />";
        echo "<p>Sales of double shot: ".$double." cups</p> <br />";
        if($singleMoney > $doubleMoney){
            echo "<p>Highest dollar sales: Single shot with $".$singleMoney."</p><br />";
        }
        elseif ($singleMoney < $doubleMoney){
            echo "<p>Highest dollar sales: Double shot with $".$doubleMoney."</p><br />";
            }   
        else {
                echo "<p>Both single shot and double shot yield the same amount: $".$doubleMoney."</p><br />";
        }
    }
    mysqli_close($conn);
   
?>
</div>
</div>
                <footer>Copyright &copy; 2014 JavaJam Coffee House<br><small><a href ="mailto:HongDuc@Nguyen.com">HongDuc@Nguyen.com</a></small></footer>
        </div>
    </body>
    
</html>