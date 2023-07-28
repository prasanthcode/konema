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
<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>single product</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="product.css" />
    <link rel="stylesheet" href="style.css" />
    <style>
        .products {
            padding: 0;
        }
    </style>

</head>

<body>
    <?php


    $a = $_GET['added'];


    include 'header.php';


    if (isset($_GET['a'])) {
        $search = $_GET['a'];
        $stmt = $con->prepare("SELECT * FROM products WHERE  `product_id`='$search'");

        $stmt->execute();

        $featured_products = $stmt->get_result();
        $present = $con->prepare("SELECT * FROM cartItems WHERE  `product_id`='$search'");

        $present->execute();
        $found = 0;
        $isincart = $present->get_result(); //array->
        if (mysqli_num_rows($isincart) > 0) {
            $found = 1;
        }



    ?>

        <section id="product">

            <?php

            if ($featured_products) {

                if (mysqli_num_rows($featured_products) > 0) {
                    while ($row = mysqli_fetch_assoc($featured_products)) { ?>

                        <div class="pro">
                            <div class="item">
                                <img src="gallery/<?php echo $row['product_image']; ?>" alt="fish 1">
                            </div>
                            <div class="des">
                                <h1><?php echo $row['product_name']; ?></h1>

                                <h5>From: <?php echo $row['product_village']; ?></h5>

                                <!-- <h5 >In Stock : <?php //echo $row['product_quantity']; 
                                                        ?></h5> -->
                                <form action="cart.php" method="get">
                                    Select Quantity: <input type="number" name="product_quantity" min="1" max="5" step="1" value="1" placeholder="Quantity" required>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                                        et dolore magna aliqua. Ut enim ad minim veniam Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                    <h4>Rs. <?php echo $row['product_price']; ?> </h4>
                                    <?php if ($found) { ?>

                                        <a href="deletep.php?a=<?php echo $row['product_id']; ?>">Remove from Cart</a>

                                    <?php } else { ?>
                                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                        <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                                        <input type="hidden" name="product_village" value="<?php echo $row['product_village']; ?>">
                                        <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                                        <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
                                        <input type="submit" id="submit" value="Add to Cart">


                                    <?php } ?>
                                </form>



                            </div>
                        </div>

        <?php
                    }
                }
            }
        }
        $stmt->close();
        $con->close();
        ?>

        </section>
        <section id="product1" class="section-p1 products">
            <h2>Fresh in the Market</h2>

            <div class="pro-container" style="flex-wrap:nowrap;overflow-x:scroll;">

                <?php
                include('get_featured_products.php');

                while ($row = $featured_products->fetch_assoc()) {
                    if ($row['product_id'] == $search) {
                        continue;
                    }
                ?>

                    <div class="pro">
                        <a class="prolink" href="product.php?a=<?php echo $row['product_id']; ?>">
                            <div class="image-wrapper">

                                <img src="gallery/<?php echo $row['product_image']; ?>" alt="">
                            </div>
                            <div class="des">

                                <h4><?php echo $row['product_name']; ?></h4>

                                <!-- <span>In Stock: <b><?php //echo $row['product_quantity']; 
                                                        ?></b> </span> -->
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

        <?php include 'footer.php'; ?>
        <script src="script.js"></script>
        <script>

        </script>
        <script src="toggle.js">

        </script>

</body>

</html>