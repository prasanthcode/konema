<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '/opt/lampp/htdocs/konema/vendor/autoload.php';
require '../config.php';
if(isset($_POST["submit"])){

$mail = new PHPMailer(true);
$randomNumber = rand(100000, 999999);
echo $randomNumber;
$_SESSION["otp"]=$randomNumber;
$email = $_POST["email"];
try {
    // $mail->SMTPDebug = 4;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $email;
    $mail->Password = $passkey;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    // $attachmentFilePath1 = '/opt/lampp/htdocs/konema/gallery/f1.png'; // Replace with the actual file path
    // $attachmentFilePath2 = '/opt/lampp/htdocs/konema/gallery/p8.png'; // Replace with the actual file path

    // $mail->addAttachment($attachmentFilePath1, 'image1.png'); // You can optionally specify a custom filename for the attachment
    // $mail->addAttachment($attachmentFilePath2, 'image2.png');
    $mail->setFrom($email, 'prasanth gavvala');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Email Verification';
    $mail->Body = $randomNumber;
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';

    var_dump($mail->send());
    header("Location: otp_verify.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
else{

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <form action="" method="post">
        <input type="email" name="email">
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>


