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
    include("../../database/connection.php");

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $itemId = intval($_GET['id']);
        $query = "SELECT * FROM items WHERE id = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "i", $itemId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
    ?>


            <div class="inner-container">
                <div class="product-header">
                    <div class="gallery">
                        <img src="../../uploads/<?php echo htmlspecialchars($row['image1']); ?>" class="thumb active" onclick="changeMain(this)" />
                        <img src="../../uploads/<?php echo htmlspecialchars($row['image2']); ?>" class="thumb" onclick="changeMain(this)" />
                        <img src="../../uploads/<?php echo htmlspecialchars($row['image3']); ?>" class="thumb" onclick="changeMain(this)" />
                        <img src="../../uploads/<?php echo htmlspecialchars($row['image4']); ?>" class="thumb" onclick="changeMain(this)" />
                    </div>
                    <div class="product-image">
                        <img src="../../uploads/<?php echo htmlspecialchars($row['image1']); ?>" id="main-image" />
                    </div>
                    <div class="product-details">
                        <div>
                            <div class="product-title">
                                <?php echo htmlspecialchars($row["title"]); ?>
                            </div>
                            <div class="price">
                                <span>Rs.</span>
                                <span class="old"><?php echo htmlspecialchars($row["old"]); ?></span>
                                <span><?php echo htmlspecialchars($row["new"]); ?></span>

                            </div>

                            <div class="location">
                                <i class="fa-solid fa-location-dot"></i>
                                <?php echo htmlspecialchars($row["location"]); ?>
                            </div>
                            <div class="contact-information">
                                <h4>Contact:</h4>
                                <li><a href="<?php echo htmlspecialchars($row["whatsapp"]); ?>"><i class="fa-brands fa-whatsapp"></i></a></li>
                                <li><a href="<?php echo htmlspecialchars($row["facebook"]); ?>"><i class="fa-brands fa-facebook-f"></i></a></li>
                            </div>
                            <div class="use">
                                <h4>Use Time:</h4>
                                <p><?php echo htmlspecialchars($row["uses"]); ?></p>
                            </div>
                            <div class="buttons">
                                <form action="../../backend/php/buy.php" method="post">
                                    <button name="buy"><i class="fa-solid fa-cart-shopping"></i>purchase</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seller-info">
                    <?php
                    if (isset($row['user_id'])) {
                        $userId = $row['user_id'];
                        $userQuery = "SELECT * FROM users WHERE id = ?";
                        $userStmt = mysqli_prepare($con, $userQuery);
                        mysqli_stmt_bind_param($userStmt, "i", $userId);
                        mysqli_stmt_execute($userStmt);
                        $userResult = mysqli_stmt_get_result($userStmt);
                        if ($userResult && $userRow = mysqli_fetch_assoc($userResult)) {
                    ?>
                            <div class="seller">
                                <img src="../../profile/<?php echo htmlspecialchars($userRow['profile_picture']); ?>" alt="<?php echo htmlspecialchars($userRow['first_name']); ?>" />
                                <span> Seller: <?php echo htmlspecialchars(trim($userRow['first_name'] . ' ' . $userRow['middle_name'] . ' ' . $userRow['last_name'])); ?></span>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>





    <?php
        } else {
            echo "<p>Item not found.</p>";
        }
    } else {
        echo "<p>Invalid item ID.</p>";
    }
    ?>





    <?php
    require "../bars/footer.php";
    ?>
    <script src="../../backend/js/inner.js"></script>
</body>

</html>