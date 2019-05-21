<?php

include("..\conexao.php"); 

// 2 - Douglas Função de cadastro de campanhas para hemocentros, cada um tem sua individualidade
if($_GET['acao']=='cadastrarcampanhahemo') // função js em app.js
{

	// aqui está selecionando os dados do hemocentro de acordo com o hemocentro logado
	$SQL = "select * from hemocentros where id =".$_SESSION['idhemocentros'].""; 
	
	$re = mysql_query($SQL, $serve);
 
    $num = mysql_num_rows($re);
	  
	$Linha =  mysql_fetch_array($re);
	  
	$nomehemocentro		= $Linha['nome'];
    $nomecampanha2 		= $_GET['nomecampanha2'];
	$finalidade2 		= $_GET['finalidade2'];
	$qtdsolicitada2 	= $_GET['qtdsolicitada2'];
	$sangue2 			= $_GET['sangue2'];
	$qtdatual2 			= 0;
	$idstatuscampanha2 	= 1;
	$idhemocentros2 			= $Linha['id'];
	$exclusiva2 		= $_GET['exclusiva2'];
	
	$SQL2 = "INSERT INTO campanhasusuario (nomepessoa, nomecampanha, finalidade, qtdsolicitada, sangue, qtdatual, idstatuscampanha, idhemocentros, idusuario, data, exclusiva) VALUES ('$nomehemocentro', '$nomecampanha2', '$finalidade2', '$qtdsolicitada2', '$sangue2', '$qtdatual2', '$idstatuscampanha2', '$idhemocentros2', ".$_SESSION['id'].",current_date,'$exclusiva2')";

    $re2 = mysql_query($SQL2, $serve);

}
?>