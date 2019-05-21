<?php

include("..\conexao.php"); 

// 6 - Douglas - Função para concluir a doação pendente e atualiza as tabelas, também verifica se já deu a quantidade e altera seu status
if($_GET['acao'] == 'fazdoacao') //função em index.html

{
    		 
     $id = $_GET['id'];  
	
	// soma a quantidade na campanha selecionada	
	 $SQL = "update campanhasusuario set qtdatual = qtdatual + 1 where id in (select idcampanhasusuario from doacaopendente where id='$id')";  

     mysql_query($SQL, $serve);	 
	 
	// muda o status da doação pendente do usuario para 2 (concluida) 
	 $SQL1 = "update doacaopendente set idstatusdoacao = 2 where id ='$id'";
	 
	 mysql_query($SQL1, $serve);

	 // altera a nova data de doação do usuario no banco
     $SQL3 = "update usuario set ultimadoacao = current_date where id = ".$_SESSION['id']."";

     mysql_query($SQL3, $serve);	
	 
	 // cadastra a data da doaçaõ na tabela
     $SQL7 = "update doacaopendente set datadoacao = current_date where id ='$id'";

     mysql_query($SQL7, $serve);	

	// seleciona o id da campanha do usuario (criador da campanha) através da doação pendente (doador) e joga esse id dentro do select que traz as informações da campanha
     $SQL5 = "select * from campanhasusuario where id in (select idcampanhasusuario from doacaopendente where id='$id')";
	 
     $re5 = mysql_query($SQL5, $serve);
 
     $num5 = mysql_num_rows($re5);
	 
     $Linha5 =  mysql_fetch_array($re5);
	 
	                        $qtdatual      = $Linha5['qtdatual'];
                            $qtdsolicitada = $Linha5['qtdsolicitada'];

	 if ($qtdatual == $qtdsolicitada)
	 {
	//após trazer as informações e jogar nas variaveis ele testa abaixo quando elas forem iguais para mudar o status da campanha para 2 = campanha concluida
     $SQL6 = "UPDATE campanhasusuario SET idstatuscampanha = 2 where id in (select idcampanhasusuario from doacaopendente where id='$id')";	
		
     mysql_query($SQL6, $serve);

	 $SQL8 = "UPDATE campanhasusuario SET dataconclusao = current_date where id in (select idcampanhasusuario from doacaopendente where id = '$id')";	
		
     mysql_query($SQL8, $serve);	 

	 }
}



?>