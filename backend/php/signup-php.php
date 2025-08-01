<?php
session_start();
include '../../database/connection.php'; 

$_SESSION['usernameError'] =
    $_SESSION['passwordError'] =
    $_SESSION['emailError'] =
    $_SESSION['conform_passwordError'] =
    $_SESSION['dbError'] = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $conform_password = $_POST['conform_password'];


    $hasError = false;



    if (empty($username)) {
        $_SESSION['usernameError'] = "Please enter a user name.";
        $hasError = true;
    }
    if (empty($email)) {
        $_SESSION['usernameError'] = "Please enter a user name.";
        $hasError = true;
    }
    if (empty($password)) {
        $_SESSION['usernameError'] = "Please enter a user name.";
        $hasError = true;
    }
    if (empty($conform_password)) {
        $_SESSION['usernameError'] = "Please enter a user name.";
        $hasError = true;
    }





    if (!preg_match("/^[a-zA-Z ]+$/", $username)) {
        $_SESSION['usernameError'] = "Please enter a valid first name.";
        $hasError = true;
    }

    if (strlen($password) < 6) {
        $_SESSION["passwordError"] = "Password must be at least 6 characters long.";
        $hasError = true;
    }


    if ($password != $conform_password) {
        $_SESSION["conform_passwordError"] = "Password doesn't match";
        $hasError = true;
    }

    if ($hasError) {
        header("Location: ../../frontend/pages/signup.php");
        exit();
    }



    $checkStmt = $con->prepare("SELECT id FROM users WHERE email = ? ");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        $_SESSION['emailError'] = "Email already exists.";
        $checkStmt->close();
        header("Location:  ../../frontend/pages/signup.php");
        exit();
    }
    $checkStmt->close();

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $con->prepare(
        "INSERT INTO users (
         email, 
         username,
          password
          )
    VALUES (?, ?, ?)"
    );
    $stmt->bind_param(
        "sss",
        $email,
        $username,
        $hashedPassword
    );

    if ($stmt->execute()) {
        $user_id = mysqli_insert_id($con);
        $_SESSION['user_id'] = $user_id;
        $_SESSION['signup_success'] = "Welcome to Resale Badsha" . $username;
        header("Location: ../../frontend/pages/personal.php");
        exit();
    } else {
        $_SESSION['dbError'] = "An error occurred. Please try again.";
        header("Location:  ../../frontend/pages/signup.php");
        exit();
    }
}
