<?php
include('../db/connect.php');
session_start();


if ($_SESSION['user_logged_in_status'] == true) {
    $total = count($_SESSION['product_id_array']);
    $product_id = 0;
    $product_title = "**";
    $product_price = 0;
    $product_image = "";
    $product_temp_id = 0;
    $no_of_products = 0;
    $total_price = 0;
    echo "<--product_id";
    echo "<span>";
    echo " ----------*product_title";
    echo "<span>";
    echo "----------*product_price";
    echo "<span>";
    echo "----------*no_of_product-";
    echo "<span>";
    echo "----------*Total Price-->";
    echo "<br>";


    $product_id = $_SESSION['buy_now_produt_id'];

    $no_of_products=$_SESSION['buy_now_product_number'];

    $get_product_details_query="select * from product where product_id='$product_id'";

    $result=mysqli_query($con,$get_product_details_query);

    while ($row = mysqli_fetch_assoc($result)) {
        // echo "while loop";
        $product_temp_id = (int)$row['product_id'];
        $product_title = $row['product_title'];
        $product_image = $row['product_image'];
        $product_price = (int)$row['product_price'];
        $total_price = $no_of_products * $product_price;
    }

    echo $product_id;
    echo "<span>";
    echo " ----------" . $product_title;
    echo "<span>";
    echo " -------------------" . $product_price;
    echo "<span>";
    echo " ----------" . $no_of_products;
    echo "<span>";
    echo "----------Rs." . $total_price;
    echo "<br>";
} else {

    echo "Please sign in first";
    // logic to bring sign in button
}
