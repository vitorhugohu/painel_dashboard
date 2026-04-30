<?php
    include("conexao.php");

    $id = $_GET["id"];

    $deletar = mysqli_query($conection, "DELETE FROM clientes WHERE id = $id");

    if($deletar) {
        header("Location: dashboard.php?deletar=1");
        exit;
    } else {
        header("Location: dashboard.php?deletar=2");
        exit;
    }
?>