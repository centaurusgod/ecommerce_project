<?php
session_start();
$no_of_products=1;
if (isset($_GET['add_to_cart_id'])) {
  // $_SESSION['product_id']=0;
  $product_add_to_cart_id = (int)$_GET['add_to_cart_id'];
  $_SESSION['product_id'] = $product_add_to_cart_id;

  // check the conditions if the item is already present in the array
  // first find the total no of items present in the array 
  $total = count($_SESSION['product_id_array']);
  //prevent inserting garabge values into the array
  $duplicate_item_checker = 0;
  if ($product_add_to_cart_id != 0 or $product_add_to_cart_id != NULL) {
    if ($total != 0) {
      for ($count = 1; $count <= $total; $count++) {
        //echo "cunting";
        if ($product_add_to_cart_id == $_SESSION['product_id_array'][$count - 1]) {
          $duplicate_item_checker = 1;
          break;
        }
      }

      if ($duplicate_item_checker == 0) {
        array_push($_SESSION['product_id_array'], $product_add_to_cart_id);
        array_push($_SESSION['product_number_respective_array'],$no_of_products);
        ++$_SESSION['items_in_cart'];
        echo "<script>alert('Item Added To Your Cart')</script>";
        echo "<script>window.open('../product.php','_self')</script>";
      } else {
        // echo "else is running ";
        echo "<script>alert('Item Is Already Present In The Cart')</script>";
        echo "<script>window.open('../product.php','_self')</script>";
      }
    } else {
      array_push($_SESSION['product_id_array'], $product_add_to_cart_id);
      array_push($_SESSION['product_number_respective_array'],1);
      ++$_SESSION['items_in_cart'];
      echo "<script>alert('Item Added To Your Cart')</script>";
      echo "<script>window.open('../product.php','_self')</script>";
    }
  }
}
?>