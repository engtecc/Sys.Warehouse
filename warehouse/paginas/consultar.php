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
	
	<div class = "jumbotron text-center removerMargem">
		<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
		<h4><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
	</div>
	<?php
		if(isset($_POST["btnCliente"]))
		{
			if($_POST["gridConsulta"] == "option1")
			{
				header("Location: ../crud/consultas/devedores.php");
			}
			if($_POST["gridConsulta"] == "option2")
			{
				$cpf = $_POST["cpf"];
				header("Location: ../crud/consultas/clienteCpf.php?cpf=$cpf");
			}
			if($_POST["gridConsulta"] == "option3")
			{
				$data = $_POST["data"];
				header("Location: ../crud/consultas/clienteAniversario.php?data=$data");
			}
			if($_POST["gridConsulta"] == "option4")
			{
				$nome = $_POST["nome"];
				header("Location: ../crud/consultas/clienteNome.php?nome=$nome");
			}
		}
		if(isset($_POST["btnProduto"]))
		{
			if($_POST["gridConsulta"] == "option5")
			{
				header("Location: ../crud/consultas/devedores.php");
			}
			if($_POST["gridConsulta"] == "option6")
			{
				$cpf = $_POST["cpf"];
				header("Location: ../crud/consultas/clienteCpf.php?cpf=$cpf");
			}
			if($_POST["gridConsulta"] == "option7")
			{
				$data = $_POST["data"];
				header("Location: ../crud/consultas/clienteAniversario.php?data=$data");
			}

		}
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="row rowForm">
					<div class="col-md-8"></div>
					<div class="col-md-1" align="center">
						<a id="btnCancelar" class="btn btn-danger" style="float: right;" href="principal.php" role="button">Cancelar</a>
					</div>
				</div>
			</div>
		</div>
		<form style="width: 100%;" action="" method="POST">
		<div class="row" style="margin-bottom:100px;">
			<div class="col-md-1"></div>
			<div class="col-md-3 mr-5 ml-3">
				<div class="row">
					<h2 class="subTitulo">Consultar cliente</h2>
				</div>
				<div class ="row">
					
						<div class="form-row align-items-center">
							<div class="col-md-12 rowForm">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gridConsulta" id="gridConsulta1" value="option1" checked>
									<label class="form-check-label" for="gridConsulta1">Devedores</label>
								</div>
							</div>
						</div>
						<div class="form-row rowForm align-items-center">
							<div class="col-md-4">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gridConsulta" id="gridConsulta2" value="option2">
									<label class="form-check-label" for="gridConsulta2">CPF:</label>
								</div>
							</div>
							<div class="col-md-8">
								<input class="form-control form-control-sm" type="text" name="cpf" id="gridConsulta2" placeholder="apenas números" maxlength="11" pattern="[0-9]+$">
							</div>
						</div>
						<div class="form-row rowForm align-items-center">
							<div class="col-md-4">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gridConsulta" id="gridConsulta3" value="option3">
									<label class="form-check-label" for="gridConsulta3">Aniversariante:</label>
								</div>
							</div>

							<div class="col-md-8">
								<input class="form-control form-control-sm" type="date" name="data">
							</div>
						</div>
						<br>

						<div class="form-row align-items-center">
							<div class="col-md-4">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gridConsulta" id="gridConsulta4" value="option4">
									<label class="form-check-label" for="gridConsulta4">Nome do cliente:</label>
								</div>
							</div>

							<div class="col-md-8">
								<input class="form-control form-control-sm" type="text" name="nome" placeholder="nome do cliente">
							</div>
						</div>
						<br>
						<div class="form-row justify-content-end">
							<input type="submit" class="btn btn-success " name="btnCliente" type="button" class="btn btn-primary" value="Pesquisar Cliente">
						</div>
				</div>
			</div>
			<div class="col-md-4 ml-3">
				<div class="row mb-5">
					<h2 class="subTitulo">Consultar produto</h2>
				</div>
				<div class ="row">
						<div class="form-row rowForm align-items-center">
							<div class="col-md-4">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gridConsulta" id="produto1" value="option5">
									<label class="form-check-label" for="produto1">Quantidade:</label>
								</div>
							</div>

							<div class="col-md-8">
								
							</div>
						</div>
						<br>
						<div class="form-row align-items-center">
							<div class="col-md-4">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gridConsulta" id="produto2" value="option6">
									<label class="form-check-label" for="produto2">Vasilhame</label>
								</div>
							</div>

							<div class="col-md-8">
								
							</div>
						</div><br>
						<div class="form-row align-items-center">
							<div class="col-md-6">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gridConsulta" id="produto3" value="option7">
									<label class="form-check-label" for="produto3">Nome do vasilhame</label>
								</div>
							</div><br>
							<div class="col-md-6">
								
							</div>
						</div>
						<div class="form-row justify-content-end mt-4" ">
							<input type="submit" name="btnProduto" style="margin-top:43px;" class="btn btn-success " type="button" class="btn btn-primary" value="Pesquisar Produto">
						</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="row mb-5">
					<h2 class="subTitulo">Consultar fornecedor</h2>
				</div>
				<div class ="row">
						<div class="form-row rowForm align-items-center">
							<div class="col-md-4">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gridConsulta" id="fornecedor1" value="option8">
									<label class="form-check-label" for="fornecedor1">Contas:</label>
								</div>
							</div>

							<div class="col-md-8">
								<input class="form-control form-control-sm" type="text" name="cpf" id="fornecedor1" placeholder="contas">
							</div>
						</div><br>
						<div class="form-row align-items-center">
							<div class="col-md-4">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gridConsulta" id="fornecedor2" value="option9">
									<label class="form-check-label" for="fornecedor2">Nome do fornecedor:</label>
								</div>
							</div>

							<div class="col-md-8">
								<input class="form-control form-control-sm" type="text" name="nome" placeholder="nome do fornecedor">
							</div>
						</div><br>
						<div class="form-row justify-content-end mt-5">
							<input type="submit" name="btnFornecedor" style="margin-top:10px;" class="btn btn-success " type="button" class="btn btn-primary" value="Pesquisar fornecedor">
						</div>
				</div>
			</div>
		</form>
		</div>
	</div>
</body>