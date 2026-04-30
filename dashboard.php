<!DOCTYPE html>
<html lang="pt-br" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sticky-footer-navbar/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
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

    .navbar-nav .nav-link.dropdown-toggle:hover {
        background-color: rgba(255, 255, 255, 0.1);
        /* leve destaque */
        border-radius: 6px;
        transition: 0.3s;
    }


    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    center {
        color: white;
    }

    #link1 {
        color: black;
    }

    #link1:hover {
        background-color: gray;
        color: white;
    }

    #link2 {
        color: black;
    }

    #link2:hover {
        background-color: gray;
        color: white;
    }

    #link3 {
        color: black;
    }

    #link3:hover {
        background-color: gray;
        color: white;
    }


    #link4 {
        color: black;
    }

    #link4:hover {
        background-color: gray;
        color: white;
    }

    #link5 {
        color: black;
    }

    #link5:hover {
        background-color: gray;
        color: white;
    }

    #link6 {
        color: black;
    }

    #link6:hover {
        background-color: gray;
        color: white;
    }

    img {
        border-radius: 8px;
        margin-top: 10px;
    }

    #tx {
        text-align: center;
    }

    #sairr {
        background-color: red;
        color: white;
        border-radius: 8px;
        padding: 10px;
        margin-left: 5px;
    }

    #sairr:hover {
        background-color: #dc3545;
        /* vermelho bootstrap */
        color: white;
        transition: 0.3s;
    }

    .sc {
        background-color: lightgreen;
        color: black;
        padding: 5px;
        border-radius: 8px;
        text-align: center;
    }

    .cardd {
        text-align: center;
    }

    .containerr {
        display: flex;
        justify-content: space-around;
    }

    .style-card {
        border-radius: 10px;
        background-color: lightyellow;
        box-shadow: 10px 10px lightblue;
    }

    #linkModal:hover {
        color: white;
    }

    $alterarUsu {
        background-color: lightgreen;
        color: black;
        padding: 5px;
        border-radius: 8px;
        text-align: center;
    }

    .editar {
        background-color: #FFD700;
        color: white;
        padding: 3px;
        border-radius: 2px;
    }

    .editar:hover {
        background-color: #F0E68C;
    }

    .deletar {
        background-color: #FF6347;
        color: white;
        padding: 3px;
        border-radius: 2px;
    }

    .deletar:hover {
        background-color: #FFA07A;
    }
    </style>

    <!-- Custom styles for this template -->
    <link href="estilo/sticky-footer-navbar.css" rel="stylesheet">

</head>

