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
		<link rel="stylesheet" type="text/css" href="../css/cadproduto.css">
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
		<div class="modal fade" id="modalok" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalok">Produto alterado com sucesso!</h5>
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
						<h5 class="modal-title text-error" id="modalerro">Falha ao alterar o produto!</h5>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success btn-sm ok" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
		<?php
			require_once ("../crud/bd.php");
			$nomeInput = $codigoInput = $preco_compraInput = $preco_vendaInput = $quantidadeInput = $validadeInput = "";
			if($_SERVER["REQUEST_METHOD"] == "GET")
			{
				$codigo = $_GET["pesq"];
				$sql = mysqli_query($conexao,"SELECT * FROM produto where codigo_de_barras = '$codigo'");
				while($row = mysqli_fetch_array($sql)){
					$codigoInput = "<input class='form-control form-control-sm' style='background: #D8D8D8;' type='text' id='txtCodigoBarras' name='txtCodigoBarras' value='$codigo' readonly>";
					$nome = $row["nome"];
					$nomeInput = "<input class='form-control form-control-sm' type='text' id='txtNome' name='txtNome' value='$nome'>";
					$preco_venda = $row["preco_de_venda"];
					$preco_vendaInput = "<input class='form-control form-control-sm' type='text' id='txtPrecoVenda' name='txtPrecoVenda' value='$preco_venda'>";
					$preco_compra = $row["preco_de_compra"];
					$preco_compraInput = "<input class='form-control form-control-sm' type='text' id='txtPrecoCompra' name='txtPrecoCompra' value='$preco_compra'>";
					$quantidade = $row["quantidade_estoque"];
					$quantidadeInput = "<input class='form-control form-control-sm' type='text' id='txtQuantidade' name='txtQuantidade' value='$quantidade'>";
					$validade = $row["validade"];
					$validadeInput = "<input class='form-control form-control-sm' style='width: 230px; height: 28px;'type='date' id='txtValidade' name='txtValidade' value='$validade'>";
					
				}
			}
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$codigo_de_barras = $nome = $preco_de_venda = $preco_de_compra = $quantidade_estoque = $validade = $aux  = "";
				if($_SERVER["REQUEST_METHOD"] == "POST"){
					
					$codigo_de_barras = $_POST["txtCodigoBarras"];
					$nome = $_POST["txtNome"];
					$preco_de_venda = $_POST["txtPrecoVenda"];
					$preco_de_compra = $_POST["txtPrecoCompra"];
					$quantidade_estoque = $_POST["txtQuantidade"];
					$validade = $_POST["txtValidade"];
					$sql = "UPDATE produto SET codigo_de_barras = '$codigo_de_barras', nome ='$nome', preco_de_venda = '$preco_de_venda',preco_de_compra= '$preco_de_compra',quantidade_estoque = '$quantidade_estoque' ,validade ='$validade' where codigo_de_barras = '$codigo_de_barras'";
					
					if($stmt = $conexao->prepare($sql))
					{
						
						if($stmt->execute())
						{
							echo("<script language='javascript'>$('#modalok').modal('show'); </script>");
							echo ("<script language='javascript'> $('.ok').click(function(){window.location.replace('../paginas/pesquisar_editar.php');});</script>");

						}else{
							echo("<script language='javascript'>$('#modalerro').modal('show'); </script>");
							echo ("<script language='javascript'> $('.ok').click(function(){window.location.replace('../paginas/edtProduto?$codigo.php');});</script>");
						}
					}

					$stmt->close();
					$conexao->close();
					
				}
			}
		?>
		<div class="container">
			<h2 class="subTitulo">Editar Produto</h2>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 mt-3">
					<div class="row">
						<div class="col-md-12">
							<form action="" method="POST" id="formedtProduto" enctype="multipart/form-data"> 
								<div class="row rowForm">
									<div class="col-md-9"></div>
									<div class="col-md-3" align="center">
										<a id="btnCancelar" class="btn btn-danger" href="pesquisar_editar.php" role="button">Cancelar</a>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Nome: </label>
									</div>
									<div class="col-md-9">
										<?php echo($nomeInput) ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Quantidade: </label>
									</div>
									<div class="col-md-9">
										<?php echo ($quantidadeInput); ?> 	
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Preço da compra: </label>
									</div>
									<div class="col-md-9">
										<?php echo($preco_compraInput); ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Preço de venda: </label>
									</div>
									<div class="col-md-9">
										<?php echo($preco_vendaInput); ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Validade: </label>
									</div>
									<div class="col-md-9">
										<?php echo($validadeInput); ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Código de barras: </label>
									</div>
									<div class="col-md-9">
										<?php  echo($codigoInput);?>
									</div>
								</div>
								<div class="row rowForm"style="margin-bottom:30px">
									<div class="col-md-9"></div>
									<div class="col-md-3" align="center">
										<input type="submit" class="btn btn-success" id="btnCancelar" value="Salvar">
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