<html>
	<head>
		<title>Autenticando usuario</title>
		<meta charset="UTF-8" />
		<!-- Script que redireciona para o painel (condição de sucesso) ou para a página de login novamente (condição de falha) -->
		<script type="text/javascript">
			/* Função que redireciona para o painel (condição de sucesso) */
			function loginsuccessfully() {
					/* Comando que define o tempo de espera do redirecionamento*/
					setTimeout("window.location='painel.php'", 5000);
			}
			
			/* Função que redireciona para a página de login novamente (condição de falha) */
			function loginfailed() {
					/* Comando que define o tempo de espera do redirecionamento */
					setTimeout("window.location='login.php'", 5000);
			}
		</script>
	</head>
	<body>
		<?php
			/* Página que verifica a autenticidade dos dados inseridos pelo usuário. Ou seja, verifica se os dados existem ou não no banco de dados */
			$host = "localhost";
			$usuario = "root";
			$senha = "";
			$database = "cadastro";
			$conexao = mysql_connect($host, $usuario, $senha) or die(mysql_error());
					   mysql_select_db($database) or die(mysql_error());
					   
			/* Correção dos algarismos. Define o charset para o banco de dados. */
			mysql_set_charset('utf8');
		?>

		<?php
			/* Resgata os dados digitados pelo usuário na página de login */
			
			$email=$_POST['email'];
			$senha=$_POST['senha'];
			
			/* Realiza uma consulta ao banco de dados para verificar se a informação resgatada existe cadastrada. */
			$sql = mysql_query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'") or die(mysql_error());
			
			/* Realiza a contagem de quantas linhas no banco de dados existem com as informações digitadas. */
			$row = mysql_num_rows($sql);
			
			/* Condição que verifica e inicia uma sessão */
			if($row > 0) {
				/* Condição de sucesso - login realizado */
				/* Inicia uma sessão com o email e a senha digitadas. */
				session_start();
				$_SESSION['email']=$_POST['email'];
				$_SESSION['senha']=$_POST['senha'];
				/* Mensagem de sucesso. Opcional.*/
				echo "<center> Você foi autenticado com sucesso. Aguarde um momento. </center> ";
				/* Evento JavaScript que redireciona o usuário logado ao seu painel */
				echo "<script>loginsuccessfully()</script>";
			} else {
				/* Condição de falha - os dados não existem no banco de dados ou estão incorretos */
				/* Mensagem de falha. Opcional.*/
				echo "<center> E-mail ou senha inválidos. Aguarde um momento para tentar novamente. </center>";
				/* Evento JavaScript que redireciona o usuário para a página de login novamente */
				echo "<script>loginfailed()</script>";
			}
		?>
	</body>
</html>