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
  <title>Ecommerce Website - Checkout</title>
  <!------------Bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- fontawesome link --->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!---Style css-->
  <link rel="stylesheet" href="style.css">
</head>

<style>
    .payment_img{
        width: 90%;
        margin: auto;
        display: block;
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
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_registration.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>

          </ul>
          <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
           <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
          </form>
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
          echo "<li class='nav-item'>
          <a class='nav-link' href='user_login.php'>Login</a>
        </li>";
        }

        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='user_logout.php'>Logout</a>
        </li>";
        }


        ?>
        

      </ul>


    </nav>


    <!---thirst child -->
    <div class="bg-light">
      <h3 class="text-center">Hidden Store</h3>
      <p class="text-center">Communications is at the heart of e-commerce
        and community
      </p>
    </div>

    <!--four child-->

    
<?php
$user_ip = getIPAddress();
$select_user = "SELECT * FROM `users` WHERE user_ip ='$user_ip'";
$query = mysqli_query($con,$select_user);
$result = mysqli_fetch_array($query);
$user_id = $result['user_id'];

?>
  <div class="conteiner">
    <h2 class="text-center text-info  mt-5">Payment options</h2>
    <div class="row d-flex align-items-center justify-content-center m-5">
        <div class="col-md-6">
        <a href="https:/www.paypal.com"><img src="../images/v03.png" class="payment_img" target="_blank" alt="" ></a>
        </div>

        <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id  ?>"><h2 class="text-center">Pay offline</h2></a>
        </div>
        
    </div>
  </div>


    <!----last child ----->

    <!-- include footer-->
  <?php include("../includes/footer.php");  ?>

  </div>


  <!------javascript js link ----->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

