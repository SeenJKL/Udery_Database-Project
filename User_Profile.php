<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="User_Profile.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_Profile</title>
</head>
<body>
                <?php
                    $customerID = $_GET['customerID'];
                    isset( $_GET['Error'] ) ? $error = $_GET['Error'] : $error = "";
                    isset( $_GET['confirmed'] ) ? $confirmed = $_GET['confirmed'] : $confirmed = "";
                    $q = "SELECT * FROM customer WHERE '$customerID' = customer.customerID";
                    $result = $mysqli->query($q);
                    while($row=$result->fetch_array()){
                        $name = $row['firstname']." ".$row['lastname'];
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $email = $row['email'];
                        $address1 = $row['address1'];
                        $address2 = $row['address2'];
                        $phone = $row['phone'];
                        $redirect = "Home.php?customerID=".$row['customerID'];
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
                <a href = "User_Profile.php?customerID=<?=$customerID?>" style="padding-top: 20px; background: linear-gradient(180deg, #091355 99.16%, rgba(217, 217, 217, 0) 100%);">Your Profile<span>&#8250;</span></a> 
                <a href = "User_Order.php?customerID=<?=$customerID?>" style="padding-top: 20px; ">Your Order<span>&#8250;</span></a>
            </div>
            <div id = "div_info">

                <h1>MY PROFILE</h1>
                <div id = "div_ainfo">
                        <?php 
                            $customerID = $_GET['customerID'];
                            if($mysqli->connect_errno){
                                echo $mysqli->connect_errno.": ".$mysqli->connect_error;
                            }
                            $q = "SELECT * FROM customer WHERE '$customerID' = customer.customerID";
                            $result = $mysqli->query($q);
                            echo "<form action='updateProfile.php' methond='POST'>";
                            while($row=$result->fetch_array()){

                                echo "<input type=hidden value='".$row['customerID']."' name=customerID>";
                                echo "<label>First Name</label>";
                                echo "<input type=text style=color:white; value= ".$firstname." name=firstname>";
                                echo  "<br><br><br>";
                                echo "<label>Last Name</label>";
                                echo "<input type=text style=color:white; value= ".$lastname." name=lastname>";
                                echo  "<br><br><br>";
                                echo "<label>Email</label>";
                                echo "<input type =text style=color:white; value= ".$email." name=email>";
                                echo  "<br><br><br>";
                                echo "<label>Address1</label>";
                                echo "<input type =text style=color:white; value='".$address1."' name=address1>";
                                echo  "<br><br><br>";
                                echo "<label>Address2</label>";
                                echo "<input type =text style=color:white; value='".$address2."' name=address2>";
                                echo  "<br><br><br>";
                                echo "<label>Phone</label>";
                                echo "<input type=text style=color:white; value=".$phone." name=tel>";
                                echo  "<br><br><br>";
                                echo "<label>Password</label>";
                                echo  "<br><br><br>";
                                echo "<label>New Password</label>";
                                echo "<input type=password style=color:white; name=password>";
                                echo  "<br><br><br>";
                                echo "<label>Confirm New Password</label>";
                                echo "<input type=password style=color:white; name=newpassword>";
                                echo  "<br><br><br>";
                                echo "<input type=submit value=Update name=update>";
                                echo "</form>";
                                if($error == 102){
                                    echo "<p>**New Password and Confirmed Password is not match.**</p>";
                                }
                                if($confirmed == 1){
                                    echo "<p style = 'color: #81EB8C'>**Update Completed**</p>";
                                }
                            }
                            $mysqli->close();
                        ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>