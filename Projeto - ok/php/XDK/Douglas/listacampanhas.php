<?php

include("..\conexao.php"); 

// função js em app.js, index_user_scripts e index.html

// 9 - Função para listar as campanhas do proprio usuario - Douglas
if($_GET['acao'] == 'listacampanhas')
{
    // seleciona as campanhas do usuario, porém somente as pendentes
	$SQL = "SELECT * FROM campanhasusuario where idstatuscampanha = 1 and idusuario =".$_SESSION['id']."";
	 	
    $qry  = mysql_query($SQL, $serve);
 
    $num = mysql_num_rows($qry);

    if($num > 0)
	{
 
            echo '<ul>';
			
           while($linha = mysql_fetch_array($qry))
		   {
		   
		   
		   $nomecampanha = $linha['nomecampanha'];
           $qtdatual = $linha['qtdatual'];
           $qtdsolicitada = $linha['qtdsolicitada'];
		   $sangue = $linha['sangue'];
		   $id = $linha['id'];
		   $exclusiva = $linha['exclusiva'];
		   $datacamp = $linha['data'];	
           $datacamp2 = date("d/m/Y", strtotime($datacamp));   	   
		   
    // criação do layout e passando os dados do id através do botão            										
									 echo "
							<div class='list-block' align='left'>
							<li class='item-content'>
                                            <div class='item-inner'>
                                                <div class='item-title'>";
												
												echo utf8_encode("
                                                    <p style='color:red;'><strong>Campanha: $nomecampanha</strong></p>
                                                    <p> Qtd Atual/Solicitada: &nbsp;$qtdatual/$qtdsolicitada</p>
                                                    <p> Tipo Sanguineo: $sangue</p>	
													<p> Exclusiva: $exclusiva</p>");
													echo "
													<p> Data: $datacamp2</p>
													<p> <input type='image' value =$id id=$id onclick='cancelarcamp($id);' src='images/cancelar.png'/></p>		
																									
													
	
                                                </div>
                                            </div>
                                        </li><div class='list-block'>"; 
				        }
									 
                            echo "</ul>";
 
        } 
		else
           echo "<a class='uib-graphic-button widget media-button-text-bottom fontalista' data-uib='media/graphic_button' data-ver='0'>
                                <img>
                                <span class='uib-caption'><p style='color:red;'><strong>Nenhuma campanha cadastrada!!!</p></span>
                            </a>";
} 

?>