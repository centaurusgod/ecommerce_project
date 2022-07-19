<?php
session_start();

$product_id= $_GET['product_id'];

if (isset($_GET['product_id'])) {
  // $_SESSION['product_id']=0;

  // check the conditions if the item is already present in the array
  // first find the total no of items present in the array 
  
  $total = count($_SESSION['product_id_array']);
  //prevent inserting garabge values into the array
    if ($total != 0) {
      for ($count = 1; $count <= $total; $count++) {
        //echo "cunting";
        if ($product_id == $_SESSION['product_id_array'][$count - 1]) {
          array_pop($_SESSION['product_id_array']);
          array_pop($_SESSION['product_number_respective_array']);
          -- $_SESSION['items_in_cart'];
          echo "<script>alert('Item Deleted From Your Cart')</script>";
          echo "<script>window.open('./cart.php','_self')</script>";
          break;
        }
      }  
}
else{

  $_SESSION['product_number_respective_array']=[];
  $_SESSION['product_id_array']=[];
  $_SESSION['items_in_cart']=0;
}


}
?>