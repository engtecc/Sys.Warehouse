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
	<div class="modal fade" id="modalok" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalok">Sucesso!</h5>
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
					<h5 class="modal-title text-error" id="modalok">Falha!</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-sm ok" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<?php 
	require_once ("../crud/bd.php");
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$nome = $_POST["txtFornecedor"];
		$select = "SELECT cnpj FROM fornecedor WHERE nome = '$nome'";
		$sql = mysqli_query($conexao,$select);
		if($result = mysqli_fetch_array($sql)){
			$cnpj = $result["cnpj"];
			$valor = $_POST["txtValor"];
			$vencimento = $_POST["dateVencimento"];
			$tipo = $_POST["txtTipo"];
			$sql = "INSERT INTO pagamento(tipo) VALUES('$tipo')";
			mysqli_query($conexao,$sql);
			$last_id = $conexao->insert_id;
			$sql = "INSERT INTO compra(cnpj,hora_data,valor_total,id_entrada,id_pagamento) VALUES ('$cnpj','$vencimento','$valor',1,$last_id)";
			if($stmt = $conexao->prepare($sql))
			{
				if($stmt->execute())
				{
					echo("<script language='javascript'> 
						$('#modalok').modal('show');
						$('.ok').click(function(){
							window.location.replace('principal.php');
							});
							</script>");
				}else{
					echo("<script language='javascript'>
						$('#modalerro').modal('show');
						$('.ok').click(function(){
							window.location.replace('contas.php');
							});
							</script>");
				}
			}
		}else{
			echo("<script language='javascript'> $('#modalerro').modal('show');</script>");
		}
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
							<form action="#" method="POST" id="formCli"> 
								<div class="row rowForm">
									<div class="col-md-4"></div>
									<div class="col-md-3">
										<a id="btnCadastro" class="btn btn-outline-primary" href="cadproduto.php" role="button" style="margin-left: 20px;">Cadastrar Produto</a>
									</div>
									<div class="col-md-3">
										<a id="btnCadastro" class="btn btn-outline-primary" href="cadfornecedor.php" role="button">Cadastrar Fornecedor</a>
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
										<input class="form-control form-control-sm" type="text" id="txtForn">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>CNPJ: </label>
									</div>
									<div class="col-md-9">
										<input class="form-control form-control-sm" type="text" class="confTxtBox" id="txtNome">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Código de Barras: </label>
									</div>
									<div class="col-md-9">
										<input class="form-control form-control-sm"  type="number" id="numCod">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Produto: </label>
									</div>
									<div class="col-md-9">
										<input class="form-control form-control-sm" style="background-color: #DCDCDC" type="number" id="txtProd" >
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
										<select class="form-control form-control-sm" id="selPag">
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
								<div class="row rowForm" style="vertical-align: center;">
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<h2>Valor da Compra:</h2>
									</div>
									<div class="input-group mb-3 col-md-6">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroup-sizing-">R$</span>
										</div>
										<input class="form-control form-control-sm" style="width: 87%;"type="number" step="any" id="numTotal">
										
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-6"></div>
									<div class="col-md-6">
										<a id="btnFinalizar" class="btn btn-success">Finalizar Compra</a>
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