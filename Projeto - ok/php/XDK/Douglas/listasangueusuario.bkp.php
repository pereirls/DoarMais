<?php

include("..\conexao.php"); 

//função js em app.js


// 12 - Douglas função para criar o layout do cadastro de usuario e listar os sangues no combo box com o select
if($_GET['acao'] == 'listasangueusuario')
{	


// criação do lsayout
echo "<div class='list-block'>
                                    <ul>
                                        <li class='widget uib_w_18' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Nome*</div>
                                                    <div class='item-input'>
                                                        <input type='text'onblur='javascript:verificanome(this)' id='nome' name='nome'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>                                        

                                        <li class='widget uib_w_18' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Idade*</div>
                                                    <div class='item-input'>
                                                        <input type='text'onblur='javascript:verificaidade(this)' id='idade' name='idade'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class='align-top widget uib_w_23 d-margins' data-uib='framework7/select' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Sexo</div>
                                                    <div class='item-input'>
                                                        <select id='sexo' name='sexo'>
                                                            <option>Masculino</option>
                                                            <option>Feminino</option>
                                                        </select></div>
                                                    </div>
                                                </div>
                                            </li>

                                        <li class='align-top widget uib_w_103 d-margins' data-uib='framework7/select' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Tipo sanguíneo</div>
                                                    <div class='item-input'>
                                                        <select id='sangue1' name='sangue1'>";
													
													
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
                                        <li class='widget uib_w_36 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Peso*</div>
                                                    <div class='item-input'>
                                                        <input type='number' onblur='javascript:verificapeso(this)' placeholder='KG' id='peso' name='peso'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='widget uib_w_25 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Telefone</div>
                                                    <div class='item-input'>
                                                        <input type='tel' placeholder='(xx)xxxx-xxxx' id='telefone' name='telefone'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='widget uib_w_26 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Email*</div>
                                                    <div class='item-input'>
                                                        <input type='email' placeholder='email@email.com' id='email' name='email'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='widget uib_w_27 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Usuário*</div>
                                                    <div class='item-input'>
                                                        <input type='text'onblur='javascript:verificausuario(this)' id='usuarioinclud' name='usuarioinclud'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='widget uib_w_28 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Senha*</div>
                                                    <div class='item-input'>
                                                        <input type='password'onblur='javascript:verificasenha(this)' placeholder='***********' id='senhainclud' name='senhainclud'>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                        <li class='widget uib_w_300' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Última doacao</div>

                                                    <div class='item-input'>
                                                        <input type='date'  id='ultimadoacao' name='ultimadoacao'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                       <li>
									  
                                      <label class='label-checkbox item-content'>
       
                                            <input type='checkbox' id='cadus' name='cadus' value='Books'>
                                                  <div class='item-media'>
                                                      <i class='icon icon-form-checkbox'></i>
                                                  </div>
                                                     <div class='item-inner'>
                                                     <div class='item-title'>Li e aceito os termos de uso</div>
                                                  </div>
                                         </label>
										  <a class='uib-graphic-button widget uib_w_520 d-margins btn_tela confirma t media-button-text-bottom' data-uib='media/graphic_button' data-ver='0' 
                                <img>
                                <span class='uib-caption'>Ver termo de uso</span>
                            </a>
                                       </li>
                                    </ul>
                                </div>";							


}

?> 

