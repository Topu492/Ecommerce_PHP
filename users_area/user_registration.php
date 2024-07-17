<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!------------Bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid my-3">
    <h2 class="text-center">New User Registration</h2>

    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                    <label for="user_name" class="form-label">Username</label>
                    <input type="text" id="user_name" class="form-control" placeholder="Enter your username"
                    name="user_name" autocomplete="off" required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="Enter your email"
                    name="user_email" autocomplete="off" required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User Image</label>
                    <input type="file" id="user_image" class="form-control"
                    name="user_image"  required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
                    name="user_password" autocomplete="off" required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="confirm_user_password" class="form-label">Confirm password</label>
                    <input type="password" id="confirm_user_password" class="form-control" placeholder="Enter your confirm password"
                    name="confirm_user_password" autocomplete="off" required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">User address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter your address"
                    name="user_address" autocomplete="off" required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_number" class="form-label">User number</label>
                    <input type="text" id="user_number" class="form-control" placeholder="Enter your number"
                    name="user_number" autocomplete="off" required="required">
                </div>

                <div class="mt-4 pt-2">
                   <input type="submit" class="bg-info py-2 px-3 border-0" value="Register" name="user_reg">
               <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php" class="text-danger">Login</a></p>
                </div>
             </form>

        </div>
    </div>

</div>

<!--insert query-->

<?php

if(isset($_POST['user_reg'])){
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
    $confirm_user_password = $_POST['confirm_user_password'];
    $user_address = $_POST['user_address'];
    $user_number = $_POST['user_number'];
    $user_image = $_FILES['user_image']['name'];
    $user_tmp_image = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    $select_query = "SELECT * FROM `users` WHERE user_name='$user_name' or user_email='$user_email'";
    $result = mysqli_query($con,$select_query);
    $num_rows = mysqli_num_rows($result);
    
    if($num_rows>0){
        echo"<script>alert('User and email alreday exist')</script>";
    }
    else if($user_password!=$confirm_user_password){
        echo"<script>alert('Password do not match')</script>";
    }

    else{
     move_uploaded_file($user_tmp_image,"./user_images/$user_image");
    $user_insert = "INSERT INTO `users`(user_name,user_email,user_password,user_image,user_ip,user_adress
    ,user_mobile) VALUES('$user_name','$user_email','$hash_password','$user_image','$user_ip',
    '$user_address','$user_number')";
    $result_query = mysqli_query($con,$user_insert);
    if($result_query){
        echo"<script>alert('Data inserted sucessfully')</script>";
    }

    }

    //selection cart item
    $select_item = "SELECT * FROM `card_details` WHERE ip_adress='$user_ip'";
    $sql_query = mysqli_query($con,$select_item);
    $num_row_count = mysqli_num_rows($sql_query);
    if($num_row_count>0){
        $_SESSION['user_name'] = $user_name;
        echo"<script>alert('You have item in your cart')</script>";
        echo"<script>window.open('checkout.php','_self')</script>";
    }
    else{
        echo"<script>window.open('../index.php','_self')</script>";
    }


}

?>
    
</body>
</html>