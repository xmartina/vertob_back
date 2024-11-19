<?php
const rootDir = '/home/multistream6/domains/dashboard.vertob.online/public_html/';
require rootDir . 'include/vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;

// MESSAGE & EMAIL CONFIGURATION FOR SCRIPT
class message{
    private $conn;
    public function send_mail($email, $message, $subject){

        $mail = new PHPMailer();
        //SMTP Settings
        //$mail->isSMTP();
        $mail->isMail();
        $mail->Host = "mail.vertob.online"; // Change Email Host
        $mail->SMTPAuth = true;
        $mail->Username = "info@vertob.online"; // Change Email Address
        $mail->Password = '@SECvertob1'; // Change Email Password
        $mail->Port = 587; //587
        $mail->SMTPSecure = "ssl"; //tls

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom('info@vertob.online',' Verto Bank'); // Change
        $mail->addAddress($email);
        $mail->AddReplyTo("info@vertob.online", " Verto Bank"); // Change
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->Send();


    }

}
