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
        $mail->Host = "mail.zyntrab.online"; // Change Email Host
        $mail->SMTPAuth = true;
        $mail->Username = "contact@zyntrab.online"; // Change Email Address
        $mail->Password = '@SECzyntrab1'; // Change Email Password
        $mail->Port = 587; //587
        $mail->SMTPSecure = "ssl"; //tls

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom('contact@zyntrab.online',' Zyntra Bank'); // Change
        $mail->addAddress($email);
        $mail->AddReplyTo("contact@zyntrab.online", " Zyntra Bank"); // Change
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->Send();


    }

}
