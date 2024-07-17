<h3 class="text-center text-success">All Orders</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-info">

    <?php

    $select_users = "SELECT * FROM `users_order` ";
    $run_query = mysqli_query($con,$select_users);
    $rows_count = mysqli_num_rows($run_query);
   

    if($rows_count==0)
    {
        echo "<h2 class='text-center text-danger mt-5'>No Oders</h2>";
    }

    else{
        echo "<tr>
        <th>SI No</th>
        <th>Due Amount</th>
        <th>Invoice Number</th>
        <th>Total Products</th>
        <th>Order date</th>
        <th>Status</th>
        <th>Delete</th>
            </tr>
    
    </thead>
    
        <tbody >";
        $number=0;
        while($row_data=mysqli_fetch_assoc($run_query)){

            $order_id = $row_data['order_id'];
            $user_id = $row_data['user_id'];
            $amount_due = $row_data['amount_due'];
            $invoice_number	 = $row_data['invoice_number'];
            $total_number = $row_data['total_number'];
            $order_date = $row_data['order_date'];
            $order_status = $row_data['order_status'];
            $number++;

            echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$total_number</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='index.php?delete_c=<?php echo $order_id;  ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
    </tbody>";

        }

    }
      
    ?>

</table>