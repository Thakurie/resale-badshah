<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>Harman Kardon</title>
    <link rel="stylesheet" href="../../css/all.css" />
</head>

<body>
    <?php
    require "../bars/nav.php";
    require "../bars/drop.php";
    include("../../database/connection.php");

    $query = "SELECT * FROM items WHERE brand='harman'";
    $gotResults = mysqli_query($con, $query);

    if ($gotResults && mysqli_num_rows($gotResults) > 0) {
    ?>
        <div class="speaker-container">
            <h1>harman</h1>
            <div class="Box">
                <?php
                while ($itemRow = mysqli_fetch_array($gotResults)) {
                    $userId = $itemRow['user_id'];
                    $userQuery = "SELECT * FROM users WHERE id=?";
                    $stmt = mysqli_prepare($con, $userQuery);
                    mysqli_stmt_bind_param($stmt, "i", $userId);
                    mysqli_stmt_execute($stmt);
                    $userResult = mysqli_stmt_get_result($stmt);
                    $userRow = mysqli_fetch_assoc($userResult);
                ?>
                    <div class="card">
                        <div class="head">
                            <div class="user">
                                <img src="../../profile/<?php echo htmlspecialchars($userRow['profile_picture']); ?>" alt="">
                                <p>
                                    <?php
                                    echo htmlspecialchars(trim($userRow['first_name'] . ' ' . $userRow['middle_name'] . ' ' . $userRow['last_name']));
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="image">
                            <img src="../../uploads/<?php echo htmlspecialchars($itemRow['image1']); ?>" alt="">
                        </div>
                        <div class="main">
                            <div class="title">
                                <span><?php echo htmlspecialchars($itemRow["title"]); ?></span>
                            </div>
                            <div class="price">
                                <span class="rs">Rs.</span>
                                <?php echo '<span class="old">' . htmlspecialchars($itemRow["old"]) . '</span>'; ?>
                                <?php echo '<span>' . htmlspecialchars($itemRow["new"]) . '</span>'; ?>
                                <button><a href="./inner.php?id=<?php echo urlencode($itemRow["id"]); ?>"><i class="fa-solid fa-cart-shopping"></i></a></button>
                            </div>
                            <div class="location">
                                <i class="fa-solid fa-location-dot"></i>
                                <span><?php echo htmlspecialchars($itemRow["location"]); ?> </span>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>





    <?php
    require "../bars/footer.php";
    ?>





</body>

</html>