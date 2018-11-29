<?php
require_once ('bd.php');

$last_id = $nome = $cpf = $rg = $rua = $numero = $bairro = $cidade = $estado = $telefone = $data_de_nascimento = $referencia_1 = $referencia_2 = $referencia_3 = $limite_de_credito = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$nome = $_POST["txtNome"];
	$cpf = $_POST["txtCpf"];
	$rg = $_POST["txtRG"];
	$rua = $_POST["txtRua"];
	$numero = $_POST["txtNumero"];
	$bairro = $_POST["txtBairro"];
	$cidade = $_POST["txtCidade"];
	$estado = $_POST["slcEstado"];
	$telefone = $_POST["txtTelefone"];
	$data_de_nascimento = $_POST["dateNascimento"];
	$referencia_1 = $_POST["txtReferencia1"];
	$referencia_2 = $_POST["txtReferencia2"];
	$referencia_3 = $_POST["txtReferencia3"];
	$limite_de_credito = $_POST["txtLimite"];

	
	$sql = "INSERT INTO endereco (rua, numero, bairro, cidade, estado) VALUES ('$rua', '$numero', '$bairro', '$cidade','$estado')";
	$sql2 = "INSERT INTO referenci_comercial (referencia_1, referencia_2, referencia_3) VALUES ('$referencia_1', '$referencia_2', '$referencia_3')";
	
	if(mysqli_query($conexao, $sql)){
		$last_id=mysqli_insert_id($conexao);
		$sql3 = "INSERT INTO pessoa (id_endereco, cpf, rg, nome, data_de_nascimento, telefone) VALUES ('$last_id', '$cpf', '$rg', '$nome', '$data_de_nascimento', '$telefone')";
	}
	if(mysqli_query($conexao, $sql2)){
		$last_id2=mysqli_insert_id($conexao);
	}
	if(mysqli_query($conexao, $sql3)){
		$last_id3=mysqli_insert_id($conexao);
		$sql4 = "INSERT INTO cliente (id_referencia_comercial, limite_de_credito, id_pessoa, id_endereco) VALUES ('$last_id2', '$limite_de_credito', '$last_id3', '$last_id')";	
		if($stmt = $conexao->prepare($sql4))
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
