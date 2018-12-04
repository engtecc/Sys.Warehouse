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
	<script src="../js/script.js"></script>
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
				<li class="nav-item active">
					<a class="nav-link formatacao" href="pesquisar_editar.php">ALTERAR CADASTROS<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link formatacao" href="consultar.php">CONSULTAR<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
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
	$nomeInput= $referencia1Input = $referencia2Input = $referencia3Input = $limiteInput = $cpfInput = $rgInput = $telefoneInput = $ruaInput = $numeroInput = $bairroInput = $cidadeInput = "";
	$codigo = $_GET["pesq"];
	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$sql = mysqli_query($conexao,"SELECT * FROM cliente as c ,pessoa as p, endereco as e, referenci_comercial as r where c.id_cliente = '$codigo' and c.id_pessoa = p.id_pessoa and e.id_endereco = c.id_endereco and r.id_referencia_comercia = c.id_referencia_comercial");
		while($row = mysqli_fetch_array($sql)){
			$limite = $row["limite_de_credito"];
			$limiteInput = "<input class='form-control form-control-sm' type='text' id='txtLimite' name='txtLimite' value='$limite'>";
			$cpf = $row["cpf"];
			$cpfInput = "<input  class='form-control form-control-sm'  type='text' id='txtCpf' name='txtCpf' value='$cpf'>";
			$rg = $row["rg"];
			$rgInput = "<input class='form-control form-control-sm'  type='text' id='txtRG' name='txtRG' value='$rg'>";
			$nome = $row["nome"];
			$nomeInput = "<input class='form-control form-control-sm'  type='text' id='txtNome' name='txtNome' value='$nome'>";
			$telefone = $row["telefone"];
			$telefoneInput = "<input class='form-control form-control-sm'  type='text' id='txtTelefone' name='txtTelefone' value='$telefone'>";
			$rua = $row["rua"];
			$ruaInput = "<input  class='form-control form-control-sm' type='text' id='txtRua' name='txtRua' value='$rua'>";
			$numero = $row["numero"];
			$numeroInput = "<input class='form-control form-control-sm'  type='text' id='txtNumero' name='txtNumero' value='$numero'>";
			$bairro = $row["bairro"];
			$bairroInput = "<input class='form-control form-control-sm'  type='text' id='txtBairro' name='txtBairro' value='$bairro'>";
			$cidade = $row["cidade"];
			$cidadeInput = "<input class='form-control form-control-sm'  type='text' id='txtCidade' name='txtCidade' value='$cidade'>";
			$estado = $row["estado"];
			$estadoInput = "<input class='form-control form-control-sm'  type='text' id='slcEstado' name='slcEstado' value='$estado'>";
			$referencia1 = $row["referencia_1"];
			$referencia1Input = "<input class='form-control form-control-sm'  type='text' id='txtReferencia1' name='txtReferencia1' value='$referencia1'>";
			$referencia2 = $row["referencia_2"];
			$referencia2Input = "<input class='form-control form-control-sm'  type='text' id='txtReferencia2' name='txtReferencia2' value='$referencia2'>";
			$referencia3 = $row["referencia_3"];
			$referencia3Input = "<input class='form-control form-control-sm'  type='text' id='txtReferencia3' name='txtReferencia3' value='$referencia3'>";
			$nascimento = $row["data_de_nascimento"];
			$nascimentoInput =  "<input class='form-control form-control-sm' style='width: 180px; height: 30px;' type='date' id='dateNascimento' name='dateNascimento' value='$nascimento'>";
		}
	}
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$select  = "select id_cliente, id_pessoa, id_endereco,id_referencia_comercial from cliente where id_cliente = '$codigo'";
		$sql = mysqli_query($conexao,$select);
		$result = mysqli_fetch_array($sql);
		$id_pessoa = $result["id_pessoa"];
		$id = $result["id_cliente"];
		$id_endereco = $result["id_endereco"];
		$id_referencia = $result["id_referencia_comercial"];
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			
			$limite = $_POST["txtLimite"];
			$referencia1 = $_POST["txtReferencia1"];
			$referencia2 = $_POST["txtReferencia2"];
			$referencia3 = $_POST["txtReferencia3"];
			$nascimento = $_POST["dateNascimento"];
			$cpf = $_POST["txtCpf"];
			$rg = $_POST["txtRG"];
			$nome = $_POST["txtNome"];
			$telefone = $_POST["txtTelefone"];
			$rua = $_POST["txtRua"];
			$numero = $_POST["txtNumero"];
			$bairro = $_POST["txtBairro"];
			$cidade = $_POST["txtCidade"];
			$estado = $_POST["slcEstado"];
			
			$sql = "UPDATE cliente SET limite_de_credito = '$limite' where id_cliente = '$id'";
			$sql2 = "UPDATE pessoa as p INNER JOIN cliente as c on c.id_pessoa = p.id_pessoa INNER JOIN endereco as e on e.id_endereco = p.id_endereco set cpf ='$cpf',rg ='$rg',nome = '$nome',data_de_nascimento = '', telefone = '$telefone', data_de_nascimento = '$nascimento' where p.id_pessoa ='$id_pessoa'";
			$sql3 = "UPDATE endereco as e INNER JOIN cliente as c on c.id_endereco = e.id_endereco INNER JOIN pessoa as p on e.id_endereco = p.id_endereco set rua='$rua',numero ='$numero',bairro='$bairro',cidade='$cidade',estado='$estado' where  e.id_endereco ='$id_endereco'";
			$sql4 = "UPDATE referenci_comercial as r INNER JOIN cliente as c ON c.id_referencia_comercial = r.id_referencia_comercial SET referencia_1 = '$referencia1', referencia_2 = '$referencia2' , referencia_3 = '$referencia3' where r.id_referencia_comercial = '$id_referencia'";
			mysqli_query($conexao,$sql);
			mysqli_query($conexao,$sql2);
			mysqli_query($conexao,$sql3);
			if($stmt = $conexao->prepare($sql4))
			{
				
				if($stmt->execute())
				{
					echo("<script language='javascript'>$('#modalok').modal('show'); </script>");
					echo ("<script language='javascript'> $('.ok').click(function(){window.location.replace('../paginas/pesquisar_editar.php');});</script>");
				}else{
					echo("<script language='javascript'>$('#modalerro').modal('show'); </script>");
					echo ("<script language='javascript'> $('.ok').click(function(){window.location.replace('../paginas/edtcliente.php?pesq=$codigo');});</script>");
				}
			}

			$stmt->close();
			$conexao->close();
		}
	}
	?>
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
									<?php echo($nomeInput);?>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>CPF: </label>
								</div>
								<div class="col-md-5">
									<?php echo($cpfInput);?>
								</div>
								<div class="col-md-1">
									<label>&nbsp;&nbsp;&nbsp;RG: </label>
								</div>
								<div class="col-md-2">
									<?php echo($rgInput);?>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Rua: </label>
								</div>
								<div class="col-md-9">
									<?php echo($ruaInput);?>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Número: </label>
								</div>
								<div class="col-md-2">
									<?php echo($numeroInput);?>
								</div>
								<div class="col-md-1" style="margin-left:55px;">
									<label>Bairro: </label>
								</div>
								<div class="col-md-4">
									<?php echo($bairroInput);?>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Cidade: </label>
								</div>
								<div class="col-md-4">
									<?php echo($cidadeInput);?>
								</div>
								<div class="col-md-2 lblAl" >
									<label style="margin-left:65px;">Estado: </label>
								</div>
								<div class="col-md-2">
									<?php echo($estadoInput);?>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Telefone: </label>
								</div>
								<div class="col-md-3">
									<?php echo($telefoneInput);?>
								</div>
								<div class="col-md-4">
									<label>Data de nascimento: </label>
								</div>
								<div class="col-md-1">
									<?php echo($nascimentoInput);?>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Referencia Comercial: </label>
								</div>
								<div class="col-md-3">
									<?php echo($referencia1Input);?>
								</div>
								<div class="col-md-4">
									<?php echo($referencia2Input);?>
								</div>
								<div class="col-md-2">
									<?php echo($referencia3Input);?>
								</div>
							</div>
							<div class="row rowForm">
								<div class="col-md-3 lblAl">
									<label>Limite de credito: </label>
								</div>
								<div class="col-md-9">
									<?php echo($limiteInput);?>
								</div>
							</div>
							<div class="row rowForm" style="margin-bottom:30px">
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