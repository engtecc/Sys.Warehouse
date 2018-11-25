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
					<h5 class="modal-title" id="modalok">sucesso!</h5>
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
		<h2 class="subTitulo">Lançamento de Contas</h2>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6 mt-3">
				<div class="row">
					<div class="col-md-12">
						<form action="" method="POST" id="formCli" enctype="multipart/form-data"> 
							<div class="row rowForm">
								<div class="col-md-9"></div>
								<div class="col-md-3" align="center">
									<a id="btnCancelar" class="btn btn-danger" href="principal.php" role="button">Cancelar</a>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-4 lblAl">
									<label>Fornecedor: </label>
								</div>
								<div class="col-md-6">
									<input type="text" id="txtForn" name="txtFornecedor" placeholder="Ex: Nome do fornecedor">
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-4 lblAl">
									<label>Tipo de Pagamento: </label>
								</div>
								<div class="col-md-6">
									<select name="slcTipo">
										<option value="prazo">À prazo</option>
										<option value="vista">À vista</option>
										<option value="cartão">Cartão</option>
									</select>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-4 lblAl">
									<label>Vencimento: </label>
								</div>
								<div class="col-md-6">
									<input type="date" id="dateVenc" name="dateVencimento">
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-4 lblAl">
									<label>Valor: </label>
								</div>
								<div class="col-md-6">
									<input type="text" id="numValor" name="txtValor"  placeholder="Ex: 100.50">
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