<?php
session_start();

if (!isset($_SESSION["acesso"])) {

    header('Location: login.php?erro=2');
    exit;
}

include("conexao.php");

$id = $_POST["id"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];

if(mysqli_query($conection, "UPDATE produtos SET nome = '$nome', descricao = '$descricao' WHERE id = $id")) {
    header("Location: dashboard.php?editar=2");
    exit;
}
?>
