<?php
	/* Conexão com o banco de dados */
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$database = "cadastro";
	
	$conexao = mysql_connect($host, $usuario, $senha) or die(mysql_error());
			   mysql_select_db($database) or die(mysql_error());
?>

<?php
	/* Abre uma sessão */
	session_start();
	/* Verificação para saber se há uma sessão aberta ou não */
	if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
		/* Redirecionamento para o login caso não haja sessão - condição de falha */
		header("Location: login.php");
		/* Encerra todas as funções da página */
		exit;
	} else {
		/* Em caso de login - condição de sucesso */
		echo "<center> Você está logado. </center>";
	}
	
?>
<html>
	<head>
		<title> Painel </title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<!-- Encerra a sessão -->
		<br />
		<center> <a href="logout.php">Sair</a> </center>
	</body>
</html>
