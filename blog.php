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
    <title>Konema Blog</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

</head>

<body>
    <?php include 'header.php'; ?>

    <h1>Blog Section</h1>
    <script src="script.js"></script>
    <script>
        const orders = document.getElementById('blog');
        orders.classList.add('active');


        
    </script>
</body>

</html>