<html>
	<head>
		<title>Sistema de cadastro</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<?php

			/* Estabelece conexão com o banco de dados. Pode ser usado também um arquivo externo. */
			
			$host = "localhost";
			$usuario = "root";
			$senha = "";
			$database = "cadastro";						      /* Reporta algum erro, tal qual o comando "trigger_error" */
			$conexao = mysql_connect($host, $usuario, $senha) or die(mysql_error());
						mysql_select_db($database) or die(mysql_error());
						
			/* Mensagem de sucesso no cadastro. */			
			echo "<center> Cadastro efetuado com sucesso! </center>";
						
			/* Correção dos algarismos. Define o charset para o banco de dados. */
			mysql_set_charset('utf8');
			
		?>

		<?php

			/* Recupera todos os valores digitados pelo usuário na página de cadastro */
			$nome =$_POST['nome'];
			$sobrenome=$_POST['sobrenome'];
			$pais=$_POST['pais'];
			$estado=$_POST['estado'];
			$cidade=$_POST['cidade'];
			$email=$_POST['email'];
			$senha=$_POST['senha'];
			
			/* Variável que insere todos os dados recuperados no banco de dados */
			$sql = mysql_query("INSERT INTO usuarios(nome, sobrenome, pais, estado, cidade, email, senha)
								VALUES('$nome','$sobrenome','$pais','$estado','$cidade','$email','$senha')");
		?>
	</body>
</html>