<?php
		session_start();
	
		if (!isset($_SESSION["acesso"])) {

			header('Location: login.php?erro=2');
			exit;
		}

		$cpf = $_POST["cpf"];
		$cep = $_POST["cep"]; 
		/*$senha_segura = password_hash($senha, PASSWORD_DEFAULT);*/
		
		include("conexao.php");
		$cadastro = mysqli_query($conection, "INSERT INTO clientes(cpf, cep) VALUES ('$cpf', '$cep')");
		header('Location: dashboard.php?isSucess=true');
?>