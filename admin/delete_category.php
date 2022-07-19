<?php
include '../db/connect.php';
$id = $_GET['category_id'];
$delete = "DELETE FROM category where category_id ='$id'";
$data = mysqli_query($con, $delete);
if ($data) {
?>
    <script>
        alert('deleted successfully');
        window.open("http://localhost/OZ%20shop/admin/categories.php", "_self");
    </script>
<?php
} else {
?> <script>
        alert('error occures');
        window.open("http://localhost/OZ%20shop/admin/categories.php", "_self");
    </script>
<?php
}
