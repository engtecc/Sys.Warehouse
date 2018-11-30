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
		<link rel="stylesheet" type="text/css" href="../css/lightbox.min.css">
		<link rel="stylesheet" type="text/css" href="../css/pesquisar_editar.css">

		<script src="../js/jquery.min.js"></script>
		<script src="../js/lightbox-plus-jquery.min.js"></script>
		<script src="../js/script.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</head>
	<?php
	require_once ('../crud/bd.php');
	$tabela_grid_dinamica = $radioValue = $key = $link = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset ($_POST["radioPesquisar"])){
			$radioValue = $_POST["radioPesquisar"];
			if(isset($_POST["txtProduto"])){
				if($radioValue == 1)
				{
					$key = $_POST["txtProduto"];
					$sql = mysqli_query($conexao,"SELECT codigo_de_barras,nome,preco_de_venda,preco_de_compra,quantidade_estoque from produto where nome like '%$key%'");
					$tabela_grid_dinamica = '<table cellpadding="10px" class="table table-condensed table-hover">';
					$tabela_grid_dinamica .= '<tr class="active" style="color:blue;"><td><b>Código de barras</b></td><td><b>Nome</b></td><td><b>Preço de venda</b></td><td><b>Preço de compra</b></td><td><b>Quantidade</b></td><td><b>Validade</b></td><td><b><Editar</b></td></tr>';
					while($row = mysqli_fetch_array($sql)){
						
						$id = $row["codigo_de_barras"];
						$nome = $row["nome"];
						$preco_venda = $row["preco_de_venda"];
						$preco_compra = $row["preco_de_compra"];
						$quantidade = $row["quantidade_estoque"];

						$tabela_grid_dinamica .= '<tr><td>' .$id. '</td>';
						$tabela_grid_dinamica .= '<td>'.$nome. '</td>';
						$tabela_grid_dinamica .= '<td>'. $preco_venda .'</td>';
						$tabela_grid_dinamica .= '<td>'. $preco_compra .'</td>';
						$tabela_grid_dinamica .= '<td>'. $quantidade .'</td>';		
						$tabela_grid_dinamica .= '<td> <a href="edtproduto.php?pesq='.$id.'"><img src="../imagens/iconEditar.png"></a>';
					}
					$tabela_grid_dinamica .= '</tr></table>';
				}elseif($radioValue == 2){
					$key = $_POST["txtFuncionario"];
					$sql = mysqli_query($conexao,"SELECT id_funcionario,nome,cpf,telefone,login,rua,numero,bairro from pessoa,funcionario,endereco where nome like '%$key%' and pessoa.id_pessoa = funcionario.id_pessoa and pessoa.id_endereco = endereco.id_endereco");
					$tabela_grid_dinamica = '<table cellpadding="10px" class="table table-condensed table-hover" style="width:1000px;">';
					$tabela_grid_dinamica .= '<tr class="active" style="color:blue;"><td><b>Nome</b></td><td><b>CPF</b></td><td><b>Telefone</b></td><td><b>Login</b></td><td><b>Rua</b></td><td><b>Numero</b></td><td><b>Bairro</b></td><td><b>Editar</b></td></tr>';
					while($row = mysqli_fetch_array($sql)){
						$id = $row["id_funcionario"];
						$nome = $row["nome"];
						$cpf = $row["cpf"];
						$telefone = $row["telefone"];
						$login = $row["login"];
						$rua = $row["rua"];
						$numero = $row["numero"];
						$bairro = $row["bairro"];

						$tabela_grid_dinamica .= '<tr><td>' .$nome. '</td>';
						$tabela_grid_dinamica .= '<td>'.$cpf. '</td>';
						$tabela_grid_dinamica .= '<td>'. $telefone .'</td>';
						$tabela_grid_dinamica .= '<td>'. $login .'</td>';
						$tabela_grid_dinamica .= '<td>'. $rua .'</td>';
						$tabela_grid_dinamica .= '<td>'. $numero .'</td>';
						$tabela_grid_dinamica .= '<td>'. $bairro .'</td>';
						$tabela_grid_dinamica .= '<td align="center" valign="center"><a href="edtfuncionario.php?pesq='.$id.'"><img src="../imagens/iconEditar.png"></a></td>';
					}
					$tabela_grid_dinamica .= '</tr></table>';
				}elseif($radioValue == 3){
					$key = $_POST["txtFornecedor"];
					$sql = mysqli_query($conexao,"SELECT * from fornecedor,endereco where nome like'%$key%' and fornecedor.id_endereco = endereco.id_endereco");
					$tabela_grid_dinamica = '<table cellpadding="10px" class="table table-condensed table-hover">';
					$tabela_grid_dinamica .= '<tr class="active" style="color:blue;"><td><b>Nome</b></td><td><b>CNPJ</b></td><td><b>Telefone</b></td><td><b>Rua</b></td><td><b>Numero</b></td><td><b>Bairro</b></td><td><b>Cidade</b></td><td><b>Editar</b></td></tr>';
					while($row = mysqli_fetch_array($sql)){	
						$nome = $row["nome"];
						$cnpj = $row["cnpj"];
						$telefone = $row["telefone"];
						$rua = $row["rua"];
						$numero = $row["numero"];
						$bairro = $row["bairro"];
						$cidade = $row["cidade"];

						$tabela_grid_dinamica .= '<tr><td>' .$nome. '</td>';
						$tabela_grid_dinamica .= '<td>'.$cnpj. '</td>';
						$tabela_grid_dinamica .= '<td>'. $telefone .'</td>';
						$tabela_grid_dinamica .= '<td>'. $rua .'</td>';
						$tabela_grid_dinamica .= '<td>'. $numero .'</td>';
						$tabela_grid_dinamica .= '<td>'. $bairro .'</td>';
						$tabela_grid_dinamica .= '<td>'. $cidade .'</td>';
						$tabela_grid_dinamica .= '<td> <a href="edtFornecedor.php?pesq='.$cnpj.'"><img src="../imagens/iconEditar.png"></a>';					
					}
					$tabela_grid_dinamica .= '</tr></table>';
				}elseif($radioValue == 4){
					$key = $_POST["txtCliente"];
					$sql = mysqli_query($conexao,"SELECT * from cliente as c,pessoa as p,endereco as e,referenci_comercial as r where nome like '%$key%' and c.id_pessoa = p.id_pessoa and c.id_referencia_comercial = r.id_referencia_comercia and p.id_endereco = e.id_endereco");
					$tabela_grid_dinamica = '<table cellpadding="10px" class="table table-condensed table-hover">';
					$tabela_grid_dinamica .= '<tr class="active" style="color:blue;"><td><b>Nome</b></td><td><b>CPF</b></td><td><b>RG</b></td><td><b>Telefone</b></td><td><b>Limite</b></td><td><b>Rua</b></td><td><b>Numero</b></td><td><b>Bairro</b></td><td><b>Referencia 1</b></td><td><b>Referencia 2</b></td><td><b>Referencia 3</b></td><td><b>Editar</b></td></tr>';
					while($row = mysqli_fetch_array($sql)){
						$id = $row["id_cliente"];
						$nome = $row["nome"];
						$cpf = $row["cpf"];
						$rg = $row["rg"];
						$telefone = $row["telefone"];
						$limite = $row["limite_de_credito"];
						$rua = $row["rua"];
						$numero = $row["numero"];
						$bairro = $row["bairro"];
						$referencia1 = $row["referencia_1"];
						$referencia2 = $row["referencia_2"];
						$referencia3 = $row["referencia_3"];

						$tabela_grid_dinamica .= '<tr><td>' .$nome. '</td>';
						$tabela_grid_dinamica .= '<td>'.$cpf. '</td>';
						$tabela_grid_dinamica .= '<td>'.$rg. '</td>';
						$tabela_grid_dinamica .= '<td>'. $telefone .'</td>';
						$tabela_grid_dinamica .= '<td>'.$limite. '</td>';
						$tabela_grid_dinamica .= '<td>'. $rua .'</td>';
						$tabela_grid_dinamica .= '<td>'. $numero .'</td>';
						$tabela_grid_dinamica .= '<td>'. $bairro .'</td>';
						$tabela_grid_dinamica .= '<td>'. $referencia1 .'</td>';
						$tabela_grid_dinamica .= '<td>'. $referencia2 .'</td>';
						$tabela_grid_dinamica .= '<td>'. $referencia3 .'</td>';
						$tabela_grid_dinamica .= '<td> <a href="edtcliente.php?pesq='.$id.'"><img src="../imagens/iconEditar.png"></a>';
					}
					$tabela_grid_dinamica .= '</tr></table>';
				}elseif($radioValue == 5){
					$key = $_POST["txtEmprestimo"];
					$sql = mysqli_query($conexao,"SELECT nome,cpf,id_emprestimo,vasilhame,devolucao,data_a_devolver,rua,numero,bairro from venda as v,cliente as c,emprestimo as em,endereco as e, pessoa as p where nome like '%$key%' and c.id_cliente = em.id_cliente and em.id_venda = v.id_venda and e.id_endereco = em.id_endereco and p.id_pessoa = c.id_pessoa");
					$tabela_grid_dinamica = '<table cellpadding="10px" class="table table-condensed table-hover">';
					$tabela_grid_dinamica .= '<tr class="active" style="color:blue;width:1000px;"><td><b>Nome</b></td><td><b>CPF</b></td><td><b>Vasilhame</b></td><td><b>Devolucao</b></td><td><b>Data a devolver</b></td><td><b>Rua</b></td><td><b>Numero</b></td><td><b>Bairro</b></td></tr>';
					while($row = mysqli_fetch_array($sql)){
						$id = $row["id_emprestimo"];
						$nome = $row["nome"];
						$cpf = $row["cpf"];
						$vasilhame = $row["vasilhame"];
						$devolucao = $row["devolucao"];
						$datadevolver = $row["data_a_devolver"];
						$rua = $row["rua"];
						$numero = $row["numero"];
						$bairro = $row["bairro"];
						

						$tabela_grid_dinamica .= '<tr><td>' .$nome. '</td>';
						$tabela_grid_dinamica .= '<td>'.$cpf. '</td>';
						$tabela_grid_dinamica .= '<td>'.$vasilhame. '</td>';
						$tabela_grid_dinamica .= '<td>'. $devolucao .'</td>';
						$tabela_grid_dinamica .= '<td>'.$datadevolver. '</td>';
						$tabela_grid_dinamica .= '<td>'. $rua .'</td>';
						$tabela_grid_dinamica .= '<td>'. $numero .'</td>';
						$tabela_grid_dinamica .= '<td>'. $bairro .'</td>';
						$tabela_grid_dinamica .= '<td> <a href="edtemprestimo.php?pesq='.$id.'"><img src="../imagens/iconEditar.png"></a>';					
					}
					$tabela_grid_dinamica .= '</tr></table>';
				}

			}
		}
	}
	?>
	<body>
		<div class = "jumbotron text-center removerMargem">
			<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
			<h4><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
		</div>
		<div class="container">
			<h2 class="subTitulo">Alterar cadastros</h2>
			<div class="row">
				<div class="col-md-12 mt-3">
					<div class="row">
						<div class="col-md-12">
							<form action="" method="POST" id="formAlterar"> 
								<div class="row rowForm">
									<div class="col-md-9"></div>
									<div class="col-md-3" align="center">
										<a id="btnCancelar" class="btn btn-danger" href="principal.php" role="button">Cancelar</a>
									</div>
								</div> 
								<div class="row rowForm">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-1 lblAl" style="margin-top:2px;">
												<input class="radio" type="radio" name="radioPesquisar" id="radioPesquisar" value="1">
											</div>
											<div class="col-md-2 lblAl" >
												<label style="margin-left:0px;">Produto:</label>
											</div>
											<div class="col-md-2">
												<input class="form-control form-control-sm" type="text" id="txtProduto" name="txtProduto" placeholder="Nome do produto">
											</div>
										</div>
									</div>
									<div class="col-md-6" style="margin-left:px;">
										<div class="row">
											<div class="col-md-1 lblAl" style="margin-top:2px;">
												<input class="radio" type="radio" name="radioPesquisar" id="radioPesquisar" value="2" >
											</div>
											<div class="col-md-2 lblAl" >
												<label>Funcionário:</label>
											</div>
											<div class="col-md-2">
												<input class="form-control form-control-sm" type="text" id="txtFuncionario" name="txtFuncionario" placeholder="Nome do funcionário">
											</div>
										</div>
									</div>
								</div>
								<div class="row rowForm" >
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-1 lblAl" style="margin-top:2px;">
												<input class="radio" type="radio" name="radioPesquisar" id="radioPesquisar" value="3">
											</div>
											<div class="col-md-2 lblAl">
												<label>Fornecedor:</label>
											</div>
											<div class="col-md-4">
												<input class="form-control form-control-sm" type="text" id="txtFornecedor" name='txtFornecedor' placeholder="Nome do fornecedor">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-1 lblAl" style="margin-top:2px;">
												<input class="radio" type="radio" name="radioPesquisar" id="radioPesquisar" value="4">
											</div>
											<div class="col-md-2 lblAl">
												<label style="margin-left:0px;">Cliente:</label>
											</div>
											<div class="col-md-2">
												<input class="form-control form-control-sm" type="text" id="txtCliente" name="txtCliente" placeholder="Nome do cliente">
											</div>
										</div>
									</div>
								</div>
								<div class="row rowForm" >
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-1 lblAl" style="margin-top:2px;">
												<input class="radio" type="radio" name="radioPesquisar" id="radioPesquisar" value="5">
											</div>
											<div class="col-md-2 lblAl">
												<label>Empréstimo:</label>
											</div>
											<div class="col-md-2">
												<input class="form-control form-control-sm" type="text" id="txtEmprestimo" name="txtEmprestimo" placeholder="Nome do cliente">
											</div>
										</div>
									</div>
								</div>
								<div class="row rowForm">
									<div class="col-md-9"></div>
									<div class="col-md-3" align="center">
										<input type="submit" class="btn btn-warning" id="btnCancelar" value="Pesquisar">
									</div>
								</div> 
								<div class="row">
									<div class="col-md-2" align="left" style="margin-top:50px;"><h5></h5></div>
								</div>
								<div class="row rowForm"id="panelResultados">
									<div class="col-md-12" align="">
										<h3> Resultados da Pesquisa:</h3>
										<?php echo ($tabela_grid_dinamica); ?>
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