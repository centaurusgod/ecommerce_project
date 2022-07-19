<?php
include('../db/connect.php');
session_start();
function get_total_users(){
include('../db/connect.php');
$get_total_users="select user_id from user";
$result=mysqli_query($con,$get_total_users);
$count=mysqli_num_rows($result);
echo $count;
}

function get_total_suppliers(){
    include('../db/connect.php');
    $get_total_suppliers="select supplier_id from supplier";
    $result=mysqli_query($con,$get_total_suppliers);
$count=mysqli_num_rows($result);
echo $count;

}
function get_total_products(){
    include('../db/connect.php');
    // change it to real product later on
    $get_total_products="select product_id from temp_product";
    $result=mysqli_query($con,$get_total_products);
$count=mysqli_num_rows($result);
echo $count;

}
function get_total_category(){
    include('../db/connect.php');
    $get_total_category="select category_id from category";
    $result=mysqli_query($con,$get_total_category);
$count=mysqli_num_rows($result);
echo $count;

}

function get_total_transaction(){
    include('../db/connect.php');
    // change it to real value later on
$get_total_transaction="select sum(product_price) as total_transaction from product";
$result=mysqli_query($con,$get_total_transaction);
while ($row = mysqli_fetch_array($result)) {
  $total_transaction=$row['total_transaction'];
  echo $total_transaction;

}}

?>
