<?php
session_start();

$_SESSION['user_logged_in_status'] =isset($_SESSION['user_logged_in_status'] )?$_SESSION['user_logged_in_status'] : false;
$_SESSION['username'] = isset($_SESSION['username'])?$_SESSION['username']:"Welcome Guest";
$_SESSION['user_id'] =isset($_SESSION['user_id'])?$_SESSION['user_id']: 0;
$_SESSION['items_in_cart'] = isset($_SESSION['items_in_cart'] )?$_SESSION['items_in_cart'] :0;
$_SESSION['product_id'] = isset($_SESSION['product_id'])?$_SESSION['product_id']:0;
$_SESSION['session_id'] =isset($_SESSION['session_id'] )?$_SESSION['session_id'] : "**";
//echo session_id();
$_SESSION['product_id_array']=isset($_SESSION['product_id_array'])?$_SESSION['product_id_array']:[];
$_SESSION['product_number_respective_array']=isset($_SESSION['product_number_respective_array'])?$_SESSION['product_number_respective_array']:[];
$_SESSION['buy_now_produt_id']=isset($_SESSION['buy_now_produt_id'])?$_SESSION['buy_now_produt_id']:0;
$_SESSION['buy_now_product_number']=isset($_SESSION['buy_now_product_number'])?$_SESSION['buy_now_product_number']:0;
//$_SESSION['admin_username']="";

?>