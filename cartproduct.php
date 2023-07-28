<?php
session_start();

?>
<?php
$userprofile =$_SESSION['user_name'];
if($userprofile==true){


}
else{

    header("location:login.php");
}
?>
<?php 
include("connect.php");
$stmt = $con->prepare("SELECT * FROM $userprofile ");

$stmt->execute();

$featured_products = $stmt->get_result();


?>