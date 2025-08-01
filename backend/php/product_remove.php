<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include("../../database/connection.php");
    $stmt = mysqli_prepare($con, "DELETE FROM items WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['remove_success'] = "Equipment removed successfully";
        header("location: ../../frontend/dashboard/products.php");
        exit();
    } else {
        die("Error: " . mysqli_error($con));
    }
    mysqli_stmt_close($stmt);
}