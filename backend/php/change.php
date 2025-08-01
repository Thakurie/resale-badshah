
<?php
session_start();
include '../../database/connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'] ?? null;
    $old_password = $_POST['old_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $conform_password = $_POST['conform_password'] ?? '';

    if ($userId && $old_password && $new_password && $conform_password) {
        if ($new_password !== $conform_password) {
            $_SESSION['conform_passwordError'] = "New passwords do not match.";
            header("location: ../../frontend/pages/password_change.php");
        } else {
            $stmt = $con->prepare("SELECT password FROM users WHERE id=?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $stmt->bind_result($hashed_password);
            if ($stmt->fetch() && password_verify($old_password, $hashed_password)) {
                $stmt->close();
                $new_hashed = password_hash($new_password, PASSWORD_DEFAULT);
                $update = $con->prepare("UPDATE users SET password=? WHERE id=?");
                $update->bind_param("si", $new_hashed, $userId);
                if ($update->execute()) {
                    $_SESSION['change_success']  = "Password changed successfully.";
                    header("location: ../../frontend/pages/password_change.php");
                } else {
                    $_SESSION['change_dbError'] = "Failed to update password.";
                    header("location: ../../frontend/pages/password_change.php");
                }
                $update->close();
            } else {
                $_SESSION['old_passwordError']  = "Old password is incorrect.";
                header("location: ../../frontend/pages/password_change.php");
            }
            $stmt->close();
        }
    } else {
        $_SESSION['change_dbError']  = "All fields are required.";
        header("location: ../../frontend/pages/password_change.php");
    }
}
?>

