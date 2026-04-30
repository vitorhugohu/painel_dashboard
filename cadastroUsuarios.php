<?php
		session_start();
		
		if (!isset($_SESSION["acesso"])) {

			header('Location: login.php?erro=2');
			exit;
		}

		include("conexao.php");
		
		$usuario = $_POST["nome"];
		$senha = $_POST["senha"];
		$senha2 = $_POST["senha2"];
		$email = $_POST["email"];
		$senha_segura = password_hash($senha, PASSWORD_DEFAULT);

		if($senha !== $senha2) {
			header("Location: dashboard.php?erroSenha=1");
			exit();					
		}
		
		
		$verificaE = mysqli_query($conection, "SELECT * FROM usuarios WHERE email = '$email'");
		if(mysqli_num_rows($verificaE) > 0) {
			header('Location: dashboard.php?emailError=true');
			exit;
		} else {
			$cadastro = mysqli_query($conection, "INSERT INTO usuarios(nome, senha, email) VALUES ('$usuario', '$senha_segura', '$email')");
			header('Location: dashboard.php?isSucess=true');
			exit;
		}
?>