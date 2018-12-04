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
	<script src="../js/excluir.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>

<!-- Tela de confirmação de exclusão / Modal -->
<div class="modal fade" id="modalConfirmacaoProduto" tabindex="-1" role="dialog" aria-labelledby="modalConfirmacaoProduto" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalConfirmacaoProduto">Excluir produto:</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Deseja realmente excluir o produto?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-danger confirmarExcluirProduto">Confirmar</button>
			</div>
		</div>
	</div>
</div> <!--Fim Modal-->

<!-- Tela de confirmação de exclusão / Modal -->
<div class="modal fade" id="modalConfirmacaoFornecedor" tabindex="-1" role="dialog" aria-labelledby="modalConfirmacaoFornecedor" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalConfirmacaoFornecedor">Excluir fornecedor:</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Deseja realmente excluir o fornecedor?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-danger confirmarExcluirFornecedor">Confirmar</button>
			</div>
		</div>
	</div>
</div> <!--Fim Modal-->

<!-- Tela de confirmação de exclusão / Modal -->
<div class="modal fade" id="modalConfirmacaoFuncionario" tabindex="-1" role="dialog" aria-labelledby="modalConfirmacaoFuncionario" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalConfirmacaoFuncionario">Excluir funcionário:</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Deseja realmente excluir o funcionário?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-danger confirmarExcluirFuncionario">Confirmar</button>
			</div>
		</div>
	</div>
</div> <!--Fim Modal-->

<!-- Tela de confirmação de exclusão / Modal -->
<div class="modal fade" id="modalConfirmacaoCliente" tabindex="-1" role="dialog" aria-labelledby="modalConfirmacaoCliente" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalConfirmacaoCliente">Excluir cliente:</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Deseja realmente excluir o cliente?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-danger confirmarExcluirCliente">Confirmar</button>
			</div>
		</div>
	</div>
</div> <!--Fim Modal-->


<!-- Tela de confirmação de exclusão / Modal -->
<div class="modal fade" id="modalConfirmacaoEmprestimo" tabindex="-1" role="dialog" aria-labelledby="modalConfirmacaoEmprestimo" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalConfirmacaoEmprestimo">Excluir empréstimo:</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Deseja realmente excluir o empréstimo?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-danger confirmarExcluirEmprestimo">Confirmar</button>
			</div>
		</div>
	</div>
</div> <!--Fim Modal-->

<!-- Modal Confirmar exclusão-->
<div class="modal fade" id="modalok" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalok">Exclusão realizada com sucesso!</h5>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-sm voltarconsulta">Fechar</button>
			</div>
		</div>
	</div>
