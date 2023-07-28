
<?php
session_start();

?>
<?php
$userprofile = $_SESSION['user_name'];
$user_id=$_SESSION['user_id'];

if ($userprofile) {
} else {

    header("location:login.php");
}
?>

 
<?php

include("connect.php");
if (isset($_GET['product_id'])&&isset($_GET['product_name'])) {
    $product_name = $_GET['product_name'];
    $product_image = $_GET['product_image'];
    $product_quantity = $_GET['product_quantity'];
    $product_price = $_GET['product_price']*$_GET['product_quantity'];
    $product_village = $_GET['product_village'];
    $product_id=$_GET['product_id'];
    
    if (mysqli_connect_error()) {
        die('connection error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        
        $sql = "SELECT * FROM cartItems WHERE product_id='$product_id' and user_id ='$user_id'";
        $result = $con->query($sql);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                header("location:product.php?a=$product_id&added=true");
                
            } else {
                
                $sql = "INSERT INTO cartItems (user_id,product_id,product_name,product_village,product_price,product_quantity,product_image) values('$user_id','$product_id','$product_name','$product_village','$product_price','$product_quantity','$product_image')";
                $result = $con->query($sql);
                if ($result) {
                   
                    // echo 'success';
                    header("Location: product.php?a=$product_id");
                } else {
                    echo "error: " . $sql . "<br>" . $con->error;
                }
                $con->close();
            }
        }
    }
}





?>

