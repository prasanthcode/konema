<?php
session_start();


$userprofile = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];

if ($userprofile) {
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
    <title>My Orders</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* #notify {
            width: 300px;
            height: 200px;
            padding: 20px;
            background-color: lightblue;
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 10px;

            transform: translate(-50%, -50%);
        }

        #close-btn {
            border: none;
            margin-top: 100px;
            padding: 5px 40px;
            background-color: lightseagreen;
        }

        .btns {
            display: flex;
            justify-content: center;

        }

        .btns button {
            margin: 5px;
            cursor: pointer;
        }

        .btns a {
            text-decoration: none;
            color: black;
        } */
        

        #notify {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            padding: 30px;
            text-align: center;
            z-index: 999;
        }

        #notify h3 {
            margin: 0 0 15px;
            color: #333;
        }

        .btns {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }
        .btns a {
            /* text-decoration: none; */
            color: white;
        }

        #close-btn {
            background-color: rgb(55, 175, 196);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        #close-btn:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

    <?php include 'header.php';
    $delete = $_GET['placed'];

    ?>
    <center>

    <div id="notify">
        <h3>Order Placed Successfully</h3>
        <div class="btns">
            <button id="close-btn" onclick="myfun()">Close</button>
            <button id="close-btn"><a href="myorders.php">Orders</a></button>
        </div>
    </div>
    </center>
    <center>

        <h2>Shopping Cart</h2>
    </center>
    <section id="table">

        <div class="tab">

            <table class="table">
                
                <?php include('connect.php');
                $stmt = $con->prepare("SELECT * FROM cartItems where user_id='$user_id' ");

                $stmt->execute();

                $featured_products = $stmt->get_result();
                ?>
                <?php $c = 1 ?>
                <?php $sum = 0 ?>
                <?php while ($row = $featured_products->fetch_assoc()) {  ?>
                    <tr>
                        <td> <img src="gallery/<?php echo $row['product_image']; ?>" alt=""> </td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['product_village']; ?></td>
                        <td><input type="number" name="" id="" value="<?php echo $row['product_quantity']; ?>" disabled></td>
                        <td>Rs. <?php echo $row['product_price'] *$row['product_quantity']?></td>
                        <td><a class="remove" href="delete.php?a=<?php echo $row['product_id']; ?>"><i class="fas fa-trash"></i></a></td>
                        <?php $sum = $sum + $row['product_price']; ?>
                    </tr>

                <?php }
                $stmt->close();
                $con->close(); ?>
            </table>
        </div>
        
    </section>
    <section id="order">
        <?php $sum = 0;
        $c = 0;
        include('connect.php');

        $stmt = $con->prepare("SELECT * FROM cartItems where user_id='$user_id' ");

        $stmt->execute();

        $featured_products = $stmt->get_result();

        while ($row = $featured_products->fetch_assoc()) {

            $sum = $sum + $row['product_price'];
            $c++; ?>


        <?php } ?>

        <div class="place">
            <!-- <h4>Subtotal <span> Rs. <?php //echo $sum; ?><span> </h4> -->
            <?php if($sum){ ?>
            <a href="order.php?sum=<?php echo $sum; ?>&c=<?php echo $c; ?>">Place Order </a>
            <?php }else{ ?>
                <a href="table.php">Place Order </a>
<?php }?>

            <h5><?php
                if ($sum > 500) {
                    echo 'your order eligible for FREE delivery';
                } else {
                }

                $stmt->close();
                $con->close(); ?><h5>

        </div>

    </section>
    


    






    <script src="script.js"></script>
    <script>
        const orders = document.getElementById('mycart');
        orders.classList.add('active');
    </script>
    <script>
        var a = <?php echo $delete ?>;
        console.log(a);
        var notify = document.getElementById('notify');
        if (a) {
            notify.style.display = 'block';

        }

        function myfun() {
            notify.style.display = 'none';

        }
    </script>
    <script src="toggle.js">

</script>
</body>

</html>