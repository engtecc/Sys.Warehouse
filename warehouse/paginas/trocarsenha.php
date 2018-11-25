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
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css" >

	<script src="../js/jquery.min.js"></script>
	<script src="../js/trocarsenha.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="site-header margemLogin2">
		<div class = "jumbotron text-center removerMargem">
			<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
			<h4><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
		</div>
	</nav>
	<div class="modal fade" id="modalok" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalok">Senha alterada com sucesso!</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-sm ok">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalerro" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-error" id="modalok">Falha ao tentar trocar a senha!</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm ok">Fechar</button>
				</div>
			</div>
		</div>
	</div>


	<form method="post" action="" class="form-signin" enctype="multipart/form-data" id="formTrocarSenha">
		<input type="hidden" name="id" value="<?=$_GET['id']?>">
		<label for="inputEmail">Senha:</label>
		<input type="text" id="txtSenha" class="form-control" name="txtSenha" required autofocus><br>    
		<label for="inputPassword">Confirmar senha:</label>
		<input type="text" id="txtConfirmarSenha" class="form-control" name="txtConfirmarSenha" required><br>
		<div class="checkbox mb-3">
		</div>
		<div class="text-center">
			<button class="btn btn-success btn-block" name="btnConcluir" type="submit">Concluir</button>
		</div>
		<p class="mt-2 pb-0"><small class="text-error errosenha"></small></p>   
	</form>
</body>
</html>