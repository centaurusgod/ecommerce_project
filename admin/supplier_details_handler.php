<?php
// this page is to edit and delete supplier
// i shouldnt get confused it with the pending suppliers these are real suppliers
// although variables are names pending supplier, they are actaully from supplier page
include('../db/connect.php');
$approve=$_GET['approve'];
$pending_supplier_id=$_GET['pending_supplier_id'];
echo "<br>";
$get_pending_supplier="select * from pending_supplier where supplier_id='$pending_supplier_id'";
if($approve==1){
$result=mysqli_query($con,$get_pending_supplier);
while($row=mysqli_fetch_array($result)){
$user_id=$row['user_id'];
$supplier_name=$row['supplier_name'];
$supplier_address=$row['supplier_address'];
}
// use this for editing purpose as well
//$insert_supplier_query="insert into supplier (user_id, supplier_name, supplier_address) values('$user_id','$supplier_name','$supplier_address')";
$delete_pending_supplier="delete from supplier where supplier_id='$pending_supplier_id'";
$result=mysqli_query($con,$insert_supplier_query);
if($result){
    mysqli_query($con,$delete_pending_supplier);
    ?>
    <script>
        alert('Added Successfully');
        window.open("http://localhost/OZ%20shop/admin/supplier_details.php", "_self");
    </script>
<?php
}
else {
    ?> <script>
            alert('error occures');
            window.open("http://localhost/OZ%20shop/admin/supplier_details.php", "_self");
        </script>
    <?php
    }
}

else{
    $delete_pending_supplier="delete from supplier where supplier_id='$pending_supplier_id'";
    $result=mysqli_query($con,$delete_pending_supplier);
    if($result){
        ?>
        <script>
            alert('Deleted Successfully');
            window.open("http://localhost/OZ%20shop/admin/supplier_request.php", "_self");
        </script>
    <?php

    }
    ?> <script>
            alert('error occures');
            window.open("http://localhost/OZ%20shop/admin/supplier_request.php", "_self");
        </script>
    <?php
    }
    





?>