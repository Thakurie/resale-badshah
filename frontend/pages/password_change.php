<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/password.css">
    <title>password change</title>
</head>

<body>
    <?php
    require "../bars/nav.php";
    ?>


    <div class="password-change-container">

        <?php
        require "../bars/sidebar.php";
        ?>



        <div class="password-change-box">
            <?php
            if (isset($_SESSION['change_success']) && $_SESSION['change_success']) {
                echo '<div class="alert alert-success">' . $_SESSION['change_success'] . '</div>';
                $_SESSION['change_success'] = null;
            }
            ?>

            
            <?php
            if (isset($_SESSION['change_dbError']) && $_SESSION['change_dbError']) {
                echo '<div class="error alert-success">' . $_SESSION['change_dbError'] . '</div>';
                $_SESSION['change_dbError'] = null;
            }
            ?>

            <!--login-->
            <form method="post" action="../../backend/php/change.php">
                <div class="password-container">
                    <h1>password Change</h1>
                    <div class="password-main-box">
                        <!--step 1-->
                        <h6>please create a new password that <br>
                            you don't use on only other site.
                        </h6>
                        <div class="inputBox">
                            <label for="old-password">Old_Password</label>
                            <input type="password" name="old_password" placeholder="old password..." required autocomplete="off">
                            <?php
                            if (isset($_SESSION['old_passwordError'])) {
                                echo '<p>' . $_SESSION['old_passwordError'] . '</p>';
                                unset($_SESSION['old_passwordError']);
                            }
                            ?>
                            
                        </div>
                        <div class="inputBox">
                            <label for="new_password">New_Password</label>
                            <input type="password" name="new_password" placeholder="new Password..." required autocomplete="off">
                            <?php
                            if (isset($_SESSION['new_passwordError'])) {
                                echo '<p>' . $_SESSION['new_passwordError'] . '</p>';
                                unset($_SESSION['new_passwordError']);
                            }
                            ?>

                        </div>
                        <div class="inputBox">
                            <label for="conform-password">Conform_Password</label>
                            <input type="password" name="conform_password" placeholder="conform password..." required autocomplete="off">
                            <?php
                            if (isset($_SESSION['conform_passwordError'])) {
                                echo '<p>' . $_SESSION['conform_passwordError'] . '</p>';
                                unset($_SESSION['conform_passwordError']);
                            }
                            ?>
                        </div>
                        <div class="password-btn">
                            <button id="" name="change-password" value="change">Change</button>
                        </div>

                    </div>



                </div>
            </form>

        </div>
    </div>
    <?php
    require "../bars/footer.php";
    ?>
</body>