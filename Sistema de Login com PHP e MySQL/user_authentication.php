<html>
	<head>
		<title>Autenticando usuario</title>
		<meta charset="UTF-8" />
		<!-- Script que redireciona para o painel (condi��o de sucesso) ou para a p�gina de login novamente (condi��o de falha) -->
		<script type="text/javascript">
			/* Fun��o que redireciona para o painel (condi��o de sucesso) */
			function loginsuccessfully() {
					/* Comando que define o tempo de espera do redirecionamento*/
					setTimeout("window.location='painel.php'", 5000);
			}
			
			/* Fun��o que redireciona para a p�gina de login novamente (condi��o de falha) */
			function loginfailed() {
					/* Comando que define o tempo de espera do redirecionamento */
					setTimeout("window.location='login.php'", 5000);
			}
		</script>
	</head>
	<body>
		<?php
			/* P�gina que verifica a autenticidade dos dados inseridos pelo usu�rio. Ou seja, verifica se os dados existem ou n�o no banco de dados */
			$host = "localhost";
			$usuario = "root";
			$senha = "";
			$database = "cadastro";
			$conexao = mysql_connect($host, $usuario, $senha) or die(mysql_error());
					   mysql_select_db($database) or die(mysql_error());
					   
			/* Corre��o dos algarismos. Define o charset para o banco de dados. */
			mysql_set_charset('utf8');
		?>

		<?php
			/* Resgata os dados digitados pelo usu�rio na p�gina de login */
			
			$email=$_POST['email'];
			$senha=$_POST['senha'];
			
			/* Realiza uma consulta ao banco de dados para verificar se a informa��o resgatada existe cadastrada. */
			$sql = mysql_query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'") or die(mysql_error());
			
			/* Realiza a contagem de quantas linhas no banco de dados existem com as informa��es digitadas. */
			$row = mysql_num_rows($sql);
			
			/* Condi��o que verifica e inicia uma sess�o */
			if($row > 0) {
				/* Condi��o de sucesso - login realizado */
				/* Inicia uma sess�o com o email e a senha digitadas. */
				session_start();
				$_SESSION['email']=$_POST['email'];
				$_SESSION['senha']=$_POST['senha'];
				/* Mensagem de sucesso. Opcional.*/
				echo "<center> Voc� foi autenticado com sucesso. Aguarde um momento. </center> ";
				/* Evento JavaScript que redireciona o usu�rio logado ao seu painel */
				echo "<script>loginsuccessfully()</script>";
			} else {
				/* Condi��o de falha - os dados n�o existem no banco de dados ou est�o incorretos */
				/* Mensagem de falha. Opcional.*/
				echo "<center> E-mail ou senha inv�lidos. Aguarde um momento para tentar novamente. </center>";
				/* Evento JavaScript que redireciona o usu�rio para a p�gina de login novamente */
				echo "<script>loginfailed()</script>";
			}
		?>
	</body>
</html>