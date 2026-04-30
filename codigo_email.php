<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verificador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo/signin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION["codigo"])) {
        header("Location: login.php?codigo_erro=1");
    }
    ?>

    <main class="form-signin">

        <h3 style="text-align: center;">Verificador de código de acesso</h3>
        <br>
        <form method="post" action="valida_codigo.php">

            <div class="form-group">
                <label for="codigo">Código de Acesso:</label>
                <input type="text" class="form-control" name="codigo" id="codigo" aria-describedby="emailHelp" placeholder="Digite seu código de acesso">
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

        <br>

        <?php

        if (isset($_GET['codigo']) == 1) {
            //echo '<div id="erro" style="color:red">Código inválido</div>';
            echo '
				<div class="alert alert-danger" role="alert">
				<i class="bi bi-exclamation-triangle-fill"></i> Código inválido!
				</div>';
            header("Refresh: 3; url=./login.php");
        }

        ?>

    </main>

    <script>
        setTimeout(function() {
            let erro = window.document.getElementById("erro").style.display = "none"
        }, 5000)
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>

</html>