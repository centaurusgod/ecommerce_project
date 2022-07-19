<?php

//session_start();
function get_category_list(){
    include('./db/connect.php');
    $get_category_list_query="select * from category";
   // $get_sub_category_list="";
    $result_category=mysqli_query($con,$get_category_list_query);
    if($result_category){
    while($row=mysqli_fetch_assoc($result_category)){
        $category_id=(int)$row['category_id'];
        $category_name=$row['category_name'];
    echo "<ul> 
    <li><a class=' text-dark px-2' id='cat'.$category_id href='./product.php?category_name=$category_name'>$category_name</a> </li>
    </ul>";
    
    }  }
}


?>