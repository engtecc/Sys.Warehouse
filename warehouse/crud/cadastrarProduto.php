<?php
require_once ('bd.php');

$codigo_de_barras = $nome = $preco_de_venda = $preco_de_compra = $quantidade_estoque = $validade = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$codigo_de_barras = $_POST["txtCodigoBarras"];
	$nome = $_POST["txtNome"];
	$preco_de_venda = $_POST["txtPrecoVenda"];
	$preco_de_compra = $_POST["txtPrecoCompra"];
	$quantidade_estoque = $_POST["txtQuantidade"];
	$validade = $_POST["txtValidade"];

	$sql = "INSERT INTO produto (codigo_de_barras, nome, preco_de_venda, preco_de_compra, quantidade_estoque, validade) VALUES (?, ?, ?, ?, ?, ?)";
	if ($stmt = $conexao->prepare($sql)){
		$stmt->bind_param("ssssss", $codigo_de_barras, $nome, $preco_de_venda, $preco_de_compra, $quantidade_estoque, $validade);
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