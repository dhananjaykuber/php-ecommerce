<?php

session_start();

include(__DIR__ . '/../config/dbcon.php');

if(isset($_SESSION['auth'])) {
    if(isset($_POST['scope'])) {
        $scope = $_POST['scope'];

        switch($scope)  {
            case 'add':
                $product_id = $_POST['product_id'];
                $product_qty = $_POST['product_qty'];

                $user_id = $_SESSION['auth_user']['user_id'];

                $product_exist = "SELECT * FROM carts WHERE product_id = '$product_id' AND user_id = '$user_id'";
                $product_exist_run = mysqli_query($conn, $product_exist);
                
                if(mysqli_num_rows($product_exist_run) > 0) {
                    echo "existing";
                }
                else {
                    $insert_query = "INSERT INTO carts (user_id, product_id, product_qty) VALUES ('$user_id', '$product_id', '$product_qty')";
                    $insert_query_run = mysqli_query($conn, $insert_query);

                    if($insert_query_run) {
                        echo 201;
                    }
                    else {
                        echo 500;
                    }
                }

                
                break;

            default:
                echo 500;
        }
    }
}
else {
    echo 401;
}

?>