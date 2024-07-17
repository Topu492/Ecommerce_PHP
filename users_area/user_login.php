<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

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
<style>
    body{
        overflow-x: hidden;
        
    }
</style>
<body>

<div class="container-fluid my-3">
    <h2 class="text-center"> User Login</h2>

    <div class="row d-flex align-items-center justify-content-center mt-4">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                    <label for="user_name" class="form-label">Username</label>
                    <input type="text" id="user_name" class="form-control" placeholder="Enter your username"
                    name="user_name" autocomplete="off" required="required">
                </div>
               
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
                    name="user_password" autocomplete="off" required="required">
                </div>


                <div class="mt-4 pt-2 pb-3">
                   <input type="submit" class="bg-info py-2 px-3 border-0" value="Login" name="user_login">
               <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_registration.php" class="text-danger">Registration</a></p>
                </div>
             </form>

        </div>
    </div>

</div>
    
</body>
</html>

<?php
if(isset($_POST['user_login'])){
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $select_query = "SELECT * FROM `users` WHERE user_name='$user_name'";
    $result = mysqli_query($con,$select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();  
    //cart item
    $select_cart_item = "SELECT * FROM `card_details` WHERE ip_adress='$user_ip'";
    $item_query = mysqli_query($con,$select_cart_item);
    $item_row_count = mysqli_num_rows($item_query);
    if($row_count>0){
        $_SESSION['user_name'] = $user_name;
        if(password_verify($user_password,$row_data['user_password'])){
            if($row_count==1 and $item_row_count==0 )
            {
                $_SESSION['user_name'] = $user_name;
                echo"<script>alert('User successfully login')</script>";
                echo"<script>window.open('profile.php','_self')</script>";
            }
            else{
                $_SESSION['user_name'] = $user_name;
                echo"<script>alert('User successfully login')</script>";
                echo"<script>window.open('payment.php','_self')</script>";
            }
          
        }
        else{
            echo"<script>alert('Invalid Credentials')</script>"; 
        }

    }
    else{
        echo"<script>alert('Invalid Credentials')</script>";
    }
}


?>