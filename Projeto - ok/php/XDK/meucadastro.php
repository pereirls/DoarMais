<?php


include("..\conexao.php"); 

if($_GET['acao'] == 'meucadastro'){	  


 $SQL3 = "SELECT * FROM usuario where usuario = ".$_SESSION['usuario']."";
   
	 
 
     $re3 = mysql_query($SQL3, $serve);
 
     $num3 = mysql_num_rows($re3);
	 
	 $Linha3 =  mysql_fetch_array($re3);
	 
	                        $listanome       = $Linha3['nome'];
							$listaidade      = $Linha3['idade'];
							$listasexo       = $Linha3['sexo'];
							$listasangue     = $Linha3['sangue'];
							$listapeso       = $Linha3['peso'];
							$listausuario     = $Linha3['usuario'];
							$listaemail     = $Linha3['email'];
							$listatelefone     = $Linha3['telefone'];
                          
				

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
                                                    <div class='item-title label'>Telefone</div>
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
										</li>
										
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
                                                    <div class='item-title label'>Nova senha</div>
                                                    <div class='item-input'>
                                                        <input type='password'  id='listasenha'></input>
                                                    </div>
                                                </div>
											</div>	
										</li>
										
										 <li class='widget uib_w_26 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Confirmar senha</div>
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


?>  