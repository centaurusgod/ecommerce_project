
<?php
include('../db/connect.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <title>Login Test Form</title>
<body>

<h2>HTML Forms</h2>

<form action="./login.php" method="POST">
  <label for="fname">Email:</label><br>
  <input type="text" id="fname" name="user_email" value=""><br>
  <label for="lname">Password</label><br>
  <input type="text" id="lname" name="user_password" value=""><br><br>
  <input type="submit" name="user_login_submit_button" value="submit">
</form> 

<br>

<form action="../user/customer_registration.php" method="POST">
<input type="submit" name="user_signup_button" value="Sign Up">
</form> 


</body>
</html>
