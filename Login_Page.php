<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="Login_Page.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Udery</title>
</head>

<body>
<?php 
				// if(isset($_POST['register'])) {
				// 	$firstname = $_POST['firstname'];
				// 	$lastname = $_POST['lastname'];
				// 	$email = $_POST['email'];
                //     $phone = $_POST['tel'];
                //     $password = $_POST['password'];
                //     $address1 = $_POST['address1'];     
                //     $address2 = $_POST['address2'];
				// 	$q="INSERT INTO customer(firstname, lastname, email, phone, password, password_encrypt, address1, address2) VALUES ('$firstname','$lastname','$email','$phone','$password',SHA1($password), '$address1', '$address2');";
				// 	$result=$mysqli->query($q);
				// 	if(!$result){
				// 		echo "INSERT failed. Error: ".$mysqli->error ;
				// 		return false;
				// 	}
				// }
?>
    <div id = "wrapper">
        <div id = "div_bar"></div>
            <div id = "div_header">
                <a href = "Home.php" style = "left: 2.5%; top: 1%; font-size: 48px;">Udery</a>
                <a href = "Home.php" style="left: 60%; top: 2.5%;">Home</a>
                <a href = "#help" style="left: 70%; top: 2.5%;">Help</a>
                <a href = "Register_Page.php" style="left: 80%; top: 2.5%;">Sign up</a>
                <a href = "Login_Page.php" style="left: 90%; top: 2.5%;">Login</a>
            </div>
            <div id="div_content">

            <?php
            //Check product for redirect to that product after login
                isset( $_GET['productID'] ) ? $productID = $_GET['productID'] : $productID = "";
                if($productID != ""){
                    $redirect = "Home.php?productID=$productID";
                }else if ($productID == ""){
                    $redirect = "Home.php";
                }
            ?>

                <form action = "<?=$redirect?>" method="post">
                    <div id="div_rec"></div>
                    <p style = "margin-top: 20px; padding-top:20px">Udery</p><br>
                    <p style="font-size: 30px;">Login to your account</p> 
                    <br>
                    <input type = "email" style="color:white;" placeholder="Email" name="email" required>
                    <br><br>
                    <input type ="password" placeholder="Password" name="password" required> 
                    <br>
                    <input type="submit" value = "Login" name = "login"></input>
                </form>
                <?php
                    isset( $_GET['Error'] ) ? $error = $_GET['Error'] : $error = "";
                    if($error== 101){
                        echo "<p style='font-size: 25px; color: #A71C1C; margin-top: 25px'>Email or Password is incorrect.</p> ";
                    }
                ?>

            </div>

            <div id="div_footer">

                <a href="Register_Page.php">Can't Sign In?</a>
                <br><br>
                <a href="#privacy">Privacy policy Terms of use</a>

            </div>
                
        </div>
    </div>
</body> 
</html>
<?php 

?>