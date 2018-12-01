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
$_SESSION["quantidadeTotal"] = 0;
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
	<script src="../js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="site-header">
		<div class = "jumbotron text-center removerMargem">
			<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
			<h4><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
		</div>
	</nav>
	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-4 mt-3">
			<center> 
				<div class="container marketing">
					<div class="row">
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="venda.php"><img class="rounded-circle" src="../imagens/venda.png" alt="Generic placeholder image" width="100" height="100"><h5>Vendas</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="cadcliente.php"><img class="rounded-circle" src="../imagens/cliente.png" alt="Generic placeholder image" width="100" height="100"><h5>Cadastrar<br>cliente</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="cadfornecedor.php"><img class="rounded-circle" src="../imagens/fornecedor.png" alt="Generic placeholder image" width="100" height="100"><h5>Cadastrar<br>fornecedor</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="consultar.php"><img class="rounded-circle" src="../imagens/consultar.png" alt="Generic placeholder image" width="100" height="100"><h5>Consultar</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="cadfuncionario.php"><img class="rounded-circle" src="../imagens/funcionario.png" alt="Generic placeholder image" width="100" height="100"><h5>Cadastrar<br>funcionário</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="cadproduto.php"><img class="rounded-circle" src="../imagens/produto.png" alt="Generic placeholder image" width="100" height="100"><h5>Cadastrar<br>produto</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="contas.php"><img class="rounded-circle" src="../imagens/contas.png" alt="Generic placeholder image" width="100" height="100"><h5>Lançar<br>compras</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="pesquisar_editar.php"><img class="rounded-circle" src="../imagens/alterar.png" alt="Generic placeholder image" width="100" height="100"><h5>Alterar<br>cadastros</h5></a>
						</div>
						<div class="col-lg-4 espacamento">
							<a class="text-opcoes" href="relatorios.php"><img class="rounded-circle" src="../imagens/relatorios.png" alt="Generic placeholder image" width="100" height="100"><h5>Relatórios</h5></a>
						</div>
						<div class="col-lg-4 text-center espacamento">
							<a class="text-opcoes" href="lancarpagamento.php"><img class="rounded-circle" src="../imagens/lancar_pagamento.png" alt="Generic placeholder image" width="100" height="100"><h5>Lançar<br>pagamento</h5></a>
						</div>
						<div class="col-lg-4 text-center espacamento">
							<a class="text-opcoes" href="emprestimo.php"><img class="rounded-circle" src="../imagens/emprestimo.png" alt="Generic placeholder image" width="100" height="100"><h5>Empréstimo</h5></a>
						</div>
						<div class="col-lg-4 text-center espacamento">
							<a class="text-opcoes" href="backup.php"><img class="rounded-circle" src="../imagens/backup.png" alt="Generic placeholder image" width="100" height="100"><h5>Backup</h5></a>
						</div>
					</div>
				</div>
				<div class="col-md-5 mt-5" align="center">
					<a id="btnCancelar" class="btn btn-danger" href="../crud/sair.php" role="button">Sair</a>
				</div>   
			</center>	
		</div>
		<div class="col-md-4 mt-3">
			<center> 
				<div class="container marketing">
					<div class="row">
						<p id="result"></p> 
						<?php
						require_once '../crud/bd.php';
						$sql = "SELECT * FROM fornecedor LIMIT 3";
						// $sql = "SELECT * FROM fornecedor Order By data_de_vencimento ASC LIMIT 3";
						if ($resultado = $conexao->query($sql)){
							if ($resultado->num_rows > 0){
								echo "<h4 class='subTitulo'>Contas a pagar</h4>";
								echo "<table class='table table-bordered table-striped text-center tabelaOcultar'>";
								echo "<thead><tr>";
								echo "<th class='text-center' style='width:60%;'>FORNECEDOR</th>";
								echo "<th class='text-center' style='width:40%;'>DATA DE VENCIMENTO</th>";
								echo "</tr></thead>";
								echo "<tbody";
								while ($linha = $resultado->fetch_array()) {
									echo "<tr>";
									echo "<td>" .$linha['nome']. "</td>";
									echo "<td>" ."Cadê?". "</td>";
									// echo "<td>" .date("d/m/Y", strtotime($linha['data_de_vencimento'])). "</td>";
								}
								echo "</tbody>";
								echo "</table>";
								$resultado->free();

							}else{
								echo "<h4 class='subTitulo'>Contas a pagar</h4>";
								echo "<table class='table table-bordered table-striped text-center tabelaOcultar'>";
								echo "<thead><tr>";
								echo "<th class='text-center' style='width:100%;'>Nenhum registro encontrado!</th>";
								echo "</tr></thead>";
								echo "<tbody";
							}
						}else{
							echo "Erro ao executar o comando SQL.";
						}
						?>
					</div>
					<div class="row">
						<p id="result"></p> 
						<?php
						$sql = "SELECT * FROM cliente, pessoa where cliente.id_pessoa = pessoa.id_pessoa Order By nome ASC LIMIT 3";
						if ($resultado = $conexao->query($sql)){
							if ($resultado->num_rows > 0){
								echo "<h4 class='subTitulo'>Contas a receber</h4>";
								echo "<table class='table table-bordered table-striped text-center tabelaOcultar'>";
								echo "<thead><tr>";
								echo "<th class='text-center' style='width:60%;'>CLIENTE</th>";
								echo "<th class='text-center' style='width:40%;'>DATA DE VENCIMENTO</th>";
								echo "</tr></thead>";
								echo "<tbody";
								while ($linha = $resultado->fetch_array()) {
									echo "<tr>";
									echo "<td>" .$linha['nome']. "</td>";
									echo "<td>" ."Cadê?". "</td>";
								}
								echo "</tbody>";
								echo "</table>";
								$resultado->free();

							}else{
								echo "<h4 class='subTitulo'>Contas a receber</h4>";
								echo "<table class='table table-bordered table-striped text-center tabelaOcultar'>";
								echo "<thead><tr>";
								echo "<th class='text-center' style='width:100%;'>Nenhum registro encontrado!</th>";
								echo "</tr></thead>";
								echo "<tbody";
							}
						}else{
							echo "Erro ao executar o comando SQL.";
						}
						?>
					</div>
					<div class="row">
						<p id="result"></p> 
						<?php
						$sql = "SELECT * FROM emprestimo as e, cliente as c, pessoa as p WHERE e.id_cliente = c.id_cliente AND c.id_pessoa = p.id_pessoa Order By data_devolucao ASC LIMIT 3";
						if ($resultado = $conexao->query($sql)){
							if ($resultado->num_rows > 0){
								echo "<h4 class='subTitulo'>Controle de empréstimos</h4>";
								echo "<table class='table table-bordered table-striped text-center tabelaOcultar'>";
								echo "<thead><tr>";
								echo "<th class='text-center' style='width:60%;'>CLIENTE</th>";
								echo "<th class='text-center' style='width:40%;'>DATA DE DEVOLUÇÃO</th>";
								echo "</tr></thead>";
								echo "<tbody";
								while ($linha = $resultado->fetch_array()) {
									echo "<tr>";
									echo "<td>" .$linha['nome']. "</td>";
									echo "<td>" .date("d/m/Y", strtotime($linha['data_devolucao'])).  "</td>";
								}
								echo "</tbody>";
								echo "</table>";
								$resultado->free();

							}else{
								echo "<h4 class='subTitulo'>Controle de empréstimos</h4>";
								echo "<table class='table table-bordered table-striped text-center tabelaOcultar'>";
								echo "<thead><tr>";
								echo "<th class='text-center' style='width:100%;'>Nenhum registro encontrado!</th>";
								echo "</tr></thead>";
								echo "<tbody";
							}
						}else{
							echo "Erro ao executar o comando SQL.";
						}
						?>
					</div>
				</div>	
			</center>	
		</div>
	</div>
</body>
</html>