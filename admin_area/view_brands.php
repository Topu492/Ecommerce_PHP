<h3 class="text-center text-success">All Categories</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Sl No</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">

 
    <?php
    $number=0;
    $select_brands = "SELECT * FROM `brands`";
    $run_query = mysqli_query($con,$select_brands);
    while($select_brand=mysqli_fetch_assoc($run_query)){
        $brand_id = $select_brand['brand_id'];
        $brand_title = $select_brand['brand_title'];
        $number++;

      ?>

        <tr class='text--center'>
        <td><?php echo $number;?></td>
        <td><?php echo $brand_title; ?></td>
        <td><a href='index.php?edit_brand=<?php echo  $brand_id;  ?>'
        type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
         class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_brand=<?php echo  $brand_id;  ?>' class='text-light'><i class='fa-solid fa-trash'></i></td>
    </tr>

    <?php
   

}


        ?>
        
    </tbody>
</table>

<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
       <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
