<?php
//include('./admin/get_summary.php');
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

    <title>OB Shop</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                                <a class="nav-link position-relative" id="admin_dropdown" href="#"><img src="https://www.kindpng.com/picc/m/10-109847_admin-icon-hd-png-download.png" alt="" style="width:30px; height:30px"><?php echo $_SESSION['username']; ?></a>
                                <ul class=" bg-white position-absolute p-2 border border-gray rounded start-100" style="display:none; width:140px; margin-left:-120px;" id="admin_dropdown_menu">
                                    <li class="nav-item" style="list-style:none;"><a href="../loginhandler/logout.php" class="nav-link text-white fw-bold ">Logout</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container mt-5">
                <div class="row gx-4 gx-lg-4 row-cols-sm-1 row-cols-md-2 row-cols-xl-3 ">





                    <div class="col mb-5">
                        <div class="card d-flex justify-content-center align-items-center " style="height:200px;">
                            <p style="color:#3a4468;" class="fw-bold fs-5">Total Products: <span>
                                <?php
                                 include('./get_summary.php');
                                get_total_products(); //get_total_products();  
                              ?></span></p>
                        </div>
                    </div>


                    <div class="col mb-5">
                        <div class="card d-flex justify-content-center align-items-center " style="height:200px;">
                            <p style="color:#3a4468;" class="fw-bold fs-5">Total Transcation: <span>RS.
                                    <?php
                                    get_total_transaction();
                                    ?>
                                    +</span></p>
                        </div>
                    </div>

                    <!-- <div class="col mb-5">
                        <div class="card d-flex justify-content-center align-items-center " style="height:200px;">
                            <p style="color:#3a4468;" class="fw-bold fs-5">Total Category: <span><?php echo "Test" ?></span></p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

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
        </script>
</body>

</html>