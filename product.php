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

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>


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
            <button class="" type="submit" name="search_category_button" value="">
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



            <?php
            $temp_username_var = $_SESSION['username'];
            $check_if_supplier = "select supplier_id from supplier where supplier.user_id=(select user_id from user where user_username='$temp_username_var')";
            if (mysqli_num_rows(mysqli_query($con, $check_if_supplier)) == 1) {
              echo "<a href='./supplier/home.php' class='cart-link'>
                 <i class='fa fa-user-circle' aria-hidden='true'></i>
                 <span>
                 $temp_username_var
                 </span>
               </a>";
            } else {
              echo "<a href='#' class='cart-link'>
                 <i class='fa fa-user-circle' aria-hidden='true'></i>
                 <span>
                  $temp_username_var
                 </span>
               </a>";
            }
            ?>




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
                <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
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


  <section class="my-0 py-0">
    <div class="heading_container heading_center">
      <h2>
        <?php
        if (isset($_GET['category_name'])) { $category_name = $_GET['category_name'];
          echo $category_name;
        }
        else {
          echo "Our Products";
        }
        ?>
      </h2>
    </div>
    <div class="container px-4 px-lg-5 mt-5">
      <div class="row gx-4 gx-lg-2 row-cols-sm-1 row-cols-md-2 row-cols-xl-3 ">
        <!-- calling function to display all products -->
        <?php
        include('./functions/display_products.php');
        include('./functions/display_product_category.php');

        if (isset($_GET['category_name'])) {
          $category_name = $_GET['category_name'];
          display_all_products_category($category_name);
        }
        
        else{
          if (isset($_GET['search_category_button']) or isset($_GET['search_button'])) {
           // echo "search is clicked and working now";
            $searched_text = $_GET['search_text'];
            display_all_products($searched_text);
          } else {
            // echo "else is working";
            display_all_products("");
          }
        }

        
        // display_all_products("");

        ?>





        <!-- <div class="col mb-5">
          <div class="card h-auto">

            <img class="card-img-top w-100" src="images/p5.png" style="height:350px" alt="..." />

            <div class="">
              <div class="text-center">

                <h5 class="fw-bolder">Fancy Product</h5>

                $80.00
              </div>
            </div>

            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
              <div class="text-center ">
                <a class="btn btn-outline-dark mt-auto" href="#">Add to Cart</a>
                <a class="btn btn-outline-dark mt-auto" href="#">View More</a>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </section>
  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        OZ shop
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