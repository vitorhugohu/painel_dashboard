<?php
session_start();
if (!isset($_SESSION["acesso"])) {

    header('Location: login.php?erro=2');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>

    <!-- CSS Boostrapp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo/signin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }
    </style>

</head>

<body class="form-signin">

    <main class="form-signin">

        <form action="atualizarProduto.php" method="post" class="form-signin">

            <center>
                <h1 class="h3 mb-3 fw-normal">Editar Usuário</h1>
            </center>

            <div class="form-floating">
                <input type="number" class="form-control" name="id" id="id" required placeholder="Id do produto">
                <label for="id">Id: </label>
            </div>

            <br>

            <div class="form-floating">
                <input type="text" class="form-control" name="nome" id="nome" required placeholder="Nome do produto">
                <label for="nome">Nome: </label>
            </div>

            <br>

            <div class="form-floating">
                <input type="text" class="form-control" name="descricao" id="descricao" required
                    placeholder="Descrição do produto">
                <label for="senha">Descrição: </label>
            </div>

            <br>

            <button type="submit" class="w-100 btn btn-lg btn-primary">Alterar</button>

        </form>

    </main>

</body>

</html>