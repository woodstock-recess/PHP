<?php
	/*Fun��o para o usu�rio sair da sess�o */
	/* Inicia a sess�o */
	session_start();
	/* Destr�i a sess�o */
	session_destroy();
	/*  Redireciona para a p�gina de login */
	header("Location: login.php");
?>