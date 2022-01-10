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
    //$mail->Body    = 'Hello User, <p>This is a test mail sent through Mailtrap SMTP</p><br>Thanks';
    $mail->Body    =  "<p>This is your password:</p><br/>".


                     "<table width='100%' border='1' style='margin-top:15px;' align='left class='table table-striped'>". 
                      "<thead><tr>".
                      "<th>Password</th>".
                      "</tr></thead><tbody>";
                      $con=mysqli_connect('localhost','root','','frnd_req_system');
                      $u=$_POST['email'];
                      $qq = mysqli_query($con,"SELECT user_password FROM users WHERE user_email='$u'");
                      $d =0;
                      while($c = mysqli_fetch_array($qq)){ $d++;
  $mail->Body.=       "<tr>".
                      "<td nowrap='nowrap'>".$d."</td>".
                      "<td nowrap='nowrap'> ".$c['user_password']."</td>"."</tr>";
                      }
$mail->Body.=       "</tbody></table>";
 
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