<?php 
include("connect.php");
$stmt = $con->prepare("SELECT * FROM contact ");

$stmt->execute();

$featured_products = $stmt->get_result();//array->
?>