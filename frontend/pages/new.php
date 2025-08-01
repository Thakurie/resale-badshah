<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>new password</title>
    <link rel="stylesheet" href="../../css/forget.css" />
</head>

<body>
    <?php
    require "../bars/nav.php";
    ?>

    <?php
    require "../bars/drop.php";
    ?>

    <form action="">
        <div class="new-container">
            <div class="forget-image">
                <h1></h1>
                <img src="/gallery/new.png" alt="">

            </div>
            <div class="new-box">
                <h1>New Password</h1>
                <div class="new-main-box">


                    <h6>please create a new password that <br>
                        you don't use on only other site.
                    </h6>
                    <div class="inputBox">
                        <label for="password">Password:</label>
                        <input type="text" name="password" required autocomplete="off" placeholder="enter new password...">
                        

                    </div>
                    <div class="inputBox">
                        <label for="conform-password">Conform Password:</label>
                        <input type="text" name="conform_password" required autocomplete="off" placeholder="conform password...">
                        <?php
                        if (isset($_SESSION['conformPasswordError'])) {
                            echo '<p>' . $_SESSION['conformPasswordError'] . '</p>';
                            unset($_SESSION['conformPasswordError']);
                        }
                        ?>
                    </div>

                    <div class="forget-btn">
                        <button id="next2">Next</button>

                    </div>
                    <div class="forget-btns">
                        <button id="back2" onclick="document.location='./otp.php'">Back</button>

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