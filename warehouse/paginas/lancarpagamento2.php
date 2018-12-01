<?php
session_start();
require_once ('../crud/bd.php');
$id = $_GET['id'];

$query = mysqli_query($conexao, "SELECT * FROM cliente,pessoa WHERE id_cliente='$id' and cliente.id_pessoa = pessoa.id_pessoa LIMIT 1");
$resultado = mysqli_fetch_assoc($query);
$query = mysqli_query($conexao,"SELECT divida FROM cliente WHERE id_cliente = '$id'");
$row = mysqli_fetch_array($query);
$divida = $row["divida"];
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

	<script src="../js/jquery.min.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/lancarpagamento.js"></script>
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
		<h2 class="subTitulo">Lançar pagamento</h2>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 mt-3">
				<div class="row">
					<div class="col-md-12">
						<form id="formEditar" method="post" enctype="multipart/form-data">
							<div class="form-group col-md-12">
								<div class="form-row">
									<div class="form-group col-md-12">
										<label>Nome:</label>
										<input class="form-control" type="text" id="nome" name="nome" value="<?php echo $resultado['nome']; ?>" readonly>
									</div>
									<div class="form-group col-md-4">
										<label>Dívida:</label>
										<input class="form-control text-center" type="decimal" min="0,00" id="divida" name="divida" onchange="calcularDivida()" readonly value="<?php echo($divida) ?>">
									</div>
									<div class="form-group col-md-4">
										<label>Valor a ser pago:</label>
										<input class="form-control text-center" type="decimal" min="0,00" id="pagar" name="pagar" value="" onchange="calcularDivida()">
									</div>
									<div class="form-group col-md-4">
										<label>Falta pagar:</label>
										<input type="decimal" value="" min="0,00" name="faltapagar" id="faltapagar" class="form-control text-center" maxlength="5" readonly>
									</div>
									<div class="col-md-12 mt-5" align="center">
										<a id="btnCancelar" class="btn btn-danger" href="principal.php" role="button">Cancelar</a>
										<button id="btnSalvar" class="btn btn-success">Salvar</button>
									</div>

								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function () {
			$('#sidebarCollapse').on('click', function () {
				$('#sidebar').toggleClass('active');
			});
		});
	</script>
	<span id="toTopBtn"></span>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#sidebarCollapse').on('click', function () {
				$('#sidebar').toggleClass('active');
			});
		});
	</script>
	<span id="toTopBtn"></span>
</body>
</html>