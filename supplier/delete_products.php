<?php
include('../db/connect.php');
$product_id=$_GET['product_id'];
echo $product_id;
$delete_product_query="delete from product where product_id='$product_id'";
$result=mysqli_query($con,$delete_product_query);
if($result){
    ?>
    <script>
        alert('deleted successfully');
        window.open("http://localhost/OZ%20shop/supplier/products.php", "_self");
    </script>
<?php

}
else{
    ?> <script>
    alert('Error Occured While Deleting');
    window.open("http://localhost/OZ%20shop/supplier/products.php", "_self");
</script>
<?php

}




?>