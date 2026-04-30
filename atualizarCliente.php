<?php
session_start();

if (!isset($_SESSION["acesso"])) {

    header('Location: login.php?erro=2');
    exit;
}

include("conexao.php");

$id = $_POST["id"];

$cpf = $_POST["cpf"];

$cep = $_POST["cep"];

if(mysqli_query($conection, "UPDATE clientes SET cpf = '$cpf', cep = '$cep' WHERE id = $id")) {
    header("Location: dashboard.php?editar=2");
    exit;
}
?>