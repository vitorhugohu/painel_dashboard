<?php
		session_start();

		if (!isset($_SESSION["acesso"])) {

			header('Location: login.php?erro=2');
			exit;
		}
	
		$nome = $_POST["nome"];
		$descricao = $_POST["descricao"]; 
		
		include("conexao.php");
		$cadastro = mysqli_query($conection, "INSERT INTO produtos(nome, descricao) VALUES ('$nome', '$descricao')");
		header('Location: dashboard.php?isSucess=true');
?>