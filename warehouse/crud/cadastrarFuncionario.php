<?php
require_once ('bd.php');

$last_id = $nome = $login=  $senha = $confirmar = $cpf = $rg = $rua = $numero = $bairro = $cidade = $estado = $telefone =  "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$nome = $_POST["txtNome"];
	$login = $_POST["txtLogin"];
	$senha = md5($_POST["txtSenha"]);
	$confirmar = $_POST["txtConfirmarSenha"];
	$cpf = $_POST["txtCpf"];
	$rg = $_POST["txtRG"];
	$rua = $_POST["txtRua"];
	$numero = $_POST["txtNumero"];
	$bairro = $_POST["txtBairro"];
	$cidade = $_POST["txtCidade"];
	$estado = $_POST["slcEstado"];
	$telefone = $_POST["txtTelefone"];

	
	$sql = "INSERT INTO endereco(rua, numero, bairro, cidade,estado)VALUES('$rua', '$numero', '$bairro', '$cidade','$estado')";
	
	if(mysqli_query($conexao, $sql)){
		$last_id=mysqli_insert_id($conexao);
		$sql2 = "INSERT INTO pessoa (id_endereco, cpf, rg, nome,data_de_nascimento,telefone) VALUES ('$last_id','$cpf','$rg','$nome','','$telefone')";
		if(mysqli_query($conexao,$sql2))
		{
			$last_id2 = mysqli_insert_id($conexao);
			$sql3 = "INSERT INTO funcionario (id_pessoa, login, senha, administrador, id_endereco) VALUES ('$last_id2','$login','$senha','0','$last_id') ";
			if($stmt = $conexao->prepare($sql3))
			{
				if($stmt->execute())
				{
					echo "cadastrado";
				}else{
					echo "errocodigo";
				}
			}
		}
		
	}

	$stmt->close();
	$conexao->close();
}
?>

