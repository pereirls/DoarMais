$( document ).ready(function()
{
                    var $server;
                    $server = 'http://10.10.10.110/XDK/';
					$('#errolog').hide(); //Esconde o elemento com id errolog
					
// 1 - Lucas, PNT, Nigra
$(document).ready(function(){
	$('#esconderlistahemocentros').hide();
    $('#esconderlista').hide();	
	$('#esconderlistandocamp').hide();	
	$('#esconderlistacampanhas').hide();	
	
	$('#formlogin').submit(function(){ 	//Ao submeter formulário
		var usuario=$('#usuario').val();	//Pega valor do campo usuario
		var senha=$('#senha').val();	//Pega valor do campo senha		
		

		$.ajax({			//Função AJAX
			url: $server+"conecta.php",			//Arquivo php
			type:"post",				//Método de envio
			data: "usuario="+usuario+"&senha="+senha,	//Dados
   			success: function (result){			//Sucesso no AJAX
                		if(result!=0){	
						$('#escondermap').hide();
						$('#esconder1').hide();
						$('#esconder2').hide();
						$('#esconder3').show();
						
						
					
						var onSuccess = function(position) {
		
		latitude =  position.coords.latitude;
        longitude = position.coords.longitude; 
		

};
						    
							function onError(error) {
    alert('code: '    + error.code    + '\n' +
          'message: ' + error.message + '\n');
}
		navigator.geolocation.getCurrentPosition(onSuccess, onError);
		
		function reverseGeocode(){
  lat = latitude;
  lng = longitude;

  var latlng = new google.maps.LatLng(lat,lng);
  var geocoder = new google.maps.Geocoder();
  geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[1]) {
               cidade = (results[2].formatted_address);
			   cidade_quebrada = cidade.split('-');
			   cidade_fim = (cidade_quebrada[0].split(','));
			   cidade_fim2 = cidade_fim[0];
				
				
				function listacamptotal(){							
							
                            $.ajax({
								
                               type: "get",
                               dataType  : 'html',
                               url: $server+"/Douglas/listacampanhastotal.php",
                               data: "cidade_fim2="+cidade_fim2+"&acao=listacampanhastotal",
                               success: function(data) {							   
									$('#esconderlistandocamp').hide();
									$('#esconderlistacampanhas').show();
								
                                    $('#listacampanhastotal').html(data);
									activate_subpage("#page_88_26");
									
									
									     function maikolgay(){
                        
                                        
                    var leogay = document.getElementById('usuario').value;
                       var lucasgay = document.getElementById('senha').value;
         
                        if ((leogay != "")&&(lucasgay !="")){
                         $.ajax({
                                           type: "post",
                               dataType  : 'html',
                               url: $server+"consulta_apto.php",
                               data: "leogay="+leogay,
                               success: function(msg) {
                                   if($.trim(msg) === "S")
                                    navigator.notification.alert('Você está apto a doar novamente', maikolgay,'Parabens','OK')
									//alert ('Você está apto a doar novamente');
									
									document.getElementById('usuario').value="";
                                    document.getElementById('senha').value="";
                                   
                                }
								                          
                           });
						   
                        }
}
     
        
       maikolgay();
									
                                }
                           });
                    }

                 listacamptotal();

			   

      } else {
        alert('Não foi possível identificar sua 	localização');
      }
    } else {
      alert('Geocoder failed due to: ' + status);
    }
  });
}
			reverseGeocode();
                			
							
							

							
							
                		}else{
                			$('#errolog').show();		//Informa o erro	
                		}
            		}
		})
		return false;	//Evita que a página seja atualizada
	});
});
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------
					
					
// 1 - Douglas
					$('#filtrar').on('click', function() // função para listar o hemocentro seleciona atráves do combo box
					{
					 
                        $cidade = $('#cidade').val(); // recebe valor do campo cidade atráves do combo box criado no html com a api do google
                          
						    function filtrahemo()
						    {
                                $.ajax({

                                type: "get", // tipo de dado
                                dataType  : 'html',
                                url: $server+"/Douglas/filtrarhemocentros.php", // faz a chamada do arquivo php
                                data: "cidade="+$cidade, // passa dados
                                success: function(data) // executa os comandos abaixo caso tenha sucesso
							              {
											  $('#esconderlistalistando').show();
                                	          $('#esconderlistahemocentros').hide();	// esconde a div onde mostra todos os hemocentros					   
                                              $('#listando').html(data); // chama a div no html e constroi a lista com os dados do php

                                          }
                                      });
                            }

                            filtrahemo();		

                    });	
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------
					
