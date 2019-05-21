<?php

session_start();
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$serve = @mysql_connect('localhost', 'root', ''); // conexão com o banco
if(!$serve){ echo 'erro';}
$db = @mysql_select_db('bancodoarmais', $serve);

if($_GET['acao'] == 'criacadhemo'){	


// criação do lsayout
echo "<div class='list-block'>
                                    <ul>
                                        <li class='widget uib_w_38' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Nome Fantasia*</div>
                                                    <div class='item-input'>
                                                        <input type='text' id='nomefantasia' name='nomefantasia'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='widget uib_w_39' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Razão Social*</div>
                                                    <div class='item-input'>
                                                        <input type='text' id='razaosocial' name='razaosocial'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='widget uib_w_40' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Site*</div>
                                                    <div class='item-input'>
                                                        <input type='url' placeholder='www.seusite.com.br'  id='site' name='site'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='widget uib_w_41 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>E-mail*</div>
                                                    <div class='item-input'>
                                                        <input type='email' placeholder='email@email.com' id='emailhemo' name='emailhemo'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
										<li class='widget uib_w_41 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Telefone*</div>
                                                    <div class='item-input'>
                                                        <input type='email' placeholder='(xx) xxxx-xxxxx' id='telhemo' name='telhemo'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='widget uib_w_42 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>CNPJ*</div>
                                                    <div class='item-input'>
                                                        <input type='text'  id='cnpj' name='cnpj'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='widget uib_w_43 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Endereço*</div>
                                                    <div class='item-input'>
                                                        <input type='text' id='endereco' name='endereco'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='widget uib_w_44 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>Bairro*</div>
                                                    <div class='item-input'>
                                                        <input type='text' id='bairro' name='bairro'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class='widget uib_w_45 d-margins' data-uib='framework7/input' data-ver='0'>
                                            <div class='item-content'>
                                                <div class='item-inner'>
                                                    <div class='item-title label'>CEP*</div>
                                                    <div class='item-input'>
                                                        <input type='text' id='cep' name='cep'>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
									  
                                      <label class='label-checkbox item-content'>
       
                                            <input type='checkbox' name='cadhemo' id='cadhemo' value='Books'>
                                                  <div class='item-media'>
                                                      <i class='icon icon-form-checkbox'></i>
                                                  </div>
                                                     <div class='item-inner'>
                                                     <div class='item-title'>Li e aceito os termos de uso</div>
                                                  </div>
                                         </label>
										  <a class='uib-graphic-button widget uib_w_521 d-margins btn_tela confirma t media-button-text-bottom' data-uib='media/graphic_button' data-ver='0' 
                                <img>
                                <span class='uib-caption'>Ver termo de uso</span>
                            </a>
                                       </li>	
										
                                    </ul>
                                </div>";							


}

?> 

