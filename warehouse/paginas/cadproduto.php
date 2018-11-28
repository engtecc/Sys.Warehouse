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
	<link rel="stylesheet" type="text/css" href="../css/cadproduto.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/cadastrarProduto.js"></script>

</head>
<body>
	<nav class="site-header">
		<div class = "jumbotron text-center removerMargem">
			<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
			<h4><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
		</div>
	</nav>
	<div class="modal fade" id="modalok" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalok">Produto cadastrado com sucesso!</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-sm ok" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalerro" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-error" id="modalerro">Falha ao cadastrar o produto!</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-sm ok" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<h2 class="subTitulo">Cadastrar produto</h2>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 mt-3">
				<div class="row">
					<div class="col-md-12">
						<form action="" method="POST" id="formProduto" enctype="multipart/form-data"> 
							<div class="row rowForm">
								<div class="col-md-9"></div>
								<div class="col-md-3" align="center">
									<a id="btnCancelar" class="btn btn-danger" href="principal.php" role="button">Cancelar</a>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Nome: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control form-control-sm" style="width: 100%;" type="text" id="txtNome" name="txtNome" value="" required>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Quantidade: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control form-control-sm" type="text" id="txtQuantidade" name="txtQuantidade" value="" required>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Preço de compra: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control form-control-sm" type="text" id="txtPrecoCompra" name="txtPrecoCompra" value="" required placeholder="R$">
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Preço de venda: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control form-control-sm" type="text" id="txtPrecoVenda" name="txtPrecoVenda" value="" required placeholder="R$">
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Código de barras: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control form-control-sm" type="text" id="txtCodigoBarras" name="txtCodigoBarras" value="" required><br>
									<small class="text-error errocodigo ml-5"></small>
								</div>
							</div>
							<div class="row rowForm"style="margin-bottom:30px">
								<div class="col-md-9"></div>
								<div class="col-md-3" align="center">
									<input type="submit" class="btn btn-success" id="btnCancelar" value="Cadastrar">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>   
		</div>
	</div>
</body>
</html> 