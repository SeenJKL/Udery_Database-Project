<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="Product_Page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product_Page</title>
</head>
<body>

                <?php
                //Check customer 
                    if(isset($_GET['customerID'])){
                        if($_GET['customerID'] == ""){
                            $redirect = "Home.php";
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
                    $q = "SELECT * FROM customer WHERE '$customerID' = customer.customerID";
                    $result = $mysqli->query($q);
                    $name = "";
                    while($row=$result->fetch_array()){
                        $name = $row['firstname']." ".$row['lastname'];
                    }
                    if ($name == ""){
                        echo "<a href = 'Register_Page.php' style='left: 80%; top: 2.5%;'>Sign up</a>";
                        echo "<a href = 'Login_Page.php' style='left: 90%; top: 2.5%;'>Login</a>";
                    }
                    echo "<a href = 'User_Profile.php?customerID=$customerID' style='left: 80%; top: 2.5%;'>".$name."</a>";
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
                    
            ?>

            <div id = "div_picASO">
                <?php 
                    $customerID = $_GET['customerID'];
                    echo "<img src='$productPhote'>"; 
                    echo "<form action = 'StartOrder.php?customerID=$customerID&productID=$productID' method = 'POST'>";
                    echo "<label>Quantity (1-10): </label>";
                    echo "<input type='number' name='quantity' value='1' min='1' max='10' default='1' style = 'border: 2px solid #FFFFFF;'></input><br>";
                ?>

                <label>Delivery Company: </label>
                <select name = "deliveryCom">
                <?php
                        $q = "SELECT * FROM deliverycompany";
                        if($result=$mysqli->query($q)){
                            while($row=$result->fetch_array()){
								echo '<option style = "background-color: #626161;" value="'.$row[0].'">'.$row[1].'</option>';
							}
                        }
                ?>
                </select>

                <?php
                    echo "<a href='StartOrder.php?customerID=$customerID&productID=$productID'>";
                            echo "<input type = 'submit' value = 'Start Order' name = 'startOrder'></input>";
                    echo "</a>";
                    echo "</form>";
                ?>
            </div>
            <div id = div_details>
                <?php 
                    echo "<h1>$productName</h1>"; 
                    echo "<h2>PRICE</h2>";
                    echo "<h2>$ $productPrice</h2>";
                ?>
                <hr style="color: #FFFFFF; border: 2px solid">
                <div id = "Topic" style="float:left;">
                    <p>Category:</p>
                    <p>Benefits:</p>
                    <p>Customization:</p>
                    <p>Protection:</p>
                </div>
                <div id = "Edetails" style="float: right; margin-right: 400px;">
                <?php
                    echo "<p>$category</p>";
                    echo "<p>$benefits</p>";
                    echo "<p>Customization Delivery</p>";
                    echo "<p>$protection1</p>";
                    echo "<p>$protection2</p>";
                    echo "<p>$protection3</p>";
                ?>
                </div>
            </div>
            <h1 style="float:left; margin-left: 150px; ">REVIEW</h1>
            <div id = "div_review">
                <br>

                <?php
                //Display review of each product
                    $productID = $_GET['productID']; //checked='checked'
                    $q2 = "SELECT * FROM review,customer WHERE '$productID' = review.productID AND review.customerID = customer.customerID";
                    if($result2=$mysqli->query($q2)){
                        $radioname = 0;
                        while($row2=$result2->fetch_array()){
                            $checked = array("","","","","");

                            if($row2['rate'] == 1){
                                $checked[0] = "checked";
                            }else if($row2['rate'] == 2){
                                $checked[1] = "checked";
                            }else if($row2['rate'] == 3){
                                $checked[2] = "checked";
                            }else if($row2['rate'] == 4){
                                $checked[3] = "checked";
                            }else if($row2['rate'] == 5){
                                $checked[4] = "checked";
                            }

                            echo "<div id = 'div_r'>";
                            echo "<h1>".$row2['firstname']. " " .$row2['lastname']."</h1>";
                            echo "<div id = 'rate'>";
                            echo "<input type='radio' id='star5' name='rate$radioname' value='5' ".$checked[4]."/>";
                            echo "<label for='star5' title='text'>5 stars</label>";
                            echo "<input type='radio' id='star4' name='rate$radioname' value='4' ".$checked[3]."/>";
                            echo "<label for='star4' title='text'>4 stars</label>";
                            echo "<input type='radio' id='star3' name='rate$radioname' value='3' ".$checked[2]."/>";
                            echo "<label for='star3' title='text'>3 stars</label>";
                            echo "<input type='radio' id='star2' name='rate$radioname' value='2' ".$checked[1]."/>";
                            echo "<label for='star2' title='text'>2 stars</label>";
                            echo "<input type='radio' id='star1' name='rate$radioname' value='1' ".$checked[0]."/>";
                            echo "<label for='star1' title='text'>1 star</label>";
                            echo "</div>";
                            echo "<p>".$row2['comment']."</p>";
                            echo "</div>";
                            $radioname = $radioname + 1;
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>