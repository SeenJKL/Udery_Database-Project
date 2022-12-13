<?php
//Update user profile

require_once('connect.php');
    $customerID = $_GET['customerID'];
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $email = $_GET['email'];
    $address1 = $_GET['address1'];
    $address2 = $_GET['address2'];
    $phone = $_GET['tel'];
    if($_GET['password'] == "" && $_GET['newpassword'] == ""){
        $q = "UPDATE customer SET firstname = '$firstname', lastname = '$lastname', email = '$email', address1 = '$address1', address2 = '$address2', phone = '$phone' WHERE '$customerID' = customer.customerID";
    }
    else if($_GET['password'] == $_GET['newpassword']){
        $password = $_GET['password'];
        $q = "UPDATE customer SET firstname = '$firstname', lastname = '$lastname', email = '$email', address1 = '$address1', address2 = '$address2', phone = '$phone', password = '$password', password_encrypt = SHA1('$password') WHERE '$customerID' = customer.customerID";
    }else{
        header("Location: User_Profile.php?customerID=$customerID&Error=102");
    }
    // isset( $_GET['customerID'] ) ? $customerID = $_GET['customerID'] : $customerID = "";
    // isset( $_GET['firstname'] ) ? $firstname = $_GET['firstname'] : $firstname = "";
    // isset( $_GET['lastname'] ) ? $lastname = $_GET['lastname'] : $lastname = "";
    // isset( $_GET['email'] ) ? $email = $_GET['email'] : $email = "";
    // isset( $_GET['address1'] ) ? $address1 = $_GET['address1'] : $address1 = "";
    // isset( $_GET['phone'] ) ? $phone = $_GET['phone'] : $phone = "";
    // isset( $_GET['password'] ) ? $password = $_GET['password'] : $password = "";

    if($mysqli->connect_errno){
        echo $mysqli->connect_errno.": ".$mysqli->connect_error;
    }
    
    
    if(!$mysqli->query($q)){
        echo "UPDATE failed. Error: ".$mysqli->error ;
    }

    $redirect = "User_Profile.php?customerID=$customerID&confirmed=1";
    $mysqli->close();
    header("Location: $redirect");

?>