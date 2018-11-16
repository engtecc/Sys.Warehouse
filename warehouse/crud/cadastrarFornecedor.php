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
	
	if ($stmt = $conexao->prepare($sql)){
		
		if($stmt->execute()){
			echo "cadastrado";
			$last_id = $conexao->insert_id;
		}else{
            echo "errocodigo";
		}
	}

	$sql2 = "INSERT INTO pessoa(id_endereco, cpf, rg, nome ,data_de_nascimento,telefone,cnpj) values('$last_id', '','', '$nome','','$telefone','$cnpj')";

	if($query = $conexao->prepare($sql2))
	{
		if($query->execute())
		{
			$last_id = $conexao->insert_id;
			echo "cadastrado";
		}else{
			echo "errocodigo";
		}
	}

	$sql3 = "INSERT INTO fornecedor (cnpj,nome,telefone,id_pessoa) VALUES ('$cnpj','$nome','$telefone','$last_id')";
	if($query2 = $conexao->prepare($sql3))
	{
		if($query2->execute())
		{
			echo "cadastrado";
		}else{
			echo "errocodigo";
		}
	}
	$stmt->close();
	$conexao->close();
}
?>

