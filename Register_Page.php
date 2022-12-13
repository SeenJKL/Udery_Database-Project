<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="Register_Page.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Udery</title>
</head>
<body>
    <div id = "wrapper">
        <div id = "div_bar"></div>
            <div id = "div_header">
                    <a href = "Home.php" style = "left: 2.5%; top: 1%; font-size: 48px;">Udery</a>
                    <a href = "Home.php" style="left: 60%; top: 2.5%;">Home</a>
                    <a href = "#help" style="left: 70%; top: 2.5%;">Help</a>
                    <a href = "Register_Page.php" style="left: 80%; top: 2.5%;">Sign up</a>
                    <a href = "Login_Page.php" style="left: 90%; top: 2.5%;">Login</a>
            </div>
                <div id = "div_content">
                <form action = "updateRegis.php" method = "POST">
                    <div id = "div_rec"></div>

                    <h1>Register</h1> 
                    <input type ="text" style="color:white; width: 25%; float:center;" placeholder="First Name" name="firstname" required>
                    <input type ="text" style="color:white; width: 25%; float:center;" placeholder="Last Name" name="lastname" required>
                    
                    <input type ="email" style="color:white;" placeholder="Email" name="email" required>
                    <br>
                    <input type ="password" style="color:white;" placeholder="Password" name="password" required>
                    <br>  
                    <input type ="tel" style="color:white;" placeholder="Phone" name="tel" required> 
                    <br>
                    <input type ="text" style="color:white;" placeholder="Address1" name="address1" required> 
                    <br>
                    <input type ="text" style="color:white;" placeholder="Address2" name="address2"> 
                    <br><br>
                    <input type ="checkbox" style="color:white;" id="checked" name="checked" value=1 required>
                    <label for="checked" style="color:white; font-size: 25px">I read and agree to</label>
                    <a href = "#privacy" style="color:#00B2FF; font-size: 25px">Terms & Conditions</a>
                    <input type="submit" value = "Register" name = "register"></input>
                    
                </form>
            </div>
    </body> 
</html>
