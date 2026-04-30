<?php
session_start();

$mobile = FALSE;
$user_agents = array("iPhone", "iPad", "Android", "webOS", "BlackBerry", "iPod", "Symbian", "IsGeneric");

foreach ($user_agents as $user_agent) {
	if (strpos($_SERVER['HTTP_USER_AGENT'], $user_agent) !== FALSE) {
		$mobile = TRUE;
		$modelo = $user_agent;
		break;
	}
}

/* a funcao strpos verifica se a string $user_agent
        está contida na string $_server
      */
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
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

    img {
        border-radius: 8px;
    }

    .alert-custom {
        color: black;
        background-color: #86f4a4ff;
    }
    </style>
</head>

<body class="text-center">

    <main class="form-signin">

        <form method="POST" action="valida_login.php" class="form-signin">

            <img src="imagens/loja.png" alt="Logo Marca" class="mb-4" width="100px" height="100px">
            <h1 class="h3 mb-3 fw-normal">Acesso ao sistema</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="nome" name="nome" required
                    placeholder="Digite seu nome de usuario">
                <label for="nome">Nome:</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="senha" name="senha" required
                    placeholder="Digite sua senha" minlength="4" maxlength="6">
                <label for="senha">Senha:</label>

            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit"><i class="bi bi-person-lock"></i> Entrar</button>

            <br>
            <br>

            <a href="esqueceuSenha.php" style="text-align: left">Esqueci minha senha</a>

            <p class="mt-5 mb-3 text-muted">&copy; desde <span id="ano"></span></p>


        </form>

        <?php
		if (isset($_GET['erro']) && ($_GET['erro'] == 1)) {
			//echo "<p id='erro' style='color:red'>Usuário ou senha incorretos. Tente novamente.</p>";
			echo '
				<div class="alert alert-danger" role="alert">
				<i class="bi bi-exclamation-triangle-fill"></i> Usuário ou senha incorretos. Tente novamente!
				</div>';
			header("Refresh: 3; url=./login.php");
		}
		if (isset($_GET['erro']) && ($_GET['erro'] == 2)) {
			//echo "<p id='logar' style='color:red'>É preciso fazer login.</p>";
			echo '
				<div class="alert alert-danger" role="alert">
				<i class="bi bi-exclamation-triangle-fill"></i> Você precisa fazer login!
				</div>';
			header("Refresh: 3; url=./login.php");
		}

		if (isset($_GET['email']) && $_GET['email'] === 'false') {
				echo '
				<div class="alert alert-danger" role="alert">
				<i class="bi bi-exclamation-triangle-fill"></i> Erro ao enviar email!
				</div>';
				header("Refresh: 3; url=./login.php");
			}
		

		/* if (isset($_GET['codigo_erro']) && $_GET['codigo_erro'] == 1) {
			//echo '<div id="erroCodigo" style="color:red">Você precisa fazer login antes!</div>';
			echo '
				<div class="alert alert-danger verde" role="alert">
				<i class="bi bi-exclamation-triangle-fill"></i> Você precisa fazer login antes!
				</div>';
			header("Refresh: 3; url=./login.php");
		} */

		if (isset($_GET['senhaEnviada']) && $_GET['senhaEnviada'] == 1) {
			echo '
				<div class="alert alert-custom" role="alert"> 
				<i class="bi bi-check2"></i> Senha alterada com sucesso!
				</div>';
			header("Refresh: 3; url=./login.php");
		}

		if (isset($_GET['tempoEsgotado'])) {
			echo '
				<div class="alert alert-danger" role="alert"> 
				<i class="bi bi-exclamation-triangle-fill"></i> Tempo esgotado por inatividade no Dashboard!
				</div>';
			header("Refresh: 3; url=./login.php");
		}

		if (isset($_GET['editaUsu'])) {
			echo '
				<div class="alert alert-danger" role="alert"> 
				<i class="bi bi-exclamation-triangle-fill"></i> Tempo esgotado por inatividade no Dashboard!
				</div>';
			header("Refresh: 3; url=./login.php");
		}
		?>
    </main>

    <script>
    let ano = window.document.getElementById("ano");
    let date = new Date();
    let anoComp = date.getFullYear();
    ano.innerHTML = anoComp;
    </script>

    <!-- T2.Y.ih*4)lFTD!J    senha BANCO  -->
</body>

</html>