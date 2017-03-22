<?php

$nome = utf8_decode($_POST['nome']);
$email_reposta =  utf8_decode($_POST['email']);
$telefone =  utf8_decode($_POST['telefone']);
$assunto =  utf8_decode($_POST['assunto']);
$comentario =  utf8_decode($_POST['comentario']);

/*
if (!empty($nome) && !empty($email_reposta) && !empty($telefone) && !empty($assunto) && !empty($comentario) )
{
	echo "Sucesso";
}
else{
	echo "Erro";
}
*/

$corpoEmail = '<html>';
$corpoEmail.='<head><meta charset="utf-8" /></head>';
$corpoEmail .= '<body>';
$corpoEmail .= '<p> Seu contato foi enviado pelo nosso site.</p>';
$corpoEmail .= '<br/><br/><br/>';
$corpoEmail .= '<b>Nome: </b>'.$nome.' <br/>';
$corpoEmail .= '<b>Email: </b>'.$email_reposta.' <br/>';
$corpoEmail .= '<b>Telefone: </b>'.$telefone.' <br/>';
$corpoEmail .= '<b>Assunto: </b>'.$assunto.' <br/>';
$corpoEmail .= '<b>Descrição: </b>'.$comentario.' <br/>';
$corpoEmail .= '<br/><br/><br/>';
$corpoEmail .= '<p> Entraremos em contato o mais breve possível. </p>';
$corpoEmail .= '</body>';
$corpoEmail .= '</html>';


////error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('America/Toronto');

require_once('src/class.smtp.php');
require_once('src/class.phpmailer.php');

$Mailer = new PHPMailer();
 
// define que será usado SMTP
$Mailer->IsSMTP();
 
// envia email HTML
$Mailer->isHTML(true);
 
// codificação UTF-8, a codificação mais usada recentemente
$Mailer->Charset = 'UTF-8';
 
// Configurações do SMTP
$Mailer->SMTPAuth = true;
$Mailer->SMTPSecure = 'ssl';
$Mailer->Host = 'smtpout.secureserver.net';
$Mailer->Port = 465;
$Mailer->Username = 'site@santostoledo.com.br';
$Mailer->Password = 'Advocacia2015';
 
// E-Mail do remetente (deve ser o mesmo de quem fez a autenticação
// nesse caso seu_login@gmail.com)
$Mailer->From = 'site@santostoledo.com.br';
 
// Nome do remetente
$Mailer->FromName = 'Santos Toledo Advogados Associados';
 
// assunto da mensagem
$Mailer->Subject = 'Enviado pelo Site:'.$assunto;
 
// corpo da mensagem
$Mailer->Body = utf8_decode($corpoEmail);
 
// corpo da mensagem em modo texto
//$Mailer->AltBody = 'Mensagem em texto';
 
// adiciona destinatário (pode ser chamado inúmeras vezes)
$Mailer->AddAddress('contato@santostoledo.com.br');
$Mailer->AddCC($email_reposta);

// adiciona um anexo
//$Mailer->AddAttachment('arquivo.pdf');
 
// verifica se enviou corretamente
if ($Mailer->Send())
{
	echo "Sucesso";
}
else
{
	echo 'Erro';
}

