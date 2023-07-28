<?php 
$product_id = $_GET["id"];
include 'connect.php';
$stmt= $con->prepare("DELETE FROM products where product_id='$product_id'");
$result = $stmt->execute();
if($result){
    // $stmt->close();
    // $con->close();
    header('Location: manage_pro.php');
}
else{
    echo 'something went wrong';
}

?>