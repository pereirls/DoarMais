<?php

include("..\conexao.php"); 
require 'PHPMailer/PHPMailerAutoload.php';
header('Content-Type: text/html; charset=UTF-8');
// função js em app.js

//8 - Douglas Função de cadastro de usuarios - Douglas
if($_GET['acao']=='recuperar')
{
	$email = $_GET['recupemail'];
	
	$sql="select * from usuario where email = '$email'";



$resultados = mysql_query($sql)or die (mysql_error());


$array=mysql_fetch_array ($resultados);
$user = utf8_encode ($array ['usuario']);
$senha =$array['senha'];
$emailr =$array['email'];	
$nome = $array['nome'];

 if ($user != ''){
	$Mailer = new PHPMailer();
	
	//Define que será usado SMTP
	$Mailer->IsSMTP();
	
	//Enviar e-mail em HTML
	$Mailer->isHTML(true);
	
	//Aceitar carasteres especiais
	$Mailer->Charset = 'UTF-8';
	
	//Configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'tls';
	
	//nome do servidor
	$Mailer->Host = 'smtp.live.com';
	//Porta de saida de e-mail 
	$Mailer->Port = 587;
	
	//Dados do e-mail de saida - autenticação
	$Mailer->Username = 'lucas_sp100@hotmail.com';
	$Mailer->Password = 'maira1325';
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = 'lukinha.lauro@hotmail.com';
	
	//Nome do Remetente
	$Mailer->FromName = 'Doar +';
	
	//Assunto da mensagem
	$Mailer->Subject = utf8_decode("Recuperação de Senha");
	
	//Corpo da Mensagem
	$Mailer->Body = utf8_decode("<h3>Olá $nome,</h3><strong>
<br><h>Você acabou de solicitar seus dados para login no aplicativo Doar +. Seguem abaixo:</h>
<br><strong><h>Usuário:</h></strong>$user
<br><strong><h>Senha:</h></strong>$senha

<br><h>Atenciosamente,</h>
<br><h><strong>Equipe Doar +<h><strong>");
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = "	
Olá $nome,
Você acabou de solicitar seus dados para login no aplicativo Doar +. Seguem abaixo:

Usuário: $user
Senha: $senha

Atenciosamente,
Equipe Doar +
";
	
	//Destinatario 
	$Mailer->AddAddress($email);
	
	if($Mailer->Send()){
		echo "E-mail enviado com sucesso";
	}else{
		echo "Erro no envio do e-mail:";
 }}else{
		echo "E-mail não encontrado.";
 }

}	

?> 