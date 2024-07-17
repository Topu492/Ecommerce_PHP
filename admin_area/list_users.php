<style>
    .user_img{
        width: 30%;
        display: block;
        object-fit: contain;
        margin: auto;
        
    }
</style>

<h3 class="text-center text-success">All Users</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-info">

    <?php

    $select_users = "SELECT * FROM `users` ";
    $run_query = mysqli_query($con,$select_users);
    $rows_count = mysqli_num_rows($run_query);
   

    if($rows_count==0)
    {
        echo "<h2 class='text-center text-danger mt-5'>No users yet</h2>";
    }

    else{
        echo "<tr>
        <th>SI No</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>User Image</th>
        <th>User Address</th>
        <th>User Mobile</th>
            </tr>
    
    </thead>
    
        <tbody >";
        $number=0;
        while($row_data=mysqli_fetch_assoc($run_query)){

            $user_id = $row_data['user_id'];
            $user_name = $row_data['user_name'];
            $user_email	 = $row_data['user_email'];
            $user_image = $row_data['user_image'];
            $user_adress = $row_data['user_adress'];
            $user_mobile = $row_data['user_mobile'];
            $number++;

            echo "<tr>
            <td>$number</td>
            <td>$user_name</td>
            <td>$user_email</td>
            <td><img src='../users_area/user_images/$user_image' class='user_img' /></td>
            <td>$user_adress</td>
            <td>$user_mobile</td>
        </tr>
    </tbody>";

        }

    }
      
    ?>

</table>