<?php

include("..\conexao.php"); 

// função js em index.html e index_user_script

// 10 - Douglas função para listar as campanhas pendentes do usuario quando ele clicar no botão 'doações pendentes'
if($_GET['acao'] == 'listadoacoesconcluidas')

{
     	
	// select feito com join para trazer informações da campanha do usuario filtrando onde o status da campanha for 1 de acordo com o usuario		 
	 $SQL = "select cp.nomecampanha, dp.id id,idstatusdoacao,datadoacao, dp.idcampanhasusuario from doacaopendente dp
join campanhasusuario cp on cp.id = dp.idcampanhasusuario where idstatusdoacao = 2 and dp.idusuario =".$_SESSION['id']." and datadoacao is not null";
	 
     $re = mysql_query($SQL, $serve);
 
     $num = mysql_num_rows($re);

	 if( $num > 0 )
		{
	 
	        echo '<ul>';
	 
            while($Linha =  mysql_fetch_array($re))
			            {
	 
	                        $id                 = $Linha['id'];
                            $idstatusdoacao     = $Linha['idstatusdoacao'];
                            $datadoacao         = $Linha['datadoacao'];
							$datadoacao2        = date("d/m/Y", strtotime($datadoacao));								
							$nomecampanha       = $Linha['nomecampanha'];
							$idcampanhasusuario = $Linha['idcampanhasusuario'];
							 
                            // criação do layout

                            echo "
							<div class='list-block' align='left'>
							<li class='item-content'>
                                            <div class='item-inner'>
                                                <div class='item-title'>";
                                                    echo utf8_encode("<p style='color:red;'><strong>Campanha: $nomecampanha</strong></p>");
                                                    echo "
													<p>Data doação: $datadoacao2</p> 
													
	
                                                </div>
                                            </div>
                                        </li><div class='list-block'>"; 
				        }
									 
                            echo "</ul>";
 
        } 
		else
           echo "<a class='uib-graphic-button widget media-button-text-bottom fontalista' data-uib='media/graphic_button' data-ver='0'>
                                <img>
                                <span class='uib-caption'><p style='color:red;'><strong>Nenhuma doação realizada!!!</p></span>
                            </a>";
} 

?>