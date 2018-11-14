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
		<link rel="stylesheet" type="text/css" href="../css/lightbox.min.css">
		<link rel="stylesheet" type="text/css" href="../css/cadproduto.css">

		<script src="../js/jquery.min.js"></script>
		<script src="../js/lightbox-plus-jquery.min.js"></script>
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
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-7 mt-3">
					<div class="row">
						<div class="col-md-12">
							<form action="#" method="POST" id="formCli"> 
								<div class="row rowForm">
									<div class="col-md-9"></div>
									<div class="col-md-3" align="center">
										<a id="btnCancelar" class="btn btn-danger" href="principal.php" role="button">Cancelar</a>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-4 lblAl">
										<label>Nome: </label>
									</div>
									<div class="col-md-8">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="txtNome" value="">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-4 lblAl">
										<label>Quantidade: </label>
									</div>
									<div class="col-md-8">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="txtQuantidade" value="">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-4 lblAl">
										<label>Preço da compra: </label>
									</div>
									<div class="col-md-8">
										R$&nbsp;<input type="text" id="txtPrecoCompra" value="">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-4 lblAl">
										<label>Preço de venda: </label>
									</div>
									<div class="col-md-8">
										R$&nbsp;<input type="text" id="txtPrecoVenda" value="">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-4 lblAl">
										<label>Código de barras: </label>
									</div>
									<div class="col-md-8">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="txtCodigoBarras" value="">
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