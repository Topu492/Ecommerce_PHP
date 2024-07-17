<style>
.product_image{
    width:10%;
    object-fit: contain;
}
</style>

<h3 class="text-center text-success">All products</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">

    <?php
    $number=0;
    $select_products = "SELECT * FROM `products`";
    $run_query = mysqli_query($con,$select_products);
    while($select_product=mysqli_fetch_assoc($run_query)){
        $product_id = $select_product['product_id'];
        $product_title = $select_product['product_title'];
        $product_image1 = $select_product['product_image1'];
        $price = $select_product['price'];
        $product_status = $select_product['product_status'];
        $number++;

        echo

        "<tr class='text--center'>
        <td>$number</td>
        <td>$product_title</td>
        <td><img src='./product_images/$product_image1' class='product_image'/></td>
        <td> $price /-</td>
        <td> $product_status</td>
        <td><a href='index.php?edit_product=$product_id' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?edit_product=$product_id'' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";
   

}


        ?>
        
    </tbody>
</table>


