<?php 
//Insert customer info to DB (customer) & redirect to login 
                require_once('connect.php');
				if(isset($_POST['register'])) {
					$firstname = $_POST['firstname'];
					$lastname = $_POST['lastname'];
					$email = $_POST['email'];
                    $phone = $_POST['tel'];
                    $password = $_POST['password'];
                    $address1 = $_POST['address1'];     
                    $address2 = $_POST['address2'];
					$q="INSERT INTO customer(firstname, lastname, email, phone, password, password_encrypt, address1, address2) VALUES ('$firstname','$lastname','$email','$phone','$password',SHA1($password), '$address1', '$address2');";
					$result=$mysqli->query($q);
					if(!$result){
						echo "INSERT failed. Error: ".$mysqli->error ;
						return false;
					}
				}
                header("Location: Login_Page.php");
?>