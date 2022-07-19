<?php

function display_all_products_category($searched_text){
include('./db/connect.php');
         // $display_product_query = "select * from temp_product";
          
         // $display_product_query = "select * from product where product_title like '%$searched_text%'";
          
          $display_product_query="select * from product where category_name ='$searched_text'";

          $result = mysqli_query($con, $display_product_query);


          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $product_id =   $row['product_id'];
              $product_title = $row['product_title'];
              $product_price = $row['product_price'];
              $product_image = $row['product_image'];


              echo " <div class='col mb-5'>
              <div class='card h-auto'>
                <img class='card-img-top w-100' src='./productimages/$product_image' style='height:350px' alt='...' />
                <div class=''>
                  <div class='text-center'>
                    <h5 class='fw-bolder'>$product_title</h5>
                    Rs.$product_price
                  </div>
                </div>
    
                <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                  <div class='text-center '>
                    <a class='btn btn-outline-none mt-auto bg-success text-light' href='./cart/cart_handler_home.php?add_to_cart_id=$product_id'>Add to Cart</a>
                    <a class='btn btn-outline-none mt-auto bg-warning text-light' href='./detail_page.php?product_id=$product_id'>View More</a>
                  </div>
                </div>
              </div>
            </div>";

}}}
?>