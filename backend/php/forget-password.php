<?php
session_start();
include '../../database/connection.php'; 

$_SESSION['emailError'] = $_SESSION['otpError'] = null;
$success = "";

if (isset($_POST['check-email'])) {
    $hasError = false;

    $email = $_POST['email'];
    $stmt = mysqli_prepare($con, "SELECT * FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        $code = rand(111111, 999999);
        $update = mysqli_prepare($con, "UPDATE users SET code = ? WHERE email = ?");
        mysqli_stmt_bind_param($update, "is", $code, $email);
        if (mysqli_stmt_execute($update)) {
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: resalebadshah@gmail.com";
            if (mail($email, $subject, $message, $sender)) {
                $_SESSION['email'] = $email;
                header('location: ../../frontend/pages/otp.php');
                exit();
            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Something went wrong!";
        }
        mysqli_stmt_close($update);
    } else {
        $_SESSION['emailError'] = "This email address does not exist!";
    }
    mysqli_stmt_close($stmt);
}

if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = $_POST['otp'];
    $stmt = mysqli_prepare($con, "SELECT * FROM users WHERE code = ?");
    mysqli_stmt_bind_param($stmt, "i", $otp_code);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        $fetch_data = mysqli_fetch_assoc($result);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        header('location: new-password.php');
        exit();
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
    mysqli_stmt_close($stmt);
}

if (isset($_POST['change-password'])) {
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    } else {
        $code = 0;
        $email = $_SESSION['email']; 
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update = mysqli_prepare($con, "UPDATE users SET code = ?, password = ? WHERE email = ?");
        mysqli_stmt_bind_param($update, "iss", $code, $encpass, $email);
        if (mysqli_stmt_execute($update)) {
            header('Location: password-changed.php');
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
        mysqli_stmt_close($update);
    }
}