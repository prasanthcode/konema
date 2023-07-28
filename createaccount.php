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


if (isset($_POST['submit'])) {

    include 'connect.php';
    if (mysqli_connect_error()) {
        die('connection error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $result = $con->query($sql);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $userTakenErr = "Username or Email already taken";
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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Account</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="cstyle.css" />

</head>

<body>

    <section class="contact">



        <div class="contactForm">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="myform" onsubmit="return validateForm()" id="createAccountForm">
                <h2>Create Account</h2>
                <div class="inputBox">
                    <input type="text" name="username" required="required" id="username">
                    <span> Username</span>

                </div>
                <span style="color:red" id="usernameErr"><?php echo $usernameErr; ?></span>
                <div class="inputBox">
                    <input type="text" name="email" required="required" id="email">
                    <span>Your Email Address</span>
                </div>
                <span style="color:red" id="emailErr"><?php echo $emailErr; ?></span>

                <div class="inputBox">
                    <input type="password" name="pass" required="required" id="pass">
                    <span>Password</span>
                </div>
                <span style="color:red" id="passErr"><?php echo $passErr; ?></span>

                <div class="inputBox">
                    <input type="password" name="pass1" required="required" id="pass1">
                    <span>Confirm password</span>
                </div>

                <span style="color:red" id="pass1Err"><?php echo $pass1Err; ?></span>
                <span style="color:red"><?php echo $userTakenErr; ?></span>

                <div class="inputBox">
                    <input type="submit" name="submit" value="Create Account">
                </div>


            </form>
        </div>
    </section>

    <script>
        function validateForm() {
            var username = document.getElementById('username').value;
            var email = document.getElementById('email').value;
            var pass = document.getElementById('pass').value;
            var pass1 = document.getElementById('pass1').value;

            document.getElementById('usernameErr').textContent = '';
            document.getElementById('emailErr').textContent = '';
            document.getElementById('passErr').textContent = '';
            document.getElementById('pass1Err').textContent = '';

            if (username.trim() === '') {
                document.getElementById('usernameErr').textContent = 'Username is required';
                return false;
            }

            if (email.trim() === '') {
                document.getElementById('emailErr').textContent = 'Email is required';
                return false;
            }

            if (pass.trim() === '') {
                document.getElementById('passErr').textContent = 'Password is required';
                return false;
            }

            if (pass !== pass1) {
                document.getElementById('pass1Err').textContent = 'Passwords do not match';
                return false;
            }

            document.getElementById('createAccountForm').submit();

        }
    </script>
</body>
<script src="script.js"></script>

</html>