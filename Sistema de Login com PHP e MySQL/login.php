<!-- Video Aula: https://www.youtube.com/watch?v=-yUMdFWrPJc -->

<?php
	/* Restri��o para n�o poder voltar � p�gina de login caso o usu�rio j� esteja logado */ 
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
		<form name="loginform" method="post" action="user_authentication.php"> <!--"user_authentication.php" � a p�gina para onde o usu�rio ser� direcionado  para verificar se as informa��es est�o corretas -->
			
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