<?php

	/* Variáveis que definem servidor = "$host", banco de dados = "$database", usuario = "$usuario" e a senha = "$senha" */
	$host = "localhost";
	$database = "teste";
	$usuario = "root";
	$senha = "";
	
	/* Variável que é responsável pela conexão no banco de dados = "$conexao". Caso haja erro de conexão, mostrará o erro através do comando "trigger_error", responsável por mostrar
		o erro de maneira fácil, que se entenda */
	$conexao = mysql_connect( $host, $usuario, $senha ) or trigger_error( mysql_error(), E_USER_ERROR );
	
	/* Seleciona e realiza a conexão com o banco de dados desejado. */
	mysql_select_db( $database, $conexao);
	
	/* Correção dos algarismos. Define o charset para o banco de dados. */
	mysql_set_charset('utf8');
	


?>