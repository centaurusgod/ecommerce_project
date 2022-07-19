<?php
include('./db/connect.php');
session_start();
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
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

                        <form class="search_form" method="$POST">
                            <input type="text" class="form-control" name="search_text" placeholder="Search here...">
                            <button class="" type="submit" name="search_button" value="">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
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
                                    if (isset($_SESSION['items_in_cart'])) {
                                        echo $_SESSION['items_in_cart'];
                                    } else {
                                        echo 0;
                                    }
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
                                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
        <section class="mt-5 container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <div class="box-body">

                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Amount</th>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td>Legion 5 Pro Gen 6 (16" AMD) Gaming Laptop </td>
                                        <td><img class='' src='' style='height:60px; width:60px;' alt='...' /></td>
                                        <td>3</td>
                                        <td>$1,649.99</td>
                                        <td>$1,649.99</td>
                                        <td>
                                            <button class='btn btn-danger btn-sm delete btn-flat'><i class='fa fa-trash'></i> Delete</button>
                                        </td>
                                    </tr> -->

                                    <?php
                                    if (1==1) {
                                       // $total = count($_SESSION['product_id_array']);
                                        $product_id =  $_SESSION['buy_now_produt_id'];
                                        $product_title = "**";
                                        $product_price = 0;
                                        $product_image = "";
                                        $product_temp_id = 0;
                                        $no_of_products = $_SESSION['buy_now_product_number'];
                                        $total_price = 0;
                                        $total_of_total=0;
                    
                                            //assinging product id from session variable array one by one
                                        
                                            $get_product_details_query = "select * from product where product_id = '$product_id'";
                                            $result = mysqli_query($con, $get_product_details_query);
                                            if ($result) {
                                                //  echo $product_id;
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    // echo "while loop";
                                                    $product_temp_id = (int)$row['product_id'];
                                                    $product_title = $row['product_title'];
                                                    $product_image = $row['product_image'];
                                                    $product_price = (int)$row['product_price'];
                                                    $total_price = $no_of_products * $product_price;
                                                    $total_of_total=$total_of_total+$total_price;

                                                }
                                                echo "<tr>
                                                <td>$product_title</td>
                                                <td><img class='' src='./productimages/$product_image' style='height:60px; width:60px;' alt='...' /></td>
                                                <td>$no_of_products </td>
                                                <td>Rs.$product_price</td>
                                                <td>Rs.$total_price</td>
                                                <td>
                                                    <button class='btn btn-danger btn-sm delete btn-flat'><i class='fa fa-trash'></i> Delete</button>
                                                </td>
                                            </tr>";
                                            }
                                        
                                    } else {

                                        // user logged out so take him to login page first before checking out and redirec
                                        //back to checkout page
                                        echo "Not logged In";
                                    }


                                    ?>


                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-3">


                            <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">

                                <div class="row  bgc-primary-l3">
                                    <div class="col-7 text-right">
                                        Total Amount
                                    </div>
                                    <div class="col-5">
                                        <span class="text-150 text-success-d3 opacity-2">Rs.<?php echo $total_of_total;  ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div>
                            <span class="text-secondary-d1 text-105">Thank you for using our service</span>
                            <a href="./checkout.php?product_temp_id=$product_temp_id" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0 text-light">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </section>
    </div>




    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                Ob shop
            </p>
        </div>
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script>
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