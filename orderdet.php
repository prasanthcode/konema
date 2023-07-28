<?php
session_start();

?>
<?php
$userprofile = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
if ($userprofile == true) {
} else {

    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order details</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <section id="table">
        <div class="tab">

            <table class="table">
                <tr id="head">
                    <th>image</th>
                    <th>Order date</th>
                    <th>Date</th>
                    <th>name</th>
                    <th>Quantity</th>
                    <th>Price</th>



                    
                    
                </tr>
                
                <?php
                include('connect.php'); 
                
                $order_id = $_GET['a'];

                $stmt = $con->prepare("SELECT * FROM OrderItems WHERE  user_id='$user_id' and order_id='$order_id'");

                $stmt->execute();

                $featured_products = $stmt->get_result();
                ?>

                <?php $c = 1 ?>

                <?php while ($row = $featured_products->fetch_assoc()) { ?>
                    <tr>

                        <td> <img src="gallery/<?php echo $row['product_image']; ?>" alt=""> </td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td><?php echo $row['product_village']; ?></td>
                        <td><?php echo $row['product_quantity']; ?></td>
                        <td>Rs. <?php echo $row['product_price']; ?></td>


                    </tr>

                <?php } 
                $stmt->close();
                $con->close();
                ?>
            </table>
        </div>
    </section>


    






    <script src="script.js"></script>
    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("openmenu");
        }
    </script>
    <script src="toggle.js">

</script>
</body>

</html>