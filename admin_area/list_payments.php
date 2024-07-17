<h3 class="text-center text-success">All Payments</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-info">

    <?php

    $select_users = "SELECT * FROM `user_payments` ";
    $run_query = mysqli_query($con,$select_users);
    $rows_count = mysqli_num_rows($run_query);
   

    if($rows_count==0)
    {
        echo "<h2 class='text-center text-danger mt-5'>No payments recieved yet</h2>";
    }

    else{
        echo "<tr>
        <th>SI No</th>
        <th>Invoice Number</th>
        <th>Amount</th>
        <th>Payment Mode</th>
        <th>Order date</th>
            </tr>
    
    </thead>
    
        <tbody >";
        $number=0;
        while($row_data=mysqli_fetch_assoc($run_query)){

            $order_id = $row_data['order_id'];
            $payment_id = $row_data['payment_id'];
            $invoice_number	 = $row_data['invoice_number'];
            $payment_mode = $row_data['payment_mode'];
            $amount = $row_data['amount'];
            $order_date = $row_data['payment_date'];
            $number++;

            echo "<tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$order_date</td>
        </tr>
    </tbody>";

        }

    }
      
    ?>

</table>