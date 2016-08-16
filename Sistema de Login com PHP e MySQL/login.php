<!-- Video Aula: https://www.youtube.com/watch?v=-yUMdFWrPJc -->

<?php
	/* Restrição para não poder voltar à página de login caso o usuário já esteja logado */ 
	session_start();
	
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$database = "cadastro";
	
	$conexao = mysql_connect($host, $usuario, $senha) or die(mysql_error());
			   mysql_select_db($database) or die(mysql_error());
			   
	if(!isset($_SESSION["email"]) && !isset($_SESSION["senha"])){
?>
<html>
	<head>
		<title>Sistema de login</title>
	</head>
	<body>
		<form name="loginform" method="post" action="user_authentication.php"> <!--"user_authentication.php" é a página para onde o usuário será direcionado  para verificar se as informações estão corretas -->
			
			Email: <input type="text" name="email" />
			<br /><br />
			Senha: <input type="password" name="senha" />
			<br /><br />
			<input type="submit" value="Logar" />
			
		</form>
	</body>
</html>
<?php
	} else {
		echo "<meta http-equiv='refresh' content='0, ./painel/'>";
	}
?>