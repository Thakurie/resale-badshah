<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>create new password page</title>
    <link rel="stylesheet" href="../../css/dashboard.css">

</head>

<body>
    <?php
    require "../bars/nav.php";
    require "../bars/drop.php";

    $userId = $_SESSION['user_id'] ?? null;
    $fname = '';
    $mname = '';
    $lname = '';

    if ($userId) {
        $userQuery = "SELECT * FROM users WHERE id=?";
        $stmt = mysqli_prepare($con, $userQuery);
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $userResult = mysqli_stmt_get_result($stmt);
        $userRow = mysqli_fetch_assoc($userResult);
        $fname = $userRow['first_name'] ?? '';
        $mname = $userRow['middle_name'] ?? '';
        $lname = $userRow['last_name'] ?? '';

        mysqli_stmt_close($stmt);
    }
    ?>
    <?php
    if (isset($_SESSION['remove_success']) && $_SESSION['remove_success']) {
        echo '<div class="alert alert-success">' . $_SESSION['remove_success'] . '</div>';
        $_SESSION['remove_success'] = null;
    }
    ?>

    <div class="fav-container">
        <div class="side-container">
            <h6>Hello, <?php echo htmlspecialchars($fname . ' ' . $mname . ' ' . $lname); ?></h6>
            <li><a href="./dashboard.php">Dashboard</a></li>
            <li><a href="./sell.php">Sell</a></li>
            <li><a href="./sell_list.php">Sell List</a></li>
            <li><a href="./products.php">Products</a></li>
        </div>
        <?php
        $itemQuery = "SELECT * FROM items WHERE user_id = ?";
        $stmt = mysqli_prepare($con, $itemQuery);
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $gotResults = mysqli_stmt_get_result($stmt);
        if ($gotResults && mysqli_num_rows($gotResults) > 0) {
        ?>
            <div class="container-box">
                <?php
                while ($itemRow = mysqli_fetch_array($gotResults)) {
                ?>
                    <div class="Box">
                        <img src="../../uploads/<?php echo htmlspecialchars($itemRow['image1']); ?>" alt="">
                        <div class="title">
                            <p><?php echo htmlspecialchars($itemRow["title"]); ?></p>
                        </div>
                        <div class="pbl">
                            <div class="pb">
                                <div class="price">
                                    <p class="new">Rs <strong><?php echo htmlspecialchars($itemRow["new"]); ?></strong></p>
                                    <p class="old">Rs <strong><?php echo htmlspecialchars($itemRow["old"]); ?></strong></p>
                                </div>
                                <div class="buttons">
                                    <form>
                                        <button><a href="../../backend/php/product_remove.php?id=<?php echo urlencode($itemRow["id"]); ?>" class="remove" >Remove</button>
                                    </form>
                                    <button><a href="../main/inner.php?id=<?php echo urlencode($itemRow["id"]); ?>">More..</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        } else {
            echo "<p>No products found.</p>";
        }
        mysqli_stmt_close($stmt);
        ?>
    </div>
    <?php require "../bars/footer.php"; ?>

</body>

</body>

</html>