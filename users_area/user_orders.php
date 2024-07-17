<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $user_name = $_SESSION['user_name'];
    $select_user = "SELECT * FROM `users` WHERE user_name = '$user_name'";
    $result = mysqli_query($con,$select_user);
    $row_fetch = mysqli_fetch_array($result);
    $user_id = $row_fetch['user_id'];

    ?>
    <h3 class="text-center text-success">All my orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
        <tr>
            <th>SI no</th>
            <th>Amount due</th>
            <th>Total products</th>
            <th>Invoice number</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $get_order_details = "SELECT * FROM `users_order` WHERE user_id=$user_id";
            $result_query = mysqli_query($con,$get_order_details);
            // $number=1;
            while($order_row=mysqli_fetch_assoc($result_query)){
                $order_id = $order_row['order_id'];
                $order_amount_due = $order_row['amount_due'];
                $total_products = $order_row['total_number'];
                $order_invoice_number = $order_row['invoice_number'];
                $order_date = $order_row['order_date'];
                $order_status = $order_row['order_status'];
                if($order_status=='pending'){
                    $order_status = 'Incomplete';
                }
                else{
                    $order_status = 'Complete';
                }

                echo "     
                <tr>
                    <td>$order_id</td>
                    <td>$order_amount_due</td>
                    <td>$total_products</td>
                    <td>$order_invoice_number</td>
                    <td>$order_date</td>
                    <td> $order_status</td>
                    <td><a href='confirm_payment.php?order_id=$order_id' class='text-light'> Confirm</a></td>
                </tr>";
            }
            // $number++;

            ?>

       
        </tbody>
    </table>
</body>
</html>