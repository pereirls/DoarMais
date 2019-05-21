<?php

include("..\conexao.php"); 


// 3 - Douglas - Função para cancelar a campanha do usuario altera o idstatuscampanha para 3 (cancelada)
if($_GET['acao'] == 'cancamp') // função js em index.html
{
    
		 
     $id = $_GET['id'];  
		 
	 $SQL = "update campanhasusuario set idstatuscampanha = 3 where id ='$id'";  

     mysql_query($SQL, $serve);	 

}


?>