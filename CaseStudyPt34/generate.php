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
</head>
<body>
    <h1>Sale report of JavaJam Coffeehouse</h1>


<?php 
    $summoney = 0;
    $single = 0;
    $double = 0;
    $singleMoney = 0;
    $doubleMoney = 0;
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn){
        die("Connection failed: ".mysqli_connect_error());
    } //End of MySQL connection.
    $sql = "SELECT Price, SaleAmount, TypeOfShot FROM itemprice;";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $summoney += $row["Price"] * $row["SaleAmount"];
            if($row["TypeOfShot"] == 1){
                $single += $row["SaleAmount"];
                $singleMoney += $row["Price"] * $row["SaleAmount"];
            }
            else{
                $double += $row["SaleAmount"];
                $doubleMoney += $row["Price"] * $row["SaleAmount"];
            }
        }
    }
    else{
        echo "<p>There is a problem within the database.</p>";
    }

    echo "<p>Sale report generated at ".date('H:i, js F Y')."</p><br />";

    if($choiceVal == "First"){
        echo "<h2>Total dollar sales by products: $".$summoney."</h2> <br />";
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
</body>