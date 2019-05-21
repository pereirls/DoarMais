<?php

include("..\conexao.php"); 

// função js em index.html e index_user_script

// 10 - Douglas função para listar as campanhas pendentes do usuario quando ele clicar no botão 'doações pendentes'
if($_GET['acao'] == 'listacampanhaspendentes')

{
     	
	// select feito com join para trazer informações da campanha do usuario filtrando onde o status da campanha for 1 de acordo com o usuario		 
	 $SQL = "select cp.nomecampanha, cp.nomepessoa, qtdatual,qtdsolicitada,dp.id id,idstatusdoacao,dp.idcampanhasusuario from doacaopendente dp
join campanhasusuario cp on cp.id = dp.idcampanhasusuario where idstatusdoacao = 1 and dp.idusuario =".$_SESSION['id']."";
	 
     $re = mysql_query($SQL, $serve);
 
     $num = mysql_num_rows($re);

	 if( $num > 0 )
		{
	 
	        echo '<ul>';
	 
            while($Linha =  mysql_fetch_array($re))
			            {
	 
	                        $id                 = $Linha['id'];
                            $idstatusdoacao     = $Linha['idstatusdoacao'];
                            $idcampanhasusuario = $Linha['idcampanhasusuario'];
							$qtdatual           = $Linha['qtdatual'];
							$qtdsolicitada      = $Linha['qtdsolicitada'];
							$nomecampanha       = $Linha['nomecampanha'];
							$nomepessoa         = $Linha['nomepessoa'];
							 
                            // criação do layout

                            echo "
							<div class='list-block' align='left'>
							<li class='item-content'>
                                            <div class='item-inner'>
                                                <div class='item-title'>";
                                                    echo utf8_encode ("<p style='color:red;'><strong>Nome: $nomepessoa</strong></p>
													<p style='color:red;'><strong>Campanha: $nomecampanha</strong></p>");
                                                    echo "
													<p><strong>Doações: $qtdatual</strong></p>
                                                    <p><strong>Quantidade Solicitada: $qtdsolicitada</strong></p>";

												$mostrarbanco = "SELECT * from hemocentros where id in (SELECT h.id from campanhasusuario CP JOIN hemocentros h on h.id=CP.idhemocentros where CP.id in (select idcampanhasusuario from doacaopendente where idusuario =".$_SESSION['id']." and idstatusdoacao = 1))";
	 
												$qry = mysql_query( $mostrarbanco );
 
												$num1 = mysql_num_rows( $qry );
 					
												$linha1 = mysql_fetch_array($qry, MYSQL_ASSOC) ;													

												$nome     = $linha1['nome'];
												$endereco = $linha1['endereco'];
												$cidade   = $linha1['cidade'];

												echo "<p><p><h3 style='color:red;' ><strong>Local para doação</strong></h3>
												<p><strong>$nome</strong>
                                                <p><strong>$endereco</strong></p>
                                                <p><strong>$cidade</strong>
												
												<input type='image' value =$id id=$id onclick='concluidoacao($id);' src='images/confirmar.png'/>
												<input type='image' value =$id id=$id onclick='cancelar($id);' src='images/cancelar.png'/><p><p>
												

												</div>
												</div>
                                            
												</li><div class='list-block'>"; 
												echo "</ul>";

					    }
        } 
		else
           echo "<a class='uib-graphic-button widget media-button-text-bottom fontalista' data-uib='media/graphic_button' data-ver='0'>
                                <img>
                                <span class='uib-caption'><p><strong>Nenhuma doação pendente</p></span>
                            </a>  ";
} 

?>