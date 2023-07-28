<?php
session_start();

$userprofile = $_SESSION['user_name'];
if ($userprofile) {
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
    <title> search konema</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css" />


</head>

<body>

    <?php include 'header.php';
    include("connect.php");

    if (isset($_POST['search']) && $_POST['search'] != "") {

        $search = $_POST['search'];

        $stmt = $con->prepare("SELECT * FROM products WHERE  `product_name` LIKE  '%$search%' or `product_village` LIKE  '%$search%' or `product_price` LIKE  '%$search%'");

        $stmt->execute();

        $featured_products = $stmt->get_result(); //array->
    ?>
        <section id="product1" class="section-p1">
            <?php

            if ($featured_products) {

                if (mysqli_num_rows($featured_products) > 0) { ?>
                    <p class="show">showing results for <span class="result"> '<?php echo $search ?>'</span></p>
                    <div class="pro-container">

                        <?php
                        while ($row = mysqli_fetch_assoc($featured_products)) { ?>
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
                                <i class="fal fa-shopping-cart cart"></i>
                                <!-- <a href="cart.php?product_id=<?php //echo $row['product_id']; ?>&product_name=<?php //echo $row['product_name']; ?>&product_village=<?php //echo $row['product_village']; ?>&product_price=<?php //echo $row['product_price']; ?>&product_quantity=<?php //echo $row['product_quantity']; ?>"><i class="fal fa-shopping-cart cart"></i></a> -->
                            </a>

                            </div><?php
                                }
                            } else if (mysqli_num_rows($featured_products) == 0) { ?>
                        <p class="show">No search results for <span class="result"> '<?php echo $search ?>'</span></p>

            <?php }
                        }
                    } else {
                    }

                    $stmt->close();
                    $con->close();
            ?>


                    </div>
        </section>


        <script src="script.js"></script>
        <script src="toggle.js">

    </script>

</body>

</html>