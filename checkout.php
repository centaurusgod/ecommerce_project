<?php
include('./db/connect.php');
session_start();
$user_id= $_SESSION['user_id'];
//echo $user_id;
if($_SESSION['user_logged_in_status'] == true){
    $total= count($_SESSION['product_id_array']);
    $product_id=0;
    $product_title="**";
    $product_price=0;
    $product_image="";
    $product_temp_id =0;
    $no_of_products=0;
    $total_price=0;
    // echo "<--product_id";
    // echo "<span>";
    // echo " ----------*product_title";
    // echo "<span>";
    // echo "----------*product_price";
    // echo "<span>";
    // echo "----------*no_of_product-";
    // echo "<span>";
    // echo "----------*Total Price-->";
    // echo "<br>";
    for($count = 1; $count <= $total; $count++){
    //assinging product id from session variable array one by one
        $product_id = (int)$_SESSION['product_id_array'][$count-1];
        $no_of_products=(int)$_SESSION['product_number_respective_array'][$count-1];
        $get_product_details_query="select * from product where product_id = '$product_id'";
        $result=mysqli_query($con,$get_product_details_query);
        if($result){
          //  echo $product_id;
            while($row=mysqli_fetch_assoc($result)){
               // echo "while loop";
                $product_temp_id =(int)$row['product_id'];
                $product_title=$row['product_title'];
                $product_image=$row['product_image'];
                $product_price=(int)$row['product_price'];
                $total_price=(int)$no_of_products*$product_price;
            }
        }
        // echo $product_id;
        // echo "<span>";
        // echo " ----------".$product_title;
        // echo "<span>";
        // echo " -------------------".$product_price;
        // echo "<span>";
        // echo " ----------".$no_of_products;
        // echo "<span>";
        // echo "----------Rs.".$total_price;
        // echo "<br>";

        $transaction_insertion_query="insert into transaction_history(user_id, product_id, product_quantity, product_price,total_price) values('$user_id','$product_id','$no_of_products','$product_price','$total_price')";
        $transaction_result=mysqli_query($con,$transaction_insertion_query);
        $decrease_repective_product_stock_number="update product set product_stock_number = product_stock_number-$no_of_products where product_id='$product_id'"; 
        mysqli_query($con,$decrease_repective_product_stock_number);
      }
      if($transaction_result){
        $_SESSION['product_id_array']=[];
        $_SESSION['product_number_respective_array']=[];
        $_SESSION['items_in_cart'] = 0;
        ?> <script>
        alert('Transcation Completed');
       
        window.open("http://localhost/OZ%20shop/cart.php", "_self");
    </script>
    <?php
      }
      else{
     // mysqli_error($transaction_result);
      //  echo "failed to insert data";
        echo '<script>alert("Transaction Failed");</script>';
      }
      

}
else{

    // user logged out so take him to login page first before checking out and redirec
    //back to checkout page
    ?> <script>
    alert('Please Login First');
   
    window.open("http://localhost/OZ%20shop/loginhandler/user_login.php", "_self");
</script>
<?php
}


  ?>
