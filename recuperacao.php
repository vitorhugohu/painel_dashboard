<?php
include("conexao.php");

require_once('php_mailer/PHPMailer.php');
require_once('php_mailer/SMTP.php');
require_once('php_mailer/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$emailDigitado = $_POST['emailRecupera'];

$recupera = mysqli_query($conection, "SELECT email FROM usuarios WHERE email = '$emailDigitado'");
$resultadoRecupera = mysqli_fetch_assoc($recupera);

$emailRecupera = $resultadoRecupera['email'];

$mail = new PHPMailer(true);

if($emailDigitado == $emailRecupera) {
	$novaSenha = substr(str_shuffle(
    'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*?+-'
	), 0, rand(4, 6));	
    $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
    $atualizarSenha = mysqli_query($conection, "UPDATE usuarios SET senha = '$senhaHash' WHERE email = '$emailDigitado'");

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
		$mail->addAddress($emailDigitado);

		$mail->isHTML(true);
		$mail->Subject = '...::: SISTEMA :::...';
		$mail->Body = ("<strong>...::: NOVA SENHA :::...</strong>
						<br>
						<strong>$novaSenha</strong>
						<br>
						<br>
						<br>
						<br>");
		$mail->AltBody = '...::: SISTEMA :::...';

		if($mail->send()) {
			header('Location: login.php?senhaEnviada=1');
		} else {
			header("Location: ./esqueceuSenha.php?emailRec=1");
		}
	} catch (Exception $e) {
		header("Location: ./esqueceuSenha.php?emailRec=1");
	}

} else {
    header('Location: esqueceuSenha.php?erro=1');
}

?>