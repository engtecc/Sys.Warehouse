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
	<link rel="stylesheet" type="text/css" href="../css/lightbox.min.css">
	<link rel="stylesheet" type="text/css" href="../css/emprestimo.css">

	<script src="../js/jquery.min.js"></script>
	<script src="../js/lightbox-plus-jquery.min.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="../js/vendas.js"></script>

</head>

<body>
	<div class = "jumbotron text-center removerMargem">
		<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
		<h4><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
	</div>
	<?php
		require_once("../crud/bd.php");
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$nome = $_POST["txtNome"];
			$quantidade =$_post["txtQuantidae"];
			$end = $_POST["txtCobranca"];
			$emprestimo = $_POST["dateEmprestimo"];
			$devolucao = $_POST["dateDevolucao"];
			$tipo = $_POST["slcTipo"];
			$recebio = $_POST["txtRecebido"];
			$receber = $_POST["txtReceber"];
			$select = "select id_cliente from cliente where nome LIKE '$nome'";
			$row = mysqli_fetch_array(mysqli_query($conexao,$select));
			$id_cliente = $row["id_cliente"];
			$vasilhame = $_POST["slcVasilhame"];
			mysqli_query($conexao,"INSERT INTO emprestimot (id_cliente,vasilhamet,devolucaot,data_devolucaot,data_a_devolvert,end_cobrancat) VALUES('$id_cliente','$vasilhame','0','$devolucao','$end')");
		}
	?>
	<div class="container">
		<h2 class="subTitulo">Empréstimo</h2>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 mt-3">
				<div class="row">
					<div class="col-md-12">
						<form action="" method="POST" id="formCli"> 
							<div class="row rowForm">
								<div class="col-md-9" align="right"></div>
								<div class="col-md-3" align="center">
									<a id="btnCancelar" class="btn btn-danger" href="principal.php" role="button">Cancelar</a>
								</div>
							</div> 
							<div class="row rowForm">
								<div class="col-md-3 lblAl" style="margin-top:7px;">
									<label>Nome do produto: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control" name="txtNome" type="text" id="txtNomeEmp">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl"  style="margin-top:7px;">
									<label>Quantidade: </label>
								</div>
								<div class="col-md-3">
									<input class="form-control"  name="txtQuantidade" type="number" id="numQuant">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl" style="margin-top:7px;">
									<label>End. de cobrança: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control"   name="txtCobranca" type="text" id="txtEndEmp">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl" style="margin-top:7px; ">
									<label>Data de empréstimo: </label>
								</div>
								<div class="col-md-3">
									<input class="form-control"  name="dateEmprestimo" style="width:180px;"type="date" id="datEmp">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl"   style="margin-top:7px;">
									<label>Data de devolução: </label>
								</div>
								<div class="col-md-3">
									<input class="form-control" name="dateDevolucao" style="width:180px;" type="date" id="datDev">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl" style="margin-top:7px;">
									<label>Forma de pagamento: </label>
								</div>
								<div class="col-md-3">
									<select class="form-control" name="slcTipo" style="width:180px;" id="selPag">
										<option>À vista</option>
										<option>À prazo</option>
										<option>Cartão</option>
									</select>
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAl" style="margin-top:7px;">
									<label>Valor Recebido: </label>
								</div>
								<div class="col-md-3">
									<input class="form-control"  name="txtRecebio" style="width:180px;"type="number" step="any" id="numValRec">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3" style="margin-top:7px;">
									<label>Valor a Receber: </label>
								</div>
								<div class="col-md-3">
									<input  class="form-control"  name="txtReceber" style="width:180px;" type="number" step="any" id="numValDev">
								</div>
							</div>
							<div class="row rowForm2">
								<div class="col-md-3 lblAL " style="margin-top:7px;"><label>Vasilhame:</div>
								<div class="col-md-3"><select name='slcVasilhame' style="width:180px;" class="form-control"><option value=1>Sim</option> <option value=0>Não</option></select></div>
							</div>
							<div class="row rowForm rowTable">
								<div class="col-md-3 lblAl" style="margin-top:7px;">
									<label style="font-weight: bold;">Produtos da Compra:</label>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2">
									<a id="btnRemover" class="btn btn-primary" href="principal.php" role="button">Adicionar</a>
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
									<?php 
										if($_SERVER["REQUEST_METHOD"] == "POST")
										{
											$select = "SELECT * FROM emprestimot";
										}
									?>
								</table>
							</div>
							<div class="row rowForm">
								<div class="col-md-6"></div>
								<div class="col-md-6">
									<a id="btnFinalizar" class="btn btn-success">Finalizar Emprestimo</a>
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