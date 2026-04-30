<?php
    session_start();
    include("conexao.php");

    $id_usuario = $_GET["id"];

    $deletar = mysqli_query($conection, "DELETE FROM usuarios WHERE id = $id_usuario");

    if($deletar) {
        header("Location: dashboard.php?deletar=1");
        exit;
    } else {
        header("Location: dashboard.php?deletar=2");
        exit;
    }
?>