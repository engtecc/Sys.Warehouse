<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location: ../index.php');
}
if ($_SESSION['administrador'] != 1){
	header('location: venda.php');
}
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
	<link rel="stylesheet" type="text/css" href="../css/cadCliente.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/cadastrarCliente.js"></script>
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




	<div class="container">
		<h2 class="subTitulo">Relatórios</h2>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 mt-3">
					<div class="row">
						<div class="col-md-12">
							<input type="hidden" value="pessoa" id="capture">
							<form action="" method="POST" id="formProduto" enctype="multipart/form-data">
								<div class="row rowForm">
									<div class="col-md-9"></div>
									<div class="col-md-3" align="center">
										<a id="btnCancelar" class="btn btn-danger" href="principal.php" role="button">Cancelar</a>
									</div>
								</div>
								<div class="row rowForm mt-3">
									<div class="col-md-5 ml-5">
										<label> Vendas do dia:</label>
									</div>
									<div class="input-group mx-5">
										<input class="form-control form-control-sm"type="date" id="pesquisar" name="pesquisar" value="">
										<button type="submit" class="btn btn-sucess"><img src='../svg/pesquisar.svg' width='25' height='25'></button>
									</div>
								</div>
							</form>

						</div>
					</div>				
			</div>
		</div>


		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 mt-3">
					<div class="row">
						<div class="col-md-12">
							<input type="hidden" value="pessoa" id="capture">
							<form action="" method="POST" id="formProduto" enctype="multipart/form-data">
								<div class="row rowForm">
									<div class="col-md-9"></div>
									
								</div>
								<div class="row rowForm mt-3">
									<div class="col-md-5 ml-5">
										<label> Vendas do mês:</label>
									</div>
									<div class="input-group mx-5">
										<input class="form-control form-control-sm"type="date" id="pesquisar" name="pesquisar" value="">
										<button type="submit" class="btn btn-sucess"><img src='../svg/pesquisar.svg' width='25' height='25'></button>
									</div>
								</div>
							</form>

						</div>
					</div>				
			</div>
		</div>






		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 mt-3">
					<div class="row">
						<div class="col-md-12">
							<input type="hidden" value="pessoa" id="capture">
							<form action="" method="POST" id="formProduto" enctype="multipart/form-data">
								<div class="row rowForm">
									<div class="col-md-9"></div>
									
								</div>
								<div class="row rowForm mt-3">
									<div class="col-md-5 ml-5">
										<label> Vendas do ano:</label>
									</div>
									<div class="input-group mx-5">
										<input class="form-control form-control-sm"type="date" id="pesquisar" name="pesquisar" value="">
										<button type="submit" class="btn btn-sucess"><img src='../svg/pesquisar.svg' width='25' height='25'></button>
									</div>
								</div>
							</form>

						</div>
					</div>				
			</div>
		</div>
	</div>










<script type="text/javascript">
		$(document).ready(function () {
			$('#sidebarCollapse').on('click', function () {
				$('#sidebar').toggleClass('active');
			});
		});
	</script>
	<span id="toTopBtn"></span>

</body>