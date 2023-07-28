<?php
session_start();

?>
<?php
$userprofile = $_SESSION['user_name'];
if ($userprofile == true) {
} else {

    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>contact us </title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="contact.css" />


</head>

<body>
    <?php include 'header.php' ?>
    <section class="contact">

        <div class="content">

            <h2>Contact Us</h2>
        </div>
        <div class="container">
            
            <div class="contactForm">
                <form action="function.php" method="POST">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="fullname" required="required">
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="email" required="required">
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea required="required" name="msg"></textarea>
                        <span>Type Your Message...</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="" value="send">

                    </div>
                </form>
            </div>
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="text">
                        <h3>Address </h3>
                        <p>321-Pillori street,<br>Srikakulam,Andhra Pradesh,<br>532222</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="text">
                        <h3>Phone </i></h3>
                        <p>+91 9876512340</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="far fa-envelope"></i></div>
                    <div class="text">
                        <h3>Email </i></h3>
                        <p>emailaddress@gmail.com</p>
                    </div>
                </div>
            </div>
</div>
    </section>
    <?php include 'footer.php'; ?>
    <script src="script.js"></script>
    <script>
        const contact = document.getElementById('contact');
        contact.classList.add('active');

        
    </script>
    <script src="toggle.js">

</script>
</body>

</html>