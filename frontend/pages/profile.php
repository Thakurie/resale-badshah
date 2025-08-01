<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <title>Profile</title>
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
                    <div class="profile-box">
                        <h1>My Profile</h1>
                        <img src="../../profile/<?php echo htmlspecialchars($userRow['profile_picture']); ?>" alt="">
                        <div class="profile-main-box">
                            <div class="details-box">
                                <div class="inner-box">
                                    <div class="display-box">
                                        <label for="Name">Full Name:</label><br>
                                        <span><?php echo htmlspecialchars(trim($userRow['first_name'] . ' ' . $userRow['middle_name'] . ' ' . $userRow['last_name'])); ?></span>
                                    </div>
                                    <div class="display-box">
                                        <label for="Email">Email Address:</label> <br>
                                        <span><?php echo htmlspecialchars($userRow['email']); ?></span>
                                    </div>
                                    <div class="display-box">
                                        <label for="Phone">Phone Number:</label> <br>
                                        <span>+977 <?php echo htmlspecialchars($userRow['phone_number']); ?></span>
                                    </div>
                                </div>
                                <div class="inner-box">
                                    <div class="display-box">
                                        <label for="Birthday">Birthday:</label> <br>
                                        <span><?php echo htmlspecialchars($userRow['date_of_birth']); ?></span>
                                    </div>
                                    <div class="display-box">
                                        <label for="Gender">Gender:</label> <br>
                                        <span><?php echo htmlspecialchars($userRow['gender']); ?></span>
                                    </div>
                                     <div class="display-box">
                                        <label for="Location">Location:</label> <br>
                                        <span><?php echo htmlspecialchars($userRow['location']); ?></span>
                                    </div>

                                </div>
                            </div>
                            <!-- <div class="button">
                                    <li><a href="./edit-profile.php">Edit Profile</a></li>
                                </div>
                -->
                        </div>
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