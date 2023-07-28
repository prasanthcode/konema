<?php
$username = $email = $pass = $pass1 = "";
$usernameErr = $emailErr = $passErr = $pass1Err = "";

function validateInput($input, $regex, &$error)
{
    if (empty($input)) {
        $error = "This field is required.";
        return false;
    } elseif (!preg_match($regex, $input)) {
        $error = "Invalid input format.";
        return false;
    }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass1 = $_POST['pass1'];

    $isValid = true;

    // Validate username
    $usernameRegex = '/^[a-zA-Z0-9]+$/';
    if (!validateInput($username, $usernameRegex, $usernameErr)) {
        $isValid = false;
    }

    // Validate email
    $emailRegex = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
    if (!validateInput($email, $emailRegex, $emailErr)) {
        $isValid = false;
    }

    // Validate password
    if (empty($pass) || empty($pass1)) {
        $passErr = "Both password fields are required.";
        $isValid = false;
    } elseif ($pass !== $pass1) {
        $passErr = "Passwords do not match.";
        $isValid = false;
    } elseif (strlen($pass) < 8) {
        $passErr = "Password length should be 8 characters.";
        $isValid = false;
    }

    if ($isValid) {
        // Backend validation succeeded, proceed with database operations
        include 'connect.php';
        if (mysqli_connect_error()) {
            die('Connection error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
        } else {
            $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $result = $con->query($sql);
            if ($result) {
                $num = mysqli_num_rows($result);
                if ($num > 0) {
                    $usernameErr = "Username or email already taken.";
                } else {
                    $sql = "INSERT INTO users (username, email, role, pin) VALUES ('$username', '$email', 'buyer', '$pass')";
                    if ($con->query($sql)) {
                        header("location: login.php?created=true");
                        exit();
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }
                    $con->close();
                }
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }
    }
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
    <style>
        .error {
            color: red;
        }
    </style>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form[name="myform"]');
            const usernameInput = form.querySelector('input[name="username"]');
            const emailInput = form.querySelector('input[name="email"]');
            const passInput = form.querySelector('input[name="pass"]');
            const pass1Input = form.querySelector('input[name="pass1"]');
            const errorElements = form.querySelectorAll('.error');
            
            form.addEventListener('submit', function (event) {
                let isValid = true;
                
                // Reset error messages
                errorElements.forEach(function (errorElement) {
                    errorElement.textContent = '';
                });
                
                // Validate username
                if (!/^[a-zA-Z]{5,}$/.test(usernameInput.value)) {
                    errorElements[0].textContent = 'Enter a valid username';
                    isValid = false;
                }
                
                // Validate email
                if (!/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/.test(emailInput.value)) {
                    errorElements[1].textContent = 'Enter a valid email';
                    isValid = false;
                }
                
                // Validate password
                if (passInput.value.length < 8) {
                    errorElements[2].textContent = 'Password length should be 8 characters';
                    isValid = false;
                }
                
                // Confirm password
                if (passInput.value !== pass1Input.value) {
                    errorElements[3].textContent = 'Passwords do not match';
                    isValid = false;
                }
                
                if (!isValid) {
                    event.preventDefault(); // Prevent form submission
                }
            });
        });
    </script>
</head>

<body>
    <section class="contact">
        <div class="contactForm">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="myform" autocomplete="off">
                <h2>Create Account</h2>
                <div class="inputBox">
                    <input type="text" name="username" required="required" value="<?php echo $username; ?>">
                    <span>Username</span>
                </div>
                <span class="error"><?php echo $usernameErr; ?></span>
                <div class="inputBox">
                    <input type="text" name="email" required="required" value="<?php echo $email; ?>">
                    <span>Your Email Address</span>
                </div>
                <span class="error"><?php echo $emailErr; ?></span>
                <div class="inputBox">
                    <input type="password" name="pass" required="required">
                    <span>Password</span>
                </div>
                <div class="inputBox">
                    <input type="password" name="pass1" required="required">
                    <span>Confirm Password</span>
                </div>
                <span class="error"><?php echo $passErr; ?></span>
                <div class="inputBox">
                    <input type="submit" name="submit" value="Create Account">
                </div>
            </form>
        </div>
    </section>
</body>
<script src="script.js"></script>
</html>
