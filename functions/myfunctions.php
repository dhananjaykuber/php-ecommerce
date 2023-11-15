<?php

include(__DIR__ . '/../config/dbcon.php');

function getAll($table) {
    global $conn;
    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function getById($table, $id) {
    global $conn;
    $query = "SELECT * FROM $table WHERE id = $id";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function getAllActive($table) {
    global $conn;
    $query = "SELECT * FROM $table WHERE status='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function getByIdActive($table, $id) {
    global $conn;
    $query = "SELECT * FROM $table WHERE id = '$id' AND status='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function getBySlugActive($table, $slug) {
    global $conn;
    $query = "SELECT * FROM $table WHERE slug = '$slug' AND status='0' LIMIT 1";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function getProductsByCategory($category_id) {
    global $conn;
    $query = "SELECT * FROM products WHERE category_id='$category_id' AND status='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function getCategoryNameById($category_id) {
    global $conn;
    $query = "SELECT * FROM categories WHERE id='$category_id'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function getCartItems() {
    global $conn;

    $user_id = $_SESSION['auth_user']['user_id'];

    $query = "SELECT c.id AS cid, c.product_id, c.product_qty, p.id AS pid, p.name, p.image, p.selling_price FROM carts c, products p WHERE c.product_id = p.id AND c.user_id = '$user_id' ORDER BY c.id DESC";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function redirect($message, $url) {
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit;
}

?>