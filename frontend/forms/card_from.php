<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>home</title>
    <link rel="stylesheet" href="../../css/inner.css" />
</head>

<body>
    <?php
    require "../bars/nav.php";
    require "../bars/drop.php";
    ?>
    <form action="../../backend/php/buy_info.php" method="POST">
        <div class="card_form" id="card_form">
            <div class="form">
                <?php
                if (isset($_SESSION['insert_dbError'])) {
                    echo '<p>' . $_SESSION['insert_dbError'] . '</p>';
                    unset($_SESSION['insert_dbError']);
                }
                ?>
                <div class="info-box">
                    <label for="name">enter your full name:</label>
                    <input type="text" name="fullname" placeholder=" Enter your full name" required>
                    <?php
                    if (isset($_SESSION['fullnameError'])) {
                        echo '<p>' . $_SESSION['fullnameError'] . '</p>';
                        unset($_SESSION['fullnameError']);
                    }
                    ?>
                </div>

                <div class="info-box">
                    <label for="address">enter your full address:</label>
                    <input type="text" name="address" placeholder=" Enter your full address" required>
                    <?php
                    if (isset($_SESSION['addressError'])) {
                        echo '<p>' . $_SESSION['addressError'] . '</p>';
                        unset($_SESSION['addressError']);
                    }
                    ?>
                </div>
                <div class="info-box">
                    <label for="contact">enter your contact number:</label>
                    <input type="number" name="c_number" placeholder=" Enter your contact number" required>
                    <?php
                    if (isset($_SESSION['contactError'])) {
                        echo '<p>' . $_SESSION['contactError'] . '</p>';
                        unset($_SESSION['contactError']);
                    }
                    ?>
                </div>

                <div class="order_btn">
                    <button type="submit" name="buy">BuY</button>
                </div>
            </div>
    </form>


    <?php
    require "../bars/footer.php";
    ?>
    <script src="../../backend/js/inner.js"></script>
</body>

</html>