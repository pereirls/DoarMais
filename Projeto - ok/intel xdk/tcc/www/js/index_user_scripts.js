/*jshint browser:true */
/*global $ */(function () {
  var $server;
  $server = 'http://10.10.10.110/XDK/';

  "use strict";
  /*
    hook up event handlers 
  */
  function register_event_handlers() {



    // Leva para a pagina cadastro de hemocentros
    $(document).on("click", ".uib_w_16", function (evt) {

      activate_page("#cadastrohemocentro");
    });


    // leva para a pagina cadastro de usuarios
    $(document).on("click", ".uib_w_33", function (evt) {

      activate_page("#cadastros");
    });


    // meu cadastro LEonardo

    $(document).on("click", ".uib_w_75", function (evt) {



      function Listateste() {
        $.ajax({

          type: "get",
          dataType: 'html',
          url: $server + "/conecta.php",
          data: "acao=meucadastro",
          success: function (data) {
            activate_page("#meucadastro");
            $('#meucadastro2').html(data);
          }
        });
      }

      Listateste();



    });


    $(document).on("click", ".uib_w_77", function (evt) {
      function updateusuario() {

        $listatelefone = $('#listatelefone').val();

        $listaemail = $('#listaemail').val();


        if ((listaemail != "") && (listatelefone != "")) {

          $.ajax({

            type: "get",

            url: $server + "/conecta.php",

            data: "&listatelefone=" + $listatelefone + "&listaemail=" + $listaemail + "&acao=updatecadastro",

            sucess: function (data) {


            }

          });
        }
      };
      updateusuario();
    });

    // ativa pagina meu cadastro
    $(document).on("click", ".uib_w_75", function (evt) {

      activate_page("#meucadastro");



    });

    // Leva para a pagina cadastro de hemocentros
    $(document).on("click", ".uib_w_35", function (evt) {

      activate_page("#cadastrohemocentro");
    });


    // leva para a pagina cadastro de usuarios
    $(document).on("click", ".uib_w_14", function (evt) {

      activate_page("#cadastros");
    });


    // botão para ativar função esqueçi minha senha
    $(document).on("click", ".uib_w_10", function (evt) {
      activate_page("#recuperarsenha");

    });




    // 1 - PNT
    $(document).on("click", "#btnmap", function (evt) {
      /*global uib_sb */
      /* Other possible functions are: 
        uib_sb.open_sidebar($sb)
        uib_sb.close_sidebar($sb)
        uib_sb.toggle_sidebar($sb)
         uib_sb.close_all_sidebars()
       See js/sidebar.js for the full sidebar API */

      uib_sb.toggle_sidebar($("#vermap"));
    });

    // 2 - PNT
    $(document).on("click", ".uib_w_51", function (evt) {
      /*global uib_sb */
      /* Other possible functions are: 
        uib_sb.open_sidebar($sb)
        uib_sb.close_sidebar($sb)
        uib_sb.toggle_sidebar($sb)
         uib_sb.close_all_sidebars()
       See js/sidebar.js for the full sidebar API */

      uib_sb.toggle_sidebar($(".uib_w_52"));
    });




    // 3 - PNT
    $(document).on("click", ".uib_w_60", function (evt) {
      /*global uib_sb */
      /* Other possible functions are: 
        uib_sb.open_sidebar($sb)
        uib_sb.close_sidebar($sb)
        uib_sb.toggle_sidebar($sb)
         uib_sb.close_all_sidebars()
       See js/sidebar.js for the full sidebar API */

      uib_sb.toggle_sidebar($(".uib_w_62"));
    });

    // 4 - PNT - Chama de lista de campanhas proximas de acordo com a localização do usuario quando clicado no botão 'home'
    $(document).on("click", ".uib_w_72", function (evt) {
      $('#esconder1').hide();
      $('#esconder2').hide();
      $('#esconder3').show();

      activate_subpage("#page_88_26");
      var onSuccess = function (position) {

        latitude = position.coords.latitude;
        longitude = position.coords.longitude;


      };

      function onError(error) {
        alert('code: ' + error.code + '\n' +
          'message: ' + error.message + '\n');
      }
      navigator.geolocation.getCurrentPosition(onSuccess, onError);

      function reverseGeocode() {
        lat = latitude;
        lng = longitude;

        var latlng = new google.maps.LatLng(lat, lng);
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'latLng': latlng }, function (results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
              cidade = (results[2].formatted_address);
              cidade_quebrada = cidade.split('-');
              cidade_fim = (cidade_quebrada[0].split(','));
              cidade_fim2 = cidade_fim[0];


              function listacamptotal() {

                $.ajax({

                  type: "get",
                  dataType: 'html',
                  url: $server + "/Douglas/listacampanhastotal.php",
                  data: "cidade_fim2=" + cidade_fim2 + "&acao=listacampanhastotal",
                  success: function (data) {
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


    // 1 - Lucas - botão que leva para o termo do usuario
    $(document).on("click", ".uib_w_520", function (evt) {

      activate_page("#Termo");
    });

    // 2 - Lucas - botão que leva para o termo do hemocentro
    $(document).on("click", ".uib_w_521", function (evt) {

      activate_page("#Termo2");
    });


    //Criar conta */
    $(document).on("click", ".uib_w_8", function (evt) {

      activate_page("#cadastros");
    });


    /* button  .uib_w_58 */
    $(document).on("click", ".uib_w_58", function (evt) {

      activate_page("#mainpage");
    });

    /* button  .uib_w_57 */
    $(document).on("click", ".uib_w_57", function (evt) {

      activate_page("#mainpage");
    });
    $(document).on("click", ".uib_w_98", function (evt) {

      activate_page("#mainpage");
    });

    /* button  .uib_w_97 */
    $(document).on("click", ".uib_w_97", function (evt) {

      $('#esconder1').show();
      $('#esconder2').hide();
      $('#esconder3').hide();

      activate_subpage("#minhacampanhas");


      function listacamp() {
        $.ajax({

          type: "get",
          dataType: 'html',
          url: $server + "/Douglas/listacampanhas.php",
          data: "acao=listacampanhas",
          success: function (data) {
            $('#listacampanhas').html(data);
          }
        });
      }

      listacamp();

    });

    /* button  .uib_w_93 */
    $(document).on("click", ".uib_w_93", function (evt) {
      $('#esconder1').hide();
      $('#esconder2').hide();
      $('#esconder3').show();


      var onSuccess = function (position) {

        latitude = position.coords.latitude;
        longitude = position.coords.longitude;


      };

      function onError(error) {
        alert('code: ' + error.code + '\n' +
          'message: ' + error.message + '\n');
      }
      navigator.geolocation.getCurrentPosition(onSuccess, onError);

      function reverseGeocode() {
        lat = latitude;
        lng = longitude;

        var latlng = new google.maps.LatLng(lat, lng);
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'latLng': latlng }, function (results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
              cidade = (results[2].formatted_address);
              cidade_quebrada = cidade.split('-');
              cidade_fim = (cidade_quebrada[0].split(','));
              cidade_fim2 = cidade_fim[0];


              function listacamptotal() {

                $.ajax({

                  type: "get",
                  dataType: 'html',
                  url: $server + "/Douglas/listacampanhastotal.php",
                  data: "cidade_fim2=" + cidade_fim2 + "&acao=listacampanhastotal",
                  success: function (data) {
                    activate_subpage("#page_88_26");
                    $('#esconderlistandocamp').hide();
                    $('#esconderlistacampanhas').show();

                    $('#listacampanhastotal').html(data);
                    activate_subpage("#page_88_26");
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

    // 1 - Douglas - Botão menu, a função serve para esconder o mapa do hemocentro quando clicar nele
    $(document).on("click", ".uib_w_59", function (evt) {
      $('#escondermap').hide();
    });

    // 2 -Douglas - Quebra a sessão do usuario
    $(document).on("click", ".uib_w_76", function (evt) {

      function quebrar() {
        $.ajax({

          type: "get",
          dataType: 'html',
          url: $server + "/Douglas/sair.php",
          data: "acao=sair",
          success: function (data) {

            activate_page("#mainpage");	//Redireciona
            $('#sair').html(data);
            $('#errolog').hide(); //Esconde o elemento com id errolog

          }
        });
      }

      quebrar();

    });

    // 3 - Douglas - chama a lista de hemocentros próximos de acordo com a sua localização
    $(document).on("click", ".uib_w_74", function (evt) {

      activate_subpage("#hemocentros");
      $('#esconderlistalistando').hide();
      $('#esconderlistahemocentros').show();
      $('#esconder1').hide();
      $('#esconder2').hide();
      $('#esconder3').show();


      var onSuccess = function (position) {

        latitude = position.coords.latitude;
        longitude = position.coords.longitude;


      };

      function onError(error) {
        alert('code: ' + error.code + '\n' +
          'message: ' + error.message + '\n');
      }
      navigator.geolocation.getCurrentPosition(onSuccess, onError);

      function reverseGeocode() {
        lat = latitude;
        lng = longitude;

        var latlng = new google.maps.LatLng(lat, lng);
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'latLng': latlng }, function (results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
              cidade = (results[2].formatted_address);
              cidade_quebrada = cidade.split('-');
              cidade_fim = (cidade_quebrada[0].split(','));
              cidade_fim2 = cidade_fim[0];


              function listahemogeo() {

                $.ajax({

                  type: "get",
                  dataType: 'html',
                  url: $server + "/conecta.php",
                  data: "cidade_fim2=" + cidade_fim2 + "&acao=listahemocentros",
                  success: function (data) {

                    $('#listahemocentros').html(data);

                  }
                });
              }

              listahemogeo();
              activate_subpage("#hemocentros");


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


    // 4 Douglas - Botão voltar da pagina do termo do usuario, volta para cadastro usuario
    $(document).on("click", ".uib_w_620", function (evt) {

      activate_page("#cadastros");
    });

    // 5 Douglas - Botão voltar da pagina do termo do hemocentro, volta para cadastro hemocentro
    $(document).on("click", ".uib_w_621", function (evt) {

      activate_page("#cadastrohemocentro");
    });

    // 6 - Douglas segunda função do botão entrar
    $(document).on("click", ".uib_w_6", function (evt) {
      function escodoacao() {

        var usuario = document.getElementById('usuario').value;
        var senha = document.getElementById('senha').value;

        if ((usuario != "") && (senha != "")) //se os campos não forem nulos ele executa o ajax
        {
          $.ajax({
            type: "post", // tipo de dado
            dataType: 'html',
            url: $server + "/Douglas/esconderdoacao.php", // faz a chamada do arquivo php
            data: "usuario=" + usuario, // passando dados
            success: function (teste) // executa os comandos abaixo caso tenha sucesso
            {
              if (teste > 1) // se o idstatususuario for maior que 1, caso do hemocentro ele esconde o botão
              {

                $('#esconderdoacao').hide(); // esconde o botão

              }
              else // caso não seja, ele será usuario então habilita o botão
              {

                $('#esconderdoacao').show(); // mostra o botão

              }
            }

          });

        }
      }
      escodoacao();

    });
  }

  document.addEventListener("app.Ready", register_event_handlers, false);
})();