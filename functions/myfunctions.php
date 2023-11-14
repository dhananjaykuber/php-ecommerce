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

function redirect($message, $url) {
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit;
}

?>