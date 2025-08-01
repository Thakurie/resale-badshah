<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <title>edit Profile</title>
</head>

<body>
    <?php
    require "../bars/nav.php";
    ?>
    <div class="profile-container">
        <?php
        require "../bars/sidebar.php";
        include '../../database/connection.php';

        $userId = $_SESSION['user_id'] ?? null;
        if ($userId) {
            $stmt = $con->prepare("SELECT * FROM users WHERE id=?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $gotResults = $stmt->get_result();
            if ($gotResults && $gotResults->num_rows) {
                while ($userRow = $gotResults->fetch_assoc()) {
        ?>
                    <div class="profile-section">
                        <form action="">
                            <div class="profile-box">
                                <h1>My Profile</h1>
                                <img src="../../profile/<?php echo htmlspecialchars($userRow['profile_picture']); ?>" alt="">
                                <div class="profile-main-box">
                                    <div class="details-box">
                                        <div class="inner-box">
                                            <div class="display-box">
                                                <label for="Name">Full Name:</label><br>
                                                <input type="text" name="" name="name" id="Name"
                                                    value="<?php echo (trim($userRow['first_name'] . ' ' . $userRow['middle_name'] . ' ' . $userRow['last_name'])); ?>"
                                                    disabled>;
                                            </div>
                                            <div class="display-box">
                                                <label for="Email">Email Address:</label> <br>
                                                <input type="email" name="email" id="Email" value="<?php echo ($userRow['email']); ?>"
                                                    disabled>
                                            </div>
                                            <div class="display-box">
                                                <label for="Phone">Phone Number:</label> <br>
                                                <input type="number" name="number" id=""
                                                    value="<?php echo ($userRow['phone_number']); ?>" disabled>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="button">
                                        <li><a href="" name="update">Update Profile</a></li>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
        <?php
                }
            }
            $stmt->close();
        }
        ?>
    </div>
    <?php
    require "../bars/footer.php";
    ?>
</body>

</html>