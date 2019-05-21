<?php

include("..\conexao.php"); 

// 1 - Douglas Função de cadastro de campanhas
if($_GET['acao']=='inclusao') // função js em app.js

{

  $nomepessoa = $_GET['nomepessoa'];
  $nomecampanha = $_GET['nomecampanha'];
  $finalidade = $_GET['finalidade'];
  $qtdsolicitada = $_GET['qtdsolicitada'];
  $sangue = $_GET['sangue'];
  $qtdatual = 0;
  $idstatuscampanha = 1;
  $idhemocentros = $_GET['idhemocentros'];
  $exclusiva = $_GET['exclusiva'];
     
  $SQL = "INSERT INTO campanhasusuario (nomepessoa, nomecampanha, finalidade, qtdsolicitada, sangue, qtdatual, idstatuscampanha, idhemocentros, idusuario, data, exclusiva) VALUES ('$nomepessoa', '$nomecampanha', '$finalidade', '$qtdsolicitada', '$sangue', '$qtdatual', '$idstatuscampanha', '$idhemocentros', ".$_SESSION['id'].",current_date,'$exclusiva')";

  $re = mysql_query($SQL, $serve);

}

?>  