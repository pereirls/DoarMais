<?php

// função js em index_user_scripts

// 14 - Douglas - Destruir sessão
if($_GET['acao'] == 'sair')
{
	
	 session_start();
	 session_destroy();

}

?>