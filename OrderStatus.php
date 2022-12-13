<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="OrderStatus.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order_Status</title>
</head>
<body>

        <?php
        //Check Order for display order status
                $customerID = $_GET['customerID'];
                $orderID = $_GET['orderID'];

                $q = "SELECT * FROM customer, `order`, deliverycompany WHERE '$customerID' = customer.customerID AND '$orderID' = order.orderID AND order.companyID = deliverycompany.companyID";
                $result = $mysqli->query($q);
                while($row=$result->fetch_array()){
                    $redirect = "Home.php?customerID=$customerID";
                    $name = $row['firstname']." ".$row['lastname'];
                    $orderID = $row['orderID'];
                    $companyName = $row['companyName'];
                    $orderStatus = $row['orderStatus'];
                    $orderDate = $row['orderDate'];
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

        <h1>TRACKING ORDER ID - <?= $orderID?></h1>  
        <div id="div_ship">
            <label>Shipped via: <?= $companyName?></label>
            <?php
                if($orderStatus == "Order Complete"){
                    echo "<label style= 'color: #81EB8C;' >Status: Order Complete </label>";
                }
                else{
                    echo "<label>Status: $orderStatus </label>";
                }
                echo "<label>Order Data: $orderDate </label>";
            ?>
        </div>
        <div id = "div_show">

                <?php
                    $Fbackground = array("background: linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);",
                        "background: linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);",
                        "background: linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);",
                        "background: linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);",
                        "background: linear-gradient(180deg, #D9D9D9 0%, rgba(217, 217, 217, 0) 100%);"
                        );
                    if($orderStatus == "Order Complete"){
                        $orderStatus = "Product Delivered";
                    }
                    if($orderStatus == "Product Delivered"){
                        $FTB = 5;
                    }if($orderStatus == "Product Dispatched"){
                        $FTB = 4;
                    }if($orderStatus == "Quality Check"){
                        $FTB = 3;
                    }if($orderStatus == "Processing Order"){
                        $FTB = 2;
                    }if($orderStatus == "Confirmed Order"){
                        $FTB = 1;
                    }
                    for($i = 0; $i < $FTB; $i = $i+1){
                        $Fbackground[$i] = "background: linear-gradient(180deg, #57D7FF 0%, rgba(87, 215, 255, 0) 100%);";
                    }
                ?>
                <div id="C">
                    <img src = "UI/cartU.png" style = "<?=$Fbackground[0]?>">Confirmed Order
                </div>
                <span>&#187;</span>
                <div id="PO">
                    <img src = "UI/POU.png" style = "<?=$Fbackground[1]?>">Processing Order
                </div>
                <span>&#187;</span>
                <div id="QC">
                    <img src = "UI/QCU.png" style = "<?=$Fbackground[2]?>">Quality Check
                </div>
                <span>&#187;</span>
                <div id="T">
                    <img src = "UI/truck.png" style = "<?=$Fbackground[3]?>">Product Dispatched
                </div>
                <span>&#187;</span>
                <div id="H">
                    <img src = "UI/Home.png" style = "<?=$Fbackground[4]?>">Product Delivered
                </div>
        </div>
    </div>
</body>
</html>