</div><!-- Fim Modal -->

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
				$tabela_grid_dinamica = '<table cellpadding="10px" class="table table-condensed table-hover text-center">';
				$tabela_grid_dinamica .= '<tr><td style="width:15%;"><b>Código de barras</b></td><td style="width:35%;"><b>Nome</b></td><td style="width:10%;"><b>Preço de venda</b></td><td style="width:10%;"><b>Preço de compra</b></td><td style="width:10%;"><b>Quantidade</b></td><td style="width:10%;"><b>Editar</b></td><td style="width:10%;"><b>Excluir</b></td></tr>';
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
					$tabela_grid_dinamica .= '<td> <a title="Editar" href="edtproduto.php?pesq='.$id.'"><img width="25" height="25" src="../svg/editar.svg"></a>';
					$tabela_grid_dinamica .= '<td> <a title="Excluir" data-toggle="modal" data-target="#modalConfirmacaoProduto" id="'.$id.'" onclick="pegaCodigo(this.id)" href=""><img width="25" height="25" src="../svg/excluir.svg"></a>';
				}
				$tabela_grid_dinamica .= '</tr></table>';
			}elseif($radioValue == 2){
				$key = $_POST["txtFuncionario"];
				$sql = mysqli_query($conexao,"SELECT id_funcionario,nome,cpf,telefone,login,rua,numero,bairro from pessoa,funcionario,endereco where nome like '%$key%' and pessoa.id_pessoa = funcionario.id_pessoa and pessoa.id_endereco = endereco.id_endereco");
				$tabela_grid_dinamica = '<table cellpadding="10px" class="table table-condensed table-hover text-center" style="width:1000px;">';
				$tabela_grid_dinamica .= '<tr><td style="width:35%;"><b>Nome</b></td><td style="width:15%;"><b>CPF</b></td><td style="width:10%;"><b>Telefone</b></td><td style="width:10%;"><b>Login</b></td><td style="width:10%;"><b>Editar</b></td><td style="width:10%;"><b>Excluir</b></td></tr>';
				while($row = mysqli_fetch_array($sql)){
					$id = $row["id_funcionario"];
					$nome = $row["nome"];
					$cpf = $row["cpf"];
					$telefone = $row["telefone"];
					$login = $row["login"];

					$tabela_grid_dinamica .= '<tr><td>' .$nome. '</td>';
					$tabela_grid_dinamica .= '<td>'.$cpf. '</td>';
					$tabela_grid_dinamica .= '<td>'. $telefone .'</td>';
					$tabela_grid_dinamica .= '<td>'. $login .'</td>';
					$tabela_grid_dinamica .= '<td align="center" valign="center"><a title="Editar" href="edtfuncionario.php?pesq='.$id.'"><img width="25" height="25" src="../svg/editar.svg"></a></td>';
					$tabela_grid_dinamica .= '<td> <a title="Excluir" data-toggle="modal" data-target="#modalConfirmacaoFuncionario" id="'.$id.'" onclick="pegaCodigo3(this.id)" href=""><img width="25" height="25" src="../svg/excluir.svg"></a>';
				}
				$tabela_grid_dinamica .= '</tr></table>';
			}elseif($radioValue == 3){
				$key = $_POST["txtFornecedor"];
				$sql = mysqli_query($conexao,"SELECT * from fornecedor,endereco where nome like'%$key%' and fornecedor.id_endereco = endereco.id_endereco");
				$tabela_grid_dinamica = '<table cellpadding="10px" class="table table-condensed table-hover text-center">';
				$tabela_grid_dinamica .= '<tr><td style="width:30%;"><b>Nome</b></td><td style="width:15%;"><b>CNPJ</b></td><td style="width:15%;"><b>Telefone</b></td><td style="width:20%;"><b>Cidade</b></td><td style="width:10%;"><b>Editar</b></td><td style="width:10%;"><b>Excluir</b></td></tr>';
				while($row = mysqli_fetch_array($sql)){	
					$nome = $row["nome"];
					$cnpj = $row["cnpj"];
					$telefone = $row["telefone"];
					$cidade = $row["cidade"];

					$tabela_grid_dinamica .= '<tr><td>' .$nome. '</td>';
					$tabela_grid_dinamica .= '<td>'.$cnpj. '</td>';
					$tabela_grid_dinamica .= '<td>'. $telefone .'</td>';
					$tabela_grid_dinamica .= '<td>'. $cidade .'</td>';
					$tabela_grid_dinamica .= '<td> <a href="edtFornecedor.php?pesq='.$cnpj.'"><img width="25" height="25" src="../svg/editar.svg"></a>';
					$tabela_grid_dinamica .= '<td> <a title="Excluir" data-toggle="modal" data-target="#modalConfirmacaoFornecedor" id="'.$cnpj.'" onclick="pegaCodigo2(this.id)" href=""><img width="25" height="25" src="../svg/excluir.svg"></a>';					
				}
				$tabela_grid_dinamica .= '</tr></table>';
			}elseif($radioValue == 4){
				$key = $_POST["txtCliente"];
				$sql = mysqli_query($conexao,"SELECT * from cliente as c,pessoa as p,endereco as e,referenci_comercial as r where nome like '%$key%' and c.id_pessoa = p.id_pessoa and c.id_referencia_comercial = r.id_referencia_comercia and p.id_endereco = e.id_endereco");
				$tabela_grid_dinamica = '<table cellpadding="10px" class="table table-condensed table-hover text-center">';
				$tabela_grid_dinamica .= '<tr><td style="width:35%;"><b>Nome</b></td><td style="width:15%;"><b>CPF</b></td><td style="width:10%;"><b>RG</b></td><td style="width:10%;"><b>Telefone</b></td><td style="width:10%;"><b>Limite</b></td><td style="width:10%;"><b>Editar</b></td><td style="width:10%;"><b>Excluir</b></td></tr>';
				while($row = mysqli_fetch_array($sql)){
					$id = $row["id_cliente"];
					$nome = $row["nome"];
					$cpf = $row["cpf"];
					$rg = $row["rg"];
					$telefone = $row["telefone"];
					$limite = $row["limite_de_credito"];

					$tabela_grid_dinamica .= '<tr><td>' .$nome. '</td>';
					$tabela_grid_dinamica .= '<td>'.$cpf. '</td>';
					$tabela_grid_dinamica .= '<td>'.$rg. '</td>';
					$tabela_grid_dinamica .= '<td>'. $telefone .'</td>';
					$tabela_grid_dinamica .= '<td>'.$limite. '</td>';
					$tabela_grid_dinamica .= '<td> <a title="Editar" href="edtcliente.php?pesq='.$id.'"><img width="25" height="25" src="../svg/editar.svg"></a>';
					$tabela_grid_dinamica .= '<td> <a title="Excluir" data-toggle="modal" data-target="#modalConfirmacaoCliente" id="'.$id.'" onclick="pegaCodigo4(this.id)" href=""><img width="25" height="25" src="../svg/excluir.svg"></a>';
				}
				$tabela_grid_dinamica .= '</tr></table>';
			}elseif($radioValue == 5){
				$key = $_POST["txtEmprestimo"];
				$sql = mysqli_query($conexao,"SELECT nome,cpf,id_emprestimo,vasilhame,devolucao,data_a_devolver,rua,numero,bairro from venda as v,cliente as c,emprestimo as em,endereco as e, pessoa as p where nome like '%$key%' and c.id_cliente = em.id_cliente and e.id_endereco = em.id_endereco and p.id_pessoa = c.id_pessoa");
				$tabela_grid_dinamica = '<table cellpadding="10px" class="table table-condensed table-hover text-center">';
				$tabela_grid_dinamica .= '<tr><td style="width:30%;"><b>Nome</b></td><td style="width:15%;"><b>CPF</b></td><td style="width:10%;"><b>Vasilhame</b></td><td style="width:10%;"><b>Devolução</b></td><td style="width:15%;"><b>Data a devolver</b></td><td style="width:10%;"><b>Editar</b></td><td style="width:10%;"><b>Excluir</b></td></tr>';
				while($row = mysqli_fetch_array($sql)){
					$id = $row["id_emprestimo"];
					$nome = $row["nome"];
					$cpf = $row["cpf"];
					$vasilhame = $row["vasilhame"];
					$devolucao = $row["devolucao"];
					$datadevolver = $row["data_a_devolver"];

					$tabela_grid_dinamica .= '<tr><td>' .$nome. '</td>';
					$tabela_grid_dinamica .= '<td>'.$cpf. '</td>';
					$tabela_grid_dinamica .= '<td>'.$vasilhame. '</td>';
					$tabela_grid_dinamica .= '<td>'. $devolucao .'</td>';
					$tabela_grid_dinamica .= '<td>'.$datadevolver. '</td>';
					$tabela_grid_dinamica .= '<td> <a title="Editar" href="edtemprestimo.php?pesq='.$id.'"><img width="25" height="25" src="../svg/editar.svg"></a>';
					$tabela_grid_dinamica .= '<td> <a title="Excluir" data-toggle="modal" data-target="#modalConfirmacaoEmprestimo" id="'.$id.'" onclick="pegaCodigo5(this.id)" href=""><img width="25" height="25" src="../svg/excluir.svg"></a>';					
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
				<li class="nav-item">
					<a class="nav-link formatacao active" href="pesquisar_editar.php">ALTERAR CADASTROS<span class="sr-only">(current)</span></a>
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
									<input type="submit" class="btn btn-success" id="btnCancelar" value="Pesquisar">
								</div>
							</div> 
							<div class="row">
								<div class="col-md-2" align="left" style="margin-top:50px;"><h5></h5></div>
							</div>
							<div class="row rowForm">
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