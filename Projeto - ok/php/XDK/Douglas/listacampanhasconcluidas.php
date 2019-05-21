<?php

include("..\conexao.php"); 

// função js em index.html e index_user_script

// 10 - Douglas função para listar as campanhas pendentes do usuario quando ele clicar no botão 'doações pendentes'
if($_GET['acao'] == 'listacampanhasconcluidas')

{
     	
	// select feito com join para trazer informações da campanha do usuario filtrando onde o status da campanha for 1 de acordo com o usuario		 
	 $SQL = "select * from campanhasusuario id where idstatuscampanha = 2 and idusuario = ".$_SESSION['id']."";
	 
     $re = mysql_query($SQL, $serve);
 
     $num = mysql_num_rows($re);

	 if( $num > 0 )
		{
	 
	        echo '<ul>';
	 
            while($Linha =  mysql_fetch_array($re))
			            {
	 
	                        
                            
							
							$nomecampanha       = $Linha['nomecampanha'];
							$sangue           = $Linha['sangue'];
							$qtdatual           = $Linha['qtdatual'];
							$qtdsolicitada      = $Linha['qtdsolicitada'];
							$data               = $Linha['data'];
							$data2              = date("d/m/Y", strtotime($data));
							$dataconclusao      = $Linha['dataconclusao'];
							$dataconclusao2     = date("d/m/Y", strtotime($dataconclusao));
							
							 
                            // criação do layout

                            echo "
							<div class='list-block' align='left'>
							<li class='item-content'>
                                            <div class='item-inner'>
                                                <div class='item-title'>
                                                    <p style='color:red;'><strong>Campanha: $nomecampanha</strong></p>
													<p> Qtd Atual/Solicitada: &nbsp;$qtdatual/$qtdsolicitada</p>
                                                    <p>Tipo Sanguineo: $sangue</p>
                                                    <p>Data abertura: $data2</p>		
													<p>Data Conclusão: $dataconclusao2</p>													
													
	
                                                </div>
                                            </div>
                                        </li><div class='list-block'>"; 
				        }
									 
                            echo "</ul>";
 
        } 
		else
           echo "<a class='uib-graphic-button widget media-button-text-bottom fontalista' data-uib='media/graphic_button' data-ver='0'>
                                <img>
                                <span class='uib-caption'><p style='color:red;'><strong>Nenhuma campanha concluida!!!</p></span>
                            </a>";
} 

?>