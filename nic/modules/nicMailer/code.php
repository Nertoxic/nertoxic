<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$nicMail = new nicMail();

require BASE_PATH.'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class nicMail
{

public function sendMail($mailTo, $mailTitle, $mailContent)
{
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = 0;
    $mail->isSMTP();      
    $mail->SMTPSecure = true;
    $mail->SMTPAutoTLS = false;
    $mail->Host       = $GLOBALS['NIC_MS_URL'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $GLOBALS['NIC_MS_SENDER'];
    $mail->Password   = $GLOBALS['NIC_MS_PASSWORD'];
    $mail->Port       = $GLOBALS['NIC_MS_PORT']; // Plesk:25
  
    $mail->AddCustomHeader("X-MSMail-Priority: High");
    $mail->WordWrap = 50;

    $mail->setFrom($GLOBALS['NIC_MS_SENDER'], $GLOBALS['APP_NAME']);
    $mail->addReplyTo($GLOBALS['NIC_MS_SENDER'], $GLOBALS['APP_NAME']);
    //$mail->addBCC('debug@nertoxic.com'); // Just for debug, dont use it within prod
    $mail->addAddress($mailTo);


    $mail->isHTML(true);
    $mail->CharSet   = 'UTF-8';
    $mail->Encoding  = 'base64';
    $mail->Subject = $mailTitle;
    $mail->Body    = $$mailContent;
    $mail->AltBody = 'Error while creating the mail content.';

    $mail->send();
}

}
?>