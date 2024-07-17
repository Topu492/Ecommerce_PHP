<?php
if(isset($_GET['edit_account'])){
    $user_name = $_SESSION['user_name'];
    $select_user = "SELECT * FROM `users` WHERE user_name='$user_name'";
    $run_query = mysqli_query($con,$select_user);
    $row_fetch = mysqli_fetch_array($run_query);
    $user_id = $row_fetch['user_id'];
    $user_name = $row_fetch['user_name'];
    $user_email = $row_fetch['user_email'];
    $user_adress = $row_fetch['user_adress'];
    $user_mobile = $row_fetch['user_mobile'];
}

if(isset($_POST['user_update'])){
    $user_update_id =  $user_id;
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_adress = $_POST['user_adress'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    move_uploaded_file( $user_image_tmp,"./user_images/$user_image");

    $user_update = "UPDATE `users` SET user_name=' $user_name',user_email='$user_email',user_image
    ='$user_image',user_adress='$user_adress',user_mobile='$user_mobile' WHERE user_id= $user_update_id";
    $update = mysqli_query($con,$user_update);
    if($update){
        echo "<script>alert('Data update Sucessfully')</script>";
        echo "<script>window.open('user_logout.php','_self')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
</head>
<style>
    .img_edit{
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
</style>
<body>
  <h3 class="text-center text-success mb-4">Edit account</h3>
  <form action="" method="post" enctype="multipart/form-data" class="text-center"  value="<?php echo  $user_id?>">
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="user_name" value="<?php echo  $user_name?>">
    </div>
    <div class="form-outline mb-4">
        <input type="email" class="form-control w-50 m-auto" name="user_email"  value="<?php echo  $user_email?>">
    </div>
    <div class="form-outline mb-4  w-50 m-auto d-flex">
        <input type="file" class="form-control m-auto" name="user_image">
        <img src="./user_images/<?php echo $row_user_image  ?>" alt="" class="img_edit mx-4">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="user_adress"  value="<?php echo  $user_adress?>">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="user_mobile"  value="<?php echo  $user_mobile?>">
    </div>

    <input type="submit" class="bg-info py-2 px-3"
     name="user_update" value="Update">

  </form>
</body>
</html>