$( document ).ready(function() {
                    var $server;
                    $server = 'http://localhost/XDK/';
                  
                   
    
    $( document ).ready(function() {
                    var $server;
                    $server = 'http://localhost/XDK/';
                  
                   function Lista(){
                           $.ajax({

                               type: "get",
                               dataType  : 'html',
                               url: $server+"/conecta.php",
                               data: "acao=listacampanhas",
                               success: function(data) {
                                    $('#listacampanhas').html(data);
                                }
                           });
                    }

                 Lista();

            });  
			
			});  
    
    
   

                         
			
						
			
			