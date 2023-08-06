 <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer-6.8.0/src/Exception.php';
    require 'PHPMailer-6.8.0/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'PHPMailer-6.8.0/language/');
    $mail->IsHTML(true);

    $mail->setFrom('forroyalee2@gmail.com', 'OP Consulting');
    $mail->addAddress('example@gmail.com');
    $mail->Subject = 'HI';

    $body = '<h1>Новый пользователь оставил данные!</h1>';

    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Имя: </strong>'.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['email']))){
        $body.='<p><strong>E-mail: </strong>'.$_POST['email'].'</p>';
    }
    if(trim(!empty($_POST['phone']))){
        $body.='<p><strong>Номер: </strong>'.$_POST['phone'].'</p>';
    }

    $mail->Body = $body;

    if(!$mail->send()){
        $message = 'Ошибка';
    }else{
        $message = 'Данные отправлены!';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>