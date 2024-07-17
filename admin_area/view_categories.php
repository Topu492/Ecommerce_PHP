<h3 class="text-center text-success">All Categories</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Sl No</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">

 
    <?php
    $number=0;
    $select_categories = "SELECT * FROM `categories`";
    $run_query = mysqli_query($con,$select_categories);
    while($select_category=mysqli_fetch_assoc($run_query)){
        $category_id = $select_category['category_id'];
        $category_title = $select_category['category_title'];
        $number++;

      ?>

        <tr class='text--center'>
        <td><?php echo $number;?></td>
        <td><?php echo $category_title; ?></td>
        <td><a href='index.php?edit_category=<?php echo $category_id;  ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_category=<?php echo $category_id;  ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>

    <?php
   

}


        ?>
        
    </tbody>
</table>
