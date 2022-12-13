<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="Home.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php
    //Check Login
        $redirect = "Home.php";
        
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $q = "SELECT * FROM customer WHERE '".$mysqli->real_escape_string($email)."' = customer.email AND SHA1('$password') = customer.password_encrypt";
            $result = $mysqli->query($q);
            if(!$result){
                echo '<a href="Login_Page.php">Error: cannot execute query</a>';
                exit;
            }
            $num_rows = mysqli_num_rows($result);
            if($num_rows == 1) {
                while($row=$result->fetch_array()){
                    $redirect = "Home.php?customerID=".$row['customerID'];
                    $customerID = $row['customerID'];
                    $name = $row['firstname']." ".$row['lastname'];
                }
            }
            else
                $redirect = "Login_Page.php?Error=101";

            mysqli_free_result($result);
            header("Location: $redirect");

            if($_GET['productID'] != ""){
                header("Location: Product_Page.php?customerID=$customerID&productID=".$_GET['productID']);
            }
        }
    //     $customerID = $_GET['customerID'];
    //     if(isset($customerID)){
    //         $redirect = "Home.php?customerID=$customerID";
    //     }
    // ?>
    <div id = "wrapper">
        <div id = "div_bar"></div>
            <div id = "div_header">
                <a href = "<?=$redirect?>" style = "left: 2.5%; top: 1%; font-size: 48px;">Udery</a>
                <a href = "<?=$redirect?>" style="left: 60%; top: 2.5%;">Home</a>
                <a href = "#help" style="left: 70%; top: 2.5%;">Help</a>

                <?php
                //Display User
                    if(isset($_GET['customerID'])){
                        $customerID = $_GET['customerID'];
                        $q = "SELECT * FROM customer WHERE '$customerID' = customer.customerID";
                        $result = $mysqli->query($q);
                        while($row=$result->fetch_array()){
                            $name = $row['firstname']." ".$row['lastname'];
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
            <br>

            <div id = "content">
                <div id = "div_rec"></div>
                <div id = "div_Pro" style="margin-left: 200px;">
                    <h1>New Arrivals</h1> 

                    <?php
                    //Display product New Arrive
                        isset( $_GET['customerID'] ) ? $customerID = $_GET['customerID'] : $customerID = "";
                        $q = "SELECT * FROM product WHERE productID = 4 or productID = 105 or productID = 203";
                        $result = $mysqli->query($q);
                        $count = 0;
                        while($row=$result->fetch_array()){
                            $productID = $row['productID'];
                            $productPhoto = $row['productPhoto'];
                            $productPrice = $row['productPrice'];
                            echo "<div id = 'product'>";
                            echo "<a href = 'Product_Page.php?customerID=$customerID&productID=$productID'>";
                            echo "<img src='$productPhoto' width = '130px' hegith = '130px'>$$productPrice";
                            echo "</a></div>";
                            $count = $count + 1;
                            if($count == 3){
                                break;
                            }
                        }
                    ?>
                </div>
                
                <div id = "div_Pro" style="float:right; margin-right: 200px;">
                    <h1>Models</h1> 

                    <?php
                    //Display Models
                        $q = "SELECT * FROM product WHERE category = 'Models'";
                        $result = $mysqli->query($q);
                        $count = 0;
                        while($row=$result->fetch_array()){
                            $productID = $row['productID'];
                            $productPhoto = $row['productPhoto'];
                            $productPrice = $row['productPrice'];
                            echo "<div id = 'product'>";
                            echo "<a href = 'Product_Page.php?customerID=$customerID&productID=$productID'>";
                            echo "<img src='$productPhoto' width = '130px' hegith = '130px'>$$productPrice";
                            echo "</a></div>";
                            $count = $count + 1;
                            if($count == 3){
                                break;
                            }
                        }
                    ?>

                </div>
                <br>
                <div id = "div_Pro" style="margin-left: 200px;">
                    <h1>Team Sports</h1> 
                    <?php
                    //Display Sports
                        $q = "SELECT * FROM product WHERE category = 'Sports'";
                        $result = $mysqli->query($q);
                        $count = 0;
                        while($row=$result->fetch_array()){
                            $productID = $row['productID'];
                            $productPhoto = $row['productPhoto'];
                            $productPrice = $row['productPrice'];
                            echo "<div id = 'product'>";
                            echo "<a href = 'Product_Page.php?customerID=$customerID&productID=$productID'>";
                            echo "<img src='$productPhoto' width = '130px' hegith = '130px'>$$productPrice";
                            echo "</a></div>";
                            $count = $count + 1;
                            if($count == 3){
                                break;
                            }
                        }
                    ?>
                </div>
                
                <div id = "div_Pro" style="float:right; margin-right: 200px;">
                    <h1>Beauty Equipment</h1> 
                    <?php
                    //Display Beauty
                        $q = "SELECT * FROM product WHERE category = 'Beauty'";
                        $result = $mysqli->query($q);
                        $count = 0;
                        while($row=$result->fetch_array()){
                            $productID = $row['productID'];
                            $productPhoto = $row['productPhoto'];
                            $productPrice = $row['productPrice'];
                            echo "<div id = 'product'>";
                            echo "<a href = 'Product_Page.php?customerID=$customerID&productID=$productID'>";
                            echo "<img src='$productPhoto' width = '130px' hegith = '130px'>$$productPrice";
                            echo "</a></div>";
                            $count = $count + 1;
                            if($count == 3){
                                break;
                            }
                        }
                    ?>
                </div>
                
                <div id = "div_Pro" style="margin-left: 200px;width: 78%;">
                    <h1>All</h1> 
                    <?php
                    //Display all product
                        $q = "SELECT * FROM product";
                        $result = $mysqli->query($q);
                        $count = 0;
                        while($row=$result->fetch_array()){
                            $productID = $row['productID'];
                            $productPhoto = $row['productPhoto'];
                            $productPrice = $row['productPrice'];
                            echo "<div id = 'product'>";
                            echo "<a href = 'Product_Page.php?customerID=$customerID&productID=$productID'>";
                            echo "<img src='$productPhoto' width = '130px' hegith = '130px'>$$productPrice";
                            echo "</a></div>";
                        }
                    ?>
                </div>
            </div>
    </div>
</body>
</html>