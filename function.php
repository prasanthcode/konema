<?php

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$msg = $_POST['msg'];
if (!empty($fullname) || !empty($email) || !empty($msg)) {
    // $con=new mysqli("127.0.0.1","root","","php_project");
    include("connect.php");

    if (mysqli_connect_error()) {
        die('connection error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $sql = "INSERT INTO contact (fullname,email,msg) values('$fullname','$email','$msg')";
        if ($con->query($sql)) {
            header("location:contact.php");
        } else {
            echo "error: " . $sql . "<br>" . $con->error;
        }
        $con->close();
    }
} else {
    echo "nothing";
    die();
}
