
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
<?php

$product_id = $_GET['a'];


// $con=new mysqli("127.0.0.1","root","","work");
include("connect.php");

if (mysqli_connect_error()) {
    die('connection error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    $sql = "DELETE FROM cartItems where user_id ='$user_id' and product_id='$product_id' ";
    if ($con->query($sql)) {
        header("location:table.php?delete=true");
    } else {
        echo "error: " . $sql . "<br>";
    }
    $con->close();
}




?>