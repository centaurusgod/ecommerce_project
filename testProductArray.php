<?php
include('./cart/cart_handler_home.php');
include('./db/connect.php');
//session_start();
echo $_SESSION['user_id'];
$temp=$_SESSION['user_id'];
$check_supplier="select user_id from supplier where supplier.user_id='$temp'";
if(mysqli_num_rows(mysqli_query($con,$check_supplier))!=0){
    echo "User is a supplier";
}
else{
    echo "User is  not a supplier"; 
}

$total= count($_SESSION['product_id_array']);
$total_number=count($_SESSION['product_number_respective_array']);
echo "Total number of items:".$total;
echo "<br>";
echo "Total number of id:".$total_number;
echo "<br>";
echo "<pre>";
print_r($_SESSION['product_id_array']);
echo "</pre>";


echo "<pre>";
print_r($_SESSION['product_number_respective_array']);
echo "</pre>";






 
?>