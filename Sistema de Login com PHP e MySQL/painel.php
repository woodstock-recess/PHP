<?php
	/* Conex�o com o banco de dados */
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$database = "cadastro";
	
	$conexao = mysql_connect($host, $usuario, $senha) or die(mysql_error());
			   mysql_select_db($database) or die(mysql_error());
?>

<?php
	/* Abre uma sess�o */
	session_start();
	/* Verifica��o para saber se h� uma sess�o aberta ou n�o */
	if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
		/* Redirecionamento para o login caso n�o haja sess�o - condi��o de falha */
		header("Location: login.php");
		/* Encerra todas as fun��es da p�gina */
		exit;
	} else {
		/* Em caso de login - condi��o de sucesso */
		echo "<center> Voc� est� logado. </center>";
	}
	
?>
<html>
	<head>
		<title> Painel </title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<!-- Encerra a sess�o -->
		<br />
		<center> <a href="logout.php">Sair</a> </center>
	</body>
</html>
