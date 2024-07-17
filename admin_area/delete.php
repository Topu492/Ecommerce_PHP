<?php

if(isset($_GET['delete_product'])){
    $delete_id = $_GET['delete_product'];
    $delete = "DELETE FROM `products` WHERE product_id=$delete_id";
    
    $result_query = mysqli_query($con,$delete);
    if($result_query){
        echo "<script>alert('Products Successfully Deleted')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }

}



?>