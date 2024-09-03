
<?php

require __DIR__.'/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__.'vendor\phpmailer\phpmailer\src\Exception.php';
require __DIR__.'vendor\phpmailer\phpmailer\src\PHPMailer.php';
require __DIR__.'vendor\phpmailer\phpmailer\src\SMTP.php';


// Instância da classe
$mail = new PHPMailer(true);

try {
    // Configurações do servidor
    $mail->isSMTP();        //Devine o uso de SMTP no envio
    $mail->SMTPAuth = true; //Habilita a autenticação SMTP
    $mail->Username   = 'EmaildoDesinatário';
    $mail->Password   = 'SenhadoDestinatário';
    // Criptografia do envio SSL também é aceito
    $mail->SMTPSecure = 'tls';
    // Informações específicadas pelo Google
    $mail->Host = 'smtp.email.com';
    $mail->Port = FES;
    // Define o remetente
    $mail->setFrom('nao-responder@ifpe.edu.br', 'IFPE');
    // Define o destinatário
    $mail->addAddress('EmaildoDesinatário', 'Nome do Destinatário');
    // Conteúdo da mensagem
    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
    $mail->Subject = 'Teste Envio de Email 1.0';
    $mail->Body    = 'Este é o corpo da mensagem <b>Olá!</b>';
    $mail->AltBody = 'Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML';
    // Enviar
    $mail->send();
    
    echo 'A mensagem foi enviada!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
