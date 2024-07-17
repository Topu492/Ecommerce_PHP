<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}

//getting total price and total item of all items
$user_get_ip = getIPAddress();
 $total_price = 0;
 $cart_query_price = "SELECT * FROM `card_details` WHERE ip_adress='$user_get_ip'";
 $run_query = mysqli_query($con,$cart_query_price);
 $invoice = mt_rand();
 $status = 'pending';
 $row_count = mysqli_num_rows($run_query);
 while($row_count_cart=mysqli_fetch_array($run_query)){
    $product_id = $row_count_cart['product_id'];
    $select_product = "SELECT * FROM `products` WHERE product_id = '$product_id'";
    $run_price = mysqli_query($con,$select_product);
    while($run_product_price=mysqli_fetch_array($run_price)){
        $product_value = $run_product_price['price'];
        $total_price+=$product_value;
    
    }

 }



 // getting quantity from cart

 $select_cart = "SELECT * FROM `card_details`";
 $run_cart_query = mysqli_query($con,$select_cart);
 $get_item_quantity = mysqli_fetch_array($run_cart_query);
 $quantity = $get_item_quantity['quantity'];

 if($quantity==0){
    $quantity = 1;
    $subtotal = $total_price;
 }
 else{
    $quantity = $quantity;
    $subtotal = $total_price*$quantity;
 }

 $insert_orders = "INSERT INTO `users_order` (user_id,amount_due,invoice_number,total_number,order_date,order_status)
  VALUES ($user_id,$subtotal,$invoice,$row_count,NOW(),'$status')";
    $result_query1 = mysqli_query($con,$insert_orders);
  if($result_query1){
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
  }

  //insert orders pending

   $insert_orders_pending = "INSERT INTO `orders_pending` (user_id,invoice_number,product_id,quantity,order_status)
  VALUES ($user_id,$invoice,$product_id,$quantity,'$status')";
    $result_pending_query = mysqli_query($con,$insert_orders_pending);

//delete product from cart

$delete = "DELETE  FROM `card_details` WHERE ip_adress='$user_get_ip'";
$delete_query = mysqli_query($con,$delete);


?>