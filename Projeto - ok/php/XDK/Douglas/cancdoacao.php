<?php

include("..\conexao.php"); 


// 4 - Douglas - Função que cancela a doação mudando apenas o idstatusdoacao para 3 (cancelada)
if($_GET['acao'] == 'cancdoacao') // função js em index.html
{
    
		 
     $id = $_GET['id'];  
		 
	 $SQL = "update doacaopendente set idstatusdoacao = 3 where id ='$id'";  

     mysql_query($SQL, $serve);	 

}


?>