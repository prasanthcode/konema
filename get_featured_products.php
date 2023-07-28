<?php 
include("connect.php");
$stmt = $con->prepare("SELECT * FROM products
ORDER BY RAND()
LIMIT 8;
");

$stmt->execute();

$featured_products = $stmt->get_result();
?>