// 2 - Douglas
					$('#filtrarp').on('click', function() // função para listar o hemocentro seleciona atráves do combo box
					{
					 
						var onSuccess = function(position)
						{
		
							latitude =  position.coords.latitude;
							longitude = position.coords.longitude; 

						}; 
		                   
					function onError(error)
					{
						alert('code: '    + error.code    + '\n' + 'message: ' + error.message + '\n');
					}
					
					navigator.geolocation.getCurrentPosition(onSuccess, onError);
		
					function reverseGeocode()
					{
						lat = latitude;
						lng = longitude;

						var latlng = new google.maps.LatLng(lat,lng);
						var geocoder = new google.maps.Geocoder();
						geocoder.geocode({'latLng': latlng}, function(results, status)
						{
							if (status == google.maps.GeocoderStatus.OK)
								{
									if (results[1])
									{
										cidade = (results[2].formatted_address);
										cidade_quebrada = cidade.split('-');
										cidade_fim = (cidade_quebrada[0].split(','));
										cidade_fim2 = cidade_fim[0];
			
				
										function listahemogeo()
										{							
							
											$.ajax(
											{
								
												type: "get",
												dataType  : 'html',
												url: $server+"/conecta.php",
												data: "cidade_fim2="+cidade_fim2+"&acao=listahemocentros",
												success: function(data)
												{	
							   
													$('#esconderlistalistando').hide();
									
													$('#esconderlistahemocentros').show();
									
													$('#listahemocentros').html(data);
                              
												}
											});
										}						

										listahemogeo();
										
										activate_subpage("#hemocentros");
			   

									}
									else 
										{
											alert('Não foi possível identificar sua 	localização');
										}
								}
								else 
									{
										alert('Geocoder failed due to: ' + status);
									}
						});
					}
					
					reverseGeocode();

                    });	
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------
					
// 3 - Douglas
					$( document ).ready(function() // função que chama o layout da pagina cadastro de usuario e lista o sangue no combo box
					{
                                          
                            function ListaSangueUsuario()
							{
                                $.ajax({

                                type: "get", // tipo de dado 
                                dataType  : 'html',
                                url: $server+"/Douglas/listasangueusuario.php", // faz a chamada do arquivo php
                                data: "acao=listasangueusuario", // executa os comandos abaixo caso tenha sucesso
                                success: function(data)
								         {
                                              $('#listasangueusuario').html(data); // chama a div no html e constroi a lista com os dados do php
                                         }
                                      });
                            }

                            ListaSangueUsuario();

                    });
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------
					
