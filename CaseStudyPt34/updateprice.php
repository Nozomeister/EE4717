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

<html>
<head>
    <title>Price Update</title>
<head>
<body>
    <h1>Price Update for JavaJam Coffee House</h1>


<?php
echo "<h2>Price update at ".date('H:i, js F Y')."</h2><br />";
//connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($inputjava)){
  $sql = "UPDATE itemprice SET Price = '".$javaprice."' WHERE Item = 'JustJava'";
  $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Item JustJava updated successfully with the price of $".$javaprice."<br />";
    }
    else {
        echo "Error updating price: " . mysqli_error($conn);
    }
}

if(isset($inputaulait)){
    $sql = "UPDATE itemprice SET Price = '".$alsprice."' WHERE Item = 'AuLaitSingle'";
    $sql1 = "UPDATE itemprice SET Price = '".$aldprice."' WHERE Item = 'AuLaitDouble'";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    if($result && $result1){
        echo "Item AuLaitSingle updated successfully with the price of $".$alsprice." and item AuLaitDouble updated successfully with the price of $".$aldprice."<br />";
    }
    else {
        echo "Error updating price: " . mysqli_error($conn);
    }
}

if(isset($inputicecap)){
    $sql = "UPDATE itemprice SET Price = '".$icsprice."' WHERE Item = 'IceCapSingle'";
    $sql1 = "UPDATE itemprice SET Price = '".$icdprice."' WHERE Item = 'IceCapDouble'";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    if($result && $result1){
        echo "Item IceCapSingle updated successfully with the price of $".$icsprice." and item IceCapDouble updated successfully with the price of $".$icdprice."<br />";
    }
    else {
        echo "Error updating price: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>