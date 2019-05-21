<?php

// 5 - Douglas função js em index_user_scrips
include("..\conexao.php"); 

    $usuario = $_POST['usuario']; // variavel recebe o valor através da função escodoacao do botão uib_w_6 (index_user_scrips)
     
	$SQL="select idstatususuario from usuario where usuario='$usuario'"; // seleciona o idstatususuario do usuario

    $resultados = mysql_query($SQL, $serve);

    $array=mysql_fetch_array ($resultados);
	
    $idstatususuario = $array['idstatususuario'];	// guarda o resultado na variavel

	print $idstatususuario;	// resultado é retornado para o ajax e ele retorna o que será feito

?>  