<?php
$con = mysqli_connect('localhost', 'root', '', 'ecommerce');

if ($con) {
    echo "";
} else {
    echo "not connected to database";
}
