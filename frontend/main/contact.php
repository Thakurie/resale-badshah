<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>home</title>
    <link rel="stylesheet" href="../../css/contact.css" />
</head>

<body>
    <?php
    require "../bars/nav.php";
    ?>

    <?php
    require "../bars/drop.php";
    ?>

    <!--phone-->

    <div class="contact-container">
        <h1>Contact Us </h1>
        <div class="contact-main-box">
            <div class="contact-box">

                <div class="logo">
                    <img src="../../gallery/logo.jpg" alt="">
                </div>
                <div class="information">
                    <div class="info-box">
                        <h4>Email:</h4>
                        <h6>resalebadshah@gmail.com</h6>
                    </div>
                    <div class="info-box">
                        <h4>Contact:</h4>
                        <h6>+977: 1234567890</h6>
                    </div>
                </div>


            </div>
            <div class="contact-input-box">
                <form action="" method="post">
                    <div class="input-box">
                        <label for="name">Name</label> <br>
                        <input type="text" id="name" name="name" placeholder="enter name..." required />
                    </div>
                    <div class="input-box">
                        <label for="email">Email</label> <br>
                        <input type="email" id="email" name="email" placeholder="enter email..." required />
                    </div>
                    <div class="input-box">
                        <label for="subject">subject</label> <br>
                        <input type="text" id="subject" name="subject" placeholder="enter subject..." required />
                    </div>
                    <div class="message-box">
                        <label for="message">Message</label> <br>
                        <textarea id="message" name="message" rows="4" placeholder="enter message..."
                            required></textarea>
                    </div>
                    <button class="contact-button" type="submit">Send Message</button>
                </form>

            </div>

        </div>



    </div>



    <?php
    require "../bars/footer.php";
    ?>

</body>

</html>