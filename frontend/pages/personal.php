<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>signup</title>
    <link rel="stylesheet" href="../../css/personal.css" />
</head>

<body>
    <?php require "../bars/nav.php"; ?>

    <?php require "../bars/drop.php"; ?>

    <?php if (!empty($success)): ?>
        <div class="success-message" style="color: green; margin: 10px;">
            <?php echo htmlspecialchars($success); ?>
        </div>
    <?php endif; ?>

    <!--login-->
    <form action="../../backend/php/personal-php.php" method="post" enctype="multipart/form-data">
        <div class="personal-container">
            <div class="personal-box">
                <h1>personal information</h1>
                <div class="personal-main-box">
                    <div class="profile-image">
                        <img src="../../gallery/user.jpg" alt="Profile Preview" id="profile-pic"> <br>
                        <label for="input-file">Upload Image</label>
                        <input type="file" id="input-file" name="profile_image" accept="image/*" required>
                        <?php
                        if (isset($_SESSION['profileImageError'])) {
                            echo '<p style="color:red;">' . $_SESSION['profileImageError'] . '</p>';
                            unset($_SESSION['profileImageError']);
                        }
                        ?>
                    </div>
                    <div class="personal-input-box">
                        <label for="first_name">First Name:*</label> <br>
                        <input type="text" name="fname" placeholder="Enter your first name..." required autocomplete="off" /><br>
                        <?php
                        if (isset($_SESSION['fnameError'])) {
                            echo '<p style="color:red;">' . $_SESSION['fnameError'] . '</p>';
                            unset($_SESSION['fnameError']);
                        }
                        ?>
                    </div>
                    <div class="personal-input-box">
                        <label for="middle_name">Middle Name:</label> <br>
                        <input type="text" name="mname" placeholder="Enter your middle name..." autocomplete="off" /> <br>
                        <?php
                        if (isset($_SESSION['mnameError'])) {
                            echo '<p style="color:red;">' . $_SESSION['mnameError'] . '</p>';
                            unset($_SESSION['mnameError']);
                        }
                        ?>

                    </div>
                    <div class="personal-input-box">
                        <label for="last_name">Last Name:*</label> <br>
                        <input type="text" name="lname" placeholder="Enter your last name..." required autocomplete="off" /> <br>
                        <?php
                        if (isset($_SESSION['lnameError'])) {
                            echo '<p style="color:red;">' . $_SESSION['lnameError'] . '</p>';
                            unset($_SESSION['lnameError']);
                        }
                        ?>

                    </div>
                    <div class="personal-input-box">
                        <label for="phone">Phone Number:*</label> <br>
                        <input type="number" name="phone" placeholder="Enter your  phone number..." required autocomplete="off" /> <br>
                        <?php
                        if (isset($_SESSION['phoneError'])) {
                            echo '<p style="color:red;">' . $_SESSION['phoneError'] . '</p>';
                            unset($_SESSION['phoneError']);
                        }
                        ?>
                    </div>

                    <div class="personal-input-box">
                        <label for="date_of_birth">Date Of Birth:*</label> <br>
                        <input type="date" name="dob" required autocomplete="off" />

                    </div>
                    <div class="personal-select-box">
                        <label for="gender">Gender:*</label> <br>
                        <select name="gender" required>
                            <option value="">---select gender---</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>

                        </select>

                    </div>
                    <div class="personal-input-box">
                        <label for="location">Location:</label> <br>
                        <input type="text" name="location" required autocomplete="off" placeholder="enter your location..." />

                    </div>
                    <button type="button" onclick="document.location='../main/home.php'" class="back">Later</button>
                    <button type="submit" class="submit"> Submit</button>

                </div>

            </div>

        </div>
    </form>

    <?php require "../bars/footer.php"; ?>

    <script src="../../backend/js/personal.js"></script>
</body>

</html>