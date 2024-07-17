<style>
    .edit_image{
        width: 90px;
        display: block;
        object-fit: contain;
        margin-left: 10px;
    }
</style>

<?php

if(isset($_GET['edit_product'])){
    $edit_product = $_GET['edit_product'];

    $select_product = "SELECT * FROM `products` WHERE product_id= $edit_product";
    $run_query = mysqli_query($con,$select_product);
    $fetch = mysqli_fetch_assoc($run_query);
    $product_title = $fetch['product_title'];
    $product_description = $fetch['product_description'];
    $product_keyword = $fetch['product_keyword'];
    $category_id = $fetch['category_id'];
    $brand_id = $fetch['brand_id'];
    $product_price = $fetch['price'];
    $product_status = "true";

    $product_image1 = $fetch['product_image1'];
    $product_image2 = $fetch['product_image2'];
    $product_image3 = $fetch['product_image3'];

    //fetching category title
    $select_category = "SELECT * FROM `categories` WHERE category_id= $category_id";
    $run_query1 = mysqli_query($con,$select_category);
    $fetch1 = mysqli_fetch_assoc($run_query1);
    $category_title = $fetch1['category_title'];

     //fetching brand title
     $select_brand = "SELECT * FROM `brands` WHERE brand_id= $brand_id";
     $run_query2 = mysqli_query($con,$select_brand);
     $fetch2 = mysqli_fetch_assoc($run_query2);
     $brand_title = $fetch2['brand_title'];

}



?>

<div class="container mt-5">
<h1 class="text-center">Edit Product</h1>

<form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                 value="<?php echo $product_title; ?>" placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_description" class="form-label"> Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control"
                value="<?php echo $product_description; ?>"  placeholder="Enter Description" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control"
                value="<?php echo $product_keyword; ?>"   placeholder="Enter Product Keyword" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
             <select name="product_category" class="form-select">
                <option value="<?php echo $category_title ;?>"><?php echo $category_title ;?></option>
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
             <option value="<?php echo $brand_title ;?>"><?php echo $brand_title ;?></option>
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
                <div class="d-flex">
                <input type="file" name="product_image1" id="product_image1" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image1; ?>" alt="" class="edit_image">
                </div>
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <div class="d-flex">
                <input type="file" name="product_image2" id="product_image2" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image2; ?>" alt="" class="edit_image">
                </div>
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <div class="d-flex">
                <input type="file" name="product_image3" id="product_image3" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image3; ?>" alt="" class="edit_image">
                </div>
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                value="<?php echo $product_price; ?>"   placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>

            <div  class="form-outline mb-2 w-50 m-auto">
                <input type="submit" class="btn btn-info mb-3 px-3" name="update_product" value="Update Product">
            </div>


        </form>
</div>


<?php

if(isset($_POST['update_product'])){
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

    $product_insert = " UPDATE `products` SET product_title='$product_title',product_description='$product_description',
    product_keyword='$product_keyword',category_id='$product_category',brand_id='$product_brand',
    product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',price='$product_price',
    product_date=NOW(),product_status='$product_status' WHERE product_id=$edit_product";
   // print_r($product_insert);
   $result =  mysqli_query($con,$product_insert);
    
    if($result){
        echo "<script>alert('Products Successfully Added')</script>";
        echo "<script>window.open('./insert_product.php','_self')</script>";
    }

   }
}

?>