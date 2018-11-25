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
	<script src="../js/autenticar.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="site-header margemLogin2">
		<div class = "jumbotron text-center removerMargem">
			<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
			<h4><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="../svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
		</div>
	</nav>


	<form method="post" action="" class="form-signin" enctype="multipart/form-data" id="formAutenticar">
		<label for="inputEmail">Usuário:</label>
		<input type="text" id="login" class="form-control" name="login" required autofocus><br>    
		<label for="inputPassword">CPF:</label>
		<input type="text" id="cpf" class="form-control" name="cpf" required><br>
		<label for="inputPassword">RG:</label>
		<input type="text" id="rg" class="form-control" name="rg" required>
		<div class="checkbox mb-3">
		</div>
		<div class="text-center">
		<p class="mt-2 pb-0"><small class="text-error erroautenticar"></small></p><br>
		<a class="btn btn-danger mr-3" href="../crud/sair.php" role="button">Cancelar</a>
		<button class="btn btn-primary ml-3" type="submit">Próximo</button>
		</div>   
	</form>
</body>
</html>