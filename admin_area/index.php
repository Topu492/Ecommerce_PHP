<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!------------Bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <!---Style css-->
  <!-- fontawesome link --->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="../style.css">
</head>

<style>
    body{
        overflow-x: hidden;
    }
</style>
<body>
    <div class="container-fluid p-0">
        <!---first child-->
        <navbar class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/cart1.jpg" alt="" class="logo">
                <navbar class="navbar navbar-expand-lg navbar-light bg-info">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </navbar>
            </div>

        </navbar>

    <!---second child-->
    <div class="lg-light">
        <h3 class="text-center p-2">Manage details</h3>
    </div>

    <!------third child--->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-2">
                <img src="../images/pieaapple.jpg" alt="" class="admin_logo">
                <p class="text-center text-light">Admin name</p>
            </div>
            <div class="button text-center">
            <button class="my-3"><a href="insert_product.php" class="nav-link bg-info text-light my-1">Insert Products</a></button>
            <button><a href="index.php?view_products" class="nav-link bg-info text-light my-1">View Products</a></button>
            <button><a href="index.php?insert_categories" class="nav-link bg-info text-light my-1">Insert Categories</a></button>
            <button><a href="index.php?view_categories" class="nav-link bg-info text-light my-1">View Categories</a></button>
            <button><a href="index.php?insert_brands" class="nav-link bg-info text-light my-1">Insert Brands</a></button>
            <button><a href="index.php?view_brands" class="nav-link bg-info text-light my-1">View Brands</a></button>
            <button><a href="index.php?list_orders" class="nav-link bg-info text-light my-1">All orders</a></button>
            <button><a href="index.php?list_payments" class="nav-link bg-info text-light my-1">All payments</a></button>
            <button><a href="index.php?list_users" class="nav-link bg-info text-light my-1">List users</a></button>
            <button><a href="" class="nav-link bg-info text-light my-1">Logout</a></button>
            </div>
        </div>
    </div>

    <!---fourth child-->
    <div class="container my-3">
        <?php 
        if(isset($_GET['insert_categories'])){
            include('insert_categories.php');
        }

        if(isset($_GET['insert_brands'])){
            include('insert_brands.php');
        }
        
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_product'])){
            include('edit_product.php');
        }
        if(isset($_GET['delete_product'])){
            include('delete.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }

        if(isset($_GET['view_brands'])){
            include('view_brands.php');
        }
        
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        }
        if(isset($_GET['edit_brand'])){
            include('edit_brand.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }
        if(isset($_GET['delete_brand'])){
            include('delete_brand.php');
        }
        if(isset($_GET['list_orders'])){
           
            include('list_orders.php');
        }

        if(isset($_GET['list_payments'])){
           
            include('list_payments.php');
        }

        if(isset($_GET['list_users'])){
           
            include('list_users.php');
        }



        ?>
    </div>
    
    <!----last child ----->
 
 <!-- <div class="bg-info p-3 text-center footer">
    <p>All rights designed by Saiful 2024</p>
</div> -->

<!-- include footer-->
<?php include("../includes/footer.php");  ?>

</div>


    </div>

 <!------javascript js link ----->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>