<?php

include("..\conexao.php"); 

// função js em app.js

//8 - Douglas Função de cadastro de usuarios - Douglas
if($_GET['acao']=='inclusaous')
{

    $nome = $_GET['nome'];
	$idade = $_GET['idade'];
	$sexo = $_GET['sexo'];
	$peso = $_GET['peso'];
	$telefone = $_GET['telefone'];
	$email = $_GET['email'];
	$usuarioinclud = $_GET['usuarioinclud'];
	$senhainclud = $_GET['senhainclud'];
	$ultimadoacao = $_GET['ultimadoacao'];
	$sangue1 = $_GET['sangue1'];
	$idstatususuario = 1;
	
		
	    
    $SQL = "INSERT INTO usuario (nome, idade, sexo, peso, telefone, email, usuario, senha, ultimadoacao, sangue, idstatususuario) VALUES ('$nome', '$idade', '$sexo', '$peso', '$telefone', '$email', '$usuarioinclud', '$senhainclud', '$ultimadoacao', '$sangue1', '$idstatususuario')";

    $re = mysql_query($SQL, $serve);
}	

?> 