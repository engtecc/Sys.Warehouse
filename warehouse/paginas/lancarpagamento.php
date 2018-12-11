<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location: ../index.php');
}
if ($_SESSION['administrador'] != 1){
	header('location: venda.php');
}
$_SESSION["dbgrid"] = array();
$_SESSION["dbgriddados"] = array();
$_SESSION["valortotal"] = 0;
$_SESSION["iterador"] = 1;
$_SESSION["vendaConcluida"] = 0;
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
	<div class="container">
		<h2 class="subTitulo">Lançar pagamento</h2>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 mt-3">
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" value="pessoa" id="capture">
						<form action="" method="POST" id="formProduto" enctype="multipart/form-data"> 
							<div class="row rowForm">
								<div class="col-md-9"></div>
								<div class="col-md-3" align="center">
									<a id="btnCancelar" class="btn btn-danger" href="principal.php" role="button">Cancelar</a>
								</div>
							</div>
							<div class="row rowForm mt-3">
								<div class="col-md-5 ml-5">
									<label>Nome do cliente: </label>
								</div>
								<div class="input-group mx-5">
									<input class="form-control form-control-sm" type="text" id="pesquisar" name="pesquisar" value="" placeholder="Buscar cliente...">
									<button type="submit" class="btn btn-success"><img src='../svg/pesquisar.svg' width='25' height='25'></button>
								</div>
							</div>
						</form>
						<p id="result"></p> 
						<?php
						require_once '../crud/bd.php';
						$sql = "SELECT * FROM cliente,pessoa where cliente.id_pessoa = pessoa.id_pessoa and divida > '0' Order By nome ASC";
						if ($resultado = $conexao->query($sql)){
							if ($resultado->num_rows > 0){
								echo "<table class='table table-bordered table-striped text-center tabelaOcultar'>";
								echo "<thead class='thead-dark'><tr>";
								echo "<th class='text-center' style='width:60%;'>Nome</th>";
								echo "<th class='text-center' style='width:20%;'>Dívida</th>";
								echo "<th class='text-center' style='width:20%;'>Editar</th>";
								echo "</tr></thead>";
								echo "<tbody";
								while ($linha = $resultado->fetch_array()) {
									echo "<tr>";
									echo "<td>" .$linha['nome']. "</td>";
									echo "<td>" .$linha['divida']. "</td>";
									echo "<td class='text-center align-middle'><a href='lancarpagamento2.php?id=".$linha['id_cliente']."'title='Editar' data-toggle='tooltip''><img src='../svg/editar.svg' width='25' height='25'></a>";
								}

								echo "</tbody>";
								echo "</table>";
								$resultado->free();

							}else{
								echo"<p class='lead'>Nenhum registro encontrado.</p>";
							}
						}else{
							echo "Erro ao executar o comando SQL.";
						}

						$conexao->close();

						?>
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
</body>
</html>