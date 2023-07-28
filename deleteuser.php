
<?php
session_start();

?>
<?php
$userprofile = $_SESSION['user_name'];
$username = $_SESSION['username'];
if ($userprofile == true) {
} else {

    header("location:login.php");
}
?>
<?php

$id = $_GET['a'];

$superuser = 'prasanth';
//echo $superuser;
$con = new mysqli("127.0.0.1", "root", "", "work");
if (mysqli_connect_error()) {
    die('connection error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    if ($userprofile == $superuser) {
        $sql = "DELETE FROM users WHERE id='$id' ";
        if ($con->query($sql)) {
            $sql = "DROP TABLE $username";
            if ($con->query($sql)) {
                header("location:users.php");
            } else {
                echo 'something went wrong';
            }
        } else {
            echo "error: " . $sql . "<br>" . $con->error;
        }
        $con->close();
    } else {
        echo 'you do not have permission ';
    }
}




?>