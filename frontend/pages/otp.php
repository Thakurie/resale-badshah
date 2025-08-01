<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>Otp</title>
    <link rel="stylesheet" href="../../css/forget.css" />
</head>

<body>
    <?php
    require "../bars/nav.php";
    ?>

    <?php
    require "../bars/drop.php";
    ?>

    <form method="post" action="../../backend/php/forget-password.php">
        <div class="otp-container">
            <div class="forget-image">
                <h1></h1>
                <img src="/gallery/signup.png" alt="">

            </div>
            <div class="new-box">
                <h1>OTP Verification</h1>
                <div class="new-main-box">

                    <!-- Step 2 -->
                    <h6>we have sent a verification code to <br>
                        your email address
                    </h6>
                    <h5>dhurbasingh72@gmail.com</h5>
                    <div class="inputBox">
                        <label for="opt">OTP:</label> <br>
                        <input type="number" size="4" maxlength="4" name="otp" required placeholder="enter otp code..." autocomplete="off"> <br>
                        <?php
                        if (isset($_SESSION['otpError'])) {
                            echo '<p>' . $_SESSION['otpError'] . '</p>';
                            unset($_SESSION['otpError']);
                        }
                        ?>
                    </div>
                    <!--  <h4>
                        <li>The Otp will be expire in 9:00</li>
                    </h4>
                    <h4>
                        <li> Didn't receive the code? <button>resend</button></li>
                    </h4>
-->
                    <div class="forget-btn">
                        <button name="check-reset-otp" value="next">Next</button>

                    </div>
                    <div class="forget-btns">
                        <button onclick="document.location='./forget.php'">Back</button>

                    </div>
                </div>
            </div>
        </div>
    </form>


    <?php
    require "../bars/footer.php";
    ?>

</body>

</html>