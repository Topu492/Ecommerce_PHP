<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <h3 class="text-center text-danger">Delete account</h3>

    <form action="" method="POST" class="mt-5">
        <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mt-4">
        <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Don't Delete Account">
        </div>
    </form>
</body>
</html>

<?php

$user_name= $_SESSION['user_name'];
if(isset($_POST['delete'])){
    $delete_query = "DELETE  FROM `users` WHERE user_name='$user_name'";
    $run_query = mysqli_query($con,$delete_query);
    if($run_query){
        session_destroy();
        echo"<script>alert('User delete successfully')</script>";
        echo"<script>window.open('../index.php','_self')</script>";
    }
}

if(isset($_POST['dont_delete'])){
    echo"<script>window.open('profile.php','_self')</script>";
}


?>