// 4 - Douglas
					$('#inclusaohemo').on('click', function()
					{
                        
						exc1 =$('#exclusiva2').val();
						ex1 = exc1.substring(0,1);
                                                                                      
                        $nomecampanha2 = $('#nomecampanha2').val();
                        $finalidade2 = $('#finalidade2').val(); 
                        $qtdsolicitada2 = $('#qtdsolicitada2').val();
                        $sangue2 = $('#sangue2').val();
                        $exclusiva2 = ex1;
         
						if(($nomecampanha2!="")&&($finalidade2!="")&&($qtdsolicitada2!=0))
						{
							$.ajax(
								{
								type: "get",
								url: $server+"/Douglas/cadastrarcampanhahemo.php",
								data:"nomecampanha2="+$nomecampanha2+"&finalidade2="+$finalidade2+"&qtdsolicitada2="+$qtdsolicitada2+"&sangue2="+$sangue2+"&exclusiva2="+$exclusiva2+"&acao=cadastrarcampanhahemo",
								sucess: function (data)
								{

								}
								
								})
									function listacamp2()
									{
										$.ajax(
										{

											type: "get",
											dataType  : 'html',
											url: $server+"/Douglas/listacampanhas.php",
											data: "acao=listacampanhas",
											success: function(data)
											{
												$('#listacampanhas').html(data);
											}
										});
									}

									listacamp2();
									
									alert ("Campanha cadastrada com sucesso!");
									
									$('#esconder1').show();
									$('#esconder2').hide();
									$('#esconder3').hide();

									activate_subpage("#minhacampanhas");

									document.getElementById('nomepessoa').value="";
									
									document.getElementById('nomecampanha').value="";

									document.getElementById('qtdsolicitada').value="";
									
									document.getElementById('finalidade').value="";


						}
							else
							{

								alert("Preencha/Verifique os campos com ' * '")

							}								
                    });
					 
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------

					
// 2 - Lucas		
    
    
    
      $( document ).ready(function() // função que chama o layout da pagina cadastro de usuario e lista o sangue no combo box
					{
                                          
                            function criacadhemo()
							{
                                $.ajax({

                                type: "get", // tipo de dado 
                                dataType  : 'html',
                                url: $server+"/Douglas/criacadhemo.php", // faz a chamada do arquivo php
                                data: "acao=criacadhemo", // executa os comandos abaixo caso tenha sucesso
                                success: function(data)
								         {
                                              $('#criacadhemo').html(data); // chama a div no html e constroi a lista com os dados do php
                                         }
                                      });
                            }

                            criacadhemo();

                    });
     
    
      $('#includhemo').on('click', function() {

$nomefantasia = $('#nomefantasia').val();

$razaosocial = $('#razaosocial').val();

$site = $('#site').val();

$emailhemo = $('#emailhemo').val();

$telhemo = $('#telhemo').val();

$cnpj = $('#cnpj').val();

$endereco = $('#endereco').val();

$bairro = $('#bairro').val();

$cep = $('#cep').val();



if($('#cadhemo').is(':checked')){

if(($nomefantasia!="")&&($razaosocial!="")&&($site!="")&&($emailhemo!="")&&($telhemo!="")&&($cnpj!="")&&($endereco!="")&&($bairro!="")&&($cep!="")){

$.ajax({

type: "get",

url: $server+"/Douglas/includhemo.php",

data:"nomefantasia="+$nomefantasia+"&razaosocial="+$razaosocial+"&site="+$site+"&emailhemo="+$emailhemo+"&telhemo="+$telhemo+"&cnpj="+$cnpj+"&endereco="+$endereco+"&bairro="+$bairro+"&cep="+$cep+"&acao=includhemo",

sucess: function (data) {

}

})

$.ajax({

type: "get",

url: $server+"/Douglas/enviaemail.php",

data:"nomefantasia="+$nomefantasia+"&razaosocial="+$razaosocial+"&site="+$site+"&emailhemo="+$emailhemo+"&cnpj="+$cnpj+"&endereco="+$endereco+"&bairro="+$bairro+"&cep="+$cep+"&acao=enviaemail",

sucess: function (data) {

}

})

alert ("Pré-Cadastrado efetuado com sucesso!");

activate_page("#mainpage");

if(document.getElementById('nomefantasia').value!="") {

document.getElementById('nomefantasia').value="";

document.getElementById('razaosocial').value="";

document.getElementById('site').value="";

document.getElementById('emailhemo').value="";

document.getElementById('cnpj').value="";

document.getElementById('endereco').value="";

document.getElementById('bairro').value="";

document.getElementById('cep').value="";

}}

else {

alert("Preencha/Verifique os campos com ' * '")

}

}

else{

alert("É necessário aceitar os termos de uso")

}

});
    
    
   $('#inclusaous').on('click', function() {

$nome = $('#nome').val();

$idade = $('#idade').val();

$sexo = $('#sexo').val();

$peso = $('#peso').val();

$telefone = $('#telefone').val();

$email = $('#email').val();

$usuarioinclud = $('#usuarioinclud').val();

$senhainclud = $('#senhainclud').val();

$ultimadoacao = $('#ultimadoacao').val();

$sangue1 = $('#sangue1').val();
       
       
       
        $usuarioinclud = $('#usuarioinclud').val();
                           $.ajax({

                               type: "get",
                               dataType  : 'html',
                               url: $server+"Douglas/testausuario.php",
                               data: "usuarioinclud="+$usuarioinclud+"&acao=testausuario",
                               success: function(data) {
                                 if(data==="0"){
       
       

if($('#cadus').is(':checked')){

if(($nome!="")&&($idade>18)&&($idade!="")&&($peso>50)&&($peso!="")&&(email!="")&&($usuarioinclud.length>6)&&($usuarioinclud!="")&&($senhainclud.length>6)&&($usuarioinclud!="")&&(email!="")){

$.ajax({

type: "get",

url: $server+"/Douglas/inclusaous.php",

data:"nome="+$nome+"&idade="+$idade+"&sexo="+$sexo+"&peso="+$peso+"&telefone="+$telefone+"&email="+$email+"&usuarioinclud="+$usuarioinclud+"&senhainclud="+$senhainclud+"&ultimadoacao="+$ultimadoacao+"&sangue1="+$sangue1+"&acao=inclusaous",

sucess: function (data) {

}

})

alert ("Cadastrado efetuado com sucesso!");

activate_page("#mainpage");

if(document.getElementById('nome').value!="") {

document.getElementById('nome').value="";

document.getElementById('idade').value="";

document.getElementById('peso').value="";

document.getElementById('telefone').value="";

document.getElementById('email').value="";

document.getElementById('usuarioinclud').value="";

document.getElementById('senhainclud').value="";

document.getElementById('ultimadoacao').value="";

document.getElementById('cadus').value="check";

}}

else {

alert("Preencha/Verifique os campos com ' * '")

}

}

else{

alert("É necessário aceitar os termos de uso")

}
 }
                                   else {alert('Usuário já existente')}
								 

								 

                                }
                           });
});
    
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	
// 3 - Lucas	
     $('#inclusao').on('click', function(){
                        
                    exc =$('#exclusiva').val();
                    ex = exc.substring(0,1);
                    
                    he = $('#idhemocentros').val();
                    hem = he.split("-");
                    hemo = hem[0];
                  
                        
                        $nomepessoa = $('#nomepessoa').val();
                        $nomecampanha = $('#nomecampanha').val();
                        $finalidade = $('#finalidade').val(); 
                        $qtdsolicitada = $('#qtdsolicitada').val();
                        $sangue = $('#sangue').val();
                        $idhemocentros = hemo;
                        $exclusiva = ex;
         
      if(($nomepessoa!="")&&($nomecampanha!="")&&($finalidade!="")&&($qtdsolicitada!=0)){
                        $.ajax({
                            type: "get",
                            url: $server+"/Douglas/cadastrarcampanha.php",
                               data:"nomepessoa="+$nomepessoa+"&nomecampanha="+$nomecampanha+"&finalidade="+$finalidade+"&qtdsolicitada="+$qtdsolicitada+"&sangue="+$sangue+"&idhemocentros="+$idhemocentros+"&exclusiva="+$exclusiva+"&acao=inclusao",
                            sucess: function (data) {
                                
                             
                               
                            }
                         });
                        function listacamp1(){
                           $.ajax({

                               type: "get",
                               dataType  : 'html',
                               url: $server+"/Douglas/listacampanhas.php",
                               data: "acao=listacampanhas",
                               success: function(data) {
                                    $('#listacampanhas').html(data);
                                }
                           });
                    }

                 listacamp1();
                        alert ("Campanha cadastrada com sucesso!");
								$('#esconder1').show();
								$('#esconder2').hide();
								$('#esconder3').hide();

                                activate_subpage("#minhacampanhas");

                               
                                   document.getElementById('nomepessoa').value="";
                                   document.getElementById('nomecampanha').value="";

                                   document.getElementById('qtdsolicitada').value="";
                                   document.getElementById('finalidade').value="";


}
         else {

alert("Preencha/Verifique os campos com ' * '")

}
                     });
					 					 					

// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------

															
// 4 - Lucas															 
     $('#filtrar1').on('click', function(){
                        $cidade1 = $('#cidade1').val();
                          var cid = $('#cidade1').val();
						  function filtrahemo1(){
                           $.ajax({

                               type: "get",
                               dataType  : 'html',
                               url: $server+"/conecta.php",
                               data: "cidade1="+$cidade1+"&acao=listacombohemo",
                               success: function(data) {
                                    $('#listacombohemo1').hide();	
                                    $('#listacombohemo').html(data);
                    
                  
                                }
                           });
                    }

                 filtrahemo1();		
        
        

});			
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// 2 - PNT
					 $('#filtrarcamp').on('click', function(){
                        $cidade2 = $('#cidade2').val();
                          
						  function filtracamp(){
                           $.ajax({

                               type: "get",
                               dataType  : 'html',
                               url: $server+"/conecta.php",
                               data: "cidade2="+$cidade2+"&acao=listando2",
                               success: function(data) {
                                	$('#esconderlistacampanhas').hide();
									$('#esconderlistandocamp').show();
                                    $('#listandocamp').html(data);

                                }
                           });
                    }

                 filtracamp();		

});					  
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------- 
           
		   $('#filtrarcamp2').on('click', function(){
                        $('#esconder1').hide();
		$('#esconder2').hide();
		$('#esconder3').show();
         
        activate_subpage("#page_88_26"); 
		var onSuccess = function(position) {
		
		latitude =  position.coords.latitude;
        longitude = position.coords.longitude; 
		

}; 
		                   
                 function onError(error) {
    alert('code: '    + error.code    + '\n' +
          'message: ' + error.message + '\n');
}
		navigator.geolocation.getCurrentPosition(onSuccess, onError);
		
		function reverseGeocode(){
  lat = latitude;
  lng = longitude;

  var latlng = new google.maps.LatLng(lat,lng);
  var geocoder = new google.maps.Geocoder();
  geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[1]) {
               cidade = (results[2].formatted_address);
			   cidade_quebrada = cidade.split('-');
			   cidade_fim = (cidade_quebrada[0].split(','));
			   cidade_fim2 = cidade_fim[0];
			
				
				function listacamptotal(){							
							
                            $.ajax({
								
                               type: "get",
                               dataType  : 'html',
                               url: $server+"/Douglas/listacampanhastotal.php",
                               data: "cidade_fim2="+cidade_fim2+"&acao=listacampanhastotal",
                               success: function(data) {							   
							   activate_subpage("#page_88_26");
									$('#esconderlistandocamp').hide();
									$('#esconderlistacampanhas').show();
									
                                    $('#listacampanhastotal').html(data);
                              
							   }
                           });
                    }

                 listacamptotal();

			   

      } else {
        alert('Não foi possível identificar sua 	localização');
      }
    } else {
      alert('Geocoder failed due to: ' + status);
    }
  });
}
			reverseGeocode();
	});
			
			
