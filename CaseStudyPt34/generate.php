<?php 
 $dollar = $_POST['dollar'];
 $quantities = $_POST['quantities'];
?>

<html>
<head>
    <title>Sale report of JavaJam Coffeehouse</title>
</head>
<body>
    <h1>Sale report of JavaJam Coffeehouse</h1>


<?php 
    define('JustJava', 2.00);
    define('AuLaitSingle', 2.00);
    define('AuLaitDouble', 3.00); 
    define('IceCapSingle', 4.75);
    define('IceCapDouble', 5.75);
    $numJava = rand(1,100);
    $numAuLaitSingle = rand(1,100);
    $numAuLaitDouble = rand(1,100);
    $numIceCapSingle = rand(1,100);
    $numIceCapDouble = rand(1,100);
    $saleJava =  $numJava * JustJava;
    $saleALSingle = $numAuLaitSingle * AuLaitSingle;
    $saleALDouble = $numAuLaitDouble * AuLaitDouble;
    $saleICSingle = $numIceCapSingle * IceCapSingle;
    $saleICDouble = $numIceCapDouble * IceCapDouble;
    $totalSaleMoney = $saleJava + $saleALSingle + $saleALDouble + $saleICSingle + $saleICDouble;
    $single = $numAuLaitSingle + $numIceCapSingle +$numJava;
    $double = $numAuLaitDouble + $numIceCapDouble;
    $singleMoney = $numAuLaitSingle * AuLaitSingle + $numJava * JustJava + $numIceCapSingle * IceCapSingle;
    $doubleMoney = $numAuLaitDouble * AuLaitDouble + $numIceCapDouble * IceCapDouble;
    $productSales = array($saleJava, $sale, $numAuLaitSingle, $numIceCapDouble, $numIceCapSingle);
    sort($productSales);

    echo "<p>Sale report generated at ".date('H:i, js F Y')."</p><br />";
    if(isset($dollar)&&$dollar=='Yes' && !isset($quantities)){
        echo "<p>Total dolalr sales by products: $".$totalSaleMoney."</p> <br />";

    }
    else if(isset($quantities) && $quantities =='Yes' && !isset($quantities)){
        echo "<p>Sales of single shot: ".$single." cups</p> <br />";
        echo "<p>Sales of double shot: ".$double." cups</p> <br />";
        if($singleMoney > $doubleMoney){
            echo "<p>Highest dollar sales: Single shot with $".$singleMoney."</p><br />";
        }
        else if ($singleMoney < $doubleMoney){
            echo "<p>Highest dollar sales: Double shot with $".$doubleMoney."</p><br />";
        else {
            echo "<p>Both single shot and double shot yield the same amount: $".$doubleMoney."</p><br />";
        }

    }
?>