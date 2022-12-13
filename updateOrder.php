<?php
//Insert order info to DB (order)
require_once('connect.php');
    $customerID = $_GET['customerID'];
    $productID = $_GET['productID'];
    $companyID = $_GET['companyID'];
    $quantity = $_POST['quantity'];
    $totalPrice = $_POST['totalPrice'];
    $cardNum = $_POST['cardNum'];
    $cardName = $_POST['cardName'];
    $CCV = $_POST['CCV'];
    $ExpDate = $_POST['ExpDate'];
    $orderStatus = "Confirmed Order";

    echo $customerID."<br>";
    echo $productID."<br>";
    echo $companyID."<br>";
    echo $quantity."<br>";
    echo $totalPrice."<br>";
    echo $cardNum."<br>";
    echo $cardName."<br>";
    echo $CCV."<br>";
    echo $ExpDate."<br>";
    
    $q = "INSERT INTO `order`(orderID, orderDate, quantity, price, customerID, productID, companyID, CardNum, CardName, CCV, ExpDate, orderStatus) VALUES (now(),now(),'$quantity','$totalPrice', '$customerID','$productID','$companyID','$cardNum','$cardName','$CCV', '$ExpDate' , '$orderStatus')";
    $result=$mysqli->query($q);

    if(!$result){
        echo "INSERT failed. Error: ".$mysqli->error ;
        return false;
    }
    $en = "UPDATE `order` SET CardNum_encrypt = SHA1($cardNum), CCV_encrypt = SHA1($CCV) WHERE customerID = '$customerID' AND orderID = now()";
    $result2=$mysqli->query($en);


    $redirect = "User_Order.php?customerID=$customerID";
    $mysqli->close();
    header("Location: $redirect");
?>