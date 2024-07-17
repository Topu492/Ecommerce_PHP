<?php

//include("./includes/connect.php");


//displaying products
function getproduct(){
    global $con;

    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_product = "SELECT * FROM `products` ORDER BY RAND() LIMIT 0,9";
    $product_query = mysqli_query($con,$select_product);
    while($row=mysqli_fetch_assoc($product_query)){
      $product_id = $row['product_id'];
      $product_title =  $row['product_title'];
      $product_description =  $row['product_description'];
      $product_image1 =  $row['product_image1'];
      $product_category_id =  $row['category_id'];
      $product_brand_id =  $row['brand_id'];
      $product_price =  $row['price'];
      echo    "<div class='col-md-4 mb-2'>
      <div class='card text-center'>
        <img src='./admin_area/product_images/$product_image1'  class='card-img-top' alt=' $product_title'>
        <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'> $product_description</p>
          <p class='card-text'> Price: $product_price/-</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add Cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
        </div>
      </div>
      </div>";

        }
    }
    
    }
}

//view_details
function view_details_product(){
  global $con;
  if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
        $product_id = $_GET['product_id'];
  $select_product = "SELECT * FROM `products` WHERE product_id=$product_id";
  $product_query = mysqli_query($con,$select_product);
  while($row=mysqli_fetch_assoc($product_query)){
    $product_id = $row['product_id'];
    $product_title =  $row['product_title'];
    $product_description =  $row['product_description'];
    $product_image1 =  $row['product_image1'];
    $product_image2 =  $row['product_image2'];
    $product_image3 =  $row['product_image3'];
    $product_category_id =  $row['category_id'];
    $product_brand_id =  $row['brand_id'];
    $product_price =  $row['price'];
    echo    "<div class='col-md-4 mb-2'>
    <div class='card text-center'>
      <img src='./admin_area/product_images/$product_image1'  class='card-img-top' alt=' $product_title'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'> $product_description</p>
        <p class='card-text'> Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add Cart</a>
        <a href='index.php' class='btn btn-secondary'>Go home</a>
      </div>
    </div>
    </div>
    
    <div class='col-md-8'>
    <!---related image-->
    <div class='row'>
        <div class='col-md-12'>
            <h4 class='text-center text-info mb-4'>Related Products</h4>

        </div>
        <div class='col-md-6'>
        <img src='./admin_area/product_images/$product_image2'  class='card-img-top' alt=' $product_title'>
        </div>
        <div class='col-md-6'>
        <img src='./admin_area/product_images/$product_image3'  class='card-img-top' alt=' $product_title'>
            </div>
    </div>

</div>";

      }
  }
  
  }
}
}


//saerch products

function get_search_product(){
    global $con;

    if(isset($_GET['search_data_product'])){
      
    $search_data_value = $_GET['search_data'];

    $search_query = "SELECT * FROM `products` WHERE product_keyword LIKE '%$search_data_value%'";
    $product_query = mysqli_query($con,$search_query);
    $count_row = mysqli_num_rows($product_query);
    if( $count_row==0){
        echo "<h2 class='text-center text-danger'> No results match.No product found on this category</h2>";
  
    }
    while($row=mysqli_fetch_assoc($product_query)){
      $product_id = $row['product_id'];
      $product_title =  $row['product_title'];
      $product_description =  $row['product_description'];
      $product_image1 =  $row['product_image1'];
      $product_category_id =  $row['category_id'];
      $product_brand_id =  $row['brand_id'];
      $product_price =  $row['price'];
      echo    "<div class='col-md-4 mb-2'>
      <div class='card text-center'>
        <img src='./admin_area/product_images/$product_image1'  class='card-img-top' alt=' $product_title'>
        <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'> $product_description</p>
          <p class='card-text'> Price: $product_price/-</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add Cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
        </div>
      </div>
      </div>";

        }
    }
    
    }


//displaying products
function get_all_product(){
    global $con;

    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
            $select_product = "SELECT * FROM `products` ORDER BY RAND()";
            $product_query = mysqli_query($con,$select_product);
            while($row=mysqli_fetch_assoc($product_query)){
            $product_id = $row['product_id'];
            $product_title =  $row['product_title'];
            $product_description =  $row['product_description'];
            $product_image1 =  $row['product_image1'];
            $product_category_id =  $row['category_id'];
            $product_brand_id =  $row['brand_id'];
            $product_price =  $row['price'];
            echo   "<div class='col-md-4 mb-2'>
            <div class='card text-center'>
            <img src='./admin_area/product_images/$product_image1'  class='card-img-top' alt='$product_title'>
            <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'> $product_description</p>
            <p class='card-text'> Price: $product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add Cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
            </div>
            </div>";

        }
    }
    
    }
}

//displaying unique categories

