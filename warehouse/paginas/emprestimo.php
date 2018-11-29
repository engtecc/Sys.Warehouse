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
	<link rel="stylesheet" type="text/css" href="../css/emprestimo.css">

	<script src="../js/jquery.min.js"></script>
	<script src="../js/lightbox-plus-jquery.min.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="../js/vendas.js"></script>

</head>

<body>
	<div class = "jumbotron text-center removerMargem">
		<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
		<h4><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
	</div>
	<div class="container">
		<h2 class="subTitulo">Empréstimo</h2>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 mt-3">
				<div class="row">
					<div class="col-md-12">
						<form action="#" method="POST" id="formCli"> 
							<div class="row rowForm">
								<div class="col-md-9" align="right"></div>
								<div class="col-md-3" align="center">
									<a id="btnCancelar" class="btn btn-danger" href="principal.php" role="button">Cancelar</a>
								</div>
							</div> 
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Nome do produto: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control" type="text" id="txtNomeEmp">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl">
									<label>Quantidade: </label>
								</div>
								<div class="col-md-3">
									<input class="form-control" type="number" id="numQuant">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl">
									<label>End. de cobrança: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control" type="text" id="txtEndEmp">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl">
									<label>Data de Empréstimo: </label>
								</div>
								<div class="col-md-3">
									<input class="form-control" type="date" id="datEmp">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl">
									<label>Data de Devolução: </label>
								</div>
								<div class="col-md-3">
									<input class="form-control" type="date" id="datDev">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl">
									<label>Forma de Pagamento: </label>
								</div>
								<div class="col-md-3">
									<select id="selPag" class="form-control">
										<option selected>...</option>
										<option>Á vista</option>
										<option></option>
										<option></option>
									</select>
								</div>
								<div class="col-md-3 lblAl">
									<a href="emprestimo.php"></a>
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl">
									<label>Valor Recebido: </label>
								</div>
								<div class="col-md-3">
									<input class="form-control" type="number" step="any" id="numValRec">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl">
									<label>Valor a Receber: </label>
								</div>
								<div class="col-md-3">
									<input class="form-control" type="number" step="any" id="numValDev">
								</div>
							</div>

							<div class="row rowForm rowTable">
								<div class="col-md-3 lblAl">
									<label style="font-weight: bold;">Produtos da Compra:</label>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2">
									<a id="btnRemover" class="btn btn-primary" href="principal.php" role="button">Adicionar</a>
								</div>
								<div class="col-md-2">
									<a id="btnRemover" class="btn btn-dark" href="principal.php" role="button">Remover</a>
								</div>
							</div>
							<div style="height: 10px;"></div>
							<div class="row divTable">
								<table class="table table-sm table-bordered">
									<thead class="thead-light">
										<tr style="text-align: center;">
											<th style="width: 5%;">#</th>
											<th style="width: 60%;">Nome Produto</th>
											<th style="width: 15%;">Preço</th>
											<th style="width: 5%;">Quant.</th>
											<th style="width: 15%;">Preço Total</th>	
										</tr>
									</thead>
								</table>
							</div>
							<div class="row rowForm">
								<div class="col-md-6"></div>
								<div class="col-md-6">
									<a id="btnFinalizar" class="btn btn-success">Finalizar Emprestimo</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>   
		</div>
	</div>
	<br>
	<br>
	<br>
</body>
</html>