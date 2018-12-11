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
	<link rel="stylesheet" type="text/css" href="../css/contas.css">
	<link rel="stylesheet" type="text/css" href="../css/vendas.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/lancarConta.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/bootstrap.min.js"></script>
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
				<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle dropbtn formatacao" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LANÇAR</a>
					<div class="dropdown-content" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="contas.php">COMPRAS</a>
						<a class="dropdown-item" href="lancarpagamento.php">PAGAMENTO</a>
					</div> 
				</li>
				<li class="nav-item">
					<a class="nav-link formatacao" href="emprestimo.php">EMPRÉSTIMO<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link formatacao" href="relatorios.php">RELATÓRIOS<span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="modal fade" id="modalok" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalok">Adicionado com sucesso!</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-sm ok" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalCompra" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalCompra">Compra efetuada!</h5>
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
					<h5 class="modal-title text-error" id="modalok">Codigo de barras não encontrado!</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-sm ok" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalerroFornecedor" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-error" id="modalerroFornecedor">Fornecedor não encontrado!</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-sm ok" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalerroFornecedorMuitos" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-error" id="modalerroFornecedorMuitos">Muitos Fornecedores encontrados! Seja mais especifico.</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-sm ok" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalerroTipo" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-error" id="modalerroTipo">Escolha uma forma de pagamento.</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-sm ok" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<?php
	if($_SESSION["compraConcluida"] == 1)
	{
		echo("<script language='javascript'>$('#modalok').modal('show'); </script>");
		$_SESSION["vendaConcluida"] = 0;
	}
	if($_SESSION["compraConcluida"] == 2)
	{
		echo("<script language='javascript'>$('#modalerro').modal('show'); </script>");
		$_SESSION["vendaConcluida"] = 0;
	}
	if($_SESSION["compraConcluida"] == 4)
	{
		echo("<script language='javascript'>$('#modalerroFornecedor').modal('show'); </script>");
		$_SESSION["vendaConcluida"] = 0;
	}
	if($_SESSION["compraConcluida"] == 3)
	{
		echo("<script language='javascript'>$('#modalerroFornecedorMuitos').modal('show'); </script>");
		$_SESSION["vendaConcluida"] = 0;
	}
	if($_SESSION["compraConcluida"] == 5)
	{
		echo("<script language='javascript'>$('#modalerroTipo').modal('show'); </script>");
		$_SESSION["vendaConcluida"] = 0;
	}
	if($_SESSION["compraConcluida"] == -1)
	{
		echo("<script language='javascript'>$('#modalCompra').modal('show'); </script>");
		$_SESSION["vendaConcluida"] = 0;
	}
	?>
	<div class="container">
		<div class="container">
			<h2 class="subTitulo">Lançar Compras</h2>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 mt-3">
					<div class="row">
						<div class="col-md-12">
							<form action="../crud/contasGrid.php" method="POST" id="formCli"> 
								<div class="row rowForm">
									<div class="col-md-4"></div>
									<div class="col-md-3">
										<a id="btnCadastro" class="btn btn-outline-primary" href="cadproduto.php" role="button" style="margin-left:-25px;">Cadastrar Produto</a>
									</div>
									<div class="col-md-3">
										<a id="btnCadastro" class="btn btn-outline-primary" href="cadfornecedor.php" role="button" style="margin-left:-25px;">Cadastrar Fornecedor</a>
									</div>
									<div class="col-md-2">
										<a id="btnCancel" class="btn btn-danger" href="principal.php" role="button">Cancelar</a>
									</div>
								</div> 
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Fornecedor: </label>
									</div>
									<div class="col-md-9">
										<input class="form-control form-control-sm" type="text" id="txtForn" name="txtFornecedor">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>CNPJ: </label>
									</div>
									<div class="col-md-9">
										<input class="form-control form-control-sm" type="text" class="confTxtBox" id="txtNome" name="txtCnpj">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Código de Barras: </label>
									</div>
									<div class="col-md-9">
										<input class="form-control form-control-sm"  type="number" id="numCod" name="txtBarras">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Quantidade:</label>
									</div>
									<div class="col-md-3">
										<input class="form-control form-control-sm" type="number" name="numQuantidade">
									</div>
									<div class="col-md-3 lblAl">
										<label>Forma de Pagamento: </label>
									</div>
									<div class="col-md-3">
										<select class="form-control form-control-sm" id="selPag" name="slcTipo">
											<option selected value="vazio">...</option>
											<option value="avista">À vista</option>
											<option value="prazo">À prazo</option>
											<option value="cartao">Cartão</option>
										</select>
									</div>
									<div class="col-md-3 lblAl">
										<a href="emprestimo.php"></a>
									</div>
								</div>
								<div class="row rowForm rowTable">
									<div class="col-md-3 lblAl">
										<label style="font-weight: bold;">Produtos da Compra:</label>
									</div>
									<div class="col-md-5"></div>
									<div class="col-md-2">
										<input type ="submit" id="btnRemover" class="btn btn-primary" role="button" value="Adicionar">
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
												<th style="width: 5%;">Excluir</th>
											</tr>
										</thead>
										<?php
										foreach($_SESSION["dbCompra"] as $key => $valor)
										{
											echo($valor);
										}
										?>
									</table>
								</div>
								<div class="row rowForm" style="vertical-align: center;">
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<h2>Valor da Compra:</h2>
									</div>
									<div class="input-group mb-3 col-md-6">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-">R$</span>
										</div>
										<input class="form-control form-control-sm" style="width: 87%;"type="number" step="any" id="numTotal" value="<?php echo $_SESSION["valortotalCompra"]; ?>" >
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-6"></div>
									<div class="col-md-6">
										<a href="../crud/finalizarCompra.php" id="btnFinalizar" class="btn btn-success">Finalizar Compra</a>
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