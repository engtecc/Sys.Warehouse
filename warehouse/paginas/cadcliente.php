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
	<link rel="stylesheet" type="text/css" href="../css/cadcliente.css">
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
	<div class="modal fade" id="modalok" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalok">Cliente cadastrado com sucesso!</h5>
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
					<h5 class="modal-title text-error" id="modalok">Falha ao cadastrar o cliente!</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-sm ok" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<h2 class="subTitulo">Cadastrar cliente</h2>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6 mt-3">
				<div class="row">
					<div class="col-md-12">
						<form action="" method="POST" id="formCliente" enctype="multipart/form-data"> 
							<div class="row rowForm">
								<div class="col-md-9"></div>
								<div class="col-md-3" align="center">
									<a id="btnCancelar" class="btn btn-danger" href="principal.php" role="button">Cancelar</a>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblA2">
									<label>Nome: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control" type="text" id="txtNome" name="txtNome" value="">
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>CPF: </label>
								</div>
								<div class="col-md-5">
									<input class="form-control" type="text" id="txtCpf" name="txtCpf" value="">
								</div>
								<div class="col-md-1">
									<label>&nbsp;&nbsp;&nbsp;RG: </label>
								</div>
								<div class="col-md-2">
									<input class="form-control" type="text" id="txtRG" name="txtRG" value="">
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Rua: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control" type="text" id="txtRua" name="txtRua" value="">
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Número: </label>
								</div>
								<div class="col-md-2">
									<input class="form-control" type="text" id="txtNumero" name="txtNumero" value="">
								</div>
								<div class="col-md-1" style="margin-left:55px;">
									<label>Bairro: </label>
								</div>
								<div class="col-md-4">
									<input class="form-control" type="text" id="txtBairro" name="txtBairro" value="">
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Cidade: </label>
								</div>
								<div class="col-md-4">
									<input class="form-control" type="text" id="txtCidade" name="txtCidade" value="">
								</div>
								<div class="col-md-2 lblAl" >
									<label style="margin-left: 30px;">Estado: </label>
								</div>
								<div class="col-md-3">
									<select class="form-control form-control-sm" style="font-size: 13px; width: 200px; height: 30px;" name="slcEstado" id="slcEstado">
										<option value="mg">Minas Gerais</option>
										<option value="ac">Acre</option>
										<option value="al">Alagoas</option>
										<option value="ap">Amapá</option>
										<option value="am">Amazonas</option>
										<option value="ba">Bahia</option>
										<option value="ce">Ceará</option>
										<option value="df">Distrito Federal</option>
										<option value="es">Espírito Santo</option>
										<option value="go">Goiás</option>
										<option value="ma">Maranhão</option>
										<option value="mt">Mato Grosso</option>
										<option value="ms">Mato Grosso do Sul</option>
										<option value="pa">Pará</option>
										<option value="pb">Paraíba</option>
										<option value="pr">Paraná</option>
										<option value="pe">Pernambuco</option>
										<option value="pi">Piauí</option>
										<option value="rj">Rio de Janeiro</option>
										<option value="rn">Rio Grande do Norte</option>
										<option value="rs">Rio Grande do Sul</option>
										<option value="ro">Rondônia</option>
										<option value="rr">Roraima</option>
										<option value="sc">Santa Catarina</option>
										<option value="sp">São Paulo</option>
										<option value="se">Sergipe</option>
										<option value="to">Tocantins</option>
									</select>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Telefone: </label>
								</div>
								<div class="col-md-3 ">
									<input class="form-control form-control-sm" type="text" id="txtTelefone" name="txtTelefone" value="">
								</div>
								<div class="col-md-3">
									<label>Data Nasc.: </label>
								</div>
								<div class="col-md-3">
									<input class="form-control form-control-sm " style="width: 200px; text-align: left;" type="date" id="dateNascimento" name="dateNascimento" value="">
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Referencia Comercial: </label>
								</div>
								<div class="col-md-3">
									<input class="form-control" type="text" id="txtReferencia1" name="txtReferencia1" value="">
								</div>
								<div class="col-md-4">
									<input class="form-control" type="text" id="txtReferencia2" name="txtReferencia2" value="">
								</div>
								<div class="col-md-2">
									<input class="form-control" type="text" id="txtReferencia3" name="txtReferencia3" value="">
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Limite de crédito: </label>
								</div>
								<div class="col-md-9">
									<input class="form-control" type="text" id="txtLimite" name="txtLimite" value="" placeholder="R$">
								</div>
							</div>
							<div class="row rowForm"style="margin-bottom:30px">
								<div class="col-md-9"></div>
								<div class="col-md-3" align="center">
									<input type="submit" class="btn btn-success" id="btnCancelar" value="Cadastrar">
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