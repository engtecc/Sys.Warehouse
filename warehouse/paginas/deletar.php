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
	
	<div class="row" style="margin-top:80px">
		<div class="col-md-4"></div>
		<div class="col-md-4 mt-3">
			<center> 
				<?php
					$codigo = $_GET["del"];
					echo('
					<div class="row">
						<div class="col-md-12">
							<p align="justify"><h1><b>Tem certeza que deseja apagar este registro?</b></h1></p>
						</div>
						</div>
						<div class="row">
						<div class="col-md-6">
							<a  style="padding:30px;width:150px;"class="btn btn-success" href="deletarvenda.php?del='.$codigo.'" role="button">EXCLUIR</a>
						</div>
						<div class="col-md-6">
							<a style="padding:30px;width:150px;" class="btn btn-danger" href="venda.php" role="button">CANCELAR</a>
						</div>
					</div>'
					);
				?>	
			</center>	
		</div>
	</div>
</body>
</html>