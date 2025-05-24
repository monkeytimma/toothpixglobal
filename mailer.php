<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.toothpixglobal.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'email@toothpixglobal.com';                 // SMTP username
$mail->Password = 'email@123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->setFrom('email@toothpixglobal.com', 'Enquiry');
$mail->addAddress('toothpixglobal@gmail.com');     // Add a recipient
$mail->addCC('toothpixreception@gmail.com'); 



$Name = $_POST['Name'];
$Email  = $_POST['Email'];
$Subject = $_POST['Subject'];
$Message = $_POST['Message'];


$mail->addReplyTo($Email, $Name);

$body = <<<EOD

Name : $Name 
Email : $Email 
Contact No : $Subject
Query: $Message

EOD;


$mail->Subject = 'Enquiry';
$mail->Body    = ($body);

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';	
}







/* Results rendered as HTML */
$theResults = <<<EOD
<html>
<head>
<title>sent message</title>
<meta http-equiv="refresh" content="3;URL=http://www.toothpixglobal.com/contact.html">
<style type="text/css">
<!--
body {
background-color: #444; /* You can edit this CSS to match your website*/
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 20px;
font-style: normal;
line-height: normal;
font-weight: normal;
color: #fec001;
text-decoration: none;
padding-top: 200px;
margin-left: 150px;
width: 800px;
}
-->
</style>
</head>
<div align="center">We will contact you as soon as possible</div>
</div>
</body>
</html>
EOD;
echo "$theResults";


?>