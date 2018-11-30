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
	echo "<script language='javascript'>
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
	<div class="modal fade" id="modalok" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalok">Produto adicionado à lista de vendas com sucesso!</h5>
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
					<h5 class="modal-title text-error" id="modalerro">Falha ao adicionar! Quantidade vazia.</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-sm ok" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalvendaok" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalok">Venda Efetivada!</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-sm ok" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modaldelok" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modaldelok">Deleção Efetivada!</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm ok" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<?php
		if($_SESSION["vendaConcluida"] == 1)
		{
			echo("<script language='javascript'>$('#modalvendaok').modal('show'); </script>");
			$_SESSION["vendaConcluida"] = 0;
		}
		if($_SESSION["vendaConcluida"] == 3)
		{
			echo("<script language='javascript'>$('#modaldelok').modal('show'); </script>");
			$_SESSION["vendaConcluida"] = 0;
		}
	?>
<?php
	
	require_once ("../crud/bd.php");
	$cont = $codigo = '';
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$codigo = $_POST["txtCodBarras"];
		$select  = "SELECT nome,preco_de_venda from produto where codigo_de_barras = '$codigo'";
		$sql = mysqli_query($conexao,$select);
		$resultado = mysqli_fetch_array($sql);
		$nome = $resultado["nome"];
		$preco = $resultado["preco_de_venda"];
		$data = date('Y-m-d');
		$cont ='<div class="row rowForm"><div class="col-md-3 lblAl "><label>Produto: </label></div><div class="col-md-9"><input style="background: #D8D8D8;" class="confTxtBox form-control" type="text" step="any" id="txtProd"value="'.$nome.'" readonly></div></div><div class="row rowForm"><div class="col-md-3 lblAl"><label>Data: </label></div><div class="col-md-3"><input style="background: #D8D8D8;" class="form-control" name="datDia" id="datDia1" type="date" value= '.$data.'></div></div><div class="row rowForm"><div class="col-md-3 lblAl"><label>Quantidade: </label></div><div class="col-md-3"><input type="number" id="numQuant" name="txtQuantidade" class="form-control text-center"></div></div>';
		if(isset($_POST["btnAdicionar"]))
		{
			if($_POST["txtQuantidade"]!= "")
			{
				$quantidade = $_POST["txtQuantidade"];

<<<<<<< HEAD
				$_SESSION["valortotal"] = $_SESSION["valortotal"] + ($quantidade*$preco);
				$tabela = '<thead class="thead-light">
				<tr style="text-align: center;">
				<th style="width: 5%;">'.$_SESSION["iterador"].'</th>
				<th style="width: 55%;">'.$nome.'</th>
				<th style="width: 15%;">'.$preco.'</th>
				<th style="width: 5%;">'.$quantidade.'</th>
				<th style="width: 15%;">'.$quantidade*$preco.'</th>	
				<th style="width:5%;"><a href=""><img src="../imagens/delete.png" style="width:25px;height:25px;"></a></th>
				</tr></thead>';
=======
					$_SESSION["valortotal"] = $_SESSION["valortotal"] + ($quantidade*$preco);
					$tabela = '<thead class="thead-light">
					<tr style="text-align: center;">
					<th style="width: 5%;">'.$_SESSION["iterador"].'</th>
					<th style="width: 55%;">'.$nome.'</th>
					<th style="width: 15%;">'.$preco.'</th>
					<th style="width: 5%;">'.$quantidade.'</th>
					<th style="width: 15%;">'.$quantidade*$preco.'</th>	
					<th style="width:5%;"><a href="deletar.php?del='.($_SESSION["iterador"]-1).'"><img src="../imagens/delete.png" style="width:25px;height:25px;"></a></th>
					</tr></thead>';
>>>>>>> 7b329a40ee7ef5f6451a9497e744156820e4f48d

				array_push($_SESSION["dbgriddados"],$codigo);
				array_push($_SESSION["dbgriddados"],$nome);
				array_push($_SESSION["dbgriddados"],$data);
				array_push($_SESSION["dbgriddados"],$quantidade);
				array_push($_SESSION["dbgriddados"],$quantidade*$preco);
				array_push($_SESSION["dbgrid"],$tabela);
				$_SESSION["iterador"] = $_SESSION["iterador"] +1;

				echo("<script language='javascript'>$('#modalok').modal('show'); </script>");
			}else{
				echo("<script language='javascript'>$('#modalerro').modal('show'); </script>");
			}
		}
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
									<input type="submit" name="btnPesquisar" id="btnCancelar" value="Pesquisar" class="btn btn-success">
								</div>
							</div>
							<?php echo($cont);?>
							<div class="row rowForm rowTable">
								<div class="col-md-3 lblAl">
									<label style="font-weight: bold;">Produtos da Compra:</label>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2">
								</div>
								<div class="col-md-2">
									<input type="submit" id="btnRemover" class="btn btn-primary" name="btnAdicionar" role="button" value ="Adicionar">
								</div>
							</div>
							<div style="height: 10px;"></div>
							<div class="cotainer-fluid">
								<div class="row divTable">
									<table class="table table-sm table-bordered">
										<thead class="thead-light">
											<tr style="text-align: center;">
												<th style="width: 5%;">#</th>
												<th style="width: 55%;">Nome Produto</th>
												<th style="width: 15%;">Preço</th>
												<th style="width: 5%;">Quant.</th>
												<th style="width: 15%;">Preço Total</th>
												<th style="width:5%;">Excluir</th>	
											</tr>
											<?php
												foreach($_SESSION["dbgrid"] as $key => $valor)
												{
													echo($valor);
												}
											?>
										</thead>
									</table>
								</div>
							</div>
							<div class="row rowForm" style="vertical-align: center;">
								<div class="col-md-1"></div>
								<div class="col-md-5">
									<h2>Valor da Compra:</h2>
								</div>
								<div class="col-md-6">
									<input class="form-control form-control-sm" type="number" step="any" id="numTotal" value=<?php echo($_SESSION["valortotal"]) ?>>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-6">
									<a id="btnCliente" class="btn btn-primary cliente" href="vendacliente.php" role="button">Finalizar com Cliente</a>
								</div>
								<div class="col-md-6">
									<a name="" id="btnFinalizar" class="btn btn-success" href="../crud/vendainserir.php" role="button">Finalizar Compra</a>
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