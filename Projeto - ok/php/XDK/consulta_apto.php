<?php

include("conexao.php"); 

 $usuario = $_POST['leogay'];

 //$id=$_SESSION['id'];

$sql=" SELECT distinct CASE WHEN ultimadoacao IS NULL OR ultimadoacao > datadoacao
THEN( CASE WHEN DATEDIFF(CURRENT_DATE, datadoacao) >= 90
THEN 'S' ELSE 'N' END ) ELSE( CASE WHEN DATEDIFF(CURRENT_DATE, ultimadoacao) >= 90
THEN 'S' ELSE 'N' END )

END AS RESULTADO FROM usuario u LEFT JOIN campanhasusuario da ON da.idusuario = u.id left join doacaopendente dp on dp.idusuario = u.id WHERE u.usuario = '$usuario' and da.id in (select max(id) from campanhasusuario where idusuario = u.id)";

$resultados = @mysql_query($sql)or die (@mysql_error());
$array=mysql_fetch_array ($resultados);
$id =$array['RESULTADO'];	

PRINT $id;



?>  