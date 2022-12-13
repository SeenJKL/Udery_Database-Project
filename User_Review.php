<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="User_Review.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_Review</title>
</head>
<body>
        <?php
                $customerID = $_GET['customerID'];
                $q = "SELECT * FROM customer WHERE '$customerID' = customer.customerID";
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
                <a href = "help" style="left: 70%; top: 2.5%;">Help</a>
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
                <h1>REVIEW</h1>
                <div id ="div_orderRec">
                        <?php
                        //Select and display order that user want to review
                            $customerID = $_GET['customerID'];
                            $orderID = $_GET['orderID'];
                            
                            $q = "SELECT * FROM `order`, `product` WHERE '$orderID' = order.orderID AND order.productID = product.productID";
                            $result = $mysqli->query($q);
                            while($row=$result->fetch_array()){
                                $orderID = $row['orderID'];
                                $orderDate = $row['orderDate'];
                                $productID = $row['productID'];
                                $productPhoto = $row['productPhoto'];
                                $productName = $row['productName'];
                                $price = $row['price'];
                                $orderStatus = $row['orderStatus'];
                            }
                        ?>

                    <div id = "div_orderBar">
                        <h1>Order ID: <?= $orderID?></h1>
                        <h1> | </h1>
                        <h1> <?= $orderDate ?> </h1> 
                        <?php
                            echo "<a href = 'Product_Page.php?customerID=$customerID&productID=$productID'>View More</a>";
                        ?>
                    </div>
                    <div id = "div_order">
                        <br>
                            <img src = "<?= $productPhoto?>" width = "150" height = "150" style = "border-radius: 25px;">
                            <h2> <?= $productName ?></h2>
                            <h2 style = "width: 150px; margin-left: 30px;">USD <?= $price?></h2>
                            <h2 style = "color: #81EB8C; width: 200px; margin-left: 10px;"> <?= $orderStatus?></h2>
                    </div>


                    <div id = "div_review">

                            <?php 
                                echo "<form action = 'updateReview.php' method ='POST'>";
                            ?>

                        <input type = 'hidden' name = "customerID" value = "<?=$customerID?>"></input>
                        <input type = 'hidden' name = "orderID" value = "<?=$orderID?>"></input>
                        <input type = 'hidden' name = "productID" value = "<?=$productID?>"></input>

                        <div id ="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                            <input type="radio" name="rate" value="0" checked/>
                        </div>

                        <div id = "comment">
                            <textarea rows = "7" cols= "50" placeholder= "What do you think of the the product?" name = "comment"></textarea>
                            <input type = "submit"></input>
                        </div>

                        <?php
                            echo "</form>";
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>