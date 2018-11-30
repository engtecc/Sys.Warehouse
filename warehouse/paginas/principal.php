<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location: ../index.php');
}
if ($_SESSION['administrador'] != 1){
	header('location: venda.php');
}
$_SESSION["dbgrid"] = array();
$_SESSION["dbgriddados"] = array();
$_SESSION["valortotal"] = 0;
$_SESSION["iterador"] = 1;
$_SESSION["vendaConcluida"] = 0;
$_SESSION["quantidadeTotal"] = 0;
?>

<!doctype html>
<html lang="pt-br">
<head>
	<title>Januário - Disk Cerveja</title>        
	<meta charset="utf-8">
	<meta name="viewport"       content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description"    content="WareHouse">
	<meta name="author"         content="ENGTEC - Engenharia e Computação">
	
	<link rel="icon" href="../imagens/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css" >

	<script src="../js/jquery.min.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="site-header">
		<div class = "jumbotron text-center removerMargem">
			<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
			<h4><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
		</div>
	</nav>
	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-4 mt-3">
			<center> 
				<div class="container marketing">
					<div class="row">
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="venda.php"><img class="rounded-circle" src="../imagens/venda.png" alt="Generic placeholder image" width="100" height="100"><h5>Venda</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="cadcliente.php"><img class="rounded-circle" src="../imagens/cliente.png" alt="Generic placeholder image" width="100" height="100"><h5>Cadastrar<br>cliente</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="cadfornecedor.php"><img class="rounded-circle" src="../imagens/fornecedor.png" alt="Generic placeholder image" width="100" height="100"><h5>Cadastrar<br>fornecedor</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="consultar.php"><img class="rounded-circle" src="../imagens/consultar.png" alt="Generic placeholder image" width="100" height="100"><h5>Consultar</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="cadfuncionario.php"><img class="rounded-circle" src="../imagens/funcionario.png" alt="Generic placeholder image" width="100" height="100"><h5>Cadastrar<br>funcionário</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="cadproduto.php"><img class="rounded-circle" src="../imagens/produto.png" alt="Generic placeholder image" width="100" height="100"><h5>Cadastrar<br>produto</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="contas.php"><img class="rounded-circle" src="../imagens/contas.png" alt="Generic placeholder image" width="100" height="100"><h5>Lançar<br>compras</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="pesquisar_editar.php"><img class="rounded-circle" src="../imagens/alterar.png" alt="Generic placeholder image" width="100" height="100"><h5>Alterar<br>cadastros</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="relatorios.php"><img class="rounded-circle" src="../imagens/relatorios.png" alt="Generic placeholder image" width="100" height="100"><h5>Relatórios</h5></a>
						</div>
						<div class="col-lg-4 text-center espacamento">
							<a class="text-opcoes" href="lancarpagamento.php"><img class="rounded-circle" src="../imagens/lancar_pagamento.png" alt="Generic placeholder image" width="100" height="100"><h5>Lançar<br>pagamento</h5></a>
						</div>
						<div class="col-lg-4 text-center espacamento">
							<a class="text-opcoes" href="backup.php"><img class="rounded-circle" src="../imagens/backup.png" alt="Generic placeholder image" width="100" height="100"><h5>Backup</h5></a>
						</div>
					</div>
				</div>
				<div class="col-md-5 mt-5" align="center">
					<a id="btnCancelar" class="btn btn-danger" href="../crud/sair.php" role="button">Sair</a>
				</div>   
			</center>	
		</div>
	</div>
</body>
</html>