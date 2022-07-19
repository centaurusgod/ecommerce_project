<?php
include '../db/connect.php';
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://raw.githubusercontent.com/dallaslu/bootstrap-5-multi-level-dropdown/master/bootstrap5-dropdown-ml-hack.js"></script>
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->

    <!-- font awesome style -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="../css/responsive.css" rel="stylesheet" />
    <link href="../css/admin.css" rel="stylesheet">

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
           <a href="../index.php">
           <div class="sidebar-header">
                <h3>OZ SHOPE</h3>
            </div>
           </a> 

            <ul class="list-unstyled components">

                <li class="d-flex mx-2 align-items-center">

                    <a href="./home.php"> <i class="fa-solid fa-gauge"></i> Dashboard</a>
                </li>
                
               
                <li class="d-flex mx-2 align-items-center">
                    <a href="./products.php"> <i class="fa-brands fa-product-hunt"></i>
                        Products</a>
                </li>
                
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-light">
                        <i class="fa-solid fa-bars text-dark fw-bold fs-2"></i>
                    </button>


                    <div>
                        <ul class="nav navbar-nav ml-auto">

                            <li class="nav-item">
                                <a class="nav-link position-relative" id="admin_dropdown" href="#"><img src="https://www.kindpng.com/picc/m/10-109847_admin-icon-hd-png-download.png" alt="" style="width:30px; height:30px">Admin</a>
                                <ul class=" bg-white position-absolute p-2 border border-gray rounded start-100" style="display:none; width:140px; margin-left:-120px;" id="admin_dropdown_menu">
                                    <li class="nav-item" style="list-style:none;"><a href="#" class="nav-link text-white fw-bold " >Logout</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <form method="POST" class="mx-auto w-25" action="search.php">
                <div class="input-group ">
                    <input type="text" class="form-control rounded" id="navbar-search-input" name="keyword" placeholder="Search..." required>
                    <span class="input-group-btn" id="searchBtn" style="display:none;">
                        <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
                    </span>
                </div>
            </form>

            <div class="container mt-5">

                <section class="content">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">

                                <div class="box-body">

                                    <table id="example1" class="table table-bordered">
                                        <thead>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Tools</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $user_id=$_SESSION['user_id'];
                                            $query = "select * from product where supplier_id=(select supplier_id from supplier where user_id='$user_id')";
                                            $data = mysqli_query($con, $query);
                                            $result = mysqli_num_rows($data);
                                            if ($result) {
                                                while ($row = mysqli_fetch_array($data)) {
                                                    $product_id = $row['product_id'];
                                                    $product_title = $row['product_title'];
                                                    $product_price = $row['product_price'];
                                                    $product_image = $row['product_image'];
                                                    //$product_details=row['product_details'];
                                                    ?> <tr>
                                                            <td>  <?php echo $product_title ?></td>
                                                            <td><img class='' src='../productimages/<?php echo $product_image ?>' style='height:30px; width:30px;' alt='...' /></td>
                                                            <td><button onClick='detailPage($product_id)' id='view_btn' class='btn btn-info btn-sm btn-flat desc' data-bs-toggle='modal' data-bs-target='#myModal'><i class='fa fa-search'></i> View</button></td>
                                                            <td>Rs.<?php echo $product_price ?></td>
                                                            <td> <a href='./edit_product.php?product_id=<?php  echo $product_id ?>'> <button class='btn btn-success btn-sm edit btn-flat' onclick="return confirm('Do you Want To Edit?')"><i class='fa fa-edit'></i> Edit</button></a>
                                                                <a href='./delete_products.php?product_id=<?php  echo $product_id ?>'><button class='btn btn-danger btn-sm delete btn-flat' onclick="return confirm('Are you sure you want to delete?')"><i class='fa fa-trash'></i> Delete</button></a>
                                                            </td>
                                                            </tr>
                                                            <?php
                                                }
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- <div class='modal' id='myModal'>
                <div class='modal-dialog'>
                    <div class='modal-content'>

                        <div class='modal-header text-center'>
                            <h4 class='modal-title w-100 font-weight-bold'>$product_title</h4>
                            <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>
                                <span class='fs-5 fw-bold text-center' aria-hidden='true'>&times;</span>
                            </button>


                        </div>
                        <div>
                            <img class='card-img-top w-100' src='../productimages/$product_image' style='height:350px' alt='...' />
                        </div>
                        <div class='describe'>
                            <p class='p-2 fw-thin'>
                                $product_details
                            </p>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' onClick='clearCookie()' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                        </div>
                    </div>

                </div>
            </div> -->
            <?php
            $id_of_product = null;
            if (!isset($_COOKIE['cookie_product_id'])) {
                $id_of_product = "err";
            } else {
                $id_of_product = $_COOKIE['cookie_product_id'];

                $display_product_query = "select * fromproduct where product_id = '$id_of_product'";

                $result = mysqli_query($con, $display_product_query);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $product_title = $row['product_title'];
                        $product_details = $row['product_details'];
                        $product_image = $row['product_image'];

                        echo "

                        <div class='modal' id='myModal'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                        
                                <div class='modal-header text-center'>
                                    <h4 class='modal-title w-100 font-weight-bold'>$product_title</h4>
                                    <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>
                                        <span class='fs-5 fw-bold text-center' aria-hidden='true'>&times;</span>
                                    </button>
                        
                        
                                </div>
                                <div>
                                <img class='card-img-top w-100' src='../productimages/$product_image' style='height:350px' alt='...' />
                                </div>
                                <div class='describe'>
                                    <p class='p-2 fw-thin'>
                                    $product_details
                                    </p>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' onClick='clearCookie()' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                                </div>
                            </div>
                        
                        </div>
                        </div>
                    
                        ";
                    }
                }
            }

            ?>
            <script>
                const toogleBtn = document.getElementById("sidebarCollapse");
                const sideBar = document.getElementById("sidebar");

                toogleBtn.addEventListener("click", function() {
                    sideBar.classList.toggle("active")
                });

                const adminDropdown = document.getElementById("admin_dropdown");
                const adminDropdownMenu = document.getElementById("admin_dropdown_menu");

                adminDropdown.addEventListener('click', () => {
                    if (adminDropdownMenu.style.display === "none") {
                        adminDropdownMenu.style.display = "block";
                    } else {
                        adminDropdownMenu.style.display = "none";
                    }
                });

                function detailPage($product_id, ) {
                    alert("modal open" + $product_id)
                    <?php
                    echo "
                    <div class='modal' id='myModal'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                    
                            <div class='modal-header text-center'>
                                <h4 class='modal-title w-100 font-weight-bold'></h4>
                                <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>
                                    <span class='fs-5 fw-bold text-center' aria-hidden='true'>&times;</span>
                                </button>
                    
                    
                            </div>
                            <div>
                            <img class='card-img-top w-100' src='../productimages/$product_image' style='height:350px' alt='...' />
                            </div>
                            <div class='describe'>
                                <p class='p-2 fw-thin'>
                                
                                </p>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' onClick='clearCookie()' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                            </div>
                        </div>
                    
                    </div>
                    </div>"
                    ?>


                }

                function clearCookie() {
                    document.cookie.setMaxAge(0);
                }
            </script>
            <!-- bootstrap js link -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>