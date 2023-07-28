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
<?php //include('cartproduct.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My orders</title>
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
                    <!-- <th>Order no</th> -->
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Order date</th>
                    <th>Status</th>
                    <th>order details</th>




                </tr>
                <?php include('connect.php'); 
                $stmt = $con->prepare("SELECT * FROM Orders where user_id='$user_id' order by order_id desc");

                $stmt->execute();
                
                $featured_products = $stmt->get_result();
                ?>
                <?php $c = 1 ?>

                <?php while ($row = $featured_products->fetch_assoc()) { ?>
                    <tr>

                        <!-- <td><?php //echo $c++; ?></td> -->
                        <td><?php echo $row['items_count']; ?></td>
                        <td>Rs. <?php echo $row['total_amount']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td><a class="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></a></td>
                        <td><a class="remove" href="orderdet.php?a=<?php echo $row['order_id']; ?>">view</a></td>

                    </tr>

                <?php } ?>
            </table>

        </div>
    </section>


    </section>






    <script src="script.js"></script>
    <script>
        
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("openmenu");
        }
    </script>
</body>

</html>