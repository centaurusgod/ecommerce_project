<?php
include('../db/connect.php');
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
            <div class="sidebar-header">
                <h3>OZ SHOPE</h3>
            </div>

            <ul class="list-unstyled components">

                <li class="d-flex mx-2 align-items-center">

                    <a href="./home.php"> <i class="fa-solid fa-gauge"></i> Dashboard</a>
                </li>
                <li class="d-flex mx-2 align-items-center">

                    <a href="./users.php"><i class="fa-solid fa-users"></i> Users</a>
                </li>
                <li class="d-flex mx-2 align-items-center">
                    <a href="./supplier_details.php"> <i class="fa-solid fa-boxes-packing "></i>
                        Suppliers </a>
                </li>
                <li class="d-flex mx-2 align-items-center">
                    <a href="./supplier_request.php"> <i class="fa-solid fa-boxes-packing "></i>
                        Supplier Requests </a>
                </li>

                <li class="d-flex mx-2 align-items-center">
                    <a href="./products.php"> <i class="fa-brands fa-product-hunt"></i>
                        Products</a>
                </li>
                <li class="d-flex mx-2 align-items-center">
                    <a href="./categories.php"> <i class="fa-solid fa-c"></i>
                        Category</a>
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
                                    <li class="nav-item" style="list-style:none;"><a href="#" class="nav-link text-white fw-bold ">Logout</a></li>
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
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>Supplier Name</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM pending_supplier";
                                        $user_phone_number = 0;
                                        $data = mysqli_query($con, $query);
                                        $result = mysqli_num_rows($data);
                                        if ($result) {
                                            while ($row = mysqli_fetch_array($data)) {
                                                $user_id = (int)$row['user_id'];
                                                $supplier_name=$row['supplier_name'];
                                                $supplier_address=$row['supplier_address'];
                                                $supplier_id=$row['supplier_id'];

                                        ?>
                                                <tr>
                                                    <td><?php echo $row['supplier_name'] ?></td>
                                                    <td><?php echo $row['supplier_address'] ?></td>
                                                    <td><?php $query_phone_number = "select user_phone_number from user where user_id='$user_id'";

                                                        $result_phone_number = mysqli_query($con, $query_phone_number);
                                                        while ($row1 = mysqli_fetch_assoc($result_phone_number)) {
                                                            $user_phone_number = (int)$row1['user_phone_number'];
                                                        }
                                                        echo $user_phone_number ?></td>
                                                    <td><a href="./supplier_request_handler.php?pending_supplier_id=<?php echo $supplier_id ?>&approve=<?php echo 1;?>"> <button class='btn btn-success btn-sm edit btn-flat' onclick="return confirm('Are you Sure you want to Approve?')"><i class='fa fa-check'></i> Approve</button></a>
                                                        <a href="./supplier_request_handler.php?pending_supplier_id=<?php echo $supplier_id ?>&approve=<?php echo 0;?>"><button class='btn btn-danger btn-sm delete btn-flat' onclick="return confirm('Are you Sure you want to delete?')"><i class='fa fa-trash'></i> Delete</button></a>
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