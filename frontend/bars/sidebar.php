<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>create new password page</title>
    <style>
        /* drop.css */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            list-style: none;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            position: absolute;
            width: 100%;
        }

        .side-container {
            width: 300px;
            height: 100vh;
            border: 1px solid gray;
            background: gray;

        }

        .side-container h4 {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            color: red;

        }

        .side-container li {
            list-style: none;
            width: 100%;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .side-container li a {
            text-decoration: none;
            color: black;
        }
    </style>

</head>

<body>
    <?php
    $userId = $_SESSION['user_id'] ?? null;

    if ($userId) {
        $stmt = $con->prepare("SELECT * FROM users WHERE id=?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $gotResults = $stmt->get_result();
        if ($gotResults && $gotResults->num_rows) {
            while ($userRow = $gotResults->fetch_assoc()) {
    ?>
                <div class="side-container">
                    <h4>Hello,<?php echo htmlspecialchars(trim($userRow['first_name'] . ' ' . $userRow['middle_name'] . ' ' . $userRow['last_name'])); ?></h4>
                    <li><a href="../pages/profile.php">profile</a></li>
                    <li><a href="../pages/password_change.php">Password-Change</a></li>

                </div>
    <?php
            }
        }
        $stmt->close();
    }
    ?>






</body>

</html>