<?php
$con = mysqli_connect('localhost', 'root', 'Saymon6993!', 'ecommerce');

if ($con) {
    echo "";
} else {
    echo "not connected to database";
}
