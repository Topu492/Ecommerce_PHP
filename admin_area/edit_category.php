<?php
include('../includes/connect.php');

//fetch categories

if(isset($_GET['edit_category'])){
    $category_id = $_GET['edit_category'];

    $select_category = "SELECT * FROM `categories` WHERE category_id=$category_id";
    $category_query = mysqli_query($con,$select_category);
    $category_row = mysqli_fetch_assoc($category_query);
    $category_title = $category_row['category_title'];
}


if(isset($_POST['update_cat'])){
  $cate_title = $_POST['cat_title'];
  $update_category = "UPDATE `categories` SET category_title='$cate_title' WHERE category_id=$category_id";
  $result = mysqli_query($con,$update_category);
  if($result){
    echo "<script>alert('Category is been update sucessfully')</script>";
    echo "<script>window.open('./index.php?view_categories','_self')</script>";

  }
  
  }
 

?>
<h2 class="text-center">Update Category</h2>

<form action="" method="post" class="mb-2">
<div class="input-group w-50 mb-2 m-auto">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" value="<?php echo $category_title  ;  ?>" placeholder="Insert Categories" aria-label="Categories">
</div>

<div class="input-group w-50 mb-2 m-auto">

  <input type="submit" class="bg-info border-0 p-2 my-3" name="update_cat" value="Update Category" aria-label="Username" aria-describedby="basic-addon1">


    </div>

</form>