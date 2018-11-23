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
		<script src="../js/script.js"></script>
		<script src="../js/bootstrap.min.js"></script>
</head>
	<body>
	<?php 
		if($_SERVER["REQUEST_METHOD"] == "GET")
		{
			
		}
	?>
		<nav class="site-header">
			<div class = "jumbotron text-center removerMargem">
				<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
				<h4><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
			</div>
		</nav>
		<div class="container">
			<h2 class="subTitulo">Editar cliente</h2>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-6 mt-3">
					<div class="row">
						<div class="col-md-12">
							<form action="#" method="POST" id="formCli"> 
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
										<input type="text" id="txtNome" value="">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>CPF: </label>
									</div>
									<div class="col-md-5">
										<input type="text" id="txtCpf" value="">
									</div>
									<div class="col-md-1">
										<label>&nbsp;&nbsp;&nbsp;RG: </label>
									</div>
									<div class="col-md-2">
										<input type="text" id="txtRG" value="">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Rua: </label>
									</div>
									<div class="col-md-9">
										<input type="text" id="txtRua" value="">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Número: </label>
									</div>
									<div class="col-md-2">
										<input type="text" id="txtNumero" value="">
									</div>
									<div class="col-md-1" style="margin-left:55px;">
										<label>Bairro: </label>
									</div>
									<div class="col-md-4">
										<input type="text" id="txtBairro" value="">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Cidade: </label>
									</div>
									<div class="col-md-4">
										<input type="text" id="txtCidade" value="">
									</div>
									<div class="col-md-2 lblAl" >
										<label style="margin-left:65px;">Estado: </label>
									</div>
									<div class="col-md-2">
										<select name="" id="slcEstado">
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
									<div class="col-md-3">
										<input type="text" id="txtTelefone" value="">
									</div>
									<div class="col-md-4">
										<label>Data de nascimento: </label>
									</div>
									<div class="col-md-1">
										<input type="date" id="dateNascimento" value="">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Referencia Comercial: </label>
									</div>
									<div class="col-md-3">
										<input type="text" id="txtReferencia1" value="">
									</div>
									<div class="col-md-4">
										<input type="text" id="txtReferencia2" value="">
									</div>
									<div class="col-md-2">
										<input type="text" id="txtReferencia3" value="">
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Limite de credito: </label>
									</div>
									<div class="col-md-9">
										R$ &nbsp;<input type="text" id="txtLimite" value="">
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