<?php
session_start();

if (!isset($_SESSION["acesso"])) {

    header('Location: login.php?erro=2');
    exit;
}

include("conexao.php");

$id = $_POST["id"];
$nome = $_POST["nome"];
$senha = $_POST["senha"];
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

if(mysqli_query($conection, "UPDATE usuarios SET nome = '$nome', senha = '$senhaHash' WHERE id = $id")) {
    header('Location: dashboard.php?editar=2');
    exit;
};

?>