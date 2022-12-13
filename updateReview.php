<?php
//Insert user review to DB (Review)
require_once('connect.php');
    $customerID = $_POST['customerID'];
    $orderID = $_POST['orderID'];
    $productID = $_POST['productID'];
    $rate = $_POST['rate'];
    $comment = $_POST['comment'];

    if($comment == ""){
        $comment = "None...";
    }

    echo $customerID.'<br>';
    echo $orderID.'<br>';
    echo $productID.'<br>';
    echo $rate.'<br>';
    echo $comment.'<br>';

    $q = "INSERT INTO `review` (rate, comment, publishedDate, publishedTime, customerID, productID, orderID) VALUES ('$rate', '".$mysqli->real_escape_string($comment)."', now(), TIME(now()), '$customerID', '$productID', '$orderID')";
    $result=$mysqli->query($q);

    if(!$result){
        echo "INSERT failed. Error: ".$mysqli->error ;
        return false;
    }
    $redirect = "User_Order.php?customerID=$customerID";
    $mysqli->close();
    header("Location: $redirect");
    
?>