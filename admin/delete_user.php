<?php
include '../db/connect.php';
$id = $_GET['user_id'];
$delete = "DELETE FROM user where user_id ='$id'";
$data = mysqli_query($con, $delete);

if ($data) {
?>
    <script>
        alert('deleted successfully');
        window.open("http://localhost/OZ%20shop/admin/users.php", "_self");
    </script>
<?php
} else {
?> <script>
        alert('error occures');
        window.open("http://localhost/OZ%20shop/admin/users.php", "_self");
    </script>
<?php
}
