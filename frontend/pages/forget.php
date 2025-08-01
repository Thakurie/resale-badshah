<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>forget</title>
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
        <div class="forget-container">
            <div class="forget-image">
                <img src="/gallery/gmail.png" alt="">

            </div>
            <div class="forget-box">
                <h1>Email Verification </h1>
                <div class="forget-main-box">
                    <!--step 1-->
                    <h6>Enter Your Email Address</h6>
                    <div class="inputBox">
                        <label for="Email">Email:</label> <br>
                        <input type="email" name="email" id="" autocomplete="off" placeholder="enter your email..."
                            required> <br>
                        <?php
                        if (isset($_SESSION['emailError'])) {
                            echo '<p>hii' . $_SESSION['emailError'] . '</p>';
                            unset($_SESSION['emailError']);
                        }
                        ?>

                    </div>

                    <div class="forget-btn">
                        <button name="check-email" value="next">Next</button>

                    </div>
                    <div class="forget-btns">
                        <button onclick="document.location='./login.php'">Back</button>

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