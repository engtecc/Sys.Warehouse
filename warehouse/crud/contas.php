<?php
require_once ('bd.php');

$last_id = $last_id_ref= $cnpj = $nome = $telefone = $rua = $numero = $numero = $bairro = $cidade = $estado = "";

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
	$dataNascimento = $_POST["dateNascimento"];
	$referencia1 = $_POST["txtReferencia1"];
	$referencia2 = $_POST["txtReferencia2"];
	$referencia3 = $_POST["txtReferencia3"];
	$limite = $_POST["txtLimite"];
	
	
	$sql = "INSERT INTO endereco(rua, numero, bairro, cidade,estado)VALUES('$rua', '$numero', '$bairro', '$cidade','$estado')";
	
	if ($stmt = $conexao->prepare($sql)){
		
		if($stmt->execute()){
			echo "cadastrado";
			$last_id = $conexao->insert_id;
		}else{
            echo "errocodigo";
		}
	}

	$sql2 = "INSERT INTO pessoa(id_endereco, cpf, rg, nome ,data_de_nascimento,telefone,cnpj) values('$last_id', '$cpf','$rg', '$nome','$dataNascimento','$telefone','')";

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

	$sql3 = "INSERT INTO referenci_comercial (referencia_1,referencia_2,referencia_3) VALUES ('$referencia1','$referencia2','$referencia3')";
	if($query2 = $conexao->prepare($sql3))
	{
		if($query2->execute())
		{
			$last_id_ref = $conexao->insert_id;
			echo "cadastrado";
		}else{
			echo "errocodigo";
		}
	}

	$sql4 = "INSERT INTO cliente (id_referencia_comercial,limite_de_credito, id_pessoa) VALUES ('$last_id_ref','$limite','$last_id')";
	if($query3 = $conexao->prepare($sql4))
	{
		if($query3->execute())
		{
			$last_id_ref = $conexao->insert_id;
			echo "cadastrado";
		}else{
			echo "errocodigo";
		}
	}
	$stmt->close();
	$conexao->close();
}
?>

