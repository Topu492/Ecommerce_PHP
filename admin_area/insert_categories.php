<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
  $category_title = $_POST['cat_title'];
  $select_category = "SELECT * FROM `categories` WHERE category_title='$category_title'";
  $select_result = mysqli_query($con,$select_category);
  $count_row = mysqli_num_rows($select_result);
  if( $count_row>0){
    echo "<script>alert('This Category Alreday Added')</script>";

  }
  else{
    $insert_query="INSERT INTO `categories` (category_title) VALUES  ('$category_title')";
    $result = mysqli_query($con,$insert_query);
    if($result){
      echo "<script>alert('Category Successfully Added')</script>";
    }
  }

  }
 

?>
<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Categories">
</div>

<div class="input-group w-10 mb-2 m-auto">

  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">


    </div>

</form>