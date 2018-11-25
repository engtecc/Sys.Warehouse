<?php
require_once ('bd.php');

$id = $senha = $confirmar = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
	$id = $_POST["id"];
	$senha = md5($_POST["txtSenha"]);
	$confirmar = md5($_POST["txtConfirmarSenha"]);

	if ($senha != $confirmar){
		echo "falha";
	}else{
		$sql = "UPDATE funcionario SET senha='$senha' WHERE id_funcionario= '$id'";
		
		if($stmt = $conexao->prepare($sql)){
			if($stmt->execute()){
				echo "alterada";
			}else{
				echo "erro";
			}
		}

	$stmt->close();
	$conexao->close();	
	}
}
?>

