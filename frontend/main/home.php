<?php

include("../../database/connection.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>home</title>
    <link rel="stylesheet" href="../../css/home.css" />
</head>

<body>
    <?php
    require "../bars/nav.php";
    ?>

    <?php
    require "../bars/drop.php";
    ?>

    <!--phone-->
    <?php
    if (isset($_SESSION['signup_success']) && $_SESSION['signup_success']) {
        echo '<div class="alert alert-success">' . $_SESSION['signup_success'] . '</div>';
        $_SESSION['signup_success'] = null;
    }
    ?>
    <?php
    if (isset($_SESSION['login_success']) && $_SESSION['login_success']) {
        echo '<div class="alert alert-success">' . $_SESSION['login_success'] . '</div>';
        $_SESSION['login_success'] = null;
    }
    ?>

     <?php
    $query = "SELECT * FROM items WHERE category='phone'";
    $gotResults = mysqli_query($con, $query);

    if ($gotResults && mysqli_num_rows($gotResults) > 0) {
    ?>
        <div class="phone-container">
            <h1>Phone</h1>
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

  


    <!--laptop-->
    <?php
    $query = "SELECT * FROM items WHERE category='laptop'";
    $gotResults = mysqli_query($con, $query);

    if ($gotResults && mysqli_num_rows($gotResults) > 0) {
    ?>
        <div class="laptop-container">
            <h1>Laptop</h1>
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


    <!--smartwatch-->

     <?php
    $query = "SELECT * FROM items WHERE category='smartwatch'";
    $gotResults = mysqli_query($con, $query);

    if ($gotResults && mysqli_num_rows($gotResults) > 0) {
    ?>
        <div class="smartwatch-container">
            <h1>Smartwatch</h1>
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



    <!--tablet-->

    <?php
    $query = "SELECT * FROM items WHERE category='tablet'";
    $gotResults = mysqli_query($con, $query);

    if ($gotResults && mysqli_num_rows($gotResults) > 0) {
    ?>
        <div class="tablet-container">
            <h1>Tablet</h1>
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




    <!--speaker-->

    <?php
    $query = "SELECT * FROM items WHERE category='speaker'";
    $gotResults = mysqli_query($con, $query);

    if ($gotResults && mysqli_num_rows($gotResults) > 0) {
    ?>
        <div class="speaker-container">
            <h1>Speaker</h1>
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




    <!--camera-->

    <?php
    $query = "SELECT * FROM items WHERE category='camera'";
    $gotResults = mysqli_query($con, $query);

    if ($gotResults && mysqli_num_rows($gotResults) > 0) {
    ?>
        <div class="camera-container">
            <h1>Camera</h1>
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



    <!--earbuds-->

     <?php
    $query = "SELECT * FROM items WHERE category='earbuds'";
    $gotResults = mysqli_query($con, $query);

    if ($gotResults && mysqli_num_rows($gotResults) > 0) {
    ?>
        <div class="earbuds-container">
            <h1>Earbuds</h1>
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





    <!--tv-->

    <?php
    $query = "SELECT * FROM items WHERE category='tv'";
    $gotResults = mysqli_query($con, $query);

    if ($gotResults && mysqli_num_rows($gotResults) > 0) {
    ?>
        <div class="tv-container">
            <h1>TV</h1>
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






    <!--other-->
    <?php
    $query = "SELECT * FROM items WHERE category='other'";
    $gotResults = mysqli_query($con, $query);

    if ($gotResults && mysqli_num_rows($gotResults) > 0) {
    ?>
        <div class="other-container">
            <h1>Other</h1>
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
    <script src="../../backend/js/home.js"></script>

</body>

</html>