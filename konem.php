<?php
session_start();


$userprofile = $_SESSION['user_name'];
// echo $userimg = $_SESSION['userimg'];

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
    <title>Home Page Konema</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $('.welcome').fadeIn(3000);
        });
    </script> -->
    
</head>

<body>
    <?php include 'header.php'; ?>

    <section id="hero" >
    


         <h2 >Hello <?php echo $userprofile ?>!</h2>
         <h1 >welcome back</h1> 
        <!-- <h1 >Explore</h1> -->
        <button>Explore</button>
        

    </section>
    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="gallery/f1.png" alt="feature">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="gallery/f2.png" alt="feature">
            <h6>Online order</h6>
        </div>
        <div class="fe-box">
            <img src="gallery/f3.png" alt="feature">
            <h6>Save money</h6>
        </div>
        <div class="fe-box">
            <img src="gallery/f4.png" alt="feature">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="gallery/f5.png" alt="feature">
            <h6>Happy sell</h6>
        </div>
        <div class="fe-box">
            <img src="gallery/f6.png" alt="feature">
            <h6>24/7 support</h6>
        </div>
    </section>
    <section id="product1" class="section-p1">
        <h2>Top Selling Products</h2>
        <p>Mega offer on all Products</p>

        <div class="pro-container">

            <?php

            include('get_featured_products.php');
            ?>

            <?php while ($row = $featured_products->fetch_assoc()) { ?>

                <div class="pro">
                    <a class="prolink" href="product.php?a=<?php echo $row['product_id']; ?>">
                    <div class="image-wrapper">

                        <img src="gallery/<?php echo $row['product_image']; ?>" alt="">
                    </div>
                        <div class="des">

                            <h4><?php echo $row['product_name']; ?></h4>
                            <span>In Stock: <b><?php echo $row['product_quantity']; ?></b> </span>

                            <h6>Rs. <?php echo $row['product_price']; ?></h6>
                        </div>



                        <!-- <a href="cart.php?product_id=<?php //echo $row['product_id']; 
                                                            ?>&product_name=<?php //echo $row['product_name']; 
                                                                            ?>&product_village=<?php //echo $row['product_village']; 
                                                                                                ?>&product_price=<?php //echo $row['product_price']; 
                                                                                                                                                    ?>&product_quantity=<?php //echo $row['product_quantity']; 
                                                                                                                                                                                                            ?>"><i class="fal fa-shopping-cart cart"></i></a> -->
                        <i class="fal fa-shopping-cart cart"></i>


                    </a>

                </div>
            <?php }
            $stmt->close();
            $con->close();

            ?>


        </div>

    </section>
    <section id="banner" class="section-m1">
        <h4>Wide Range of Products</h4>
        <h2>Up to <span>70% Off</span> - All Products</h2>
        <button class="normal">Explore More</button>
    </section>
    <section id="product1" class="section-p1">
        <h2>Trending in the Market</h2>
        <p>Mega offer on all Products</p>
        <div class="pro-container">
            <?php include('get_featured_products.php'); ?>
            <?php while ($row = $featured_products->fetch_assoc()) { ?>
                <div class="pro">
                    <a href="product.php?a=<?php echo $row['product_id']; ?>">
                    <div class="image-wrapper">

                        <img src="gallery/<?php echo $row['product_image']; ?>" alt="">
                    </div>
                        <div class="des">

                            <h4><?php echo $row['product_name']; ?></h4>
                            <span>In Stock: <b><?php echo $row['product_quantity']; ?></b> </span>

                            <h6>Rs. <?php echo $row['product_price']; ?></h6>
                        </div>
                        <!-- <a href="cart.php?product_id=<?php //echo $row['product_id']; 
                                                            ?>&product_name=<?php // echo $row['product_name']; 
                                                                            ?>&product_village=<?php //echo $row['product_village']; 
                                                                                                ?>&product_price=<?php //echo $row['product_price']; 
                                                                                                                                                    ?>&product_quantity=<?php // echo $row['product_quantity']; 
                                                                                                                                                                                                            ?>"><i class="fal fa-shopping-cart cart"></i></a> -->
                        <i class="fal fa-shopping-cart cart"></i>

                    </a>
                </div>
            <?php }
            $stmt->close();
            $con->close(); ?>

        </div>
    </section>
    
    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>Mega Offer</h4>
            <h2>20% off on Home Decore</h2>
            <span>Crazy offers on Home Decore at Konem</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>Mega Offer</h4>
            <h2>Crazy offers on Beauty Products </h2>
            <span>Wide range of Beauty Products</span>
            <button class="white">Collection</button>
        </div>
    </section>
    <?php include 'footer.php'; ?>

    <script src="script.js"></script>
    <script>
        const home = document.getElementById('home');
        home.classList.add('active');
    </script>
    <script>
        <?php $welcome = $_GET['welcome'] ?>
        var a = <?php echo $welcome ?>;
        var welcome = document.getElementsByClassName('welcome');

        for (var i = 0; i < welcome.length; i++) {
            if (a) {

                welcome[i].style.display = 'block';
            }
        }
    </script>
    <script src="toggle.js">

    </script>

</body>

</html>