// 3 - PNT				
			  $( document ).ready(function listahemocentros() {
                   
                  
                   function Lista(){
                           $.ajax({

                               type: "get",
                               dataType  : 'html',
                               url: $server+"/conecta.php",
                               data: "acao=listahemocentros",
                               success: function(data) {
                                    $('#listahemocentros').html(data);
                                }
                           });
                    }

                 Lista();

            });
			 
		
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  					 $('#recuperar').on('click', function(){
                       $recupemail = $('#recupemail').val();
                          
						  function recuperar(){
                           $.ajax({

                               type: "get",
                               dataType  : 'html',
                               url: $server+"Douglas/recuperasenha.php",
                               data: "recupemail="+$recupemail+"&acao=recuperar",
                               success: function(data) {
                                 $('#testerecupera').html(data);
								 

                                }
                           });
                    }

                 recuperar();
				document.getElementById('recupemail').value="";				 

});		                
                            
			 


});
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------                         
			
$(document).on("click", ".uib_w_222", function(evt)
    {
                    
                  
                   function Listaupdate(){
 
                    $listatelefone = $('#listatelefone').val();

                       $listaemail = $('#listaemail').val();
                       
                       $listasenha = $('#listasenha').val();
                       
                       $listasenha2 = $('#listasenha2').val();
 
                           
                 
                if ($listasenha !=""){
                     if(listasenha.value.length >= 6) {   
							if (($listasenha!="") && ($listasenha==$listasenha2)){
                     
						
                       
                        
                        
                        $.ajax({

                               type: "get",
                               dataType  : 'html',
                               url: $server+"/conecta.php",
                               data:"listasenha="+$listasenha+"&listasenha2="+$listasenha2+"&listatelefone="+$listatelefone+"&listaemail="+$listaemail+"&acao=updateusuario",
                               success: function(data) {
                                    $('#updateusuario').html(data);
                                }
                           });
                        
                          alert ("DADOS ALTERADOS");  
                    
                    }
                    else {
                        alert("Confirmação de senha incorreta")
                         } 
                  
                    
                    
                    
                }
                
                 else{alert("A senha deve conter mais de 6 digitos")}
                }
                       
     else {
         
           
         
                 $.ajax({

                               type: "get",
                               dataType  : 'html',
                               url: $server+"/conecta.php",
                               data:"listatelefone="+$listatelefone+"&listaemail="+$listaemail+"&acao=updateusuario",
                               success: function(data) {
                                    $('#updateusuario').html(data);
                                }
                           });
          
   alert ("DADOS ALTERADOS"); 
         
     }
     
                      
     
                   }
                       
                       
     
      Listaupdate();
                   
                      
                       
     
     
     
    
 });			

