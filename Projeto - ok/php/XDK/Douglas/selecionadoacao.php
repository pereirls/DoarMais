<?php

include("..\conexao.php"); 

// função js em index.html

// 15 - Douglas - função para trazer os dados da campanha selecionada através do botão, tratando data de doação e tipo sanguineo


    $id = $_GET['id'];
	 
	$SQL4 = "SELECT * FROM campanhasusuario where id ='$id'";
	 
    $re4 = mysql_query($SQL4, $serve);
 
    $num4 = mysql_num_rows($re4);
	 
	$Linha4 =  mysql_fetch_array($re4);
	 
	        $sangue  = $Linha4['sangue'];
            $exclusiva = $Linha4['exclusiva'];
			
			
	// Trata os tipos sanguineos compativeis e verifica em qual deles o usuario se encaixa						
    if($_SESSION['sangue'] == 'AB ')
	{
		
	    if($sangue == 'AB ')
	    {
            $status = 'Compativel';
        }
	
        else
	    {
            $status = 'Incompativel';
			$identifica = 2; // Seu tipo sanguineo é incompativel para está campanha, você só pode doar para campanhas AB+
        }
    }
	
	// Trata os tipos sanguineos compativeis e verifica em qual deles o usuario se encaixa	
	if($_SESSION['sangue'] == 'AB-')
	{
		
	    if($sangue == 'AB ' || $sangue == 'AB-')
	    {
            $status = 'Compativel';
        }
		
        else
	    {
            $status = 'Incompativel';
			$identifica = 3; // Seu tipo sanguineo é incompativel para está campanha, você só pode doar para campanhas AB+ e AB-
        }
    }
	
	// Trata os tipos sanguineos compativeis e verifica em qual deles o usuario se encaixa	
	if($_SESSION['sangue'] == 'A ')
	{
		
	    if($sangue == 'A ' || $sangue == 'AB ')
	    {
            $status = 'Compativel';
        }
		
        else
	    {
            $status = 'Incompativel';
			$identifica = 4; // Seu tipo sanguineo é incompativel para está campanha, você só pode doar para campanhas A+ e AB+
        }
    }
	
	// Trata os tipos sanguineos compativeis e verifica em qual deles o usuario se encaixa	
	if($_SESSION['sangue'] == 'A-')
	{
		
	    if($sangue == 'A-' || $sangue == 'A ' || $sangue == 'AB-' || $sangue == 'AB ')
	    {
            $status = 'Compativel';
        }
	
        else
	    {
            $status = 'Incompativel';
			$identifica = 5; // Seu tipo sanguineo é incompativel para está campanha, você só pode doar para campanhas A-, A+, AB-, AB+
        }
    }
	
	// Trata os tipos sanguineos compativeis e verifica em qual deles o usuario se encaixa	
	if($_SESSION['sangue'] == 'B ')
	{
		
	    if($sangue == 'B ' || $sangue == 'AB ')
	    {
            $status = 'Compativel';
        }
		
        else
	    {
            $status = 'Incompativel';
			$identifica = 6; // Seu tipo sanguineo é incompativel para está campanha, você só pode doar para campanhas B+ e AB+
        }
    }
	
	// Trata os tipos sanguineos compativeis e verifica em qual deles o usuario se encaixa	
	if($_SESSION['sangue'] == 'B-')
	{
		
	    if($sangue == 'B-' || $sangue == 'B ' || $sangue == 'AB-' || $sangue == 'AB ')
	    {
            $status = 'Compativel';
        }
	
        else
	    {
            $status = 'Incompativel';
			$identifica = 7; // Seu tipo sanguineo é incompativel para está campanha, você só pode doar para campanhas B-, B+, AB-, AB+
        }
    }
	
	// Trata os tipos sanguineos compativeis e verifica em qual deles o usuario se encaixa	
	if($_SESSION['sangue'] == 'O ')
	{
		
	    if($sangue == 'O ' || $sangue == 'A ' || $sangue == 'B ' || $sangue == 'AB ')
	    {
            $status = 'Compativel';
        }
	
        else
	    {
            $status = 'Incompativel';
			$identifica = 8; // Seu tipo sanguineo é incompativel para está campanha, você só pode doar para campanhas O+, A+, B+, AB+
        }
    }
	
	// Trata os tipos sanguineos compativeis e verifica em qual deles o usuario se encaixa	
	if($_SESSION['sangue'] == 'O-')
	{
        $status = 'Compativel';
    }	
	
	
	//faz um select para verificar se consta alguma doação pendente desse usuario, caso não encontrar nada ele da inicio ao codigo
	$SQL2 = "SELECT * FROM doacaopendente where idstatusdoacao = 1 and idusuario =".$_SESSION['id']."";
	 
    $re2 = mysql_query($SQL2, $serve);
 
    $num2 = mysql_num_rows($re2);

	if( $num2 == 0 )
		{
            // select para pegar a ultima doação do usuario 
            $SQL8 = "select ultimadoacao from usuario where id =".$_SESSION['id']."";
	  
	        $re8 = mysql_query($SQL8, $serve);
 
            $num8 = mysql_num_rows($re8);
	  
	        $Linha8 =  mysql_fetch_array($re8);
	  
	        $ultimadoacao = $Linha8['ultimadoacao'];  // passa a ultima doação para a variavel, pois não posso trabalhar com a sessão porque essa data vai sofrer alteração confome for confirmada a doaçao
	  
	 	 
	            if  ($ultimadoacao != '') // se a data da ultima doação for diferente de nulo
				{		
		 
		            if ($_SESSION['sexo'] == 'Masculino') // se o sexo for masculino
					{

			            $data  =  date ('Y/m/d'); // passa valor da data atual para variavel em ano, mes e dia (o banco trabalhava dessa forma)
						$data2 =  date ('Y/m/d', strtotime("-1 days",strtotime($data))); // porém tem um dia de delay para a data do Brasil, então diminuo 1
			 
						$data3 =  "$ultimadoacao"; // pega a últimadoacao
						$data4 =  date('Y/m/d', strtotime("+90 days",strtotime($data3))); // pega a últimadoacao e soma + 90 dias para o sexo masculino
						
		            }
					
		            else // cai na condição feminina (pois só tem ela)
				    {
						$data  =  date ('Y/m/d'); // passa valor da data atual para variavel em ano, mes e dia (o banco trabalhava dessa forma)
						$data2 =  date('Y/m/d', strtotime("-1 days",strtotime($data))); // porém tem um dia de delay para a data do Brasil, então diminuo 1
			 
						$data3 =  "$ultimadoacao"; // pega a últimadoacao
						$data4 =  date('Y/m/d', strtotime("+60 days",strtotime($data3))); // pega a últimadoacao e soma + 60 dias para o sexo feminino

		            }
		 
			        if ($data4 < $data2) // se a data somada com os dias de espera for menor que a data então o usuario está apto a doar
					{	

                        if ($exclusiva == 'S') // verifica se a campanha é exclusiva, se for ele vai verificar o tipo sanguineo do usuario
						{

							if ($status == 'Compativel')  // verifica se o usuario tem o tipo sanguineo compativel		
							{	 
		 
		
	 
												$SQL = "SELECT * FROM campanhasusuario where id ='$id'";
	 
												$re = mysql_query($SQL, $serve);
 
												$num = mysql_num_rows($re);

												echo '<ul>';
	 
												$Linha =  mysql_fetch_array($re);
	 
												$nomecampanha  = $Linha['nomecampanha'];
												$nomepessoa    = $Linha['nomepessoa'];
												$qtdatual      = $Linha['qtdatual'];
												$qtdsolicitada = $Linha['qtdsolicitada'];
												$finalidade    = $Linha['finalidade'];
												$sangue      = $Linha['sangue'];
	 
                  										
												echo 

												// criação do layout							
								
												"<div class='list-block'>
												<li class='item-content'>
												<div class='item-inner'>
                                                <div class='item-title'>";

												echo utf8_encode("<h3 style='color:red;'>Campanha: $nomecampanha</h3>
												<p><strong>Solicitante:</strong> $nomepessoa
												<p><strong>Finalidade:</strong> $finalidade");												
												echo "
												<p><strong>Doações recebidas:</strong>$qtdatual
												<p><strong>Quantidade solicitada:</strong>$qtdsolicitada												
												<p><strong>Tipo Sanguineo:</strong> $sangue";

												//select para mostrar o endereço do hemocentro escolhido para determinada campanha de acordo com o que o usuario escolheu no cadastro da campanha
												$mostrarbanco = "SELECT * from hemocentros where id in (SELECT h.id from campanhasusuario CP JOIN hemocentros h on h.id=CP.idhemocentros where CP.id ='$id')"; 
	 
												$qry = mysql_query( $mostrarbanco );
 
												$num1 = mysql_num_rows( $qry );
 					
												$linha1 = mysql_fetch_array($qry, MYSQL_ASSOC) ;
 
												list( $lat, $lng ) = explode( ', ', $linha1['latlon'] );
 
												$nome     = $linha1['nome'];
												$endereco = $linha1['endereco'];
												$cidade   = $linha1['cidade'];
 
												// criação do layout
												echo '
							
                                                <p><p><h3 style="color:red;" ><strong>Local para doação</strong></h3>
												<p><strong>'.$nome.'</strong>
                                                <p><strong>'.$endereco.'</strong></p>
                                                <p><strong>'.$cidade.'</strong>
												<p align="left"><img src="images/confirmar.png" type="button" value =$id id=$id onclick="doar('.$id.');"></img>

												</div>
												</div>
                                            
												</li><div class="list-block">'; 
												echo "</ul>";
	  
                            }

                            else 
							{
							
								
								print $identifica; //Seu tipo sanguineo é incompativel para está campanha
                            }

                        }
						
				        else
				        { 

									$SQL = "SELECT * FROM campanhasusuario where id ='$id'";
	 
									$re = mysql_query($SQL, $serve);
 
									$num = mysql_num_rows($re);

									echo '<ul>';
	 
									$Linha =  mysql_fetch_array($re);
	 
									$nomecampanha  = $Linha['nomecampanha'];
									$nomepessoa    = $Linha['nomepessoa'];
									$qtdatual      = $Linha['qtdatual'];
									$qtdsolicitada = $Linha['qtdsolicitada'];
									$finalidade    = $Linha['finalidade'];
									$sangue      = $Linha['sangue'];
	 
                  										
									echo 

									// criação do layout							
								
												"<div class='list-block'>
												<li class='item-content'>
												<div class='item-inner'>
                                                <div class='item-title'>";

												echo utf8_encode("<h3 style='color:red;'>Campanha: $nomecampanha</h3>
												<p><strong>Solicitante:</strong> $nomepessoa
												<p><strong>Finalidade:</strong> $finalidade");												
												echo "
												<p><strong>Doações recebidas:</strong>$qtdatual
												<p><strong>Quantidade solicitada:</strong>$qtdsolicitada												
												<p><strong>Tipo Sanguineo:</strong> $sangue";
	
									//select para mostrar o endereço do hemocentro escolhido para determinada campanha de acordo com o que o usuario escolheu no cadastro da campanha
									$mostrarbanco = "SELECT * from hemocentros where id in (SELECT h.id from campanhasusuario CP JOIN hemocentros h on h.id=CP.idhemocentros where CP.id ='$id')"; 
	 
									$qry = mysql_query( $mostrarbanco );
 
									$num1 = mysql_num_rows( $qry );
 					
									$linha1 = mysql_fetch_array($qry, MYSQL_ASSOC) ;
 
									list( $lat, $lng ) = explode( ', ', $linha1['latlon'] );
 
									$nome     = $linha1['nome'];
									$endereco = $linha1['endereco'];
									$cidade   = $linha1['cidade'];
 
									// criação do layout
												echo '
							
                                                <p><p><h3 style="color:red;" ><strong>Local para doação</strong></h3>
												<p>'.$nome.'
                                                <p>'.$endereco.'</p>
                                                <p>'.$cidade.'
												<p align="left"><img src="images/confirmar.png" type="button" value =$id id=$id onclick="doar('.$id.');"></img>

												</div>
												</div>
                                            
												</li><div class="list-block">'; 
												echo "</ul>";


                  
                        }

                    }

                    else 
					{
						$identifica = 1; // retorna para ajax e ele segue com o if
							print $identifica; //Você não está apto a doar novamente
					
                    }

                }

				else
				{

						if ($exclusiva == 'S')
						{

							if ($status == 'Compativel')
							{				 

								$SQL = "SELECT * FROM campanhasusuario where id ='$id'";
	 
								$re = mysql_query($SQL, $serve);
 
								$num = mysql_num_rows($re);

								echo '<ul>';
	 
								$Linha =  mysql_fetch_array($re);
	 
								$nomecampanha  = $Linha['nomecampanha'];
								$nomepessoa    = $Linha['nomepessoa'];
								$qtdatual      = $Linha['qtdatual'];
								$qtdsolicitada = $Linha['qtdsolicitada'];
								$finalidade    = $Linha['finalidade'];
								$sangue      = $Linha['sangue'];
	 
                  										
								echo 

								// criação do layout							
								
												"<div class='list-block'>
												<li class='item-content'>
												<div class='item-inner'>
                                                <div class='item-title'>";

												echo utf8_encode("<h3 style='color:red;'>Campanha: $nomecampanha</h3>
												<p><strong>Solicitante:</strong> $nomepessoa
												<p><strong>Finalidade:</strong> $finalidade");												
												echo "
												<p><strong>Doações recebidas:</strong>$qtdatual
												<p><strong>Quantidade solicitada:</strong>$qtdsolicitada												
												<p><strong>Tipo Sanguineo:</strong> $sangue";
								
								//select para mostrar o endereço do hemocentro escolhido para determinada campanha de acordo com o que o usuario escolheu no cadastro da campanha
								$mostrarbanco = "SELECT * from hemocentros where id in (SELECT h.id from campanhasusuario CP JOIN hemocentros h on h.id=CP.idhemocentros where CP.id ='$id')";
	 
								$qry = mysql_query( $mostrarbanco );
 
								$num1 = mysql_num_rows( $qry );
 					
								$linha1 = mysql_fetch_array($qry, MYSQL_ASSOC) ;
 
								list( $lat, $lng ) = explode( ', ', $linha1['latlon'] );
 
								$nome     = $linha1['nome'];
								$endereco = $linha1['endereco'];
								$cidade   = $linha1['cidade'];
 
								// criação do layout
												echo '
							
                                                <p><p><h3 style="color:red;" ><strong>Local para doação</strong></h3>
												<p>'.$nome.'
                                                <p>'.$endereco.'</p>
                                                <p>'.$cidade.'
												<p align="left"><img src="images/confirmar.png" type="button" value =$id id=$id onclick="doar('.$id.');"></img>

												</div>
												</div>
                                            
												</li><div class="list-block">'; 
												echo "</ul>";
	  
							}

							else
							{
							
								
								print $identifica; //Seu tipo sanguineo é incompativel para está campanha
								
                            }

						}
						
						else
						{ 

							$SQL = "SELECT * FROM campanhasusuario where id ='$id'";
	 
							$re = mysql_query($SQL, $serve);
 
							$num = mysql_num_rows($re);

							echo '<ul>';
	 
							$Linha =  mysql_fetch_array($re);
	 
	                        $nomecampanha  = $Linha['nomecampanha'];
                            $nomepessoa    = $Linha['nomepessoa'];
                            $qtdatual      = $Linha['qtdatual'];
							$qtdsolicitada = $Linha['qtdsolicitada'];
							$finalidade    = $Linha['finalidade'];
							$sangue      = $Linha['sangue'];
	 
                  										
							echo 

							// criação do layout							
								
												"<div class='list-block'>
												<li class='item-content'>
												<div class='item-inner'>
                                                <div class='item-title'>";

												echo utf8_encode("<h3 style='color:red;'>Campanha: $nomecampanha</h3>
												<p><strong>Solicitante:</strong> $nomepessoa
												<p><strong>Finalidade:</strong> $finalidade");												
												echo "
												<p><strong>Doações recebidas:</strong>$qtdatual
												<p><strong>Quantidade solicitada:</strong>$qtdsolicitada												
												<p><strong>Tipo Sanguineo:</strong> $sangue";

							//select para mostrar o endereço do hemocentro escolhido para determinada campanha de acordo com o que o usuario escolheu no cadastro da campanha 
							$mostrarbanco = "SELECT * from hemocentros where id in (SELECT h.id from campanhasusuario CP JOIN hemocentros h on h.id=CP.idhemocentros where CP.id ='$id')";
	 
							$qry = mysql_query( $mostrarbanco );
 
							$num1 = mysql_num_rows( $qry );
 					
							$linha1 = mysql_fetch_array($qry, MYSQL_ASSOC) ;
 
                            list( $lat, $lng ) = explode( ', ', $linha1['latlon'] );
 
                            $nome     = $linha1['nome'];
                            $endereco = $linha1['endereco'];
                            $cidade   = $linha1['cidade'];
 
							// criação do layout
												echo '
							
                                                <p><p><h3 style="color:red;" ><strong>Local para doação</strong></h3>
												<p>'.$nome.'
                                                <p>'.$endereco.'</p>
                                                <p>'.$cidade.'
												<p align="left"><img src="images/confirmar.png" type="button" value =$id id=$id onclick="doar('.$id.');"></img>

												</div>
												</div>
                                            
												</li><div class="list-block">'; 
												echo "</ul>";


                  
						}

				}

		}

		else
		{
			$identifica = 9; // retorna para ajax e ele segue com o if
			print $identifica; //Você tem doação pendente, cancela-a para adquirir uma nova ou ajude o próximo e confirme-a
		}




?>