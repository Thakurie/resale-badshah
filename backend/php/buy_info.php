<?php
session_start();
include '../../database/connection.php';

$_SESSION['fullnameError'] =
    $_SESSION['addressError'] =
    $_SESSION['contactError'] = null;

if (isset($_POST['buy'])) {
    $user_id = $_SESSION['user_id'] ?? null;
    if (!$user_id) {
        $_SESSION['dbError'] = "User not logged in.";
        header("Location: ../../frontend/pages/login.php");
        exit();
    }

    $fullname = trim($_POST['fullname']);
    $address = trim($_POST['address']);
    $c_number = trim($_POST['c_number']);
    $user_id = $_SESSION['user_id'];


    $hasError = false;

    if (empty($fullname)) {
        $_SESSION['fullnameError'] = "Please enter your full name.";
        $hasError = true;
    }
    if (empty($address)) {
        $_SESSION['addressError'] = "Please enter your address.";
        $hasError = true;
    }
    if (empty($c_number)) {
        $_SESSION['contactError'] = "Please enter contact number.";
        $hasError = true;
    }

    if ($hasError) {
        header("Location: ../../frontend/forms/card_from.php");
        exit();
    }

    $stmt = $con->prepare("INSERT INTO buy (
       
        user_id,
        fullname,
        address,
        c_number 
    ) VALUES ( ?, ?, ?, ?)");
    $stmt->bind_param(
        "isss",
        $user_id,
        $fullname,
        $address,
        $c_number
    );

    if ($stmt->execute()) {
        $_SESSION['insert_success'] = "Item added / Post successfully.";
        header("Location: ../../frontend/main/home.php");
        exit();
    } else {
        $_SESSION['insert_dbError'] = "Failed to add item: " . $stmt->error;
        header("Location: ../../frontend/forms/card_from.php");
        exit();
    }
    $stmt->close();
}
