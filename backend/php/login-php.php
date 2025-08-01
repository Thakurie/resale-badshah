<?php
session_start();
include("../../database/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username)) {
        $_SESSION['usernameError'] = "Username is required.";
        header("Location: ../../frontend/pages/login.php");
        exit();
    }
    if (empty($password)) {
        $_SESSION['passwordError'] = "Password is required.";
        header("Location: ../../frontend/pages/login.php");
        exit();
    }

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['login_success'] = "Welcome back " . $username;
            header("Location: ../../frontend/main/home.php");
            exit();
        } else {
            $_SESSION['passwordError'] = "Incorrect password.";
        }
    } else {
        $_SESSION['usernameError'] = "Username not found.";
    }
    header("Location: ../../frontend/pages/login.php");
    exit();
} else {
    header("Location: ../../frontend/pages/login.php");
    exit();
}
