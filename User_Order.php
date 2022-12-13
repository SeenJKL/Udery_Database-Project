<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="User_Order.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_Order</title>
</head>
<body>
        <?php
                $customerID = $_GET['customerID'];
                $q = "select * from customer where '$customerID' = customer.customerID";
                $result = $mysqli->query($q);
                while($row=$result->fetch_array()){
                    $redirect = "Home.php?customerID=$customerID";
                    $name = $row['firstname']." ".$row['lastname'];
                }    
                
        ?>
    <div id = "wrapper">
        <div id = "div_bar"></div>
            <div id = "div_header">
                <a href = "<?=$redirect?>" style = "left: 2.5%; top: 1%; font-size: 48px;">Udery</a>
                <a href = "<?=$redirect?>" style="left: 60%; top: 2.5%;">Home</a>
                <a href = "#help" style="left: 70%; top: 2.5%;">Help</a>
                <a href = "User_Profile.php?customerID=<?=$customerID?>" style="left: 80%; top: 2.5%;"><?=$name;?></a> <!-- Customer Name from DB -->
                <a href = 'Home.php' style = 'left: 95%; top: 2.5%;'> Logout </a>
            </div>
        <div id = "div_content">
            <div id = "div_rec"></div>
            <div id = "div_menubar"></div>
            <div id = "div_menu">
                <h1>MY ACCOUNT</h1>
                <a href = "User_Profile.php?customerID=<?=$customerID?>" style="padding-top: 20px; ">Your Profile<span>&#8250;</span></a> 
                <a href = "User_Order.php?customerID=<?=$customerID?>" style="padding-top: 20px; background: linear-gradient(180deg, #091355 99.16%, rgba(217, 217, 217, 0) 100%);">Your Order<span>&#8250;</span></a>
            </div>

            <div id = "div_info">
                <h1>MY ORDER</h1>
                <div id ="div_orderRec">
                    <?php
                    //Display order of each user
                            $q = "SELECT * FROM `order`,`product` WHERE '$customerID' = order.customerID AND order.productID = product.productID ORDER BY orderID DESC";
                            $result = $mysqli->query($q);
                            while($row=$result->fetch_array()){
                                $orderID = $row['orderID'];
                                $orderDate = $row['orderDate'];
                                $productID = $row['productID'];
                                $productPhoto = $row['productPhoto'];
                                $productName = $row['productName'];
                                $price = $row['price'];
                                $orderStatus = $row['orderStatus'];

                                if($orderStatus != 'Order Complete'){
                                    //Order Bar
                                    echo "<div id = 'div_orderBar'>";
                                    echo "<h1>Order ID: $orderID</h1>";
                                    echo "<h1> | </h1>";
                                    echo "<h1> $orderDate </h1>"; 
                                    echo "<a href = 'Product_Page.php?customerID=$customerID&productID=$productID'>View More</a>";
                                    echo "</div>";
                                    //Order Detail
                                    echo "<div id = 'div_order'>";
                                    echo "<br>";    
                                    echo "<img src = '$productPhoto' width = '150' height = '150' style = 'border-radius: 25px;'>";
                                    echo "<h2>$productName</h2>";        
                                    echo "<h2 style = 'width: 150px;'>USD $price </h2>";        
                                    echo "<p style = 'margin-bottom: 30px;'> $orderStatus </p>";        
                                    echo "<a href = 'OrderStatus.php?customerID=$customerID&orderID=$orderID'>Tracking details</a>";
                                    echo "</div>";
                                }
                                else{
                                    //Order Bar
                                    echo "<div id = 'div_orderBar'>";
                                    echo "<h1>Order ID: $orderID</h1>";
                                    echo "<h1> | </h1>";
                                    echo "<h1> $orderDate </h1>"; 
                                    echo "<a href = 'Product_Page.php?customerID=$customerID&productID=$productID'>View More</a>";
                                    echo "</div>";
                                    //Order Detail
                                    echo "<div id = 'div_order'>";
                                    echo "<br>";    
                                    echo "<img src = '$productPhoto' width = '150' height = '150' style = 'border-radius: 25px;'>";
                                    echo "<h2>$productName</h2>";        
                                    echo "<h2 style = 'width: 150px;'>USD $price </h2>";        
                                    echo "<p style = 'margin-bottom: 30px;'> $orderStatus </p>";        
                                    echo "<a href = 'OrderStatus.php?customerID=$customerID&orderID=$orderID'>Tracking details</a>";


                                    $qr = "SELECT * FROM `review` WHERE '$orderID' = review.orderID";
                                    $result2 = $mysqli->query($qr);
                                    $count = 0;
                                    while($row2 = $result2->fetch_array()){
                                        $count = $count + 1;
                                    }
                                    if($count != 1){
                                        echo "<a href = 'User_Review.php?customerID=$customerID&orderID=$orderID'>";
                                        echo "<input type='submit' value='Write Review'></input></a>";
                                        echo "</div>";
                                    }
                                    else{
                                        echo "</div>";
                                    }
                                }
                            }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>