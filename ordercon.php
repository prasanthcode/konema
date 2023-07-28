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
<?php

include("connect.php");

$date = $_GET['a'];
$stmt = $con->prepare("SELECT * FROM order_details WHERE  user='$userprofile' and order_date='$date'");

$stmt->execute();

$featured_products = $stmt->get_result(); //array->
?>