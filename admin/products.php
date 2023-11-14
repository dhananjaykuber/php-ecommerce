<?php
    include('includes/header.php');
    include('../middleware/adminMiddleware.php');
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Products</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Selling Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $product = getAll('products');

                                    if(mysqli_num_rows($product) > 0) {
                                        foreach($product as $item) {
                                        ?>
                                            <tr>
                                                <td><?= $item['id']?></td>
                                                <td><?= $item['name']?></td>
                                                <td><img src="../uploads/<?= $item['image'];?>" alt="<?= $item['name']?>" style="width:80px; height:50px;"></td>
                                                <td><?= $item['selling_price']?></td>
                                                <td><?= $item['qty']?></td>
                                                <td><?= $item['status'] == 0 ? 'Visible' : 'Hidden' ?></td>
                                                <td><a href="edit-product.php?id=<?= $item['id']?>" class="btn btn-primary">Edit</a></td>
                                                <td>
                                                    <form action="code.php" method="POST">
                                                        <input type="hidden" name="product_id" value="<?= $item['id']?>">
                                                        <button class="btn btn-danger" type="submit" name="delete_product_btn">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        
                                    }
                                    else {
                                        echo "No records found.";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include('includes/footer.php');
?>