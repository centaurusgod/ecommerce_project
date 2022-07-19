<?php
include('../db/connect.php');
session_start();
?>
<!DOCTYPE html>
<html>
<title>Login Test Form</title>
<link rel="stylesheet" href="../user/style.css">

<body>

  <div class="container">
    <div class="title">Supplier Registration</div>
    <div class="content">
      <form action="./supplier_registration_handler.php" method="POST">
        <div class="user-details d-flex flex-column ">
          <div class="input-box">
            <span class="details">Supplier Name</span>
            <input type="text" placeholder="Enter your name" name="supplier_name" maxlength="49" required>
          </div>
          <div class="input-box">
            <span class="details">Supplier Address</span>
            <input type="text" placeholder="Enter your Address" name="supplier_address" maxlength="25" required>
          </div>
          <div class="button">
            <input type="submit" value="  Register  " name="supplier_register_button_pressed" style="padding:2px 4px;">
          </div>
      </form>



</body>

</html>