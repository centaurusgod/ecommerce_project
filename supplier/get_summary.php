<?php
include('../db/connect.php');
//session_start();

function get_total_products(){
    include('../db/connect.php');
    // change it to real product later on
    $user_id=$_SESSION['user_id'];
    $get_total_products="select product_id from product where supplier_id=(select supplier_id from supplier where user_id='$user_id')";
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
    $user_id=$_SESSION['user_id'];
$get_total_transaction=" select sum(total_price) as total_transaction from transaction_history where product_id IN(select product_id from product where supplier_id in(select supplier_id from supplier where user_id=$user_id))
";
$result=mysqli_query($con,$get_total_transaction);
while ($row = mysqli_fetch_array($result)) {
  $total_transaction=$row['total_transaction'];
  echo $total_transaction;

}}

?>
