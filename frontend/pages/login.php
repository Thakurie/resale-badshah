<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>login</title>
    <link rel="stylesheet" href="../../css/login.css" />
</head>

<body>
    <?php
    require "../bars/nav.php";
    ?>

    <?php
    require "../bars/drop.php";
    ?>

    <form action="../../backend/php/login-php.php" method="POST" autocomplete="off">
        <div class="login-container">
            <div class="login-image">
                <h1>Welcome Back</h1>
                <img src="../../gallery/login.png" alt="">
            </div>
            <div class="login-box">
                <h1>Login</h1>
                <div class="input-Box">
                    <div class="login-input">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username" placeholder="Enter Username..." autocomplete="off" />
                    </div>
                    <?php
                    if (isset($_SESSION['usernameError'])) {
                        echo '<p>' . $_SESSION['usernameError'] . '</p>';
                        unset($_SESSION['usernameError']);
                    }
                    ?>
                </div>
                <div class="input-Box">
                    <div class="login-input">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Enter  password..." autocomplete="off" />
                    </div>
                    <?php
                    if (isset($_SESSION['passwordError'])) {
                        echo '<p>' . $_SESSION['passwordError'] . '</p>';
                        unset($_SESSION['passwordError']);
                    }
                    ?>
                </div>
                <div class="remember-Box">
                    <input type="checkbox" name="remember" required>
                    <p>Remember Me</p>
                    <a href="./forget.php">Forget Password</a>
                </div>
                <button class="login-btn" type="submit">Login</button>
                <div class="account-Box">
                    <p>Don't have any account?</p>
                    <a href="./signup.php">create account</a>
                </div>
            </div>
        </div>
    </form>





    <?php
    require "../bars/footer.php";
    ?>

</body>

</html>