<?php
session_start();
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);


//1 - efetua login - Lucas Perreira
$serve = mysql_connect('localhost', 'root', '');
if(!$serve){ echo 'erro';}
$db = mysql_select_db('bancodoarmais', $serve);

?>