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
		<link rel="stylesheet" type="text/css" href="../css/cadfornecedor.css">
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
		<script type="text/javascript" src="../js/script.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
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
			$nomeInput = $cnpjInput = $telefoneInput = $ruaInput = $numeroInput = $bairroInput = $cidadeInput = "";
			$codigo = $_GET["pesq"];
			if($_SERVER["REQUEST_METHOD"] == "GET")
			{
				$sql = mysqli_query($conexao,"SELECT * FROM fornecedor as f, endereco as e where f.cnpj = '$codigo' and e.id_endereco = f.id_endereco");
				while($row = mysqli_fetch_array($sql)){
					
					$telefonerepresentante = $row["telefone_representante"];
					$telefoneRepresentanteInput = "<input type='text' id='txtTelefoneRepresentante' name='txtTelefoneRepresentante' value='$telefonerepresentante'>";
					$nomerepresentante = $row["nome_representante"];
					$nomerepresentanteInput = "<input type='text' id='txtNomeRepresentante' name='txtNomeRepresentante' value='$nomerepresentante'>";
					$cnpj = $row["cnpj"];
					$cnpjInput = "<input type='text' id='txtCnpj' name='txtCnpj' value='$cnpj'>";
					$nome = $row["nome"];
					$nomeInput = "<input type='text' id='txtNome' name='txtNome' value='$nome'>";
					$telefone = $row["telefone"];
					$telefoneInput = "<input type='text' id='txtTelefone' name='txtTelefone' value='$telefone'>";
					$rua = $row["rua"];
					$ruaInput = "<input type='text' id='txtRua' name='txtRua' value='$rua'>";
					$numero = $row["numero"];
					$numeroInput = "<input type='text' id='txtNumero' name='txtNumero' value='$numero'>";
					$bairro = $row["bairro"];
					$bairroInput = "<input type='text' id='txtBairro' name='txtBairro' value='$bairro'>";
					$cidade = $row["cidade"];
					$cidadeInput = "<input type='text' id='txtCidade' name='txtCidade' value='$cidade'>";
					$estado = $row["estado"];
					$estadoInput = "<input type='text' id='slcEstado' name='slcEstado' value='$estado'>";
				}
			}
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$select  = "select cnpj, id_endereco from fornecedor where cnpj = '$codigo'";
				$sql = mysqli_query($conexao,$select);
				$result = mysqli_fetch_array($sql);
				$id = $result["cnpj"];
				$id_endereco = $result["id_endereco"];
				if($_SERVER["REQUEST_METHOD"] == "POST"){
					
					$cnpj = $_POST["txtCnpj"];
					$nome = $_POST["txtNome"];
					$telefone = $_POST["txtTelefone"];
					$rua = $_POST["txtRua"];
					$numero = $_POST["txtNumero"];
					$bairro = $_POST["txtBairro"];
					$cidade = $_POST["txtCidade"];
					$estado = $_POST["slcEstado"];
					$telefonerepresentante = $_POST["txtTelefoneRepresentante"];
					$nomerepresentante = $_POST["txtNomeRepresentante"];

					$sql = "UPDATE fornecedor SET cnpj = '$cnpj', telefone = '$telefone', telefone_representante = '$telefonerepresentante', nome_representante = '$nomerepresentante' where cnpj = '$id'";
					$sql2 = "UPDATE endereco as e INNER JOIN fornecedor as f on f.id_endereco = e.id_endereco set rua='$rua',numero ='$numero',bairro='$bairro',cidade='$cidade',estado='$estado' where  e.id_endereco ='$id_endereco'";
					mysqli_query($conexao,$sql);
					if($stmt = $conexao->prepare($sql2))
					{
						
						if($stmt->execute())
						{
							echo("<script language='javascript'>$('#modalok').modal('show'); </script>");
							echo ("<script language='javascript'> $('.ok').click(function(){window.location.replace('../paginas/pesquisar_editar.php');});</script>");
						}else{
							echo("<script language='javascript'>$('#modalerro').modal('show'); </script>");
							echo ("<script language='javascript'> $('.ok').click(function(){window.location.replace('../paginas/edtfuncionario.php?pesq=$codigo');});</script>");
						}
					}
					$stmt->close();
					$conexao->close();
				}
			}
		?>
		<div class="container">
			<h2 class="subTitulo">Editar fornecedor</h2>
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
									<div  class="col-md-9">
										<?php echo($nomeInput); ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>CNPJ: </label>
									</div>
									<div class="col-md-5">
										<?php echo($cnpjInput); ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Rua: </label>
									</div>
									<div class="col-md-9">
										<?php echo($ruaInput); ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Número: </label>
									</div>
									<div class="col-md-2">
										<?php echo($numeroInput); ?>
									</div>
									<div class="col-md-1" style="margin-left:55px;">
										<label>Bairro: </label>
									</div>
									<div class="col-md-4">
										<?php echo($bairroInput); ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Cidade: </label>
									</div>
									<div class="col-md-4">
										<?php echo($cidadeInput); ?>
									</div>
									<div class="col-md-2 lblAl" >
										<label style="margin-left:65px;">Estado: </label>
									</div>
									<div class="col-md-2">
										<?php echo($estadoInput); ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl ">
										<label>Telefone: </label>
									</div>
									<div class="col-md-3">
										<?php echo($telefoneInput); ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Nome do representante: </label>
									</div>
									<div class="col-md-9">
										<?php echo($nomerepresentanteInput); ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl ">
										<label>Telefone do representante: </label>
									</div>
									<div class="col-md-3">
										<?php echo($telefoneRepresentanteInput); ?>
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