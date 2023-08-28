<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '/opt/lampp/htdocs/konema/vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 4;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pintuprasanth9@gmail.com';
    $mail->Password = 'fgpvppjxomcqpgvp';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $attachmentFilePath1 = '/opt/lampp/htdocs/konema/gallery/f1.png'; // Replace with the actual file path
    $attachmentFilePath2 = '/opt/lampp/htdocs/konema/gallery/p8.png'; // Replace with the actual file path

    $mail->addAttachment($attachmentFilePath1, 'image1.png'); // You can optionally specify a custom filename for the attachment
    $mail->addAttachment($attachmentFilePath2, 'image2.png');
    $mail->setFrom('pintuprasanth9@gmail.com', 'prasanth gavvala');
    $mail->addAddress('pintugraphics12@gmail.com');
    $mail->addAddress('s190084@rguktsklm.ac.in');

    $mail->isHTML(true);
    $mail->Subject = 'Subject';
    $mail->Body = 'HTML message body in <b>bold</b>';
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';

    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
