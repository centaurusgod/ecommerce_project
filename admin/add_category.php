<?php
include '../db/connect.php';
session_start();
$category_name=$_GET['category_name'];
$add = "insert into category (category_name) values('$category_name')";
$data = mysqli_query($con, $add);
if ($data) {
?>
    <script>
        alert('Added successfully');
        window.open("http://localhost/OZ%20shop/admin/categories.php", "_self");
    </script>
<?php
} else {
?> <script>
        alert('Error occures');
        window.open("http://localhost/OZ%20shop/admin/categories.php", "_self");
    </script>
<?php
}
