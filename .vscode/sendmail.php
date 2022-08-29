<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 require 'phpmailer/src/Exception.php';
 require 'phpmailer/src/PHPMailer.php';

 $mail = new PHPMailer(true);
 $mail->Charset = 'UTF-8';
 $mail->setLanguage('en', 'phpmailer/language/' );
 $mail->IsHTML(true);
// от кого письмо
 $mail->setForm('miningpoolivan1@gmail.com','Amber Global');
//  кому отправить
 $mail->addAdress('ivan_@ua.fm');
//  тема письма
$mail->Subject = 'Amber Clients';
// тело письма
$body = '<h1>Встречайте супер письмо!</h1>';

if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Name:</strong> '.$_POST['name'].'</p>';

}
if(trim(!empty($_POST['email']))){
    $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';

}

if(trim(!empty($_POST['message']))){
    $body.='<p><strong>Comment:</strong> '.$_POST['message'].'</p>';

}
$mail->Body = $body;

if (!$mail->send()){
    $message = 'Error';

} else {
     $message = 'Send!';

}
$response = ['message' => $message];

header('Çontent-type: application/json');
echo json_encode($response);

?>