<?php

include("..\conexao.php"); 
require 'PHPMailer/PHPMailerAutoload.php';
header('Content-Type: text/html; charset=UTF-8');
//5 - Função de cadastro de usuarios - Douglas
if($_GET['acao']=='enviaemail')
{

    $nomefantasia = $_GET['nomefantasia'];
	$razaosocial = $_GET['razaosocial'];
	$site = $_GET['site'];
	$emailhemo = $_GET['emailhemo'];
	$cnpj = $_GET['cnpj'];
	$endereco = $_GET['endereco'];
	$bairro = $_GET['bairro'];
	$cep = $_GET['cep'];
	$telhemo = $_GET['telhemo'];
	
	
	
	
	
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
	$Mailer->Username = 'nao-responda.doarmais@hotmail.com';
	$Mailer->Password = 'doar12345';
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = 'nao-responda.doarmais@hotmail.com';
	
	//Nome do Remetente
	$Mailer->FromName = 'Doar +';
	
	//Assunto da mensagem
	$Mailer->Subject = 'Novo Cadastro de Hemocentro';
	
	//Corpo da Mensagem
	$Mailer->Body =utf8_decode( "<h3>Novo cadastro de hemocentro efetuado, abaixo as informações:</h3><strong><h>Nome Fantasia :</h></strong>$nomefantasia
<br><strong><h>Site :</h></strong>$site
<br><strong><h>Telefone :</h></strong>$telhemo
<br><strong><h>CNPJ :</h></strong>$cnpj
<br><strong><h>Endereço :</h></strong>$endereco
<br><strong><h>Bairro :</h></strong>$bairro
<br><strong><h>CEP :</h></strong>$cep");
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = "Novo cadastro de hemocentro efetuado, abaixo as informaçoes:Nome Fantasia :$nomefantasia
Site :$site
Telefone: $telhemo
CNPJ :$cnpj
Endereço :$endereco
Bairro :$bairro
CEP :$cep
";
	
	//Destinatario 
	$Mailer->AddAddress('nao-responda.doarmais@hotmail.com');
	
	if($Mailer->Send()){
		echo "E-mail enviado com sucesso";
	}else{
		echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
	}
	}
	?>