function verificanome(nome){
                
                if (nome.value.length > 2) {
    
        } else {
            alert ("Por favor insira seu nome.");
         getelementbyid("nome").focus();
        }

                         }
			// 2 - Nigra		
			function verificaidade(idade){
                
                if (idade.value >= 18) {
    
        } else {
            alert ("Você não é maior de idade");
         getelementbyid("idade").focus();
        }

                         }
						 

           function verificapeso(peso){
                
                if (peso.value >= 50) {
    
        } else {
            alert ("Peso insuficiente.");
         getelementbyid("peso").focus();
        }

                         }


function verificausuario(usuario){
                
                if (usuario.value.length > 2) {
    
        } else {
            alert ("Por favor insira um login de usuário.");
         getelementbyid("usuario").focus();
        }

                         }
						 
			function verificasenha(senhainclud){
                
                if (senhainclud.value.length >= 6) {
    
        } else {
            alert ("Senha muito curta");
         getelementbyid("senhainclud").focus();
        }

                         }
						 
						 
						 function redireciona(){
                
                
            alert ("Usuário cadastrado com sucesso!");
							  activate_page("#mainpage");	//Redireciona
         
        }
			
          
						 function testauser(){
                             $usuarioinclud = $('#usuarioinclud').val();
                           $.ajax({

                               type: "get",
                               dataType  : 'html',
                               url: $server+"Douglas/testausuario.php",
                               data: "usuarioinclud="+$usuarioinclud+"&acao=testausuario",
                               success: function(data) {
                                 if(data==="0"){ }
                                   else {alert('Por favor insira um novo usuário')}
								 

								 

                                }
                           });
                    }

                 testauser();
					 


		                