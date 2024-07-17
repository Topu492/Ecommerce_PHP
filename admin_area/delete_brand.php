<?php

if(isset($_GET['delete_brand'])){
    $delete_id = $_GET['delete_brand'];
    $delete_query = "DELETE  FROM `brands` WHERE brand_id=$delete_id";
    $delete_run = mysqli_query($con,$delete_query);
    if($delete_run){
        echo "<script>alert('Brand is been delete sucessfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}


?>