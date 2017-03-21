<?php

$nome = $_POST['nome'];
$email_reposta =  $_POST['email'];
$telefone =  $_POST['telefone'];
$assunto =  $_POST['assunto'];
$comentario =  $_POST['comentario'];

if (!empty($nome) && !empty($email_reposta) && !empty($telefone) && !empty($assunto) && !empty($comentario) )
{
	echo "Sucesso";
}
else{
	echo "Erro";
}

/*
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
$Mailer->Username = 'contato@santostoledo.com.br';
$Mailer->Password = 'Advocacia2015';
 
// E-Mail do remetente (deve ser o mesmo de quem fez a autenticação
// nesse caso seu_login@gmail.com)
$Mailer->From = 'contato@santostoledo.com.br';
 
// Nome do remetente
$Mailer->FromName = 'Santos Toledo Advogados Associados';
 
// assunto da mensagem
$Mailer->Subject = 'Teste';
 
// corpo da mensagem
$Mailer->Body = 'Mensagem em HTML';
 
// corpo da mensagem em modo texto
$Mailer->AltBody = 'Mensagem em texto';
 
// adiciona destinatário (pode ser chamado inúmeras vezes)
$Mailer->AddAddress('a-a-martins@bol.com.br');
 
// adiciona um anexo
//$Mailer->AddAttachment('arquivo.pdf');
 
// verifica se enviou corretamente
if ($Mailer->Send())
{
	echo "Enviado com sucesso";
}
else
{
	echo 'Erro do PHPMailer: ' . $Mailer->ErrorInfo;
}
*/
?>