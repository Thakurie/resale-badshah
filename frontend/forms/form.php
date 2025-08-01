<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Phone Upload Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="../../css/form.css">
</head>

<body>
    <?php require "../bars/nav.php"; ?>
    <?php require "../bars/drop.php"; ?>

    <div class="items-form-container">
        <h1>Fill The Form For Sell</h1>
        <form method="post" enctype="multipart/form-data" action="../../backend/php/insert-form.php">
            <div class="item-form-container">
                <?php
                if (isset($_SESSION['insert_success']) && $_SESSION['insert_success']) {
                    echo '<div class="alert alert-success">' . $_SESSION['insert_success'] . '</div>';
                    $_SESSION['insert_success'] = null;
                }
                ?>
                <?php
                if (isset($_SESSION['insert_dbError']) && $_SESSION['insert_dbError']) {
                    echo '<div class="error alert-success">' . $_SESSION['insert_dbError'] . '</div>';
                    $_SESSION['insert_dbError'] = null;
                }
                ?>



                <div class="item-form-main-box">

                    <div class="item-images">
                        <div class="image1">
                            <img src="" alt="upload item image" id="preview1" / required>
                            <label for="input-file1"><i class="fa-solid fa-plus" required></i> </label>
                            <input type="file" name="images[]" id="input-file1" accept="image/*" onchange="previewImage(event, 1)" / required>
                        </div>
                        <div class="image2">
                            <img src="" alt="upload item image" id="preview2" />
                            <label for="input-file2"> <i class="fa-solid fa-plus"></i></label>
                            <input type="file" name="images[]" id="input-file2" accept="image/*" onchange="previewImage(event, 2)" />
                        </div>
                        <div class="image3">
                            <img src="" alt="upload item image" id="preview3" />
                            <label for="input-file3"><i class="fa-solid fa-plus"></i> </label>
                            <input type="file" name="images[]" id="input-file3" accept="image/*" onchange="previewImage(event, 3)" />
                        </div>
                        <div class="image4">
                            <img src="" alt="upload item image" id="preview4" />
                            <label for="input-file4"><i class="fa-solid fa-plus"></i> </label>
                            <input type="file" name="images[]" id="input-file4" accept="image/*" onchange="previewImage(event, 4)" />
                        </div>
                    </div>
                    <div class="category">
                        <label for="brand">Category:</label>
                        <select name="category" id="category" onchange="showBrand(this.value)" required>
                            <option value="">--Select Category--</option>
                            <option value="phone">Phone</option>
                            <option value="laptop">Laptop</option>
                            <option value="camera">Camera</option>
                            <option value="smartwatch">Smartwatch</option>
                            <option value="speaker">Speaker</option>
                            <option value="tv">TV</option>
                            <option value="tablet">Tablet</option>
                            <option value="earbud">Earbuds</option>
                            <option value="other">Other</option>
                        </select>
                        <?php
                        if (isset($_SESSION['categoryError'])) {
                            echo '<p>' . $_SESSION['categoryError'] . '</p>';
                            unset($_SESSION['categoryError']);
                        }
                        ?>
                    </div>
                    
                    <div class="brand-s">
                        <label for="brands">Brand:</label>
                        <input type="text" name="brands" placeholder="Enter brand name..." >
                        <?php
                        if (isset($_SESSION['brandsError'])) {
                            echo '<p>' . $_SESSION['brandsError'] . '</p>';
                            unset($_SESSION['brandsError']);
                        }
                        ?>
                    </div>
                    <!--
                    <div class="brands" id="phone">
                        <label for="brand">Brand:</label>


                        <select name="brands" id="brand">
                            <option value="">--Select Phone Brand--</option>
                            <option value="Apple">Apple</option>
                            <option value="Samsung">Samsung</option>
                            <option value="OnePlus">OnePlus</option>
                            <option value="Nokia">Nokia</option>
                            <option value="Poco">Poco</option>
                            <option value="Techno">Techno</option>
                            <option value="Vivo">Vivo</option>
                            <option value="Oppo">Oppo</option>
                            <option value="Google">Google</option>
                            <option value="Other">Other</option>
                        </select>
                        
                    </div>
                    <div class="brands" id="camera">
                        <label for="brand">Brand:</label>

                        <select name="brands" id="brand">
                            <option value="">---Select camera Brand---</option>
                            <option value="Canon">Canon</option>
                            <option value="Fujifilm">Fujifilm</option>
                            <option value="Nikon">Nikon</option>
                            <option value="Sony">Sony</option>
                            <option value="Gopro">Gopro</option>
                            <option value="Leica camera ">Leica camera </option>
                            <option value="Other">Other</option>
                        </select>
                        
                    </div>
                    <div class="brands" id="earbud">
                        <label for="brand">Brand:</label>
                        <select name="brands" id="brand">
                            <option value="">---Select earbud Brand---</option>
                            <option value="Apple">Apple</option>
                            <option value="Samsung">Samsung</option>
                            <option value="Sony">Sony</option>
                            <option value="Anker">Anker</option>
                            <option value="Ultima">Ultima</option>
                            <option value="Bose">Bose</option>
                            <option value="Technics">Technics</option>
                            <option value="Other">Other</option>
                        </select>
                        
                    </div>
                    <div class="brands" id="laptop">
                        <label for="brand">Brand:</label>
                        <select name="brands" id="brand">
                            <option value="">---Select Laptop Brand---</option>
                            <option value="Apple">Apple</option>
                            <option value="HP">HP</option>
                            <option value="Dell">Dell</option>
                            <option value="Asus">Asus</option>
                            <option value="Acer">Acer</option>
                            <option value="Lenovo">Lenovo</option>
                            <option value="Honor">Honor</option>
                            <option value="Oppo">Oppo</option>
                            <option value="Other">Other</option>
                        </select>
                        
                    </div>
                    <div class="brands" id="other">
                        <label for="brand">Brand:</label>
                        <select name="brands" id="brand">
                            <option value="">---Select other Brand---</option>
                            <option value="Other">Other</option>

                        </select>
                        
                    </div>
                    <div class="brands" id="smartwatch">
                        <label for="brand">Brand:</label>
                        <select name="brands" id="brand">
                            <option value="">---Select Smartwatch Brand---</option>
                            <option value="Apple">Apple</option>
                            <option value="Samsung">Samsung</option>
                            <option value="OnePlus">OnePlus</option>
                            <option value="Noise">Noise</option>
                            <option value="BoAt">BoAt</option>
                            <option value="Other">Other</option>
                        </select>
                        

                    </div>
                    <div class="brands" id="speaker">
                        <label for="brand">Brand:</label>
                        <select name="brands" id="brand">
                            <option value="">---Select Speaker Brand---</option>
                            <option value="JBL">JBL</option>
                            <option value="Bose">Bose</option>
                            <option value="Harman Kardon">Harman Kardon</option>
                            <option value="Sony">Sony</option>
                            <option value="Bang & Olufsen">Bang & Olufsen</option>
                            <option value="KEF">KEF</option>
                            <option value="Zebronics">Zebronics</option>
                            <option value="Boat">Boat</option>
                            <option value="Electro-voice">Electro-voice</option>
                            <option value="QSC">QSC</option>
                            <option value="Marshall">Marshall</option>
                            <option value="Philips">Philips</option>
                            <option value="Other">Other</option>
                        </select>
                        
                    </div>
                    <div class="brands" id="tablet">
                        <label for="brand">Brand:</label>
                        <select name="brands" id="brand">
                            <option value="">---Select Tablet Brand---</option>
                            <option value="Apple">Apple</option>
                            <option value="Samsung">Samsung</option>
                            <option value="Lenovo">Lenovo</option>
                            <option value="Honor">Honor</option>
                            <option value="TCL">TCL</option>
                            <option value="Motorola">Motorola</option>
                            <option value="Other">Other</option>
                        </select>
                        
                    </div>
                    <div class="brands" id="tv">
                        <label for="brand">Brand:</label>
                        <select name="brands" id="brand">
                            <option value="">---Select TV Brand---</option>
                            <option value="Hisense">Hisense</option>
                            <option value="Samsung">Samsung</option>
                            <option value="Lg">Lg</option>
                            <option value="Sony">Sony</option>
                            <option value="TCL">TCL</option>
                            <option value="Roku">Roku</option>
                            <option value="JVC">JVC</option>
                            <option value="Penasonic">Penasonic</option>
                            <option value="Other">Other</option>
                        </select>
                        
                    </div>
                    -->


                    <div class="title">
                        <label for="title">About item:</label>
                        <input type="text" name="title" id="title" placeholder="Enter About Phone..." / required>
                        <?php
                        if (isset($_SESSION['titleError'])) {
                            echo '<p>' . $_SESSION['titleError'] . '</p>';
                            unset($_SESSION['titleError']);
                        }
                        ?>
                    </div>


                    <div class="old_price">
                        <label for="old_price">Old_Price:</label>
                        <input type="number" name="old_price" placeholder="Enter old price..." / required>
                        <?php
                        if (isset($_SESSION['old_priceError'])) {
                            echo '<p>' . $_SESSION['old_priceError'] . '</p>';
                            unset($_SESSION['old_priceError']);
                        }
                        ?>
                    </div>


                    <div class="new-price">
                        <label for="new_price">New_Price:</label>
                        <input type="number" name="new_price" placeholder="Enter new price..." / required>
                        <?php
                        if (isset($_SESSION['new_priceError'])) {
                            echo '<p>' . $_SESSION['new_priceError'] . '</p>';
                            unset($_SESSION['new_priceError']);
                        }
                        ?>
                    </div>

                    <div class="use">
                        <label for="use">Using Time:</label>
                        <input type="text" name="use" placeholder="Enter item use time..." / required>
                        <?php
                        if (isset($_SESSION['useError'])) {
                            echo '<p>' . $_SESSION['useError'] . '</p>';
                            unset($_SESSION['useError']);
                        }
                        ?>
                    </div>

                    <div class="location">
                        <label for="location">Location:</label>
                        <input type="text" name="location" id="location" placeholder="Enter your location..." / required>
                        <?php
                        if (isset($_SESSION['locationError'])) {
                            echo '<p>' . $_SESSION['locationError'] . '</p>';
                            unset($_SESSION['locationError']);
                        }
                        ?>
                    </div>



                    <div class="contact-information">
                        <div class="whatsapp">
                            <label for="whatsapp">WhatsApp Link:</label>
                            <input type="text" name="whatsapp" id="whatsapp" placeholder="Paste WhatsApp link..." / required>
                            <?php
                            if (isset($_SESSION['whatsappError'])) {
                                echo '<p>' . $_SESSION['whatsappError'] . '</p>';
                                unset($_SESSION['whatsappError']);
                            }
                            ?>
                        </div>

                        <div class="facebook">
                            <label for="facebook">Facebook Link:</label>
                            <input type="text" name="facebook" id="facebook" placeholder="Paste Facebook link..." />
                            <?php
                            if (isset($_SESSION['facebookError'])) {
                                echo '<p>' . $_SESSION['facebookError'] . '</p>';
                                unset($_SESSION['facebookError']);
                            }
                            ?>
                        </div>
                    </div>

                    <div class="submit-button">
                        <button name="upload">Submit</button>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <?php require "../bars/footer.php"; ?>

    <script src="../../backend/js/form.js"></script>
</body>

</html>