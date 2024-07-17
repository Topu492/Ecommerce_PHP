<?php
include("../includes/connect.php");

if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status = "true";

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $tmp_image1 = $_FILES['product_image1']['tmp_name'];
    $tmp_image2 = $_FILES['product_image2']['tmp_name'];
    $tmp_image3 = $_FILES['product_image3']['tmp_name'];

    if($product_title=='' or $product_description=='' or  $product_keyword=='' or  $product_category=='' or $product_brand==''
    or $product_image1=='' or  $product_image2=='' or $product_image3 =='' or $product_price==''){
    echo "<script>alert('Please fill up the all fileds')</script>";
    exit();
   }

   else
   {
    move_uploaded_file( $tmp_image1,"./product_images/$product_image1");
    move_uploaded_file( $tmp_image2,"./product_images/$product_image2");
    move_uploaded_file( $tmp_image3,"./product_images/$product_image3");

    $product_insert ="INSERT INTO `products` (product_title,product_description,product_keyword,category_id,brand_id,product_image1,product_image2,product_imag3,price,product_date,product_status) 
    VALUES('$product_title','$product_description','$product_keyword','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
    $result =  mysqli_query($con,$product_insert);
    
    if($result){
        echo "<script>alert('Products Successfully Added')</script>";
    }

   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
      <!------------Bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <!---Style css-->
  <!-- fontawesome link --->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                 placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_description" class="form-label"> Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control"
                 placeholder="Enter Description" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control"
                 placeholder="Enter Product Keyword" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
             <select name="product_category" class="form-select">
                <option value="">Select a category</option>
                <?php

                $category_select = "SELECT * FROM `categories`";
                $category_query = mysqli_query($con,$category_select);
                while($row_data=mysqli_fetch_assoc( $category_query)){
                    $category_title = $row_data['category_title'];
                    $category_id = $row_data['category_id'];
                    echo "<option value='$category_id'> $category_title</option>";

                }


                    ?>
             </select>
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
             <select name="product_brand" class="form-select">
                <option value="">Select a brand</option>
                <?php
                $brand_select = "SELECT * FROM `brands`";
                $brand_query = mysqli_query($con,$brand_select);
                while($row_data=mysqli_fetch_assoc( $brand_query)){
                    $brand_title = $row_data['brand_title'];
                    $brand_id = $row_data['brand_id'];
                    echo "<option value='$brand_id'> $brand_title</option>";

                }


                 ?>
             </select>
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                 placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>

            <div  class="form-outline mb-2 w-50 m-auto">
                <input type="submit" class="btn btn-info mb-3 px-3" name="insert_product" value="Insert Product">
            </div>


        </form>
    </div>
    
</body>
</html>