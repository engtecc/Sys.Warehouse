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
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css" >
	<link rel="stylesheet" type="text/css" href="../../css/cadCliente.css">
	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/cadastrarCliente.js"></script>
	<script src="../../js/script.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
</head>

<body>
	
	<div class = "jumbotron text-center removerMargem">
		<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
		<h4><img class="rounded-circle" src="../../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="row rowForm">
				<div class="col-md-5"></div>
				<div class="col-md-3" align="center">
					<a id="btnCancelar" class="btn btn-danger" style="float: left; margin-left:20px;margin-top:30px; margin-bottom:0px; padding:30px; width:200px; font-weigth:bold; font-size:20px;" href="../../paginas/consultar.php" role="button">Cancelar</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			
		<?php
					require_once '../bd.php';
					$sql = "SELECT * FROM produto order by quantidade_estoque ASC";
					if ($resultado = $conexao->query($sql)){
						if ($resultado->num_rows > 0){
							echo '<table class="table" style="margin-top:100px; margin-bottom:150px;">
						<thead class="thead-dark">
							<tr style="text-align: center;">
								<th style="width: 5%;">#</th>
								<th style="width: 30%;">Codigo de barras</th>
								<th style="width: 25%;">Nome do produto</th>
								<th style="width: 15%;">Preço de compra</th>
								<th style="width: 15%;">Preço de venda</th>
								<th style="width: 10%;">Quantidade</th>						
							</tr>
						</thead>';
							echo "<tbody";
							$i = 1;
							while ($linha = $resultado->fetch_array()) {
								echo "<tr>";
								
								echo "<td>" .$i. "</td>";
								echo "<td>" .$linha['codigo_de_barras']. "</td>";
								echo "<td>" .$linha['nome']. "</td>";
								echo "<td>" .$linha['preco_de_compra']. "</td>";
								echo "<td>" .$linha['preco_de_venda']. "</td>";
								echo "<td>" .$linha['quantidade_estoque']. "</td>";
								$i++;
							}

							echo "</tbody>";
							echo "</table>";
							$resultado->free();
						}else{
							echo"<center><p class='lead' style='margin-top:100px;'><b><h1>Nenhum registro encontrado.</h1></b></p></center>";
						}
					}else{
						echo "Erro ao executar o comando SQL.";
					}

					$conexao->close();

				?>
			</table>
		</div>
		<div class="col-md-1"></div>
	</div>
</body>