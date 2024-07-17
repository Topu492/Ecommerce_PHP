<?php
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
  $brand_title = $_POST['barnd_title'];
  $select_brand = "SELECT * FROM `brands` WHERE brand_title='$brand_title'";
  $select_result = mysqli_query($con,$select_brand);
  $count_row = mysqli_num_rows( $select_result);

  if($count_row>0){
    echo "<script>alert('This Brand Alreday Added')</script>";
  }
  else{
    $insert_query = "INSERT INTO `brands` (brand_title) VALUES ('$brand_title')";
    $result = mysqli_query($con,$insert_query);
    if($result){
      echo "<script>alert('Brand Successfully Added')</script>";
    }
  }


}


?>

<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="barnd_title" placeholder="Insert Brands" aria-label="Brands">
</div>

<div class="input-group w-10 mb-2 m-auto">

  <input type="submit" class="bg-info border-0  p-2 my-3" name="insert_brand" value="Insert Brands" aria-label="Username" aria-describedby="basic-addon1">
  

    </div>

</form>