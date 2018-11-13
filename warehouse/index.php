<!doctype html>
<html lang="pt-br">
	<head>
		<title>Januário - Disk Cerveja</title>        
		<meta charset="utf-8">
		<meta name="viewport"       content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description"    content="WareHouse">
		<meta name="author"         content="ENGTEC - Engenharia e Computação">
		
		<link rel="icon" href="imagens/favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css" >
		<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">

		<script src="js/jquery.min.js"></script>
		<script src="js/lightbox-plus-jquery.min.js"></script>
		<script src="js/script.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>

	<body>
		<nav class="site-header margemLogin">
			<div class = "jumbotron text-center removerMargem">
				<h1 class="text-titulo"><strong>JANUÁRIO</strong></h1>
				<h4><img class="rounded-circle" src="svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="svg/star.svg" alt="Generic placeholder image" width="20" height="20"><strong> DISK CERVEJA </strong><img class="rounded-circle" src="svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="svg/star.svg" alt="Generic placeholder image" width="20" height="20"> <img class="rounded-circle" src="svg/star.svg" alt="Generic placeholder image" width="20" height="20"></h4>
			</div>
		</nav>


		<form method="post" action="" class="form-signin" enctype="multipart/form-data" id="formLogin">
	      <label for="inputEmail" class="sr-only">Usuário</label>
	      <input type="text" id="login" class="form-control" name="login" placeholder="usuário" required autofocus>
	        <br>    
	      <label for="inputPassword" class="sr-only">Senha</label>
	      <input type="password" id="senha" class="form-control" name="senha" placeholder="senha" required>
	      <div class="checkbox mb-3">
	      </div>
	      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
	      <p class="mt-2 pb-0"><small class="text-error errologin"></small></p>    
	      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018</p>
	    </form>
	</body>
</html>