<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$authenticated = false;
$userRow = null;

if (isset($_SESSION['user_id'])) {
    $authenticated = true;
    include("../../database/connection.php");
    $currentUser = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $currentUser);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result && mysqli_num_rows($result) > 0) {
        $userRow = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/nav.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo" onclick="document.location='../main/home.php'">
                <img src="../../gallery/logo.jpg" alt="">
            </div>

            <div class="search">
                <input type="search" list="todo-list" id="todo-input" placeholder="search items..">
                <datalist id="todo-list"></datalist>
                <button type="search" onclick="addItem()"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <?php if ($authenticated && $userRow && !empty($userRow['profile_picture'])): ?>
                <div class="links">
                    <button onclick="document.location='../dashboard/dashboard.php'"><i class="fa-solid fa-cart-shopping"></i></button>
                </div>
            <?php else: ?>
            <?php endif; ?>
            <div class="user-pc">
                <?php if ($authenticated && $userRow && !empty($userRow['profile_picture'])): ?>
                    <img src="../../profile/<?php echo htmlspecialchars($userRow['profile_picture']); ?>" onclick="toggleMenu()">
                <?php else: ?>
                    <img src="../../gallery/user.jpg" onclick="toggleMenu()">
                <?php endif; ?>
            </div>
            <div class="sub-menu-wrap" id="subMenu">
                <?php if ($authenticated): ?>
                    <div class="sub-menu">
                        <div class="user-info">
                            <?php if ($userRow): ?>
                                <img src="../../profile/<?php echo htmlspecialchars($userRow['profile_picture']); ?>" alt="">
                                <?php
                                echo '<h3>' . htmlspecialchars(trim($userRow['first_name'] . ' ' . $userRow['middle_name'] . ' ' . $userRow['last_name'])) . '</h3>';
                                ?>
                            <?php else: ?>
                                <img src="../../gallery/user.jpg" alt="">
                            <?php endif; ?>
                        </div>
                        <hr>
                        <a href="../pages/profile.php" class="sub-menu-link">
                            <i class="fa-solid fa-user"></i>
                            <p>Profile Manage</p>
                            <span>></span>
                        </a>
                        <a href="../pages/personal.php" class="sub-menu-link">
                            <i class="fa-solid fa-circle-question"></i>
                            <p>Personal</p>
                            <span>></span>
                        </a>
                        <a href="../../frontend/pages/logout.php" class="sub-menu-link">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <p>Logout</p>
                            <span>></span>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="small-menu">
                        <a href="../pages/login.php" class="sub-menu-link">
                            <i class="fa-solid fa-circle-user"></i>
                            <p>Login</p>
                            <span>></span>
                        </a>
                        <a href="../pages/signup.php" class="sub-menu-link">
                            <i class="fa-solid fa-user-plus"></i>
                            <p>Sign Up</p>
                            <span>></span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <script src="../../backend/js/nav.js"></script>
</body>

</html>