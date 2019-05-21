<?php


include("..\conexao.php"); 

// 6 - Douglas função para listar os hemocentros de acordo com o selecionado no combo box
// função js em app.js
$acao = isset($_GET['acao']) ? trim($_GET['acao']) : '';
 
				
			    $cidade = $_GET['cidade'];
			
			
                $sql = "SELECT * FROM hemocentros where cidade ='$cidade'";
				
 
                $qry = mysql_query( $sql );
 
                $num = mysql_num_rows( $qry );
 
                if( $num > 0 ) 
                {   
                    echo '<ul>';
					
                        while( $linha = mysql_fetch_array($qry, MYSQL_ASSOC) )
						{
 
                            list( $lat, $lng ) = explode( ', ', $linha['latlon'] );
 
                            $nome       = $linha['nome'];
                            $endereco   = $linha['endereco'];
                            $cidade     = $linha['cidade'];
 
                            // criação do layout
                            echo '
							<div class="list-block" align="left">
							<li class="item-content">
                                            <div class="item-inner">
                                                <div class="item-title">
                                                    <p style="color:red;"><strong>'.$nome.'</strong></p>
                                                    <p>'.$endereco.'</p>
                                                    <p>'.$cidade.'</p>
                                                </div>
                                            </div>
                                            <img src="images/botao-mapa.png" type="button" id="btnmap" onClick="infoPosicao(\''.$lat.'\', \''.$lng.'\', \'map\');"></img>
                                        </li><div class="list-block">';  
                        }
                        echo '</ul>';
 
                }   else
                    echo '<br> <br> Nenhum Hemocentro cadastrado';
?>             