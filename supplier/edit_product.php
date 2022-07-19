<?php
include('../db/connect.php');
session_start();
$user_id = $_SESSION['user_id'];

?>

<?php
$product_id=$_GET['product_id'];
$fill_product_query="select * from product where product_id='$product_id'";
$fill_result=mysqli_query($con,$fill_product_query);
while($row=mysqli_fetch_assoc($fill_result)){
$supplier_id=$row['supplier_id'];
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_image=$row['product_image'];
$product_price=$row['product_price'];
$product_stock_number=$row['product_stock_number'];
$category_pass_name=$row['category_name'];
$product_details=$row['product_details'];

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Edit Products </title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- font awesome learn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<!-- css files -->
<link rel="stylesheet" href="create_product.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container vw-50 ">
        <h2 class="text-center">Add your product to shop</h2>
        <div class=" container row justify-content-md-center mb-4">

            <form action="" class="mb-5" method="POST" enctype="multipart/form-data">
                <div class="d-flex justify-content-center items-center mt-4 w-full h-50  rounded border border-gray border-2">
                    <img src="../productimages/<?php  echo $product_image;?>" style="object-fit:cover" id="img-preview" class="img-fluid rounded shadow-sm w-full h-full">
                </div>

                <div class="input-box mt-2 ">

                    <input type="file" id="imgFile" name="product_image" accept="image/*" onchange="showPreview(event)"  style="opacity:1;">

                </div>

                <div class="form-outline mt-4">
                    <input type="text" id="form5Example1" name="product_title" value="<?php echo $product_title; ?>" class="form-control" placeholder="Product Name" maxlength="50" required />
                </div>
                <div class="form-group mt-4">
                    <textarea rows="5" class="form-control" name="product_details"  placeholder="Describe about product" maxlength="300"> <?php echo $product_details; ?></textarea>
                </div>
                <div class="form-outline mt-4">
                    <input type="number" id="" class="form-control" name="product_price" value="<?php echo $product_price; ?>"placeholder="Product Price" pattern="\d*" maxlength="7" required />
                </div>
                <div class="form-outline mt-4">
                    <input type="number" id="" class="form-control" name="product_stock_number" value="<?php echo $product_stock_number; ?>"placeholder="Available products" pattern="\d*" maxlength="7" required />
                </div>

                <div class='form-group mt-4'>
                    <select class='form-control' id='sel1' name="category_name">
                    <?php
                    $get_category_list_query = "select * from category";

                    $result_category = mysqli_query($con, $get_category_list_query);
                    if ($result_category) {
                        while ($row = mysqli_fetch_assoc($result_category)) {
                            $category_name = $row['category_name'];
                            echo "
               
                <option selected>$category_name</option>
         
                ";
                        }
                    }
                    ?>
    
    </select>
                </div>

                <div class="form-outline mt-4">
                    <input type="submit"  class="form-control" name="insert_botton" value="Add Product" />
                </div>


        </div>


        </form>
    </div>
    </div>
    <!-- for image preview -->
    <script>
        function showPreview(event) {
            const preViewImage = document.getElementById("img-preview");
            preViewImage.src = URL.createObjectURL(event.target.files[0]);
            preViewImage.onload = function() {
                URL.revokeObjectURL(preViewImage.src)
            }
        }
    </script>
    <div>
        <?php
        ///put the values of the products into the database
        if (isset($_POST['insert_botton'])) {

            $product_title = $_POST['product_title'];
            $product_price = (int)$_POST['product_price'];
            $product_details = $_POST['product_details'];
            $category_name = $_POST['category_name'];
            
        $product_stock_number = $_POST['product_stock_number'];


        // find supplier id from user_id
        $get_supplier_id="select supplier_id from supplier where user_id='$user_id'";
        $get_supplier_id_result=mysqli_query($con,$get_supplier_id);
        $row=mysqli_fetch_array($get_supplier_id_result);
        $supplier_id=$row['supplier_id'];
        if(isset($_FILES['product_image']['name'])){
        echo "file  set";
        $product_image = $user_id.time().$_FILES['product_image']['name'];

        $product_temp_image = $_FILES['product_image']['tmp_name'];
        
        move_uploaded_file($product_temp_image, "../productimages/$product_image");
        echo "<script>alert('Insertion Sucessful')</script>";


        }
        else{
            echo "file not set";
           
        }

           // to acess product_images and urls or what we are learning
           
            $insert_product_query = "insert into product(supplier_id, product_title, product_price, product_image, category_name, product_details,product_stock_number) values('$supplier_id','$product_title','$product_price','$product_image','$category_name','$product_details','$product_stock_number')";
            // $remove_product_query = "delete from product where product_image='$product_image'";
            $result = mysqli_query($con, $insert_product_query);
            if (!$result) {
                echo '<script>alert("' . mysqli_error($con) . '.");</script>';
                echo "<script>window.open('./create_product.php')</script>";
                // mysqli_query($con,$remove_product_query); 
            } else {
                
                // echo "<script>window.open('./create_product.php')</script>";
            }

            // acessing image tep names
        }

        ?>
    </div>

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