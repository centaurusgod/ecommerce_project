<?php
session_start();
include('../db/connect.php');
$user_temp_id=$_SESSION['user_id'];
$supplier_name=$_POST['supplier_name'];
$supplier_address=$_POST['supplier_address'];

if(isset($_POST['supplier_register_button_pressed'])){
$insert_query_supplier="insert into pending_supplier(user_id,supplier_name, supplier_address) values('$user_temp_id','$supplier_name','$supplier_address')";    
$result=mysqli_query($con,$insert_query_supplier) ;


if($result){
    
    echo "<script>alert('We Received Your Request')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
}
else{
  echo '<script>alert("'.mysqli_error($con).'.");</script>';
  echo "<script>window.open('./supplier_registration_form.php')</script>";
}

}

?>