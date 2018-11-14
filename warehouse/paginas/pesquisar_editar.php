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
		<link rel="stylesheet" type="text/css" href="../css/pesquisar_editar.css">

		<script src="../js/jquery.min.js"></script>
		<script src="../js/lightbox-plus-jquery.min.js"></script>
		<script src="../js/script.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		
</head>

	<body>
		<div class = "jumbotron text-center removerMargem">
			<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
			<h4><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 mt-3">
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
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-1 lblAl" style="margin-top:2px;">
												<input class="radio" type="radio" name="radioPesquisar" id="radioPesquisar" value="1">
											</div>
											<div class="col-md-3 lblAl" >
												<label style="margin-left:20px;">Produto:</label>
											</div>
											<div class="col-md-2">
												<input type="text" id="txtProduto">
											</div>
										</div>
									</div>
									<div class="col-md-6" style="margin-left:px;">
										<div class="row">
											<div class="col-md-1 lblAl" style="margin-top:2px;">
												<input class="radio" type="radio" name="radioPesquisar" id="radioPesquisar" value="2">
											</div>
											<div class="col-md-3 lblAl" >
												<label>Funcionário:</label>
											</div>
											<div class="col-md-2">
												<input type="text" id="txtFuncionario">
											</div>
										</div>
									</div>
								</div>
								<div class="row rowForm" >
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-1 lblAl" style="margin-top:2px;">
												<input class="radio" type="radio" name="radioPesquisar" id="radioPesquisar" value="3">
											</div>
											<div class="col-md-3 lblAl">
												<label>Fornecedor:</label>
											</div>
											<div class="col-md-4">
												<input type="text" id="txtFornecedor" >
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-1 lblAl" style="margin-top:2px;">
												<input class="radio" type="radio" name="radioPesquisar" id="radioPesquisar" value="4">
											</div>
											<div class="col-md-3 lblAl">
												<label style="margin-left:32px;">Cliente:</label>
											</div>
											<div class="col-md-2">
												<input type="text" id="txtCliente">
											</div>
										</div>
									</div>
								</div>
								<div class="row rowForm" >
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-1 lblAl" style="margin-top:2px;">
												<input class="radio" type="radio" name="radioPesquisar" id="radioPesquisar" value="5">
											</div>
											<div class="col-md-3 lblAl">
												<label>Empréstimo:</label>
											</div>
											<div class="col-md-2">
												<input type="text" id="txtEmprestimo">
											</div>
										</div>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-9"></div>
									<div class="col-md-3" align="center">
										<a id="btnCancelar" class="btn btn-warning" href="#" role="button">Pesquisar</a>
									</div>
								</div> 
								<div class="row">
									<div class="col-md-2" align="left" style="margin-top:50px;"><h5>Resultados:</h5></div>
								</div>
								<div class="row rowForm"id="panelResultados">
									<div class="col-md-12" align="">
										
									</div>
								</div>
								<div class="row" style="margin-top:5px;margin-bottom:10px;">
									<div class="col-md-6" align="right" style="padding-left:25px;">
										<a name="" id="" class="btn btn-primary" href="#" role="button">Editar</a>
									</div>
									<div class="col-md-6" align="left" style="padding-left:25px;">
										<a name="" id="" class="btn btn-dark" href="#" role="button">Excluir</a>
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