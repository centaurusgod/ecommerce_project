<?php
function checkIsSupplier()
{
    include('./db/connect.php');
    $temp = $_SESSION['user_id'];
    if($_SESSION['user_logged_in_status']==true){
        $check_supplier = "select user_id from supplier where supplier.user_id='$temp'";
        if (mysqli_num_rows(mysqli_query($con, $check_supplier)) == 0) {
           // echo "User is not a supplier";
            // do not display become a supplier button
           echo "<div class='contact_nav'>
            <a href='./supplier/supplier_registration_form.php'>
              <i class='fa fa-truck fa-lg' aria-hidden='true'></i>
              <span>
                Become a supplier
              </span>
            </a>

          </div>";
    
    
        } else {
            //echo "User is   a supplier";
            // display supplier buton
            echo "<div class='contact_nav'>
            <a href='./supplier/create_product.php'>
              <i class='fa fa-user-plus fa-lg' aria-hidden='true'></i>
              <span>
                Add More Products
              </span>
            </a>

          </div>";
    
        }
    }
    else{
        echo "<div class='contact_nav'>
        <a href=''>
          <i class='fa fa-smile-o fa-lg' aria-hidden='true'></i>
          <span>
            Happy Shopping!!
          </span>
        </a>

      </div>";
        
    }
    
}