<body class="d-flex flex-column h-100">
    <!-- <a href="cadastro_tela.php">Cadastrar novo usuário</a> -->
    <?php
	session_start();
	if (!isset($_SESSION["acesso"])) {

		header('Location: login.php?erro=2');
		exit;
	}

	$tempo_maximo = 120; // 2 minutos

	// tempo salvo ao fazer login
	$tempoAntes = $_SESSION["tempo"];
	$tempoAgora = time();
	$tempoPassado = $tempoAgora - $tempoAntes;

	// se passou do tempo, destrói a sessão
	if ($tempoPassado > $tempo_maximo) {
		session_unset();
		session_destroy();
		header("Location: login.php?tempoEsgotado=true");
		exit();
	}

	// se ainda está dentro do tempo, atualiza o último acesso
	$tempoAgora = time();
	?>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <center> <i class="bi bi-person-circle"></i> Painel do Administrador</center>
            <div class="container-fluid">
                <!--<a class="navbar-brand" href="#">Link 1</a>
				 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button> -->
                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <ul class="navbar-nav me-auto mb-2 mb-md-0">



                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle dropDown" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#"> Usuários</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="nav-link dropdown-item " href="#" id="link1" data-bs-toggle="modal"
                                        data-bs-target="#cadUsu">Cadastrar</a></li>
                                <li><a class="nav-link dropdown-item" href="#" id="link2" data-bs-toggle="modal"
                                        data-bs-target="#lisUsu">Listar</a></li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Clientes</a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link dropdown-item" href="#" id="link3" data-bs-toggle="modal"
                                        data-bs-target="#cadCli">Cadastrar</a></li>
                                <li><a class="nav-link dropdown-item" href="#" id="link4" data-bs-toggle="modal"
                                        data-bs-target="#lisCli">Listar</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Produtos</a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link dropdown-item" href="#" id="link5" data-bs-toggle="modal"
                                        data-bs-target="#cadPro">Cadastrar</a></li>
                                <li><a class="nav-link dropdown-item" href="#" id="link6" data-bs-toggle="modal"
                                        data-bs-target="#lisPro">Listar</a></li>
                            </ul>
                        </li>




                        <!-- <li class="nav-item">
							<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
							<li class="nav-item">
								<a class="nav-link active" href="#">Produtos</a>
							</li>
						</li> -->

                    </ul>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="sairr" data-bs-toggle="modal" data-bs-target="#sair">Sair</a>
                    </li>
                    <!--	<form class="d-flex">
							<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-success" type="submit">Search</button>
						</form> -->
                </div>
            </div>
        </nav>


    </header>

    <main class="flex-shrink-0">

        <div class="container">
            <!--<h1 class="mt-5">Titulor</h1>
			<p class="lead">p1</p>
			<p>p2 <a href="../examples/sticky-footer/">link</a> </p> -->
            <br>
            <?php
			include("conexao.php");


			$nomeBanco = $_SESSION["usuario"];
			$pegarNome = mysqli_query($conection, "SELECT nome FROM usuarios WHERE nome = '$nomeBanco'");
			$resultadoNome = mysqli_fetch_assoc($pegarNome);
			$nomeusuarioBanco = $resultadoNome["nome"];

			//echo "<p id='usu'>Bem vindo,"." ".$nomeCodigo."!!</p>";
			//echo "Horário do login: " . $tempoAntes . "<br>";
			//echo "Horário atual: " . time();  id='usu'
 
			echo "<p>Bem vindo, " . $nomeusuarioBanco . "</p>";

			if (isset($_GET["isSucess"])) {
				echo '<div class="alert alert-success" role="alert" id="sumir">
				<i class="bi bi-check-circle"></i> Dados cadatrados com sucesso!
				</div>';
			}

			
			if(isset($_GET['emailError'])) {
				echo '<div class="alert alert-danger" role="alert" id="cadEma">
				<i class="bi bi-exclamation-triangle-fill"></i> Esse email já está existe no banco de dados!
				</div>';
				
			}

			if(isset($_GET['erroSenha']) == 1) {
				echo '<div class="alert alert-danger" role="alert" id="sumir">
				<i class="bi bi-exclamation-triangle-fill"></i> As senhas não se coincidem!
				</div>';
			}
			
			if(isset($_GET['editar']) AND $_GET['editar'] == 2) {
				echo '<div class="alert alert-success" role="alert" id="sumir">
				<i class="bi bi-check-circle"></i> Modificações feitas com sucesso!
				</div>';
			}

			if(isset($_GET['deletar']) AND $_GET['deletar'] == 1) {
				echo '<div class="alert alert-success" role="alert" id="sumir">
				<i class="bi bi-check-circle"></i> Dados deletados com sucesso!
				</div>';
			}

			if(isset($_GET['deletar']) AND $_GET['deletar'] == 2) {
				echo '<div class="alert alert-danger" role="alert" id="cadEma">
				<i class="bi bi-exclamation-triangle-fill"></i> Erro ao deletarDados!
				</div>';
				
			}

			?>
        </div>


        <!-- Modal Usuario-->
        <div class="modal fade" id="cadUsu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-signin">
                            <form method="POST" action="cadastroUsuarios.php" class="form-signin">

                                <center> <img src="imagens/loja.png" alt="Logo Marca" class="mb-4" width="150px"
                                        height="150px"> </center>
                                <h1 class="h3 mb-3 fw-normal" id="tx">Cadastro</h1>

                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nome" name="nome" required
                                        placeholder="Digite seu nome de usuario">
                                    <label for="nome">Nome:</label>
                                </div>

                                <br>

                                <div class="form-floating">
                                    <input type="password" class="form-control" id="senha" name="senha" required
                                        placeholder="Digite uma senha" minlength="4" maxlength="6"
                                        pattern="(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{4,6}"
                                        title="A senha deve conter pelo menos 1 letra, 1 número e 1 caractere especial.">
                                    <label for="senha">Senha:</label>

                                </div>

                                <br>

                                <div class="form-floating">
                                    <input type="password" class="form-control" id="senha2" name="senha2" required
                                        placeholder="Confirme sua senha" minlength="4" maxlength="6"
                                        pattern="(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{4,6}"
                                        title="A senha deve conter pelo menos 1 letra, 1 número e 1 caractere especial.">
                                    <label for="senha">Confirmar senha:</label>

                                </div>

                                <br>

                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" required
                                        placeholder="Digite o email">
                                    <label for="email">Email:</label>
                                </div>



                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fechar</button>
                                    <input type="submit" value="Enviar" class="btn btn-primary">
                                    <!--<button type="button" class="btn btn-primary" type="submit">Enviar</button>-->

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal Cliente -->
        <div class="modal fade" id="cadCli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-signin">
                            <form method="POST" action="cadastroClientes.php" class="form-signin">

                                <center> <img src="imagens/loja.png" alt="Logo Marca" class="mb-4" width="150px"
                                        height="150px"> </center>
                                <h1 class="h3 mb-3 fw-normal" id="tx">Cadastro</h1>

                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cpf" name="cpf" required
                                        placeholder="Digite o cpf do cliente" minlength="11" maxlength="11">
                                    <label for="nome">Cpf:</label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cep" name="cep" required
                                        placeholder="Digite o cep do cliente" minlength="8" maxlength="8">
                                    <label for="senha">Cep:</label>

                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fechar</button>
                                        <input type="submit" value="Enviar" class="btn btn-primary">
                                        <!--<button type="button" class="btn btn-primary" type="submit">Enviar</button>-->

                                    </div>

                                </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Modal Produto -->
        <div class="modal fade" id="cadPro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-signin">
                            <form method="POST" action="cadastroProdutos.php" class="form-signin">

                                <center> <img src="imagens/loja.png" alt="Logo Marca" class="mb-4" width="150px"
                                        height="150px"> </center>
                                <h1 class="h3 mb-3 fw-normal" id="tx">Cadastro</h1>

                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nome" name="nome" required
                                        placeholder="Digite o nome do produto">
                                    <label for="nome">Nome:</label>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="descricao" name="descricao" required
                                        placeholder="Digite a descrição do produto">
                                    <label for="senha">Descrição:</label>

                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fechar</button>
                                        <input type="submit" value="Enviar" class="btn btn-primary">
                                        <!--<button type="button" class="btn btn-primary" type="submit">Enviar</button>-->

                                    </div>

                                </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Sair -->
        <div class="modal fade" id="sair" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sair</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Deseja sair do sistema?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                        <a href="login.php" id="sss" class="btn btn-primary">Sim</a>
                        <!--<button type="button" class="btn btn-primary">Sim</button> -->
                    </div>
                </div>
            </div>
        </div>


        <!-- Listar Usuário -->
        <div>

            <div class="modal fade" id="lisUsu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Usuários</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">USUÁRIO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            </div>
                            <a href="relatorio_usuarios.php" class="btn btn-primary">Emitir relatório</a>
                            <?php
							include("conexao.php");
							$dados = mysqli_query($conection, "SELECT * FROM usuarios");
							
							while ($resultado = mysqli_fetch_assoc($dados)) {

								echo "<tr>";
								echo "<td>" . $resultado["id"] . "" ."</td>";
								echo "<td>" . $resultado["nome"] . "</td>";
								echo "<td>
                                            <a id='linkModal' class='deletar'
                                            href='delUsu.php?id=" . $resultado["id"] ."'>
                                            <i class='bi bi-trash3'></i>
                                            </a>
                                        </td>";

								echo "<td>
										<a id='linkModal' class='editar' 
										href='editaUsu.php'>
										<i class='bi bi-pencil'></i>
										</a>
									</td>";
							}
							?>
                            </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <!--<button type="button" class="btn btn-primary" type="submit">Save changes</button>-->
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <!--  Listar Cliente -->
        <div>

            <div class="modal fade" id="lisCli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Clientes</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">CPF</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <a href="relatorio_clientes.php" class="btn btn-primary">Emitir relatório</a>
                                        <?php
										include("conexao.php");
										$dados = mysqli_query($conection, "SELECT * FROM clientes");

										while ($resultado = mysqli_fetch_assoc($dados)) {

											echo "<tr>";
											echo "<td>" . $resultado["id"] . "</td>";
											echo "<td>" . $resultado["cpf"] . "</td>";
											echo "<td>
												<a id='linkModal' class='deletar'
												href='delCliente.php?id=" . $resultado["id"] ."'>
												<i class='bi bi-trash3'></i>
												</a>
                                       	 	</td>";

											echo "<td>
													<a id='linkModal' class='editar' 
													href='editaCliente.php'>
													<i class='bi bi-pencil'></i>
													</a>
												</td>";
										}
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <!--<button type="button" class="btn btn-primary" type="submit">Save changes</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  Listar Produto -->
        <div>

            <div class="modal fade" id="lisPro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Produtos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">NOME</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <a href="relatorio_produtos.php" class="btn btn-primary">Emitir relatório</a>
                                        <?php
										include("conexao.php");
										$dados = mysqli_query($conection, "SELECT * FROM produtos");

										while ($resultado = mysqli_fetch_assoc($dados)) {

											echo "<tr>";
											echo "<td>" . $resultado["id"] . "</td>";
											echo "<td>" . $resultado["nome"] . "</td>";
											echo "<td>
													<a id='linkModal' class='deletar'
														href='delProduto.php?id=" . $resultado["id"] ."'>
														<i class='bi bi-trash3'></i>
													</a>
                                        		</td>";

										echo "<td>
												<a id='linkModal' class='editar' 
												href='editaProduto.php'>
												<i class='bi bi-pencil'></i>
												</a>
											</td>";
										}
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <!--<button type="button" class="btn btn-primary" type="submit">Save changes</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="containerr">
            <div id="card1">
                <div class="card style-card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title cardd">Usuários <i class="bi bi-person"></i></h5>
                        <p class="card-text cardd">
                            <?php
							include("conexao.php");
							$dados = mysqli_query($conection, "SELECT COUNT(nome) as user FROM usuarios");
							$resultado = mysqli_fetch_assoc($dados);
							echo $resultado["user"];
							?>
                        </p>
                    </div>
                </div>
            </div>


            <div id="card2">
                <div class="card style-card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title cardd">Clientes <i class="bi bi-person"></i></h5>
                        <p class="card-text cardd">
                            <?php
							include("conexao.php");
							$dados = mysqli_query($conection, "SELECT COUNT(cpf) as user FROM clientes");
							$resultado = mysqli_fetch_assoc($dados);
							echo $resultado["user"];
							?>
                        </p>
                    </div>
                </div>
            </div>


            <div id="card3">
                <div class="card style-card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title cardd">Produtos <i class="bi bi-person"></i></h5>
                        <p class="card-text cardd">
                            <?php
							include("conexao.php");
							$dados = mysqli_query($conection, "SELECT COUNT(nome) as user FROM produtos");
							$resultado = mysqli_fetch_assoc($dados);
							echo $resultado["user"];
							?>
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </main>


    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">&copy; <span id="ano"></span> Site desenvolvido pelo Vitor Hugo</span>
        </div>
    </footer>

    <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
    let sc = window.document.getElementById("sc")
    setTimeout(() => {
        sc.style.display = "none"
    }, 1000)
    let ano = window.document.getElementById("ano")
    let dn = new Date()
    let anoAtual = dn.getFullYear()
    ano.innerHTML = anoAtual
    let ce = window.document.getElementById("cadEma")
    setTimeout(() => {
        ce.style.display = "none"
    }, 1000)
    let sumir = window.document.getElementById("sumir")
    setTimeout(() => {
        sumir.style.display = "none";
    }, 5000);
    </script>

</body>

</html>