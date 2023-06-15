<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language');
$mail->isHTML(true);

$mail->setFrom('example@yandex.ru');
$mail->addAddress('artem-kalantaryan2003@yandex.ru');
$mail->Subject = 'Тех Поддержка';

$title = "Вопрос для ТП";
$body = '<h3>Заявка с сайта https://online-quiz.ru/</h3>';

if (trim(!empty($_POST['name']))) {
  $body .= '<p><strong>ФИО:</strong>  ' . $_POST['name'] . '</p>';
}
if (trim(!empty($_POST['email']))) {
  $body .= '<p><strong>E-mail:</strong>  ' . $_POST['email'] . '</p>';
}
if (trim(!empty($_POST['message']))) {
  $body .= '<p><strong>Сообщение:</strong>  ' . $_POST['message'] . '</p>';
}



$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body    = $body;



if (!$mail->send()) {
  $message = 'Произошла ошибка';
} else {
  $message =  'Данные отправлены!';
}

$response = ['message' => $message];
header('Content-type: application/json');
echo json_encode($response);
