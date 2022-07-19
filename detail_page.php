<?php
include('./db/connect.php');
session_start();
$product_id = $_GET['product_id'];
//echo $product_id;
$no_of_products = 1;
// implement linked list using php
?>
<!-- setting cokkie to 0 on page refresh or reload -->
<script>
    document.cookie = '$count = ' + 1;
</script>

<?php
$query = "select * from product where product_id=$product_id";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $supplier_id = $row['supplier_id'];
    $product_title = $row['product_title'];
    $product_price = $row['product_price'];
    $product_image = $row['product_image'];
    $product_details = $row['product_details'];
    $product_stock_number = $row['product_stock_number'];
    //$no_of_items = 0;
    // echo "";
}

$get_supplier_name = "select * from supplier where supplier_id='$supplier_id'";
$result1 = mysqli_query($con, $get_supplier_name);
while ($row1 = mysqli_fetch_assoc($result1)) {
    $supplier_name = $row1['supplier_name'];
}

if (!isset($_COOKIE['$count'])) {
    $no_of_products = 1;
} else {
    $no_of_products = $_COOKIE['$count'];
    // $available_products=$_COOKIE['check_stock_number'];
    // echo $available_products;
}
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>OZ Shop</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://raw.githubusercontent.com/dallaslu/bootstrap-5-multi-level-dropdown/master/bootstrap5-dropdown-ml-hack.js"></script>
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->

    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section fixed">
            <div class="header_top">
                <div class="container-fluid">
                    <div class="top_nav_container">
                        <?php
                        include('./supplier/supplier_checker.php');
                        checkIsSupplier();

                        // php code here to check if supplier or not

                        ?>

                        <!-- <form class="search_form" method="$POST">
                            <input type="text" class="form-control" name="search_text" placeholder="Search here...">
                            <button class="" type="submit" name="search_button" value="">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form> -->

                        <form action="./product.php" class="search_form">
                            <input type="text" class="form-control" name="search_text" placeholder="Search here...">
                            <a href="#"> <button class="" type="submit" name="search_button" value="">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button></a>
                        </form>


                        <!-- <form class="d-flex" role="search" method="GET">
              <input class="form-control me-2" type="search" name="search_text" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" name="search_botton" type="submit">Search</button>
            </form> -->

                        <div class="user_option_box">

                            <!-- php function here to handle login logout actions -->

                            <!-- <a href="#" class="account-link">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>text</span>
              </a> -->
                            <a href="./cart.php" class="cart-link">
                                <span>
                                    <!-- Maybe it looks better without text -->
                                </span>
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <sup>

                                    <?php

                                    echo $_SESSION['items_in_cart'];

                                    ?>

                                </sup>
                            </a>
                            <a href="" class="cart-link">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                <span>
                                    <?php
                                    echo $_SESSION['username'];
                                    ?>
                                </span>
                            </a>
                            <?php
                            include('./user/check_login_state.php');

                            login_logout_button_handler();

                            ?>

                            <!-- <a href="./admin/home.php" class="account-link">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  Admin Panel
                </span>
              </a> -->





                        </div>
                    </div>

                </div>
            </div>
            <div class="header_bottom">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand" href="index.php">
                            <span>
                                OZshop
                            </span>
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""> </span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Category
                                    </a>
                                    <ul class="dropdown-menu" id="dropdown-menu">
                                        <!-- calling get_category_list php function from here -->
                                        <?php
                                        include('./functions/get_category_list.php');
                                        get_category_list();
                                        ?>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"> About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./product.php">Products</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <div class="container mt-5 mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class=' justify-content-center'>
                                    <?php
                                    echo "<img class='img-thumbnail w-100 h-100' src='./productimages/$product_image' name='product_image' alt='product' />";
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-5">

                                <h5 class="text-uppercase mt-1"><?php
                                                                echo $product_title;
                                                                ?></h5>

                                <div class="content">

                                    <p class='fw-bold'>Rs.<?php
                                                            echo $product_price;
                                                            ?></p>
                                    <p class="about"><?php
                                                        echo $product_details;
                                                        ?>
                                    </p>

                                </div>

                                <div class="cart mt-4 align-items-center">
                                    <span>Quantity</span>
                                    <input type='button' value='+' name='increase_item_number' onClick="increaseItems(1)"></input>
                                    <span id='quantity' name='qty'>1</span>
                                    <input type='button' value='-' name='decrease_item_number' onClick="increaseItems(0)"></input>

                                </div>
                                <div class="stock_number">
                                    <span>Remaining Quantity :<?php echo " " . $product_stock_number;  ?></span>
                                </div>
                                <div class='btn-container d-flex my-4'>
                                    <div class='buy-now'>
                                        <form action="" method="POST">
                                            <input type='submit' name="buy_now_button" value='Buy Now'></input>
                                        </form>
                                    </div>
                                    <div class='add-to-cart mx-3'>
                                        <form method="POST">
                                            <input type='submit' name="add_to_cart_button" value='Add To Cart'></input>
                                        </form>

                                        <?php
                                        if (isset($_POST['add_to_cart_button'])) {
                                            // check the conditions if the item is already present in the array
                                            // first find the total no of items present in the array 
                                            $total = count($_SESSION['product_id_array']);
                                            //prevent inserting garabge values into the array
                                            $duplicate_item_checker = 0;
                                            if ($product_id != 0 or $product_id != NULL) {
                                                if ($total != 0) {
                                                    for ($count = 1; $count <= $total; $count++) {
                                                        // echo "cunting";
                                                        if ($product_id == $_SESSION['product_id_array'][$count - 1]) {
                                                            $duplicate_item_checker = 1;
                                                            $_SESSION['product_number_respective_array'][$count - 1] = $no_of_products;
                                                            break;
                                                        }
                                                    }

                                                    if ($duplicate_item_checker == 0) {
                                                        array_push($_SESSION['product_id_array'], $product_id);
                                                        array_push($_SESSION['product_number_respective_array'], $no_of_products);

                                                        ++$_SESSION['items_in_cart'];
                                                        echo "<script>alert('Item Added To Your Cart')</script>";
                                                        echo "<script>window.open('./detail_page.php?product_id=$product_id','_self')</script>";
                                                    } else {
                                                        echo "<script>alert('Item Is Updated In The Cart')</script>";
                                                        echo "<script>window.open('./detail_page.php?product_id=$product_id','_self')</script>";
                                                        echo "<script>window.open('./detail_page.php?product_id=$product_id','_self')</script>";
                                                    }
                                                } else {
                                                    array_push($_SESSION['product_id_array'], $product_id);
                                                    array_push($_SESSION['product_number_respective_array'], 1);
                                                    ++$_SESSION['items_in_cart'];
                                                    echo "<script>alert('Item Added To Your Cart')</script>";
                                                    echo "<script>window.open('./detail_page.php?product_id=$product_id','_self')</script>";

                                                    echo "<script>window.open('./detail_page.php?product_id=$product_id','_self')</script>";
                                                }
                                            }
                                        }
                                        if (isset($_POST['buy_now_button'])) {
                                            $_SESSION['buy_now_produt_id'] = $product_id;
                                            $_SESSION['buy_now_product_number'] =  $no_of_products;
                                            echo "<script>window.open('./instant_buying_cart.php','_self')</script>";
                                        }



                                        ?>

                                    </div>

                                </div>

                            </div>
                            <div class="col-md-3">
                                <?php
                                echo "<h>Sold By</h>";
                                echo "<br>";
                                echo "<b>$supplier_name</b>";
                                echo "<br>";
                                echo " <div>
                                <p>7 Days Returns<br><span>Change of mind is not applicable</span><br><span>Warranty not available</span></p>
                  
                              </div>";

                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>







    <script>
        // to increase & decrease items
        // default quantity is one
        function increaseItems($check) {
            $count = parseInt(document.getElementById("quantity").textContent);
            if ($count >= 0 && $check == 1 && $count < 5) {
                $count++;
            }
            if ($count != 1 && $check == 0) {
                $count--;

                //--$_SESSION['product_number_respective_temp'];
            }
            document.getElementById("quantity").textContent = $count;
            document.cookie = "$count = " + $count;
            // $no_of_products=$count;

        }
        // for category menu
        const category = document.getElementById('navbarDropdown');
        const categoryMenu = document.getElementById('dropdown-menu');


        category.addEventListener('click', function() {
            if (categoryMenu.style.display === "none")
                categoryMenu.style.display = "block";
            else
                categoryMenu.style.display = "none";
        })
    </script>

</body>

</html>