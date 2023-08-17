<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'PHPMailer-6.8.0/language/');
$mail->isHTML(true);

//от кого письмо
$mail->setFrom( 'kiss173@mail.ru', 'Новый заказчик');
//кому отправить
$mail->addAddress('OksanaDubikW@yandex.ru');
//тема письма
$mail->Subject = 'Новый заказ';

//Есть идея?
$sketch ="Эскиз заказчика";
if($_POST['sketch'] == "noIdea"){
    $sketch = "Эскиз мастера";
}

$body='<h1>Новый заказ</h1>';
//****************************//
//$name = $_POST['name'];
//$email = $_POST['email'];
//$sketch ="Эскиз заказчика";
//if($_POST['sketch'] == "noIdea"){
//    $sketch = "Эскиз мастера";
//}
//$choice  = $_POST['choice'];
//$message = $_POST['message'];
//$body = $name . " " . $email . " " . $sketch . " " . $choice . " " . $message;
//$theme = "[Заявка]";
//$mail->addAddress("OksanaDubikW@yandex.ru");
//$mail->Subject = $theme;
//$mail->Body = $body;

//*****************************************//
if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Имя:</strong> ' .$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))){
    $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
}

if(trim(!empty($_POST['sketch']))){
    $body.='<p><strong>Эскиз:</strong> '.$sketch.'</p>';
}
if(trim(!empty($_POST['choice']))){
    $body.='<p><strong>Фронт работы:</strong> '.$_POST['choice'].'</p>';
}
if(trim(!empty($_POST['message']))){
    $body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
}

//Прикрепить файл
if(!empty($_FILES['image']['tmp_name'])){
    //путь загрузки файла
    $filePath = __DIR__ . "/files/" . $_FILES['image']['name'];
    //грузим файл
    if(copy($_FILES['image']['tmp_name'], $filePath)){
        $fileAttach = $filePath;
        $body.='<p><strong>Фото в приложении</strong></p>';
        $mail->addAttachment($fileAttach);
    }
}

$mail->Body = $body;

//отправляем
if(!$mail->send()){
    $message = 'Ошибка';
} else {
    $message = 'Данные отправлены';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
