<?php
include('../includes/connect.php');

//fetch categories

if(isset($_GET['edit_brand'])){
    $brand_id = $_GET['edit_brand'];

    $select_brand = "SELECT * FROM `brands` WHERE brand_id=$brand_id";
    $brand_query = mysqli_query($con,$select_brand);
    $brand_row = mysqli_fetch_assoc($brand_query);
    $brand_title = $brand_row['brand_title'];
}


if(isset($_POST['update_brand'])){
  $brnd_title = $_POST['brand_title'];
  $update_brand = "UPDATE `brands` SET brand_title='$brnd_title' WHERE brand_id=$brand_id";
  $result1 = mysqli_query($con,$update_brand);
  if($result1){
    echo "<script>alert('Brand is been update sucessfully')</script>";
    echo "<script>window.open('./index.php?view_brands','_self')</script>";

  }
  
  }
 

?>
<h2 class="text-center">Update Brand</h2>

<form action="" method="post" class="mb-2">
<div class="input-group w-50 mb-2 m-auto">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" value="<?php echo $brand_title  ;  ?>" placeholder="Insert Categories" aria-label="Categories">
</div>

<div class="input-group w-50 mb-2 m-auto">

  <input type="submit" class="bg-info border-0 p-2 my-3" name="update_brand" value="Update Brand" aria-label="Username" aria-describedby="basic-addon1">


    </div>

</form>

