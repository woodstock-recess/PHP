<?php

	/* Vari�veis que definem servidor = "$host", banco de dados = "$database", usuario = "$usuario" e a senha = "$senha" */
	$host = "localhost";
	$database = "teste";
	$usuario = "root";
	$senha = "";
	
	/* Vari�vel que � respons�vel pela conex�o no banco de dados = "$conexao". Caso haja erro de conex�o, mostrar� o erro atrav�s do comando "trigger_error", respons�vel por mostrar
		o erro de maneira f�cil, que se entenda */
	$conexao = mysql_connect( $host, $usuario, $senha ) or trigger_error( mysql_error(), E_USER_ERROR );
	
	/* Seleciona e realiza a conex�o com o banco de dados desejado. */
	mysql_select_db( $database, $conexao);
	
	/* Corre��o dos algarismos. Define o charset para o banco de dados. */
	mysql_set_charset('utf8');
	


?>