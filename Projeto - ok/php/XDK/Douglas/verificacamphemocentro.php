<?php

include("..\conexao.php"); 

//função js em app.js
	
		// 15 - Douglas função para verificar se o usuario é 1 = usuario ou 2 = hemocentros
		if ($_SESSION['idstatususuario'] > 1)
			{
				$id = 2;
				print $id;
	
			}
			
			else
			{
				
				$id = 1;
				print $id;
			}
	
	
?>
