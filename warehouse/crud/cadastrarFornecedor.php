<?php
require_once ('bd.php');

$last_id = $cnpj = $nome = $telefone = $rua = $numero = $numero = $bairro = $cidade = $estado = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$cnpj = $_POST["txtCnpj"];
	$nome = $_POST["txtNome"];
	$telefone = $_POST["txtTelefone"];
	$rua = $_POST["txtRua"];
	$numero = $_POST["txtNumero"];
	$bairro = $_POST["txtBairro"];
	$cidade = $_POST["txtCidade"];
	$estado = $_POST["slcEstado"];

	
	$sql = "INSERT INTO endereco(rua, numero, bairro, cidade,estado)VALUES('$rua', '$numero', '$bairro', '$cidade','$estado')";
	
	if(mysqli_query($conexao, $sql)){
		$last_id=mysqli_insert_id($conexao);
		$sql2 = "INSERT INTO fornecedor (cnpj, nome, telefone, id_endereco) VALUES ('$cnpj','$nome','$telefone','$last_id')";
		if($stmt = $conexao->prepare($sql2))
		{
			if($stmt->execute())
			{
				echo "cadastrado";
			}else{
				echo "errocodigo";
			}
		}
	}

	$stmt->close();
	$conexao->close();
}
?>

