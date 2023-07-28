
<?php
session_start();

$userprofile = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
$sum = $_GET['sum'];
$count = $_GET['c'];
// if(isset($_GET['buy'])){
//     $sum = $_GET['product_price']*$_GET['product_quantity'];
//     $count = 1;
// }

if ($userprofile == true) {
} else {

    header("location:login.php");
}
?>
<?php
include("connect.php");

if (mysqli_connect_error()) {
    die('connection error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    if ($sum != 0) {

        $sql = "INSERT INTO Orders (total_amount,items_count,user_id,status) values('$sum','$count','$user_id','pending')";

        if ($con->query($sql)) {
            $order_id = $con->insert_id;

            $sql = "INSERT INTO OrderItems(order_id,product_id,product_name,product_price,product_quantity,product_village,user_id,product_image) SELECT '$order_id',product_id,product_name,product_price,product_quantity,product_village,user_id,product_image FROM cartItems";

            if ($con->query($sql)) {

                header("location:table.php?placed=true");
            } else {
                echo "Error Occured";
            }
        } else {
            echo "Error Occured";
        }
        $con->close();
    }
}

?>

