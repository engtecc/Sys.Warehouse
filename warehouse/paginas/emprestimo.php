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
	<nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark justify-content-between menu">
		<a class="navbar-brand" href="#"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">Menu
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse"> 
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link formatacao" href="principal.php">PRINCIPAL<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link formatacao" href="venda.php">VENDAS<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle dropbtn formatacao" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CADASTRAR</a>
					<div class="dropdown-content" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="cadcliente.php">CLIENTE</a>
						<a class="dropdown-item" href="cadfornecedor.php">FORNECEDOR</a>
						<a class="dropdown-item" href="cadfuncionario.php">FUNCIONÁRIO</a>    
						<a class="dropdown-item" href="cadproduto.php">PRODUTO</a>
					</div> 
				</li>
				<li class="nav-item">
					<a class="nav-link formatacao" href="pesquisar_editar.php">ALTERAR CADASTROS<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link formatacao" href="consultar.php">CONSULTAR<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle dropbtn formatacao" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LANÇAR</a>
					<div class="dropdown-content" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="contas.php">COMPRAS</a>
						<a class="dropdown-item" href="lancarpagamento.php">PAGAMENTO</a>
					</div> 
				</li>
				<li class="nav-item active">
					<a class="nav-link formatacao" href="emprestimo.php">EMPRÉSTIMO<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link formatacao" href="relatorios.php">RELATÓRIOS<span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<h2 class="subTitulo">Empréstimo</h2>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 mt-3">
				<div class="row">
					<div class="col-md-12">
						<form action="../crud/adicionarEmprestimo.php" method="POST" id="formCli"> 
							<div class="row rowForm">
								<div class="col-md-9" align="right"></div>
								<div class="col-md-3" align="center">
									<a id="btnCancelar" class="btn btn-danger" href="principal.php" role="button">Cancelar</a>
								</div>
							</div> 
							<div class="row rowForm">
								<div class="col-md-3 lblAl" style="margin-top:7px;">
									<label>Nome do produto: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control" name="txtNome" type="text" id="txtNomeEmp">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl"  style="margin-top:7px;">
									<label>Quantidade: </label>
								</div>
								<div class="col-md-3">
									<input class="form-control"  name="txtQuantidade" type="number" id="numQuant">
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl" style="margin-top:7px;">
									<label>Nome do cliente: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control" name="txtCliente" type="text" id="txtNomeEmp">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl" style="margin-top:7px;">
									<label>End. de cobrança: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control"   name="txtCobranca" type="text" id="txtEndEmp">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl" style="margin-top:7px; ">
									<label>Data de empréstimo: </label>
								</div>
								<div class="col-md-3">
									<input class="form-control" name="dateEmprestimo" style="width:200px;" type="date" id="datEmp">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl"   style="margin-top:7px;">
									<label>Data de devolução: </label>
								</div>
								<div class="col-md-3">
									<input class="form-control" name="dateDevolucao" style="width:200px;" type="date" id="datDev">
								</div>
							</div>
							<div class="row rowForm rowTable">
								<div class="col-md-3 lblAl" style="margin-top:7px;">
									<label style="font-weight: bold;">Produtos da Compra:</label>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2">
									<input type="submit" id="btnRemover" class="btn btn-primary" role="button" value="Adicionar">
								</div>
								<div class="col-md-2">
									<a id="btnRemover" class="btn btn-dark" href="principal.php" role="button">Remover</a>
								</div>
							</div>
							<div style="height: 10px;"></div>
							<div class="row divTable">
								
									<?php 
										require_once "../crud/bd.php";
										$select = "SELECT * FROM temporary";
										if ($resultado = $conexao->query($select)){
											if ($resultado->num_rows > 0){
												echo'<table class="table">';
												echo '<thead class="thead-light">';
												echo '<tr style="text-align: center;">';
												echo '<th style="width: 5%;">#</th>';
												echo '<th style="width: 30%;">Nome do Produto</th>';
												echo '<th style="width: 30%;">Nome do Cliente</th>';
												echo '<th style="width: 10%;">Endereco</th>';
												echo '<th style="width: 20%;">Data a devolver</th>';
												echo '</tr>';
												echo '</thead>';
												echo "<tbody>";
												while ($linha = $resultado->fetch_array()) {
													echo "<tr>";
													
													echo "<td>" .$linha['id_emprestimo']. "</td>";
													echo "<td align='center'>" .$linha['nome_produto']. "</td>";
													echo "<td align='center'>" .$linha['nome_cliente']. "</td>";
													echo "<td align='center'>" .$linha['endereco']. "</td>";
													echo "<td align='center'>" .$linha['data_a_devolver']. "</td>";
												}
												echo "</tbody>";
												echo "</table>";
												$resultado->free();
					
											}
										}
									?>
								</table>
							</div>
							<div class="row rowForm">
								<div class="col-md-6"></div>
								<div class="col-md-6">
									<a id="btnFinalizar" class="btn btn-success" href="../crud/finalizarEmprestimo.php">Finalizar Emprestimo</a>
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