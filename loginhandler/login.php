<?php
include('../db/connect.php');
session_start();
?>
<?php
if (isset($_POST['user_login_submit_button'])) {
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  $search_user = "select * from user where user_email='$user_email' and user_password='$user_password'";

  $result = mysqli_query($con, $search_user);
  // setting these null
  $user_temp_password = NULL;
  $user_temp_email = NULL;
  if ($result) {
    // echo '<script>alert("'.$user_email.'");</script>';
    while ($row = mysqli_fetch_assoc($result)) {
      $user_id = (int)$row['user_id'];
      $user_temp_email = $row['user_email'];
      $user_temp_password = $row['user_password'];
      $user_username = $row['user_username'];
      $user_phone_number = (int)$row['user_phone_number'];
      
    }
    $search_admin = "select user_id from admin where user_id='$user_id'";
    $result_admin = mysqli_query($con, $search_admin);

    $get_admin_count = mysqli_num_rows($result_admin);
    // echo '<script>alert("'.$user_phone_number.'");</script>';
    if ($user_temp_email != NULL and $user_temp_password = !NULL and $user_email == $user_temp_email and $user_password == $user_temp_password) {
      // echo '<script>alert("Logged In");</script>';
      // refresh page to make user logged in
      if ($get_admin_count != 0) {
        $_SESSION['user_logged_in_status'] = true;
        $_SESSION['username'] = "Hello ". $user_username;
        $_SESSION['user_id'] = (int)$user_id;
        echo "<script>alert('Admin Logged In')</script>";
        echo "<script>window.open('../admin/home.php')</script>";
       // break;
      }
      else{
        $_SESSION['user_logged_in_status'] = true;
        $_SESSION['username'] = $user_username;
        $_SESSION['user_id'] = (int)$user_id;
        header("Location: ../index.php");
      }

   
      // echo "<script>
      // window.open('http://localhost/Ecommerce%20Website/index.php,'_self');
      // </script>";
  //break;

    } else {
      echo "<script>alert('Email or password Do not match')</script>";
      echo "<script>window.open('./user_login.php')</script>";
      //  $_SESSION['user_logged_in_status'] = false;
    }
  }

  // echo $user_email;
  // echo '<script>alert("'.$user_email.'.");</script>';


}
if(isset($_POST['user_signup_button'])){
  echo "<script>window.open('../user/customer_registration.php')</script>";
}

?>