<?php 
session_start();
if(!$_SESSION["otp"]){
    header("Location: /log_reg_system/register.php");
}else{

}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendotp($email){
    require '/opt/lampp/htdocs/konema/vendor/autoload.php';
    require '../config.php';

            $mail = new PHPMailer(true);
            $randomNumber = rand(100000, 999999);
            echo $randomNumber;
            $_SESSION["otp"] = $randomNumber;

            try {
              
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $email;
                $mail->Password = $passkey;
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
               
                $mail->setFrom($email, 'prasanth gavvala');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Email Verification';
                $mail->Body = $randomNumber;
                $mail->AltBody = 'Body in plain text for non-HTML mail clients';

                $mail->send();
                header("Location: /konema/vendor/otp_verify.php");
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        
}
if(isset($_POST["otpsubmit"])&& isset($_POST["otp"])) {
    
    if($_SESSION["otp"]==$_POST["otp"]){
        
        $conn = new mysqli("localhost", "root", "", "loginsystem");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
    $hashedPassword = $_SESSION["hpassword"];
    $sid = $_SESSION["id"];
    $sql = "INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $hashedPassword);
    if($stmt->execute()){

        session_unset();
        session_destroy();
    
    // Redirect or perform other actions after clearing the session
    header('Location: /log_reg_system/login.php');
    exit();
    }else{
        echo "error occured while otp verification";
    }
        // echo "verified";
    }
    else{
        echo "your email is not verified";
    }
}else
{
    
}
if($_POST["otpresend"]){
    sendotp($_SESSION["email"]);
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
                <input type="submit" value="resend" name="otpresend">
            </form>
</body>
</html>