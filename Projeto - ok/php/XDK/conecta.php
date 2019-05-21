<?php

include("conexao.php"); 
 
$sql="select id, usuario, senha, ultimadoacao, sexo, sangue, idstatususuario, idhemocentros from usuario where usuario='$_POST[usuario]' and senha ='$_POST[senha]'"; 



$resultados = mysql_query($sql)or die (mysql_error());


$array=mysql_fetch_array ($resultados);
$id =$array['id'];	
$usuario =$array['usuario'];	
$senha =$array['senha'];
$ultimadoacao =$array['ultimadoacao'];
$sexo =$array['sexo'];
$sangue  =$array['sangue '];
$idstatususuario =$array['idstatususuario'];
$idhemocentros =$array['idhemocentros'];



if  ($id != 0){
	
	print $id;	
	session_start();
	$_SESSION['id']              = $array['id'];
	$_SESSION['usuario']         = $array['usuario'];
	$_SESSION['senha']           = $array['senha'];
    $_SESSION['ultimadoacao']    = $array['ultimadoacao'];
	$_SESSION['sexo']            = $array['sexo'];
	$_SESSION['sangue']        = $array['sangue'];
	$_SESSION['idstatususuario'] = $array['idstatususuario'];
	$_SESSION['idhemocentros']   = $array['idhemocentros'];
	
	
}

else { 
	//print 0;
} 
//---------------------------------------------------------------------------------------------------------



// 2 - Função para listar hemocentros na barra de menu hemocentros - Lucas PNT
$acao = isset($_GET['acao']) ? trim($_GET['acao']) : '';

           
		   $cidade3 = $_GET['cidade_fim2'];
		   
            if( $acao == 'listahemocentros' ) {
				
			
                $sql = "SELECT * FROM hemocentros where cidade ='$cidade3'";
 
                $qry = mysql_query( $sql );
 
                $num = mysql_num_rows( $qry );
 
                if( $num > 0 ) {
                   
                    echo '<ul>';
					
                        while( $linha = mysql_fetch_array($qry, MYSQL_ASSOC) ) {
 
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
 
                } else
                    echo '<br> <br> Nenhum Hemocentro próximo a você';
            }
//---------------------------------------------------------------------------------------------------------


//LUCAS LAURO - LISTAR CAMPANHAS PRÓXIMAS COM FILTRO POR ESTADO/Cidade
if($_GET['acao'] == 'listando2'){
	
	  $cidade2 = $_GET['cidade2'];
    
	 $SQL = "SELECT cam.* FROM campanhasusuario cam
left join hemocentros hem on hem.id = cam.idhemocentros
where idstatuscampanha = 1 and cidade = '$cidade2' and idusuario !=".$_SESSION['id']."";
	 
	
     if($_SESSION['idstatususuario'] == 1) // se usuario for igual 1 ele será doador então carrega a campanha abaixo
	{	
			$SQL = "SELECT cam.* FROM campanhasusuario cam
left join hemocentros hem on hem.id = cam.idhemocentros
where idstatuscampanha = 1 and cidade = '$cidade2' and idusuario !=".$_SESSION['id']."";
	 
	
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
					$sangue  = $linha['sangue'];
					$id = $linha['id'];
					$exclusiva = $linha['exclusiva'];
					$datacamp = $linha['data'];	
					$datacamp2 = date("d/m/Y", strtotime($datacamp));	   	   
		   
					// criação do layout e passando os dados do id através do botão            										
									
					echo 
									
					"<div class='list-block' align='left'>
					<li class='item-content'>
					<div class='item-inner'>
                    <div class='item-title'>
					<p style='color:red;'><strong>Nome: $nomepessoa</strong>
					<p style='color:red;'><strong>Campanha: $nomecampanha</strong>
					<p>Doações: $qtdatual
					<p>Quantidade solicitada: $qtdsolicitada</p>
					Tipo Sanguineo: $sangue <p><p>
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
				echo '<br> <br> Nenhuma campanha cadastrada para essa cidade';
			}
			
	}
	
	else // se não o usuario será = 2 (hemocentro) e será carregado a campanha abaixo
	{
	
	$SQL = "SELECT cam.* FROM campanhasusuario cam
left join hemocentros hem on hem.id = cam.idhemocentros
where idstatuscampanha = 1 and cidade = '$cidade2' and idusuario !=".$_SESSION['id']."";
	 
	
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
					$sangue  = $linha['sangue'];
					$id = $linha['id'];
					$exclusiva = $linha['exclusiva'];
					$datacamp = $linha['data'];	
					$datacamp2 = date("d/m/Y", strtotime($datacamp));	   	   
		   
					// criação do layout e passando os dados do id através do botão            										
									
					echo 
									
					"<div class='list-block' align='left'>
					<li class='item-content'>
					<div class='item-inner'>
                    <div class='item-title'>
					<p style='color:red;'><strong>Nome: $nomepessoa</strong>
					<p style='color:red;'><strong>Campanha: $nomecampanha</strong>
					<p>Doações: $qtdatual
					<p>Quantidade solicitada: $qtdsolicitada</p>
					Tipo Sanguineo: $sangue <p><p>
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
				echo '<br> <br> Nenhuma campanha cadastrada para essa cidade';
			}
	
	}
	
	}


