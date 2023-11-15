<?php
    include("includes/header.php");
    include('functions/myfunctions.php');
?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-decoration-none text-white" href="index.php">Home / </a>
            <a class="text-decoration-none text-white" href="cart.php">Cart </a>
        </h6>
    </div>
</div>
<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <h6>Product</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Price</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Quantity</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Remove</h6>
                        </div>
                    </div>

                    <?php
                        $items = getCartItems();

                        if(mysqli_num_rows($items) > 0) {
                            foreach($items as $item) {
                        ?>

                            <div class="card shadow-xs mb-3 product_data">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="uploads/<?= $item['image']?>" alt="<?= $item['name']?>" class="w-50">
                                    </div>
                                    <div class="col-md-3">
                                        <h5><?= $item['name'] ?></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>RS. <?= $item['selling_price'] ?></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-4">
                                            <div class="input-group mb-3" style="width:130px">
                                                <button  class="input-group-text decrement-btn">-</button>
                                                <input type="text" class="form-control text-center bg-white product-qty" disabled value="<?= $item['product_qty']?>">
                                                <button class="input-group-text increment-btn">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash me-2"></i>Remove</button>
                                    </div>
                                </div>
                            </div>
                    
                        <?php
                            }
                        }
                        else{
                            echo "No items in cart.";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    include("includes/footer.php");
?>