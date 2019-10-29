<?php 
$javaNum = $_POST["javaNumber"];
$laitNum = $_POST["laitNumber"];
$capNum = $_POST["capNumber"];
$laitType = $_POST["cafLait"];
$capType = $_POST["iceCap"];
$servername = "localhost";
$username = "f33ee";
$password = "f33ee";
$dbname = "f33ee";
?>

<html>
    <head>
        <title>Order successful!</title>
    </head>
    <body>
        <h1>Your order has been placed successfully!</h1>


<?php

    $summoney = 0;
    $javamoney = 0;
    $aumoney = 0;
    $icmoney = 0;
    $javadb = 0;
    $alsdb = 0;
    $alddb = 0;
    $icsdb = 0;
    $icddb = 0;
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
   

    if (!$conn){
        die("Connection failed: ".mysqli_connect_error());
    } //End of MySQL connection.
    $sql = "SELECT Item, Price, SaleAmount FROM itemprice;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            if($row["Item"] == "JustJava"){
                $javadb = $row["SaleAmount"];
            }
            elseif($row["Item"] == "AuLaitSingle"){
                $alsdb = $row["SaleAmount"];
            }
            elseif($row["Item"] == "AuLaitDouble"){
                $alddb = $row["SaleAmount"];
            }
            elseif($row["Item"] == "IceCapSingle"){
                $icsdb = $row["SaleAmount"];
            }
            elseif($row["Item"] == "IceCapDouble"){
                $icddb = $row["SaleAmount"];
            }
        }
    }
    else{
        echo "<p>There is a problem within the database.</p>";
    }

    if($javaNum>0){
        $javamoney = $javaNum * 2.00;
        $javadb += $javaNum;
        $summoney = += $javamoney;
    }
    if($laitNum>0){
        if($laitType == "2.00"){
            $aumoney = $aumoney * 2.00;
            $alsdb += $laitNum;
            $summoney += $aumoney;
        }
        elseif($laitType == "3.00"){
            $aumoney = $aumoney * 3.00;
            $alddb += $laitNum;
            $summoney += $aumoney;
        }
    }
    if($capNum>0){
        if($capType =="4.75"){
            $icmoney = $capNum * 4.75;
            $icsdb += $capNum;
            $summoney += $icmoney;
        }
        elseif($capType =="5.75"){
            $icmoney = $capNum * 5.75;
            $icddb += $capNum;
            $summoney += $icmoney;
        }
    }

    $sql = "UPDATE itemprice SET SaleAmount = '".$javadb."' WHERE Item = 'JustJava'";
    mysqli_query($conn, $sql);
    $sql = "UPDATE itemprice SET SaleAmount = '".$alsdb."' WHERE Item = 'AuLaitSingle'";
    mysqli_query($conn, $sql);
    $sql = "UPDATE itemprice SET SaleAmount = '".$alddb."' WHERE Item = 'AuLaitDouble'";
    mysqli_query($conn, $sql);
    $sql = "UPDATE itemprice SET SaleAmount = '".$icsdb."' WHERE Item = 'IceCapSingle'";
    mysqli_query($conn, $sql);
    $sql = "UPDATE itemprice SET SaleAmount = '".$icddb."' WHERE Item = 'IceCapDouble'";
    mysqli_query($conn, $sql);

    echo "<h2>Order submitted at ".date('H:i, js F Y')."</h2>";
    echo "<p>Order details: </p>";
    echo "<p>JustJava : ".$javaNum." cups </p>";
    echo "<p>Cafe Au Lait: ".$laitNum." cups </p>";
    echo "<p>Ice Capuccino: ".$laitNum." cups </p>"; 
    echo "<p>Total price: $".$summoney." </p>";
    mysqli_close($conn);
?>


