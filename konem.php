<?php
session_start();


$userprofile = $_SESSION['user_name'];
// echo $userimg = $_SESSION['userimg'];

// if ($userprofile == true) {
// } else {

//     header("location:login.php");
// }
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
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    
</head>

<body>
    <?php include 'header.php'; ?>

    <section id="hero" >
    


         <h2 data-aos="fade-right" data-aos-delay="500" >Welcome to Konema</h2>
         <h1 data-aos="fade-right" data-aos-delay="500" >Shop. Save. Repeat.</h1> 
        <img data-aos="fade-left" data-aos-delay="1000" src="gallery/pngegg (15).png" alt="" >
        <button data-aos="fade-right" data-aos-delay="500">Explore</button>
        

    </section>
    <section id="feature" class="section-p1">
        <div class="fe-box" data-aos="fade-up" data-aos-delay="500">
            <img src="gallery/f1.png" alt="feature">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box" data-aos="fade-up" data-aos-delay="600">
            <img src="gallery/f2.png" alt="feature">
            <h6>Online order</h6>
        </div>
        <div class="fe-box" data-aos="fade-up" data-aos-delay="700">
            <img src="gallery/f3.png" alt="feature">
            <h6>Save money</h6>
        </div>
        <div class="fe-box" data-aos="fade-up" data-aos-delay="800">
            <img src="gallery/f4.png" alt="feature">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box" data-aos="fade-up" data-aos-delay="900">
            <img src="gallery/f5.png" alt="feature">
            <h6>Happy sell</h6>
        </div>
        <div class="fe-box" data-aos="fade-up" data-aos-delay="1000">
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
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <h6>Rs. <?php echo $row['product_price']; ?></h6>
                        </div>



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
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <h6>Rs. <?php echo $row['product_price']; ?></h6>
                        </div>
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
    <script>
        AOS.init(); 
    </script>

</body>

</html>