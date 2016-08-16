<?php
	/*Funзгo para o usuбrio sair da sessгo */
	/* Inicia a sessгo */
	session_start();
	/* Destrуi a sessгo */
	session_destroy();
	/*  Redireciona para a pбgina de login */
	header("Location: login.php");
?>