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
	<link rel="stylesheet" type="text/css" href="../css/consulta.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/cadastrarCliente.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/jquery.mask.min.js"></script>
	<script src="../js/maskscript.js"></script>

</head>

<body>
	
	<div class = "jumbotron text-center removerMargem">
		<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
		<h4><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
	</div>
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$cpf = $_POST["txtCpf"];
		$data = $_POST["txtData"];
		$nome = $_POST["txtNome"];
		$radio = $_POST["gridConsulta"] ;
		$nomefornecedor = $_POST["txtFornecedor"];
		if($radio == "option1")
		{
			header("Location: ../crud/consultas/devedores.php");
		}
		if($radio == "option2")
		{
			header("Location: ../crud/consultas/clienteCpf.php?cpf=$cpf");
		}
		if($radio == "option3")
		{
			header("Location: ../crud/consultas/clienteAniversario.php?data=$data");
		}
		if($radio == "option4")
		{
			header("Location: ../crud/consultas/clienteNome.php?nome=$nome");
		}
		if($radio == "option5")
		{
			header("Location: ../crud/consultas/quantidade.php");
		}
		if($radio == "option6")
		{
			header("Location: ../crud/consultas/nomevasilhame.php");
		}
		if($radio == "option7")
		{
			header("Location: ../crud/consultas/contas.php");
		}
		if($radio == 'option8')
		{
			header("Location: ../crud/consultas/nomefornecedor.php?nome=$nomefornecedor");
		}
	}
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="row rowForm">
					<div class="col-md-7"></div>
					<div class="col-md-1" align="center">
						<a id="btnCancelar" class="btn btn-danger" style="float: right;" href="principal.php" role="button">Cancelar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<form style="width: 100%;" action="" method="POST">
		<div class="row rowForm">
			<div class="col-md-2"></div>
			<div class="col-md-4">
				<h2 class="subTitulo">Consultar Cliente</h2>
				<div class="rowForm col-md-4 margem3">
					<input class="form-check-input" type="radio" name="gridConsulta" id="gridConsulta1" value="option1" checked>
					<label class="form-check-label" for="gridConsulta1">Devedores</label>
				</div>
				<div class="col-md-12 rowForm margem3">
					<div class="row">
						<div class="col-md-4">
							<input class="form-check-input" type="radio" name="gridConsulta" id="gridConsulta2" value="option2">
							<label class="form-check-label" for="gridConsulta2">CPF:</label>
						</div>
						<div class="col-md-8">
							<input class="form-control form-control-sm" type="number" name="txtCpf" id="txtCpf" placeholder="apenas números">
						</div>
					</div>
				</div>
				<div class="col-md-12 rowForm margem3">
					<div class="row">
						<div class="col-md-4">
							<input class="form-check-input" type="radio" name="gridConsulta" id="gridConsulta3" value="option3" style="">
							<label class="form-check-label" for="gridConsulta3">Aniversariante:</label>
						</div>
						<div class="col-md-8">
							<input class="form-control form-control-sm" type="date" name="txtData">
						</div>
					</div>
				</div>
				<div class="col-md-12 rowForm margem3">
					<div class="row">
						<div class="col-md-4">
							<input class="form-check-input" type="radio" name="gridConsulta" id="gridConsulta4" value="option4">
							<label class="form-check-label" for="gridConsulta4">Nome Cliente:</label>
						</div>
						<div class="col-md-8">
							<input class="form-control form-control-sm" type="text" name="txtNome">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<h2 class="subTitulo">Consultar Produto e Fornecedores</h2>
				<div class="row">
					<div class="col-md-12 rowForm margem3">
						<input class="form-check-input" type="radio" name="gridConsulta" id="produto1" value="option5">
						<label class="form-check-label" for="produto1">Quantidade</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5" style="margin-left:015px;">
						<input class="form-check-input" type="radio" name="gridConsulta" id="fornecedor2" value="option8">
						<label class="form-check-label" for="fornecedor2">Nome do Forncedor:</label>
					</div>
					<div class="col-md-6">
						<input class="form-control form-control-sm" type="text" name="txtFornecedor" style='width:225px;'>
					</div>
				</div>
				<div class="row" style="margin-top:50px;">
					<div class="col-md-8"></div>
					<div class="col-md-4">
						<input type="submit" name="btnPesquisar" class="btn btn-success" id="btnPesquisar" value="Pesquisar" style="">
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</form>  
</body>