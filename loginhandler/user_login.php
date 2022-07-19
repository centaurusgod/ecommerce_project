<?php
include('../db/connect.php');
session_start();
?>
<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->


<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> User Login </title>
    <link rel="stylesheet" href="../user/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">User Login </div>
        <div class="content">
            <form action="./login.php" method="POST">
                <div class="user-details">
                    
                    
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="Enter your email" name="user_email" maxlength="35" required>
                    </div>

                    
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" placeholder="Enter your password" name="user_password" maxlength="25" required>
                    </div>
                <div class="button">
                    <input name="user_login_submit_button" method="POST" type="submit" value="    Login     ">
                                    </div>
            </form>

            <form action="../user/customer_registration.php">
            <div class="user-details">
            <div class="button">
             <input name="user_signup_button" method="POST" type="submit" value="    SignUp     ">
            </div>
            </div>
            </form>

        </div>
    </div>

</body>


<?php



?>

</html>