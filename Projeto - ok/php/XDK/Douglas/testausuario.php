<?php

include("..\conexao.php"); 

if($_GET['acao']=='testausuario')
{
	$usuario = $_GET['usuarioinclud'];
	
	$sql="select count(id) as RESULTADO from usuario where usuario = '$usuario'";
	
$resultados = @mysql_query($sql)or die (@mysql_error());
$array=mysql_fetch_array ($resultados);
$id =$array['RESULTADO'];	

PRINT $id;

 }