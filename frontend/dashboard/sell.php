<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>create new password page</title>
    <link rel="stylesheet" href="../../css/sell.css">

</head>

<body>
    <?php
    require "../bars/nav.php";
    require "../bars/drop.php";

    include("../../database/connection.php");
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
                <img src="../../uploads/6889e8de6b53b_s.jpg <?php // echo htmlspecialchars($itemRow['image1']); 
                                                            ?>" alt="">
                <div class="title">
                    <p><?php // echo htmlspecialchars($itemRow["title"]); 
                        ?></p>

                    <div class="price">
                        <p class="new">Rs <strong><?php // echo htmlspecialchars($itemRow["new"]); 
                                                    ?></strong></p>
                        <p class="old">Rs <strong><?php // echo htmlspecialchars($itemRow["old"]); 
                                                    ?></strong></p>

                    </div>

                </div>
                <div class="to">
                    <h2>TO</h2>
                    <div class="buyer_info">
                        <input type="text"
                            value="
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
                <div class="btns">
                    <button id="cancel"><a href="">Cancel</a></button>
                    <button><a href="">Accept</a></button>
                </div>
                <div class="cancel_form" id="cancel_form">
                    <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
                    <form action="../../backend/php/cancel.php" method="post" id="">
                        <p>Are you sure you want to cancel?</p>
                        <h2>Reason</h2>
                        <textarea name="" id=""></textarea>
                        <button type="submit" name="confirm_cancel">Yes, Cancel</button>
                    </form>
                </div>



            </div>


            <div class="Box">
                <img src="../../uploads/6889e8de6b53b_s.jpg <?php // echo htmlspecialchars($itemRow['image1']); 
                                                            ?>" alt="">
                <div class="title">
                    <p><?php // echo htmlspecialchars($itemRow["title"]); 
                        ?></p>

                    <div class="price">
                        <p class="new">Rs <strong><?php // echo htmlspecialchars($itemRow["new"]); 
                                                    ?></strong></p>
                        <p class="old">Rs <strong><?php // echo htmlspecialchars($itemRow["old"]); 
                                                    ?></strong></p>

                    </div>

                </div>
                <div class="to">
                    <h2>TO</h2>
                    <div class="buyer_info">
                        <input type="text"
                            value="
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
                <div class="btns">
                    <button id="cancel"><a href="">Cancel</a></button>
                    <button><a href="">Accept</a></button>
                </div>
                <!--
                <div class="cancel_form" id="cancel_form">
                    <button class="cancel-btn"><a href="#"><i class="fa-solid fa-xmark"></i></a></button>
                    <form action="../../backend/php/cancel.php" method="post" id="">
                        <p>Are you sure you want to cancel?</p>
                        <h2>Reason</h2>
                        <textarea name="" id=""></textarea>
                        <button type="submit" name="confirm_cancel">Yes, Cancel</button>
                    </form>
                </div>
-->



            </div>
        </div>
    </div>
    <?php
    require "../bars/footer.php";
    ?>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cancelButtons = document.querySelectorAll('.cancel-btn');
            const cancelForms = document.querySelectorAll('.cancel_form');
            const closeButtons = document.querySelectorAll('.cancel_form #close');

            cancelButtons.forEach((btn, index) => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (cancelForms[index]) {
                        cancelForms[index].style.display = 'block';
                    }
                });
            });

            closeButtons.forEach((btn, index) => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (cancelForms[index]) {
                        cancelForms[index].style.display = 'none';
                    }
                });
            });
        });
    </script>


</body>

</html>