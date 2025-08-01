<?php
session_start();
include '../../database/connection.php';



$_SESSION['categoryError'] =
    $_SESSION['brandsError'] =
    $_SESSION['titleError'] =
    $_SESSION['old_priceError'] =
    $_SESSION['new_priceError'] =
    $_SESSION['useError'] =
    $_SESSION['whatsappError'] =
    $_SESSION['locationError'] = null;

if (isset($_POST['upload'])) {
    $user_id = $_SESSION['user_id'] ?? null;
    if (!$user_id) {
        $_SESSION['dbError'] = "User not logged in.";
        header("Location: ../../frontend/pages/login.php");
        exit();
    }

    $category = trim($_POST['category']);
    $brands = trim($_POST['brands']);
    $title = trim($_POST['title']);
    $old_price = trim($_POST['old_price']);
    $new_price = trim($_POST['new_price']);
    $use = trim($_POST['use']);
    $location = trim($_POST['location']);
    $whatsapp = trim($_POST['whatsapp']);
    $facebook = trim($_POST['facebook']);
    $user_id = $_SESSION['user_id'];

    $hasError = false;

    if (empty($category)) {
        $_SESSION['categoryError'] = "Please choose category.";
        $hasError = true;
    }
    if (empty($brands)) {
        $_SESSION['brandsError'] = "Please choose brands.";
        $hasError = true;
    }
    if (empty($title)) {
        $_SESSION['titleError'] = "Please enter object name/title.";
        $hasError = true;
    }
    if (empty($old_price)) {
        $_SESSION['old_priceError'] = "Please enter old_price.";
        $hasError = true;
    }
    if (empty($new_price)) {
        $_SESSION['new_priceError'] = "Please enter new_price.";
        $hasError = true;
    }
    if (empty($use)) {
        $_SESSION['useError'] = "Please enter object use time.";
        $hasError = true;
    }
    if (empty($location)) {
        $_SESSION['locationError'] = "Please enter your location.";
        $hasError = true;
    }
    if (empty($whatsapp)) {
        $_SESSION['whatsappError'] = "Please enter your whatsapp link.";
        $hasError = true;
    }


    $imageNames = [];
    $uploadDir = '../../uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    if (isset($_FILES['images'])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK && is_uploaded_file($tmp_name)) {
                $fileName = uniqid() . '_' . basename($_FILES['images']['name'][$key]);
                $targetFile = $uploadDir . $fileName;
                if (move_uploaded_file($tmp_name, $targetFile)) {
                    $imageNames[] = $fileName;
                }
            }
        }
    }

    $imagesField = json_encode($imageNames);
    $img1 = $imageNames[0] ?? null;
    $img2 = $imageNames[1] ?? null;
    $img3 = $imageNames[2] ?? null;
    $img4 = $imageNames[3] ?? null;
    $stmt = $con->prepare("INSERT INTO items (
    user_id,
    category,
    brand,
    title, 
    old,
    new, 
    uses, 
    location,
    whatsapp,
    facebook,
    image1, 
    image2, 
    image3, 
    image4 
    )
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "isssssssssssss",
        $user_id,
        $category,
        $brands,
        $title,
        $old_price,
        $new_price,
        $use,
        $location,
        $whatsapp,
        $facebook,
        $img1,
        $img2,
        $img3,
        $img4
    );

    if ($stmt->execute()) {
        $item_id = mysqli_insert_id($con);
        $_SESSION['item_id'] = $item_id;
        $_SESSION['insert_success'] = "Item added / Post successfully.";
        header("Location: ../../frontend/forms/form.php");
    } else {
        $_SESSION['insert_dbError'] = "Failed to add item: " . $stmt->error;
        header("Location: ../../frontend/forms/form.php");
    }
    $stmt->close();
}
