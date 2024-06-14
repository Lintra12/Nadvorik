<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPmailer.php';

  $mail = new PHPMailer(true);
  $mail->CharSet = 'UTF-8';
  $mail->setLanguage('ua', 'phpmailer/language/');
  $mail->IsHTML(true);

  $mail->addAddress('uko.don@gmail.com');

  $body = '<h1>Заявка отримана консультантом</h1>';

  if(trim(!empty($_POST['name']))){
    $body.= '<p><strong>name:</strong> '.$_POST['name'].'</p>';
  }

  if (trim(!empty($_POST['phone']))) {
    $body .= '<p><strong>phone:</strong> ' . $_POST['phone'] . '</p>';
  }

  $mail->Body = $body;

  if (!$mail->send()) {
    $massage = "Помилка";
  } else {
    $massage = 'Заявка надіслана';
  }

  $response = ['message' => $message];

  header('Content-type: aplication/json');
  echo json_encode($response);
?>
