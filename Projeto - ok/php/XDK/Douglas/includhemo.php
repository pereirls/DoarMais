<?php

include("..\conexao.php"); 

//5 - Função de cadastro de usuarios - Douglas
if($_GET['acao']=='includhemo')
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
	

	
		
	    
    $SQL = "INSERT INTO hemocentros (nome, rsocial, site, email, cnpj, endereco,bairro, cep,cidade,latlon,telefone) VALUES ('$nomefantasia', '$razaosocial', '$site', '$emailhemo', '$cnpj', '$endereco', '$bairro', '$cep','null','null','$telhemo')";

    $re = mysql_query($SQL, $serve);
}	

?> 