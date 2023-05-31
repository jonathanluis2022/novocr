<?php

    use PHPMailer\PHPMailer\PHPMailer;
    require 'vendor/autoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'jonathan.luisrodrigues@hotmail.com';
    $mail->Password = '32234971drycka';

    $mail->setFrom('jonathan.luisrodrigues@hotmail.com', "bugsJhow");
    $mail->addAddress('mojem74007@duscore.com');
    $mail->Subject = 'E-mail de teste';

    $mail->Body = "<h1> Email enviado com sucesso! </h1> <p> Deu tudo certo </p>";

    if($mail->send())
        echo "E-mail enviado com sucesso ";
    else
        echo " Falha ao enviar email ";


?>