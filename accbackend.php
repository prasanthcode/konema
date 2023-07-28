<?php

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$pass = trim($_POST['pass']);
$pass1 = trim($_POST['pass1']);

$usernameErr = $emailErr = $passErr = $pass1Err = "";
function valid($username, $email, $pass, $pass1)
{
    global $usernameErr, $emailErr, $passErr, $pass1Err;
    if (isset($_POST['submit'])) {

        if (preg_match('/^[a-zA-Z0-9]+$/', $username)) {

            if (preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $email)) {

                if ($pass == $pass1) {

                    if (preg_match('/^.{8,}$/', $pass)) {

                        return true;
                    } else {
                        $passErr = "password length minimum 8 chars";
                        return false;
                    }
                } else {
                    $pass1Err = "Passwords don't match";

                    return false;
                }
            } else {
                $emailErr = "Enter valid email";
                return false;
            }
        } else {
            $usernameErr = "Enter valid username";
            return false;
        }
    }
}


if (isset($_POST['submit']) && valid($username, $email, $pass, $pass1)) {

    include 'connect.php';
    if (mysqli_connect_error()) {
        die('connection error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $result = $con->query($sql);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $usernameErr = "already taken";
            } else {

                $sql = "INSERT INTO users (username,email,role,pin) values('$username','$email','buyer','$pass')";

                if ($con->query($sql)) {
                    header("location:login.php?created=true");
                    
                } else {
                    echo "error: " . $sql . "<br>" . $con->error;
                }
                $con->close();
            }
        } else {
            echo "error: " . $sql . "<br>" . $con->error;
        }
    }
} else {
}

?>
