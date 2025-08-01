<?php
session_start();
include '../../database/connection.php'; 

$_SESSION['fnameError'] = $_SESSION['mnameError'] = $_SESSION['lnameError'] = $_SESSION['phoneError'] = null;
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = trim($_POST['fname'] ?? '');
    $mname = trim($_POST['mname'] ?? '');
    $lname = trim($_POST['lname'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $dob = $_POST['dob'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $location = $_POST['location'] ?? '';
    $user_id = $_SESSION["user_id"] ?? '';


    $hasError = false;

    if ($fname === '' || !preg_match("/^[a-zA-Z ]+$/", $fname)) {
        $_SESSION['fnameError'] = "Please enter a valid first name.";
        $hasError = true;
    }
    if ($mname !== '' && !preg_match("/^[a-zA-Z ]+$/", $mname)) {
        $_SESSION['mnameError'] = "Please enter a valid middle name.";
        $hasError = true;
    }
    if ($lname === '' || !preg_match("/^[a-zA-Z ]+$/", $lname)) {
        $_SESSION['lnameError'] = "Please enter a valid last name.";
        $hasError = true;
    }
    if ($phone === '' || !preg_match("/^[0-9]{10,15}$/", $phone)) {
        $_SESSION['phoneError'] = "Please enter a valid phone number.";
        $hasError = true;
    }
    if ($phone === '' || !preg_match("/^[0-9]{10,15}$/", $phone)) {
        $_SESSION['phoneError'] = "Please enter a valid phone number.";
        $hasError = true;
    }


    $profileImage = '';
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $file = $_FILES['profile_image'];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['profileImageError'] = "Error uploading image.";
            $hasError = true;
        } else {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $safeName = uniqid("profile_") . '.' . $ext;
            $uploadDir = '../../profile/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $targetPath = $uploadDir . $safeName;
            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                $profileImage = $safeName;
            } else {
                $_SESSION['profileImageError'] = "Failed to save image.";
                $hasError = true;
            }
        }
    }

    if ($hasError) {
        header("Location: personal.php");
        exit();
    }

    $stmt = $con->prepare(
        "UPDATE users SET 
        first_name = ?, 
        middle_name = ?,
        last_name = ?, 
        phone_number = ?, 
        date_of_birth = ?, 
        gender = ?, 
        location = ?,
        profile_picture = ? 
        WHERE id = ?"
    );
    $stmt->bind_param(
        "ssssssssi",
        $fname,
        $mname,
        $lname,
        $phone,
        $dob,
        $gender,
        $location,
        $profileImage,
        $user_id
    );
    if ($stmt->execute()) {
        $_SESSION['success'] = "Welcome to Resale Badsha";
        header("Location: ../../frontend/main/home.php");
        exit();
    } else {
        $_SESSION['dbError'] = "An error occurred. Please try again.";
        header("Location:  ../../frontend/pages/personal.php");
        exit();
    }
}
