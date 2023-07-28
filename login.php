<?php
session_start();

$userprofile = $_SESSION['user_name'];
if ($userprofile) {
    header("location:konem.php");
} else {

}
?>
<?php
$Err = "";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    include("connect.php");

    if (mysqli_connect_error()) {
        die('connection error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $sql = "SELECT * FROM users WHERE username='$username' AND pin='$pass'";
        $result = $con->query($sql);
        if ($result) {
            $num = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
            if ($num > 0) {
                session_start();
                $_SESSION['user_name'] = $username;
                $_SESSION['user_id'] = $row['id'];
                header("location:konem.php?welcome=true");
            } else {
                $Err = "invalid credentials";
            }
        } else {
            echo "error: " . $sql . "<br>";
        }
        $con->close();
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Konema</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="cstyle.css" />

</head>

<body>

    <section class="contact">

        <div class="contactForm">
            <form action="login.php" method="POST" autocomplete="off" >
                <h2>Login to <span>Konema</span> </h2>
                <div class="inputBox">
                    <input type="text" name="username" required="required">
                    <span><i class="fas fa-user"></i> Username</span>
                </div>
                <div class="inputBox">
                    <input type="password" name="pass" required="required">
                    <span><i class="fas fa-lock"></i> Password</span>
                </div>
                <span style="color: red;"><?php echo $Err; ?></span>
                <div class="inputBox" class="cat">
                    <input type="submit" name="submit" value="Login">
                </div>
                <div class="signup">
                    Don't have an account? <a href="createaccount.php">Signup</a>
                </div>
            </form>
        </div>
    </section>
    <script src="script.js"></script>

</body>

</html>