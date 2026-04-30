<?php
session_start();
include("conexao.php");

require_once('php_mailer/PHPMailer.php');
require_once('php_mailer/SMTP.php');
require_once('php_mailer/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$usuario = $_POST["nome"];
$senha = $_POST["senha"];

$dados = mysqli_query($conection, "SELECT * FROM usuarios WHERE nome = '$usuario'");
$resultado_usuarios = mysqli_fetch_assoc($dados);

$usuarioBanco = $resultado_usuarios['nome'];
$senhaBanco = $resultado_usuarios['senha'];
$id_usuario = $resultado_usuarios['id'];
$usuario_email = $resultado_usuarios['email'];

$email_usuario = $resultado_usuarios['email'];

if (($usuario == $usuarioBanco) && (password_verify($senha, $senhaBanco))) {
	$_SESSION["nomeUsuario"] = $usuario;
	$_SESSION["codigo"] = $usuario;
	$codigo_acesso = rand(0, 9999);
	$enviar = mysqli_query($conection, "UPDATE usuarios SET codigo_acesso = '$codigo_acesso' WHERE id = '$id_usuario'");
	$codigo_resultado = $resultado_usuarios["codigo_acesso"];

	try {
		//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
		$mail->isSMTP();
		$mail->CharSet = 'UTF-8';
		$mail->Host = 'mail.dreamsistemas.com.br';
		$mail->SMTPAuth = true;
		$mail->Username = 'sistema_atrasos@dreamsistemas.com.br';
		$mail->Password = 'xryojo^mNiQ3';
		$mail->Port = 587;

		$mail->setFrom('sistema_atrasos@dreamsistemas.com.br');
		$mail->addAddress($usuario_email);

		$mail->isHTML(true);
		$mail->Subject = '...::: SISTEMA :::...';
		$mail->Body = ("<strong>...::: CODIGO DE ACESSO :::...</strong>
						<br>
						<strong>$codigo_acesso</strong>
						<br>
						<br>
						<br>
						<br>");
		$mail->AltBody = '...::: SISTEMA :::...';

		if ($mail->send()) {
			header('Location: codigo_email.php');
		} else {
			header("Location: ./login.php?email=false");
		}
	} catch (Exception $e) {
		header("Location: ./login.php?email=false");
	}

	//header('Location: dashboard.php');
} else {
	header('Location: login.php?erro=1');
}