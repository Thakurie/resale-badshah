<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>signup</title>
    <link rel="stylesheet" href="../../css/signup.css" />
</head>

<body>
    <?php
    require "../bars/nav.php";
    ?>

    <?php
    require "../bars/drop.php";
    ?>

    <!--login-->
    <form method="post" action="../../backend/php/signup-php.php">
        <div class="signup-container">
            <div class="signup-box">
                <h1>Sign_Up</h1>
                <div class="signup-main-box">
                    <div class="signup-input-box">
                        <div class="signup-input">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="username" placeholder="Enter Username..." required/>
                        </div>
                        <?php
                        if (isset($_SESSION['usernameError'])) {
                            echo '<p>hii' . $_SESSION['usernameError'] . '</p>';
                            unset($_SESSION['usernameError']);
                        }
                        ?>

                    </div>
                    <div class="signup-input-box">
                        <div class="signup-input">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" name="email" placeholder="Enter email..." required/>
                        </div>
                        <?php
                        if (isset($_SESSION['emailError'])) {
                            echo '<p>' . $_SESSION['emailError'] . '</p>';
                            unset($_SESSION['emailError']);
                        }
                        ?>

                    </div>
                    <div class="signup-input-box">
                        <div class="signup-input">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="password" placeholder="Enter  password..." required/>
                        </div>
                        <?php
                        if (isset($_SESSION['passwordError'])) {
                            echo '<p>' . $_SESSION['passwordError'] . '</p>';
                            unset($_SESSION['passwordError']);
                        }
                        ?>

                    </div>
                    <div class="signup-input-box">
                        <div class="signup-input">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="conform_password" placeholder="Confirm  password...." required/>
                        </div>
                        <?php
                        if (isset($_SESSION['conform_passwordError'])) {
                            echo '<p>' . $_SESSION['conform_passwordError'] . '</p>';
                            unset($_SESSION['conform_passwordError']);
                        }
                        ?>

                    </div>

                    <button type="submit" class="submit">Sign Up</button>
                    <div class="signup-inks">
                        <p>already have an account?</p>
                        <a href="./login.php">login</a>
                    </div>
                </div>

            </div>
            <div class="signup-image">
                <img src="../../gallery/signup.png">
                <img src="../../gallery/logo.jpg ">

            </div>

        </div>
    </form>





    <?php
    require "../bars/footer.php";
    ?>

</body>

</html>