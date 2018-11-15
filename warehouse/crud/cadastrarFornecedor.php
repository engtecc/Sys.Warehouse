<?php
require_once ('bd.php');

$cnpj = $nome = $telefone = $rua = $numero = $numero = $bairro = $cidade =$estado ="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$cnpj = $_POST["txtCnpj"];
	$nome = $_POST["txtNome"];
	$telefone = $_POST["txtTelefone"];
	$rua = $_POST["txtRua"];
	$numero = $_POST["txtNumero"];
	$bairro = $_POST["txtBairro"];
	$cidade = $_POST["txtCidade"];
	$estado = $_POST["slcEstado"];

	$sql = BEGIN TRANSACTION "INSERT INTO endereco (rua, numero, bairro, cidade, estado) VALUES (?, ?, ?, ?, ?)" "INSERT INTO fornecedor (cnpj, nome, telefone) VALUES (?, ?, ?)";

	if ($stmt = $conexao->prepare($sql)){
		$stmt->bind_param("ssssssss", $cnpj, $nome, $telefone, $rua, $numero, $numero, $bairro, $cidade, $estado);
		if($stmt->execute()){
			echo "cadastrado";
		}else{
            echo "errocodigo";
		}
	}

	$stmt->close();
	$conexao->close();
}
?>

