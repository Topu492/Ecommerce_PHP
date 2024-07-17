<?php

if(isset($_GET['delete_category'])){
    $delete_id = $_GET['delete_category'];
    $delete_query = "DELETE  FROM `categories` WHERE category_id=$delete_id";
    $delete_run = mysqli_query($con,$delete_query);
    if($delete_run){
        echo "<script>alert('Category is been delete sucessfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}


?>