<?php
session_start();
include("conexao.php");
include("valida_login.php");

$codigoEnviado = $_POST["codigo"];
$pegarCodigo = mysqli_query($conection, "SELECT codigo_acesso FROM usuarios WHERE codigo_acesso = '$codigoEnviado'");
$resultadoCodigo = mysqli_fetch_assoc($pegarCodigo);
$valorCodigo = $resultadoCodigo["codigo_acesso"];

if ($codigoEnviado == $valorCodigo) {

    $_SESSION["usuario"] = $_SESSION["nomeUsuario"];
    $_SESSION["acesso"] = 'Liberado';
    $_SESSION["tempo"] = time();  

    header("Location: dashboard.php");
    exit();
} else {
    header("Location: codigo_email.php?codigo=1");
    exit();
}

?>