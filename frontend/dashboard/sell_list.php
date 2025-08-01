<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>create new password page</title>
    <link rel="stylesheet" href="../../css/salelist.css">

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
        <div class="container-box">
            <div class="Box">
                <img src="../../uploads/6889af3e2ed2d_ms.jpg" alt="" class="ob-image">
                <div class="title">
                    <p>X-AGE ConvE Power 10W 10000 mAh Power Bank (XP B08) X-AGE ConvE Power 10W 10000 mAh Power Bank
                        Power Bank (XPB08)</p>
                    <div class="price">
                        <p class="new">Rs <strong>11,000</strong></p>
                        <p class="old">Rs <strong>15,000</strong></p>

                    </div>

                </div>
                <div class="to">
                    <h2>TO</h2>
                    <div class="buyer_info">
                        <input type="text"
                            value=" hiiiiii
                            <?php
                            // echo htmlspecialchars($row['fullname']); 
                            ?>"
                            readonly>
                        <input type="text"
                            value="
                            <?php
                            // echo htmlspecialchars($row['address']); 
                            ?>"
                            readonly>
                        <input type="number"
                            value="
                            <?php
                            // echo htmlspecialchars($row['c_number']); 
                            ?>"
                            readonly>




                    </div>
                </div>



            </div>

        </div>
    </div>
    <?php
    require "../bars/footer.php";
    ?>



</body>

</html>