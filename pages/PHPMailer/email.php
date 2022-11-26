<?php
require 'vendor/autoload.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth(); 
$mail->SMTPSecure =  'ss1';
?>