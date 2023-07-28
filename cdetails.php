<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ecommerce test site</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="cdetails.css" />
    <link rel="stylesheet" href="">
    
</head>

<body>
    <section id="header">
        <h4>Message Section</h4>
    </section>


    <section id="product1" class="section-p1">

        <div class="pro-container">
            <?php include('details.php'); ?>

            <?php while ($row = $featured_products->fetch_assoc()) { ?>
                <div class="pro">

                    <div class="des">

                        <h4><?php echo $row['fullname']; ?></h4>
                        <span><?php echo $row['email']; ?></span>
                        <h6><?php echo $row['msg']; ?></h6>
                    </div>

                    <a href="delete.php?a=<?php echo $row['fullname']; ?>"><i class="fas fa-trash delete"></i></a>
                </div>
            <?php } ?>


        </div>

    </section>
    




    <script src="script.js"></script>
    

</body>

</html>