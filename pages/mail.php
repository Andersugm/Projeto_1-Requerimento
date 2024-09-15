<?php

//SOLICITAÇÃO DAS CLASSES
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//SOLICITAÇÃO DO AUTOLOAD + BANCO
require '../vendor/autoload.php';
require_once 'db.php';

//INSTANCIA E DÁ TRUE PARA PERMITIR EXCESSÕES
$mail = new PHPMailer(true);

try {
    //CONFIGS DO SERVER
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                          //APRESENTA O DEBUG NO TERMINAL
    $mail->isSMTP();                                                //DEFINE O ENVIO POR SMTP
    $mail->SMTPAuth   = true;                                       //HABILITA A AUTENTICAÇÃO
    $mail->Host       = 'EndereçoDoSeuHostSMTP';                    //HOST DO ENVIO
    $mail->Username   = 'SeuUserNameSTMP';                          //USERNAME DO SMTP
    $mail->Password   = 'SuaSenhaSMTP';                             //PASSWORD DO SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;             //DEFINE A ENCRIPTAÇÃO
    $mail->Port       = 587;                                        //PORTA TCP PARA CONEXÃO; usar 587 se tiver setado SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
    $mail->CharSet    = 'UTF-8';                                    //PADRONIZA OS CARACTERES

    //CONFIGURA O EMAIL DE ENVIO E QUEM ENVIOU
    $mail->setFrom('EmailDoRemetente', 'NomeDoRemetente');                     //DEFINE O EMAIL E NOME DO REMETENTE
    $mail->addAddress('EmailDoDestinatário', 'NomeDoDestinatário');            //DEFINE EMAIL E NOME DO DESTINATÁRIO
    //$mail->addAddress('tekomonakama.teste@gmail.com');                       //ADICIONA PARA MULTIPLOS ENVIOS (COMO OS ANEXOS)
    $mail->addReplyTo('no-reply@sre.ifpe.com', 'IFPE');                        //ENDEREÇO DE NO-REPLY E NOME

    //PARA ENVIAR CÓPIAS
    //$mail->addCC('cc@example.com');

    //PARA CÓPIAS SEM IDENTIFICAR
    //$mail->addBCC('bcc@example.com');

    //DEFINE O CAMINHO DA PASTA A SER BUSCADA
    $attachmentDir = 'C:\xampp\htdocs\Projeto_1\Attachments';

    //PEGA OS ARQUIVOS DO DIRETÓRIO (ATENÇÃO AO CAMINHO ACIMA)
    $files = array_slice(scandir($attachmentDir), 2); //RETIRA . e ..

    //INICIALIZAÇÃO DAS VARIÁVEIS
    $attachment_pdf1 = $attachment_pdf2 = $attachment_pdf3 = $attachment_pdf4 = $attachment_pdf5 = null;

    //PARA ADD OS ARQUIVOS NAS VARIÁVEIS
    foreach ($files as $index => $file) {
        $filePath = $attachmentDir . DIRECTORY_SEPARATOR . $file;
        $attachmentVar = 'attachment_pdf' . ($index + 1);

        if (file_exists($filePath)) {
            $$attachmentVar = file_get_contents($filePath);
        }

        //LIMITE
        if ($index == 4) {
            break;
        }
    }

    //ANEXA OS ARQUIVOS NO EMAIL A PARTIR DAS VARIÁVEIS E COM NOMES PADRONIZADOS
    if ($attachment_pdf1) {
        $mail->addStringAttachment($attachment_pdf1, 'anexo_sre_1.pdf');
    }
    if ($attachment_pdf2) {
        $mail->addStringAttachment($attachment_pdf2, 'anexo_sre_2.pdf');
    }
    if ($attachment_pdf3) {
        $mail->addStringAttachment($attachment_pdf3, 'anexo_sre_3.pdf');
    }
    if ($attachment_pdf4) {
        $mail->addStringAttachment($attachment_pdf4, 'anexo_sre_4.pdf');
    }
    if ($attachment_pdf5) {
        $mail->addStringAttachment($attachment_pdf5, 'anexo_sre_5.pdf');
    }

    //CORPO E CABEÇALHO
    $mail->isHTML(true);                                  //SETA O FORMATO PARA HTML
    $mail->Subject = 'Requisição de Aluno - By SRE';      //DEFINE O "ASSUNTO" DO EMAIL
    $mail->Body = '                                       
    <p>Prezado(a),</p> 
    <p>Estamos encaminhando este e-mail em resposta à solicitação realizada por um aluno do campus. Em anexo, você encontrará o PDF referente ao requerimento solicitado e, se necessários, os documentos adicionais.</p> 
    <p>Se precisar de mais informações ou suporte, por favor, não hesite em nos contatar.</p> 
    <p>At.te,</p> 
    <p><strong>Sistema de Requerimento do Estudante - SRE</strong><br> 
    <a href="mailto:sre.teste@outlook.com">sre.teste@outlook.com</a></p>
    '; //DEFINIÇÃO DO CORPO ACIMA

    //PARA QUEM NÃO ACEITA HTML NO CORPO
    //$mail->AltBody = 'XXXXXXXXXXXXXX';

    //ENVIA O E-MAIL
    $mail->send();

    echo 'Message has been sent'; //PARA O DEBUG
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}"; //PARA O DEBUG
}
