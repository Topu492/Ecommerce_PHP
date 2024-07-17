<?php
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id =$_GET['order_id'];
    $select_order = "SELECT * FROM `users_order` WHERE order_id=$order_id";
    $run_query = mysqli_query($con,$select_order);
    $row_fetch = mysqli_fetch_array($run_query);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due= $row_fetch['amount_due'];
}

if(isset($_POST['confitm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_payment = "INSERT INTO `user_payments` (order_id,invoice_number,amount,payment_mode,payment_date)
    VALUES($order_id,$invoice_number,$amount,'$payment_mode',NOW())";
    $run_query = mysqli_query($con,$insert_payment);
    if($run_query){
        echo "<h3 class='text-center text-light'>Sucessfully completed the payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }

    $update_orders = "UPDATE `users_order` SET order_status='Complete' WHERE order_id=$order_id";
    $update_query = mysqli_query($con,$update_orders);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!------------Bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- fontawesome link --->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-secondary">
    <div class="container my-5">
        <form action="" method="POST">
            <h1 class="text-center text-light">Confirm Payment</h1>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control  w-50 m-auto" name="invoice_number" value="<?php echo   $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="amount" class="text-light mb-2">Amount</label>
                <input type="text" class="form-control  w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
              <select name="payment_mode" class="form-select  w-50 m-auto">
                <option > Select Payment mode</option>
                <option >UPI</option>
                <option >Netbanking</option>
                <option>Paypal</option>
                <option>Cash on delivery</option>
                <option>Payoffline</option>
              </select>
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3" name="confitm_payment" value="Confirm">
            </div>

        </form>
    </div>
    
</body>
</html>