// Meu Cadastro - Leonardo

if($_GET['acao'] == 'meucadastro'){	  


 $SQL3 = "SELECT *, case when sexo = 'MASCULINO' then DATE_FORMAT(date_add(ultimadoacao, interval 92 day),'%d/%m/%Y') else DATE_FORMAT(date_add(ultimadoacao, interval 62 day),'%d/%m/%Y') end as proximadoacao FROM usuario where usuario = '".$_SESSION['usuario']."'";
   
	 
 
     $re3 = @mysql_query($SQL3, $serve);
 
     $num3 = @mysql_num_rows($re3);
	 
	 $Linha3 =  @mysql_fetch_array($re3);
	 
	                        $listanome       = $Linha3['nome'];
							$listaidade      = $Linha3['idade'];
							$listasexo       = $Linha3['sexo'];
							$listasangue     = $Linha3['sangue'];
							$listapeso       = $Linha3['peso'];
							$listausuario     = $Linha3['usuario'];
							$listaemail     = $Linha3['email'];
							$listatelefone     = $Linha3['telefone'];
							$proximadoacao     = $Linha3['proximadoacao'];
							$idstatususuario     = $Linha3['idstatususuario'];
						
				

echo "<div class='list-block'>
                                    <ul>
                                        <li class='widget uib_w_18' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Nome</div>
                                                    <div class='item-input'>
                                                        <div class='label'>$listanome</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>                                        

                                        <li class='widget uib_w_18' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Idade</div>
                                                    <div class='item-input'>
                                                        <div class='label'>$listaidade</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                          <li class='widget uib_w_18' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Sexo</div>
                                                    <div class='item-input'>
                                                        <div class='label'>$listasexo</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class='widget uib_w_18' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Tipo Sanguíneo</div>
                                                    <div class='item-input'>
                                                        <div class='label'>$listasangue</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
										
										
                                        <li class='widget uib_w_18' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Peso</div>
                                                    <div class='item-input'>
                                                        <div class='label'>$listapeso</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='widget uib_w_25 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Telefone*</div>
                                                    <div class='item-input'>
                                                        <input type='text' value='$listatelefone' id='listatelefone'</input>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='widget uib_w_26 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Email*</div>
                                                    <div class='item-input'>
                                                        <input type='text' value='$listaemail' id='listaemail'></input>
                                                    </div>
                                                </div>
											</div>	
										</li>";
										if($idstatususuario ==1){echo"
										<li class='widget uib_w_26 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Prox. Doação*</div>
                                                    <div class='item-input'>
                                                        <input type='text' value='$proximadoacao' id='proximadoacao'></input>
                                                    </div>
                                                </div>
											</div>	
										</li>";}
										echo"
										 <li class='widget uib_w_27 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Usuário</div>
                                                    <div class=input'item-input'>
                                                        <div class='label'>$listausuario</div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
										</li>
									  <li class='widget uib_w_26 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Nova senha*</div>
                                                    <div class='item-input'>
                                                        <input type='password'  id='listasenha'></input>
                                                    </div>
                                                </div>
											</div>	
										</li>
										
										 <li class='widget uib_w_26 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Confirmar senha*</div>
                                                    <div class='item-input'>
                                                        <input type='password'  id='listasenha2'></input>
                                                    </div>
                                                </div>
											</div>	
										</li>
                                       									
										
								
                                    </ul>
   
</div>";

	
                   
 
                
}


if($_GET['acao'] == 'updateusuario'){

$listatelefone = $_GET['listatelefone'];
$listaemail = $_GET['listaemail'];
$listasenha = $_GET['listasenha'];


	if($listasenha!=""){
		
			$SQL = "update usuario set email='$listaemail',senha='$listasenha' ,telefone='$listatelefone' where usuario = '".$_SESSION['usuario']."'";	
		
	}
	else{
		
			$SQL = "update usuario set email='$listaemail',telefone='$listatelefone' where usuario = '".$_SESSION['usuario']."'";
		
		}

    $re = mysql_query($SQL, $serve);

}

//--------------------------------------------------------------------------------

$acao = isset($_GET['acao']) ? trim($_GET['acao']) : '';



           
            if( $acao == 'listacombohemo' ) {
				
			$cidade = $_GET['cidade1'];
			
			  $SQL = "select concat(id,'-',nome) descricao  from hemocentros where cidade = '$cidade'";
			  $re1 = mysql_query($SQL, $serve);
 
             $num1 = mysql_num_rows($re1);
			$teste = $Linha1->descricao;
             
              
 
     
							echo "<div class='list-block'>
                                    <ul>
									 
                           			<li class='align-top widget uib_w_10003 d-margins' data-uib='framework7/select' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Hemocentro*</div>
                                                    <div class='item-input'>
                                                        <select id='idhemocentros' name='idhemocentros'>";
													   
														if($num1 > 0){
														while($Linha1 = mysql_fetch_object($re1)){
		                                                echo  "<option >{$Linha1->descricao}</option>";}
		    echo"</select>
                                                   </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> 
										
                                        <li class='widget uib_w_18' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Nome paciente*</div>
                                                    <div class='item-input'>
                                                        <input type='text' id='nomepessoa' name='nomepessoa'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='widget uib_w_19' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Nome Campanha*</div>

                                                    <div class='item-input'>
                                                        <input type='text' id='nomecampanha' name='nomecampanha'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class='align-top widget uib_w_24 d-margins' data-uib='framework7/select' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Tipo sanguíneo</div>
                                                    <div class='item-input'>
													<select id='sangue' name='sangue'>";
													
// preenche o campo select com as informações da tabela sangue	
												
													 $SQL = "SELECT * FROM sangues";

     $re = mysql_query($SQL, $serve);
 
     $num = mysql_num_rows($re);

     if($num > 0){
 
           while($Linha = mysql_fetch_object($re)){
		   echo  "<option >{$Linha->descricao}</option>";}
		   
      }
													
													
 // continua com a criação do lsayout                                                       
                                                       echo" </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
							
			
			<li class='align-top widget uib_w_24 d-margins' data-uib='framework7/select' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Exclusiva?*</div>
                                                    <div class='item-input'>
                                                        <select id='exclusiva' name='exclusiva'>
              <option>Sim</option>
              <option>Não</option>
          </select>
                                                   </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
										

                                        <li class='widget uib_w_220 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Qtde. Solicitada</div>
                                                    <div class='item-input'>
                                                        <input type='text' id='qtdsolicitada' name='qtdsolicitada'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class='widget uib_w_27 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Finalidade*</div>
                                                    <div class='item-input'>
                                                        <input type='text' id='finalidade' name='finalidade'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
									
									<font size='2'> *Campanhas exclusivas restringem doações somente a doadores com sangue comptíveis com o sangue solicitado </font>
									
                                </div>
                                       ";
      }
                        }

?>  