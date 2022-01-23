<?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   require 'PHPMailer/src/Exception.php';
   require 'PHPMailer/src/PHPMailer.php';

   $mail = new PHPMailer(true);
   $mail->CharSet = 'UTF-8';
   $mail->setLanguage('ru', 'PHPMailer/language/');
   $mail->IsHTML(true);

   $mail->setForm('info@fls.guru', 'MiNISO');
   $mail->addAddress('dimon.bond200508@gmail.com');
   $mail->Subject = 'Hi! I am MiNISO';
   
   $body = '<h1>New Message!</h1>';
   if(trim(!empty($_POST['name']))) {
      $body.='<p><strong>Name:</strong> '.$_POST['name'].'</p>';
   }
   if(trim(!empty($_POST['email']))) {
      $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
   }
   if(trim(!empty($_POST['message']))) {
      $body.='<p><strong>Name:</strong> '.$_POST['message'].'</p>';
   }

   $mail->Body = $body;

   if(!$mail->send()) {
      $message = 'Error';
   }else {
      $message = 'Data is send!';
   }

   $response = ['message' => $message];

   header('Content-type: application/json');
   echo json_encode($response);
?>