function get_unique_category(){
    global $con;

    if(isset($_GET['category'])){
            $category_id = $_GET['category'];
            $select_product = "SELECT * FROM `products` WHERE category_id=$category_id";
            $product_query = mysqli_query($con,$select_product);
            $row_num = mysqli_num_rows($product_query);
            if( $row_num==0){
                echo "<h2 class='text-center text-danger'> No stock for this categories</h2>";
            }
            while($row=mysqli_fetch_assoc($product_query)){
            $product_id = $row['product_id'];
            $product_title =  $row['product_title'];
            $product_description =  $row['product_description'];
            $product_image1 =  $row['product_image1'];
            $product_category_id =  $row['category_id'];
            $product_brand_id =  $row['brand_id'];
            $product_price =  $row['price'];
            echo    "<div class='col-md-4 mb-2'>
            <div class='card text-center'>
                <img src='./admin_area/product_images/$product_image1'  class='card-img-top' alt=' $product_title'>
                <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'> $product_description</p>
                <p class='card-text'> Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                </div>
            </div>
            </div>";

                }
            }
            
            }

            //displaying unique brands

            function get_unique_brand(){
                global $con;
            
                if(isset($_GET['brand'])){
                        $brand_id = $_GET['brand'];
                        $select_product = "SELECT * FROM `products` WHERE brand_id=$brand_id";
                        $product_query = mysqli_query($con,$select_product);
                        $row_num = mysqli_num_rows($product_query);
                        if( $row_num==0){
                            echo "<h2 class='text-center text-danger'>This brand is not vaiable for service</h2>";
                        }
                        while($row=mysqli_fetch_assoc($product_query)){
                        $product_id = $row['product_id'];
                        $product_title =  $row['product_title'];
                        $product_description =  $row['product_description'];
                        $product_image1 =  $row['product_image1'];
                        $product_category_id =  $row['category_id'];
                        $product_brand_id =  $row['brand_id'];
                        $product_price =  $row['price'];
                        echo    "<div class='col-md-4 mb-2'>
                        <div class='card text-center'>
                            <img src='./admin_area/product_images/$product_image1'  class='card-img-top' alt=' $product_title'>
                            <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'> $product_description</p>
                            <p class='card-text'> Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                        </div>";
            
                            }
                        }
                        
                        }

//displaying brands sidebar

function getbrands(){
    global $con;
    $select_brand = "SELECT * FROM `brands`";
    $brand_result = mysqli_query($con,$select_brand);
    while($row_data=mysqli_fetch_assoc($brand_result)){
      $brand_title = $row_data['brand_title'];
      $brand_id = $row_data['brand_id'];
      echo "<li class='nav-item'>
        <a href='index.php?brand=$brand_id' class='nav-link text-light'><h5> $brand_title</h5></a>
      </li>";
    }
}

//displaying categories sidebar

function getcategories(){
    global $con;
    $select_category = " SELECT * FROM `categories`";
    $result_category = mysqli_query($con,$select_category);
    while($row_data=mysqli_fetch_assoc( $result_category)){
      $category_title = $row_data['category_title'];
      $category_id = $row_data['category_id'];
      echo "<li class='nav-item'>
          <a href='index.php?category=$category_id' class='nav-link text-light'><h5>$category_title</h5></a>
        </li>";

    }
}

//get ip adress function
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  

//cart function

function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_id_adress = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];
    $select_query = "SELECT * FROM `card_details` WHERE ip_adress='$get_id_adress' AND
    product_id=$get_product_id";
    $result_query = mysqli_query($con,$select_query);
    $row_num = mysqli_num_rows($result_query);
    if($row_num>0){
      echo "<script>alert('This item is already inside cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
    else{
      $add_cart = "INSERT INTO `card_details` (product_id,ip_adress,quantity)
      VALUES($get_product_id,'$get_id_adress',0)";
      $query = mysqli_query($con, $add_cart);
      echo "<script>alert('Item is added to cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }

}
}

// function to get item numbers

function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_id_adress = getIPAddress();
    $select_query = "SELECT * FROM `card_details` WHERE ip_adress='$get_id_adress'";
    $result_query = mysqli_query($con,$select_query);
    $row_num = mysqli_num_rows($result_query);
  }
    else{
      global $con;
      $get_id_adress = getIPAddress();
      $select_query = "SELECT * FROM `card_details` WHERE ip_adress='$get_id_adress'";
      $result_query = mysqli_query($con,$select_query);
      $row_num = mysqli_num_rows($result_query);
    }

    echo   $row_num;

}

// total cart price
function total_cart_price(){
  global $con;
  $total_price = 0;
  $get_ip_adress = getIPAddress();
  $cart_query = "SELECT * FROM `card_details` WHERE ip_adress='$get_ip_adress'";
  $cart_result = mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_assoc($cart_result)){
    $product_id = $row['product_id'];
    $select_query = "SELECT * FROM `products` WHERE product_id='$product_id'";
    $product_result = mysqli_query($con,$select_query);
    while($product_row=mysqli_fetch_assoc($product_result)){
      $product_price = array($product_row['price']);
      $product_sum = array_sum($product_price);
      $total_price+=$product_sum;
    }
  }
  echo $total_price;
}

function get_users_pending(){
  global $con;
  $user_name = $_SESSION['user_name'];
  $get_details = "SELECT * FROM `users` WHERE user_name='$user_name'";
  $result_query = mysqli_query($con,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id = $row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_order'])){
        if(!isset($_GET['delete_account'])){
          $get_orders = "SELECT * FROM `orders_pending` WHERE user_id=$user_id AND order_status='pending'";
          $get_run_query = mysqli_query($con,$get_orders);
          $row_count = mysqli_num_rows($get_run_query);
          if($row_count>0){
            echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'> $row_count</span> pending orders</h3>
            <p class='text-center'><a href='profile.php?order_detals' class='text-dark'>Order details</a></p>
            ";
           
          }
          else{
            echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</h3>
            <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>
            ";
          }
        }
      }
    }
  }
}


?>