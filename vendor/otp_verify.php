<?php 
session_start();
if(isset($_POST["otpsubmit"])) {
    if($_SESSION["otp"]==$_POST["otp"]){
        echo "verified";
    }
    else{
        echo "your email is not verified";
    }
}else
{

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        
        <form action="otp_verify.php" method="post">
                <input type="text" name="otp">
                <input type="submit" value="submit" name="otpsubmit">
            </form>
</body>
</html>