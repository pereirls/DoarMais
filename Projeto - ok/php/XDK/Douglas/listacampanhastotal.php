<?php

include("..\conexao.php"); 


//função js em index.html, app.js e inder_user_scripts

//11 - Douglas Lista todas as campanhas com exceção as do usuario logo após ele efetuar o login
if($_GET['acao'] == 'listacampanhastotal')
{

	$cidade3 = $_GET['cidade_fim2']; // recebe valor da localização do usuario

	if($_SESSION['idstatususuario'] == 1) // se usuario for igual 1 ele será doador então carrega a campanha abaixo
	{	
			$SQL = "SELECT cam.* FROM campanhasusuario cam
left join hemocentros hem on hem.id = cam.idhemocentros
where idstatuscampanha = 1 and cidade = '$cidade3' and idusuario !=".$_SESSION['id']."";
	 
	
			$qry  = mysql_query($SQL, $serve);
 
			$num = mysql_num_rows($qry);

			if($num > 0)
			{
 
                  
				while($linha = mysql_fetch_array($qry))
				{
		   
					$nomepessoa = $linha['nomepessoa'];
					$nomecampanha = $linha['nomecampanha'];
					$qtdatual = $linha['qtdatual'];
					$qtdsolicitada = $linha['qtdsolicitada'];
					$sangue = $linha['sangue'];
					$id = $linha['id'];
					$exclusiva = $linha['exclusiva'];
					$datacamp = $linha['data'];	
					$datacamp2 = date("d/m/Y", strtotime($datacamp));	   	   
		   
					// criação do layout e passando os dados do id através do botão            										
									
					echo 
									
					utf8_encode("<div class='list-block' align='left'>
					<li class='item-content'>
					<div class='item-inner'>
                    <div class='item-title'>
					<p style='color:red;'><strong>Nome: $nomepessoa</strong>
					<p style='color:red;'><strong>Campanha: $nomecampanha</strong>");
					echo "<p>Doações: $qtdatual
					<p>Quantidade solicitada: $qtdsolicitada</p>
					Tipo Sanguineo: $sangue<p><p>
					Exclusiva: $exclusiva<p><p>
					Criada em: $datacamp2 &nbsp &nbsp &nbsp 
					</div>
					</div>
					<input type='image' src='images/doar.png' value =$id id=$id onclick='clica($id);' >
					</li><div class='list-block'>"; 
					
				}	
					echo "</ul>";	
					
					

			
			}
			
			else
			{
				echo '<br> <br> Nenhuma campanha próximo a você cadastrada';
			}
			
	}
	
	else // se não o usuario será = 2 (hemocentro) e será carregado a campanha abaixo
	{
	
	$SQL = "SELECT cam.* FROM campanhasusuario cam
left join hemocentros hem on hem.id = cam.idhemocentros
where idstatuscampanha = 1 and cidade = '$cidade3' and idusuario !=".$_SESSION['id']."";
	 
	
			$qry  = mysql_query($SQL, $serve);
 
			$num = mysql_num_rows($qry);

			if($num > 0)
			{
 
                  
				while($linha = mysql_fetch_array($qry))
				{
		   
					$nomepessoa = $linha['nomepessoa'];
					$nomecampanha = $linha['nomecampanha'];
					$qtdatual = $linha['qtdatual'];
					$qtdsolicitada = $linha['qtdsolicitada'];
					$sangue = $linha['sangue'];
					$id = $linha['id'];
					$exclusiva = $linha['exclusiva'];
					$datacamp = $linha['data'];	
					$datacamp2 = date("d/m/Y", strtotime($datacamp));	   	   
		   
					// criação do layout e passando os dados do id através do botão            										
									
					echo 
									
					utf8_encode("<div class='list-block' align='left'>
					<li class='item-content'>
					<div class='item-inner'>
                    <div class='item-title'>
					<p style='color:red;'><strong>Nome: $nomepessoa</strong>
					<p style='color:red;'><strong>Campanha: $nomecampanha</strong>");
					echo "<p>Doações: $qtdatual
					<p>Quantidade solicitada: $qtdsolicitada</p>
					Tipo Sanguineo: $sangue<p><p>
					Exclusiva: $exclusiva<p><p>
					Criada em: $datacamp2 &nbsp &nbsp &nbsp 
					</div>
					</div>
					</li><div class='list-block'>";
					
				}	
					echo "</ul>";	
					
					

			
			}
			
			else
			{
				echo '<br> <br> Nenhuma campanha próximo a você cadastrada';
			}
	
	}
}
?>