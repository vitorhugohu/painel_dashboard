<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo/signin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>

    <main class="form-signin">
        <form method="post" action="recuperacao.php" class="form-signin">

            <h3 style="text-align: center;">Recuperação de senha</h3>

            <div class="form-group">
                <label for="emailSenha">Digite seu email cadastrado:</label>
                <input type="email" class="form-control" name="emailRecupera" id="emailRecupera" aria-describedby="emailHelp" placeholder="Digite seu email">
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <br>
        <?php
        if (isset($_GET['erro'])) {
            //echo '<div id="erro" style="color:red">Email inválido!</div>';
            echo '
				<div class="alert alert-danger" role="alert">
				<i class="bi bi-exclamation-triangle-fill"></i> Email inválido!
				</div>';
            header("Refresh: 3; url=./login.php");
        }

        if (isset($_GET["emailRec"]) == 1) {
            echo '
				<div class="alert alert-danger" role="alert">
				<i class="bi bi-exclamation-triangle-fill"></i> Erro ao enviar email!
				</div>';
            header("Refresh: 3; url=./login.php");          /*envia um cabeçalho HTTP que manda o navegador atualizar a
                                                                        página depois de 3 segundos e redirecionar o usuário para login.php*/
        }
        ?>

        <br>

        <a href="login.php">Voltar para o Login</a>
    </main>


    <script>
        setTimeout(function() {
            let devolver = window.document.getElementById("ok").style.display = "none";
        }, 5000);
        setTimeout(function() {
            let erro = window.document.getElementById("erro").style.display = "none";
        }, 5000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>

</html>