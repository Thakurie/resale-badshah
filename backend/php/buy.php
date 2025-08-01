<?php
session_start();
include '../../database/connection.php';

if (isset($_POST['buy'])) {
    $user_id = $_SESSION['user_id'] ?? null;
    if (!$user_id) {
        $_SESSION['dbError'] = "User not logged in.";
        header("Location: ../../frontend/pages/login.php");
        exit();
    } else {
        header('location: ../../frontend/forms/card_from.php');
    }
}
