<?php

include("..\conexao.php"); 
//função js em index.html
// 7 - Douglas cadastra a doação no banco, porém como pendente, ainda não atualiza a quantidade
if($_GET['acao']=='inclusaodoacao')
{

    $idstatusdoacao  = 1;
	$idcampanhasusuario  = $_GET['id'];
	
	    
    $SQL = "INSERT INTO doacaopendente (idstatusdoacao, idusuario, idcampanhasusuario) VALUES ('$idstatusdoacao', ".$_SESSION['id'].", '$idcampanhasusuario')";

    $re = mysql_query($SQL, $serve);

}

?> 