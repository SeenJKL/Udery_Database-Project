<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="StartOrder.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout_Page</title>
</head>
<body>

                <?php
                //Get customerID
                    if(isset($_GET['customerID'])){
                        if($_GET['customerID'] == ""){
                            $redirect = "Home.php";
                            header("Location: Login_page.php?productID=".$_GET['productID']);
                        }
                        else{
                            $customerID = $_GET['customerID'];
                            $q = "select * from customer where '$customerID' = customer.customerID";
                            $result = $mysqli->query($q);
                            while($row=$result->fetch_array()){
                                $redirect = "Home.php?customerID=$customerID";
                            }
                        }
                    }
                ?>

    <div id = "wrapper">
        <div id = "div_bar"></div>
        <div id = "div_header">
            <a href = "<?=$redirect?>" style = "left: 2.5%; top: 1%; font-size: 48px;">Udery</a>
            <a href = "<?=$redirect?>" style="left: 60%; top: 2.5%;">Home</a>
            <a href = "#help" style="left: 70%; top: 2.5%;">Help</a>
            <?php
                if(isset($_GET['customerID']) && $_GET['customerID'] != ""){
                    $customerID = $_GET['customerID'];
                    $q = "select * from customer where '$customerID' = customer.customerID";
                    $result = $mysqli->query($q);
                    $name = "";
                    while($row=$result->fetch_array()){
                        $name = $row['firstname']." ".$row['lastname'];
                    }
                    if ($name == ""){
                        echo "<a href = 'Register_Page.php' style='left: 80%; top: 2.5%;'>Sign up</a>";
                        echo "<a href = 'Login_Page.php' style='left: 90%; top: 2.5%;'>Login</a>";
                    }
                    echo "<a href = 'User_Profile.php?customerID=$customerID' style='left: 80%; top: 2.5%;';>".$name."</a>";
                    echo "<a href = 'Home.php' style = 'left: 95%; top: 2.5%;'> Logout </a>";
                }
                else{
                    echo "<a href = 'Register_Page.php' style='left: 80%; top: 2.5%;'>Sign up</a>";
                    echo "<a href = 'Login_Page.php' style='left: 90%; top: 2.5%;'>Login</a>";
                }
            ?>
        </div>
        <div id = "div_content">
            <div id = "div_rec"></div>

                <?php
                //Display product that user want to buy
                        isset( $_GET['productID'] ) ? $productID = $_GET['productID'] : $productID = "";
                        $q = "SELECT * FROM product WHERE '$productID' = product.productID";
                        $result = $mysqli->query($q);
                        while($row=$result->fetch_array()){
                            $productID = $row['productID'];
                            $productName = $row['productName'];
                            $category = $row['category'];
                            $productPhote = $row['productPhoto'];
                            $productPrice = $row['productPrice'];
                            $benefits = $row['benefits'];
                            $protection1 = $row['protection1'];
                            $protection2 = $row['protection2'];
                            $protection3 = $row['protection3'];
                        }
                        //Customer choose deli company
                        $companyID = $_POST['deliveryCom'];
                        $q = "SELECT * FROM deliveryCompany WHERE '$companyID' = deliveryCompany.companyID";
                        $result = $mysqli->query($q);
                        while($row=$result->fetch_array()){
                            $companyName = $row['companyName'];
                            $method = $row['method'];
                            $PCS = $row['PCS'];
                        }
                ?>
                <h1>Checkout Point</h1>
                <div id = "div_table">
                    <table>
                        <col width = "250px">
                        <col width = "400px">
                        <col width = "150px">
                        <col width = "150px">
                        <col width = "150px">
                        <col width = "150px">
                        <col width = "150px">
                        <col width = "150px">

                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                            <th>Delivery Company</th>
                            <th>Method</th>
                            <th>Delivery Price</th>
                            <th>Total</th>
                        <tr>

                        <tr>

                            <?php
                                $quantity = $_POST['quantity'];
                                $totalproductprice = $productPrice * $quantity;
                                $totaldeliprice =$PCS * $quantity;
                                $total = $totalproductprice + $totaldeliprice;
                                echo "<td><img src='$productPhote'></td>";
                                echo "<td style = text-align:left;>$productName</td>";
                                echo "<td>$productPrice</td>";
                                echo "<td>$quantity</td>";
                                echo "<td>$companyName</td>";
                                echo "<td>$method</td>";
                                echo "<td>$PCS/Piece</td>";
                                echo "<td>$total</td>";
                            ?>

                        </tr>
                    </table>
                </div>
            <div id = "Ch_ship">
                <h2 style = "font-size: 35px">Payment</h2>
                <div id = "inputCard">
                <?php
                    echo "<form action = 'updateOrder.php?customerID=$customerID&productID=$productID&companyID=$companyID' method = 'POST'>";
                    
                ?>
                    <input type = "hidden" name = "quantity" value="<?= $quantity ?>">
                    <input type = "hidden" name = "totalPrice" value ="<?= $total ?>">
                    <label>Card Number:</label>
                    <input type = "text" name="cardNum" required>
                    <br>
                    <label>Card name: </label>
                    <input type = "text" name="cardName" required>
                    <br>
                    <label>CCV: </label>
                    <input type = "password" name="CCV" required>
                    <br>
                    <label>Date Expired: </label>
                    <input type = "date" name="ExpDate" required>
                    <br>
                    
                </div>
                <div id ="Total">
                    <span style = "float:left;"> Total Price of Product </span> 
                    <span style = "float:right;"> <?= $totalproductprice ?> </span> <br><br>
                    <span style = "float:left;"> Total Price of Delivery </span> 
                    <span style = "float:right;"> <?= $totaldeliprice ?> </span> <br><br>
                    <hr></hr>
                    <span style = "float:left;"> Total</span> 
                    <span style = "float:right;"> <?= $total ?> </span> <br><br>
                    <hr></hr>
                    <input type = "submit" value = "Pay" name = "pay">
                </div>
                <?php
                    echo "</form>";
                ?>
            </div>

        </div>
    </div>
</body>
</html>