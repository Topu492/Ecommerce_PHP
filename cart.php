<?php
include('includes/connect.php');
include('./functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Website-Cart details</title>
  <!------------Bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- fontawesome link --->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!---Style css-->
  <link rel="stylesheet" href="style.css">
</head>
<style>
    .cart_image{
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
</style>

<body>
  <!---nav -->
  <div class="container-fluid p-0">
    <!--first child-->

    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <img src="images/logo1.webp" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./users_area/user_registration.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sub>
              <?php cart_item(); ?> </sub>
            </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <!-----second child---->

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        <?php
          
          if(!isset($_SESSION['user_name'])){
            echo " <li class='nav-item'>
            <a class='nav-link' href='#'>Welcome guest</a>
          </li>";

          }
          else{
            echo " <li class='nav-item'>
            <a class='nav-link' href='#'>Welcome  ".$_SESSION['user_name']."</a>
          </li>";
          }
          
          if(!isset($_SESSION['user_name'])){
            echo " <li class='nav-item'>
            <a class='nav-link' href='./users_area/user_login.php'>Login</a>
           </li>";
  
          }
          else{
            echo " <li class='nav-item'>
            <a class='nav-link' href='./users_area/user_logout.php'>Logout</a>
           </li>";
          }

        ?>

      </ul>


    </nav>

    <!--- calling card function-->
    <?php
    cart();


    ?>

    <!---thirst child -->
    <div class="bg-light">
      <h3 class="text-center">Hidden Store</h3>
      <p class="text-center">Communications is at the heart of e-commerce
        and community
      </p>
    </div>

<!-- fourth child-->

<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            <tbody>
                <?php

            global $con;
            $total_price = 0;
            $get_ip_adress = getIPAddress();
            $cart_query = "SELECT * FROM `card_details` WHERE ip_adress='$get_ip_adress'";
            $cart_result = mysqli_query($con,$cart_query);
            $cart_row = mysqli_num_rows($cart_result);
            if($cart_row>0){
                echo "<thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                </tr>
            </thead>";

            
            while($row=mysqli_fetch_assoc($cart_result)){
            $product_id = $row['product_id'];
            $select_query = "SELECT * FROM `products` WHERE product_id='$product_id'";
            $product_result = mysqli_query($con,$select_query);
            while($product_row=mysqli_fetch_assoc($product_result)){
                $product_price =array($product_row['price']);
                $price_table = $product_row['price'];
                $product_title = $product_row['product_title'];
                $product_image1 = $product_row['product_image1'];
                $product_sum = array_sum($product_price);
                $total_price+=$product_sum;
            


                ?>
                <tr>
                    <td><?php echo $product_title; ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1?>" class="cart_image" alt=""></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php
                       $get_ip_adress = getIPAddress();
                    if(isset($_POST['update_cart_value'])){
                        $quantities = $_POST['qty'];
                        $update_cart = "UPDATE `card_details` SET quantity=$quantities WHERE
                        ip_adress='$get_ip_adress'";
                        $result_product = mysqli_query($con,$update_cart);
                        $total_price = $total_price*$quantities;



                    }

                    ?>
                    <td><?php echo $price_table; ?></td>
                    <td><input type="checkbox" name="cartitem[]" value="<?php echo  $product_id  ?>"></td>
                    <td>
                        <input type="submit"  class="bg-info px-3 py-2 mx-3 border-0" value="Update cart" name="update_cart_value">
                        <input type="submit"  class="bg-info px-3 py-2 mx-3 border-0" value="Remove cart" name="remove_cart">

                    </td>
                </tr>
                <?php  }} }
                else{
                    echo "<h2 class='text-center text-danger'>Cart Empty</h2>";
                }
                ?>
            </tbody>
        </table>
        </form>
    </div>
</div>

<!--subtotal-->
<div class="d-flex mb-5 ">

<?php  global $con;
            $get_ip_adress = getIPAddress();
            $cart_query = "SELECT * FROM `card_details` WHERE ip_adress='$get_ip_adress'";
            $cart_result = mysqli_query($con,$cart_query);
            $cart_row = mysqli_num_rows($cart_result);
            if($cart_row>0){
                    echo " <h4 class='px-3'>Subtotal:<strong class='text-info'> $total_price/-</strong></h4>
                    <a href='index.php'><button class='bg-info px py-2 mx-3 border-0'>Continue Shopping</button></a>
                    <a href='./users_area/checkout.php'><button class='bg-secondary px-3 py-2 border-0'>Checkout</button></a>";
            }

            else{
                echo " <a href='index.php'><button class='bg-info px py-2 mx-3 border-0'>Continue Shopping</button></a>";

            }

?>
   
</div>

    <!----last child ----->

    <!-- include footer-->
  <?php include("./includes/footer.php");  ?>

  </div>

  <!--cart remove function-->
  <?php
  function cart_remove_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['cartitem'] as $remove_id){
           // echo $remove_id;
            $delete_query = "DELETE FROM `card_details` WHERE product_id=$remove_id";
            $result_query = mysqli_query($con,$delete_query);
            if($result_query){
                echo "<script>window.open('index.php','_self')</script>";
            }

        }
    }
  }

  echo $remove_item = cart_remove_item();

  ?>


  <!------javascript js link ----->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>