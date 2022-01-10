<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require_once 'phpmailer/vendor/autoload.php';
 
$mail = new PHPMailer(true);
 
try {
    $email=$_POST['email'];
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Username = '70120a60d0c00c';
    $mail->Password = 'db9cc2e2e8e7a4';
    $mail->Port = 465;
 
    $mail->setFrom('noreply@artisansweb.net', 'Artisans Web');
    $mail->addAddress($email, 'sarnav kundu');
 
    $mail->isHTML(true);
 
    $mail->Subject = 'Mailtrap Email';
    $mail->Body    = '<p>Thank you very much for using our website.</p><p>Participate in any games and enjoy winning.</p><br>';
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>