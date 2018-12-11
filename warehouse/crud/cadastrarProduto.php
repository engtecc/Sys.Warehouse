<?php
require_once ('bd.php');

$codigo_de_barras = $nome = $preco_de_venda = $preco_de_compra = $quantidade_estoque = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$codigo_de_barras = $_POST["txtCodigoBarras"];
	$nome = $_POST["txtNome"];
	$preco_de_venda = $_POST["txtPrecoVenda"];
	$preco_de_compra = $_POST["txtPrecoCompra"];
	$quantidade_estoque = $_POST["txtQuantidade"];

	$sql = "INSERT INTO produto (codigo_de_barras, nome, preco_de_venda, preco_de_compra, quantidade_estoque) VALUES (?, ?, ?, ?, ?)";
	if ($stmt = $conexao->prepare($sql)){
		$stmt->bind_param("sssss", $codigo_de_barras, $nome, $preco_de_venda, $preco_de_compra, $quantidade_estoque);
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