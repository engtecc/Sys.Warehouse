<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location: ../index.php');
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
	<link rel="stylesheet" type="text/css" href="../css/vendas.css">

	<script src="../js/jquery.min.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="../js/vendasfuncionario.js"></script>

</head>

<?php
if ($_SESSION['administrador'] == 0){
	echo "<script>
		$(document).ready(function() {
			$('.cancelar').hide();
			$('.sair').show();
		});
	</script>";
}else{
	echo "<script>
		$(document).ready(function() {
			$('.cancelar').show();
			$('.sair').hide();
		});
	</script>";
}
?>

<body>
	<div class = "jumbotron text-center removerMargem">
		<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
		<h4><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
	</div>
<?php
	
	require_once ("../crud/bd.php");
	$cont = $codigo = '';
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$codigo = $_POST["txtCodBarras"];
		$select  = "SELECT nome from produto where codigo_de_barras = '$codigo'";
		$sql = mysqli_query($conexao,$select);
		$resultado = mysqli_fetch_array($sql);
		$nome = $resultado["nome"];
		$data = date('Y-m-d');
		$cont ='<div class="row rowForm">
					<div class="col-md-3 lblAl">
						<label>Produto: </label>
					</div>
					<div class="col-md-9">
						<input class="form-control form-control-sm" style="background: #D8D8D8;" class="confTxtBox" type="text" step="any" id="txtProd"value="'.$nome.'" readonly>
					</div>
				</div>
				<div class="row rowForm">
					<div class="col-md-3 lblAl">
						<label>Data: </label>
					</div>
					<div class="col-md-3">
						<input class="form-control form-control-sm" style="background: #D8D8D8;" name="datDia" id="datDia1" type="date" value= '.$data.'>
					</div>
				</div>
				<div class="row rowForm">
					<div class="col-md-3 lblAl">
						<label>Quantidade: </label>
					</div>
					<div class="col-md-3">
						<input class="form-control form-control-sm" type="number" id="numQuant"  value="1" min="0" step="1" class="text-center">
					</div>
				</div>';
		
	}
?>
	<div class="container">
		<h2 class="subTitulo">Vendas</h2>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 mt-3">
				<div class="row">
					<div class="col-md-12">
						<form method="POST" id="formCli"> 
							<div class="row rowForm">
								<div class="col-md-9"></div>
								<div class="col-md-3" align="center">
									<a id="btnCancelar" class="btn btn-danger cancelar" href="principal.php" role="button" style="display: none;">Cancelar</a>

									<a id="btnCancelar" class="btn btn-danger sair" href="../crud/sair.php" role="button" style="display: none;">Sair</a>
								</div> 
							</div> 
							<div class="row rowForm">
								<div class="col-md-3 lblAl"style="margin-top:10px;">
									<label>Cód. Barras:</label>
								</div>
								<div class="col-md-7" style="margin-top:10px;">
									<input class="form-control form-control-sm" type="text" id="txtCodBarras" name="txtCodBarras" value=<?php echo($codigo); ?> >
								</div>
								<div class="col-md-2">
									<input type="submit" id="btnCancelar" value="Pesquisar" class="btn btn-success">
								</div>
							</div>
							<?php echo($cont);?>
							<div class="row rowForm rowTable">
								<div class="col-md-3 lblAl">
									<label style="font-weight: bold;">Produtos da Compra:</label>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2">
									<a id="btnRemover" class="btn btn-primary" href="" role="button">Adicionar</a>
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
								<div class="col-md-6">
									<input class="form-control form-control-sm" type="number" step="any" id="numTotal" value="0000.00">
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-6">
									<a id="btnCliente" class="btn btn-primary cliente" href="vendacliente.php" role="button" style="display: none;">Finalizar com Cliente</a>
								</div>
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