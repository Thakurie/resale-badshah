<?php
include("../../database/connection.php");
$itemId = $_GET['item_id'] ?? null;

if ($itemId) {
    $itemQuery = "SELECT * FROM items WHERE id = ?";
    $stmt = mysqli_prepare($con, $itemQuery);
    mysqli_stmt_bind_param($stmt, "i", $itemId);
    mysqli_stmt_execute($stmt);
    $itemResult = mysqli_stmt_get_result($stmt);
    $itemRow = mysqli_fetch_assoc($itemResult);
    mysqli_stmt_close($stmt);

    if ($itemRow) {
        $userId = $itemRow['user_id'];
        $userQuery = "SELECT * FROM users WHERE id = ?";
        $stmt = mysqli_prepare($con, $userQuery);
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $userResult = mysqli_stmt_get_result($stmt);
        $userRow = mysqli_fetch_assoc($userResult);
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Item Details</title>
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
    <div class="fav-container">
        <div class="side-container">
            <h6>Hello, <?php echo htmlspecialchars($fname . ' ' . $mname . ' ' . $lname); ?></h6>
            <li><a href="./dashboard.php">Dashboard</a></li>
            <li><a href="./sell.php">Sell</a></li>
            <li><a href="./sell_list.php">Sell List</a></li>
            <li><a href="./products.php">Products</a></li>
        </div>
        <?php
        if (!empty($itemRow) && !empty($userRow)): ?>
            <div class="container-box">
                <div class="Box">
                    <img src="../../uploads/<?php echo htmlspecialchars($itemRow['image1']); ?>" alt="">
                    <div class="title">
                        <p><?php echo htmlspecialchars($itemRow["title"]); ?></p>
                        <div class="seller-info">
                            <div class="seller">
                                <img src="../../profile/<?php echo htmlspecialchars($userRow['profile_picture']); ?>" class="seller-image" alt="">
                                <label><?php echo htmlspecialchars(trim($userRow['first_name'] . ' ' . $userRow['middle_name'] . ' ' . $userRow['last_name'])); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="pbl">
                        <div class="pb">
                            <div class="price">
                                <p class="new">Rs <strong><?php echo htmlspecialchars($itemRow["new"]); ?></strong></p>
                                <p class="old">Rs <strong><?php echo htmlspecialchars($itemRow["old"]); ?></strong></p>
                            </div>
                            <div class="buttons">
                                <button>cancel</button>
                                <span>pending..</span>
                            </div>
                        </div>
                        <div class="location">
                            <i class="fa-solid fa-location-dot"></i>
                            <span><?php echo htmlspecialchars($itemRow["location"]); ?> </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <p>Item not found.</p>
        <?php endif; ?>
    </div>
</body>

</html>