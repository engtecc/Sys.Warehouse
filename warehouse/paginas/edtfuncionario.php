<?php
<<<<<<< HEAD
session_start();
if(!isset($_SESSION['login'])){
	header('location: ../index.php');
}
if ($_SESSION['administrador'] != 1){
	header('location: venda.php');
=======
require_once ("../crud/bd.php");
$nomeInput = $loginInput = $senhaInput = $confSenhaInput = $cpfInput  = $rgInput = $nascimentoInput = $telefoneInput = $ruaInput = $numeroInput = $bairroInput = $cidadeInput = $estadoInput = "";
if($_SERVER["REQUEST_METHOD"] == "GET")
{
	$codigo = $_GET["pesq"];
	$sql = mysqli_query($conexao,"SELECT * FROM funcionario as f,pessoa as p,endereco as e WHERE id_funcionario = '$codigo' and e.id_endereco = p.id_endereco and p.id_pessoa = f.id_pessoa;");
	while($row = mysqli_fetch_array($sql)){
		$nome = $row["nome"];
		$nomeInput = "<input type='text' id='txtNome' name='txtNome' value='$nome'>";
		$login = $row["login"];
		$loginInput = "<input type='text' id='txtLogin' name='txtLogin' value='$login'>";
		$senha = $row["senha"];
		$senhaInput = "<input type='text' id='txtSenha' name='txtSenha' value='$senha'>";
		$confSenhaInput = "<input type='text' id='txtConfirmarSenha' name='txtConfirmarSenha' value='$senha'>";
		$cpf = $row["cpf"];
		$cpfInput = "<input type='text' id='txtCpf' name='txtCpf' value='$cpf'>";
		$rg = $row["rg"];
		$rgInput = "<input type='text' id='txtRG' name='txtRG' value='$rg'>";		
		$nascimento = $row["data_de_nascimento"];
		$nascimentoInput = "<input type='date' id='txtNascimento' name='txtNascimento' value='$nascimento'>";	
		$rua = $row["rua"];
		$ruaInput = "<input type='text' id='txtRua' name='txtRua' value='$rua'>";
		$numero = $row["numero"];
		$numeroInput = "<input type='text' id='txtNumero' name='txtNumero' value='$numero'>";	
		$bairro = $row["bairro"];
		$bairroInput = "<input type='text' id='txtBairro' name='txtBairro' value='$bairro'>";		
		$cidade = $row["cidade"];
		$cidadeInput = "<input type='text' id='txtCidade' name='txtCidade' value='$cidade'>";		
		$estado = $row["estado"];
		$estadoInput= "<input type='text' style='margin-left:40px;' id='slcEstado' name='txtEstado' value='$estado'>";	
		$telefone = $row["telefone"];
		$telefoneInput = "<input type='text' id='txtTelefone' name='txtTelefone' value='$telefone'>";	
	}
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$nome = $login = $senha = $confirmarSenha = $cpf = $rg = $rua = $numero = $bairro = $cidade = $estado = $telefone = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$nome = $_POST["txtNome"];
		$login = $_POST["txtLogin"];
		$senha = md5($_POST["txtSenha"]);
		$confirmarSenha = md5($_POST["txtConfirmarSenha"]);
		$cpf = $_POST["txtCpf"];
		$rg = $_POST["txtRG"];
		$nascimento = $_POST["txtNascimento"];
		$rua = $_POST["txtRua"];
		$bairro = $_POST["txtBairro"];
		$cidade = $_POST["txtCidade"];
		$estado = $_POST["txtEstado"];
		$telefone = $_POST["txtTelefone"];
		$select = "select f.id_funcionario, f.id_pessoa,e.id_endereco,p.id_endereco from funcionario as f, pessoa as p, endereco as e where f";
		$sql = "update funcionario set login = '$login',senha = '$senha',administrador = '0' WHERE id_funcionario = '$codigo'";
		
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
>>>>>>> 084cae1c5f100a48ee00f1b292d63a6e24013b73
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
		<link rel="stylesheet" type="text/css" href="../css/lightbox.min.css">
		<link rel="stylesheet" type="text/css" href="../css/cadfuncionario.css">
		<script src="../js/jquery.min.js"></script>
		<script src="../js/lightbox-plus-jquery.min.js"></script>
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
						<h5 class="modal-title" id="modalok">Produto cadastrado com sucesso!</h5>
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
						<h5 class="modal-title text-error" id="modalerro">Falha ao cadastrar o produto!</h5>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success btn-sm ok" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<h2 class="subTitulo">Editar funcionário</h2>
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
										<?php echo($nomeInput); ?>
									</div>
								</div>
								<div class="row" style="margin-top:30px;">
									<div class="col-md-3 lblAl">	
										<label>Login: </label>							
									</div>
									<div class="col-md-2">
										<?php echo($loginInput); ?>										
									</div>
									<div class="col-md-3 lblAl" >
										<label style="margin-right:-5px;">Senha: </label>
									</div>
									<div class="col-md-2" style="margin-left:2px;">
										<?php echo($senhaInput); ?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-5"></div>
									<div class="col-md-7" style="margin-top:10px; margin-bottom:-5px;">
										<div class="row">
											<div class="col-md-7">
												<label>Confirmar senha: </label>
											</div>
											<div class="col-md-3">
												<?php echo($confSenhaInput) ?>												
											</div>
										</div>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>CPF: </label>
									</div>
									<div class="col-md-5">
										<?php echo($cpfInput) ?>
									</div>
									<div class="col-md-1">
										<label>&nbsp;&nbsp;&nbsp;RG: </label>
									</div>
									<div class="col-md-2">
										<?php echo($rgInput) ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Rua: </label>
									</div>
									<div class="col-md-9">
										<?php echo($ruaInput) ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Número: </label>
									</div>
									<div class="col-md-2">
										<?php echo($numeroInput) ?>
									</div>
									<div class="col-md-1" style="margin-left:55px;">
										<label>Bairro: </label>
									</div>
									<div class="col-md-4">
										<?php echo($bairroInput) ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Cidade: </label>
									</div>
									<div class="col-md-4">
										<?php echo($cidadeInput) ?>
									</div>
									<div class="col-md-2 lblAl" >
										<label style="margin-left:65px;">Estado: </label>
									</div>
									<div class="col-md-2">
										<?php echo($estadoInput) ?>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-3 lblAl">
										<label>Telefone: </label>
									</div>
									<div class="col-md-3">
										<?php echo($telefoneInput) ?>
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