<?php

include("..\conexao.php"); 

// função js em app.js


// 13 - douglas função para montar o layout do cadastro de campanha do hemocentro e listar o sangue no combo box com o select do banco
if($_GET['acao'] == 'montcamp')
{

// criação do layout
echo "<div class='list-block'>
                                    <ul>
									 
                           													
                                        
                                        <li class='widget uib_w_2000' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Campanha: </div>

                                                    <div class='item-input'>
                                                        <input type='text' id='nomecampanha2' name='nomecampanha2'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class='align-top widget uib_w_2001 d-margins' data-uib='framework7/select' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Tipo sanguíneo: </div>
                                                    <div class='item-input'>
													<select id='sangue2' name='sangue2'>";
													
// preenche o campo select com as informações da tabela sangue	
												
													$SQL = "SELECT * FROM sangues";

													$re = mysql_query($SQL, $serve);
 
													$num = mysql_num_rows($re);

													if($num > 0)
													{
 
														while($Linha = mysql_fetch_object($re)){
														echo  "<option >{$Linha->descricao}</option>";}
		   
													}
													
													
 // continua com a criação do lsayout                                                       
                                                       echo" </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
							
			
			<li class='align-top widget uib_w_2002 d-margins' data-uib='framework7/select' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Exclusiva? </div>
                                                    <div class='item-input'>
                                                        <select id='exclusiva2' name='exclusiva2'>
              <option>Sim</option>
              <option>Não</option>
          </select>
                                                   </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
										

                                        <li class='widget uib_w_2003 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Qtde. Solicitada: </div>
                                                    <div class='item-input'>
                                                        <input type='text' id='qtdsolicitada2' name='qtdsolicitada2'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class='widget uib_w_2004 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Finalidade: </div>
                                                    <div class='item-input'>
                                                        <input type='text' id='finalidade2' name='finalidade2'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
									
									<font size='2'> *Campanhas exclusivas restringem doações somente a doadores com sangue comptíveis com o sangue solicitado </font>
									
                                </div>";





}

?>